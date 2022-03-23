<?php

namespace App\Http\Controllers;

use App\Models\ExcelModel;
use App\Exports\ExportModel;
use App\Imports\ImportModel;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function index()
    {
        if( ExcelModel::count() ){
            $controller = new ExcelController();
            return $controller->show();
        }
        return view('Excel.index');
    }


    public function import(Request $request)
    {
       $document = $request->file('document');
        Excel::import(new ImportModel, $document);

        return back()->
        with('msg', 'OK');
    }

    public function show(){
        return view('Excel.show')->
        with('rows', ExcelModel::all() );
    }

    public function export(){
        return Excel::download(new ExportModel, 'Hello.xlsx');
    }

    public function delete(){
        foreach( ExcelModel::all() as $row ){
            $row->delete();
        }
        return redirect('index');
    }

    public function update(Request $request){

        $model = ExcelModel::select('id')->get();
        foreach($model as $m){
            $excel = ExcelModel::where('id','=',intval($m['id']) )->get();
            foreach($excel as $sql){
                $sql->state = $request[strval($m['id'])];
                $sql->save();
            }
        }

        return back()->with('msg', 'OK');
    }


}

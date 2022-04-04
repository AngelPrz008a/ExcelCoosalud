<?php

namespace App\Http\Controllers;

use App\Models\ExcelModel;
use App\Exports\ExportModel;
use App\Imports\ImportModel;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


//TODO LO RELEVANTE A CARGUE Y MUESTRA DE DATOS DEL EXCEL
//CARGUE, MUESTRA, ACTUALIZACION Y ELIMINACION
class ExcelController extends Controller
{

    public function import(Request $request, $idWork)
    {
        $document = $request->file('document');
        Excel::import(new ImportModel($idWork), $document);
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
        return redirect('excel');
    }

    public function update(Request $request){
        $model = ExcelModel::select('id')->
        where('idWork','=',$request->idWork)->get();

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

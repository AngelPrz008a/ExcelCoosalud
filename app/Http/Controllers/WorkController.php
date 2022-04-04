<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Work;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WorkController extends Controller
{

    public function index($id)
    {
        return view('Work.index')->
        with('user', User::find($id))->
        with('works', Work::where('idUser','=',$id)->get() );
    }

    public function create($id)
    {
        return view('Work.create')->
        with('user', $id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $work = new Work();
        $work->name = $request->name;
        $work->state = "NUEVO";
        $work->dateCreate = Carbon::now();//Carbon::createFromFormat('Y-m-d H', Carbon::now() );
        $work->dateUpdate = $work->dateCreate;
        $work->idUser = $request->id;
        $work->save();

        if($request->document != ""){
            $excel = new ExcelController();
            $excel->import($request, $work->id);
        }

        return back();
    }


    public function show($id)
    {
        return view('Work.show')->
        with('work', Work::find($id) )->
        with('excels', Work::find($id)->workExcel() );
    }

    public function edit($id)
    {
        return view('Work.update')->
        with('work', Work::find($id) )->
        with('excels', Work::find($id)->workExcel() );
    }

    public function update(Request $request, $id)
    {
        $work = Work::find($id);
        $work->name = $request->name;
        $work->state = $request->state;
        //$work->dateCreate = Carbon::now();//Carbon::createFromFormat('Y-m-d H', Carbon::now() );
        $work->dateUpdate = Carbon::now();
        //$work->idUser = $request->id;
        $work->save();

        if($request->document != ""){
            $excel = new ExcelController();
            $excel->import($request, $work->id);
        }

        return back();
    }

    public function destroy($id)
    {
        //
    }
}

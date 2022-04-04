<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        return view('User.index')->
        with('ags', User::where('role','=','1')->get() )->
        with('as', User::where('role','=','2')->get() )->
        with('ds', User::where('role','=','3')->get() );
    }


    public function create()
    {
        return view('User.create');
    }


    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = encrypt($request->email);
        $user->state = "Activo";
        $user->save();

        return back()->
        with('msg','CREADO');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        return view('User.update')->
        with('user', User::where('id','=',$id)->get()  );
    }


    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = encrypt($request->password);
        $user->state = $request->state;
        $user->save();

        return back()->
        with('msg','ACTUALIZADO');
    }


    public function destroy($id)
    {
        //
    }

    public function account(){
        return view('User.account');
    }

    public function updateAccount(Request $request){

        $user = User::find( Auth::user()->id );
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = encrypt($request->password);
        $user->save();

        return back()->
        with('msg','ACTUALIZADO');

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;

class AuthController extends Controller
{
    public function login()
    {
        return view('Auth.login');
    }

    public function enter(Request $request)
    {
        $user = User::where('email','=',$request->email)->first(); //consulta usaurio por correo digitado
        if($user != null || $user != '') //si es diferente a vacio o nulo
        {
            $password = decrypt($user->password); //desencripta la contraseña de la BD
            if($password == $request->password )
            {
                Auth::login($user); //crea sesion
                return redirect('home');
            }

        }
        return back();
    }

    public function home(){
        return view('Auth.home');
    }

    public function logout()
    {
        Auth::logout();
        return view('Auth.login');
    }
}

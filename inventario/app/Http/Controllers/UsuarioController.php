<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function register(){
        return view('auth.register');
    }

    public function create(Request $request){
        $usuario = new Usuario();
        $usuario->usu_name = $request->nombre;        
        $usuario->usu_correo = $request->correo;
        $usuario->usu_telefono = $request->telefono;
        $usuario->usu_password = Hash::make($request->contrasenia);
        $query = $usuario->save();

        if($query){
            $valido = 1;
        }else{
            $valido = 0;
        }
        return response()->json(['valido' -> $valido]);
    }

    /*public function check(Request $requeset){
        $usuario=usuario::where('usu_name','=',$requeset->nombre)->first();
        $valido=0;
        if($usuario){
            if(Hash::check($contrasenia, $usuario->usu_password)){
                $requeset->session()->put('LoginUsuario', $usuario->usu_name);
                $valido=1;
            }else{
                $valido=0;
            }
            return response()->json(['valido'=> $valido]);
        }
    }*/

    /*function logout(){
        if(session()->hash('LoginUsuario')){
            session->pull('LoginUsuario')
            return redirec('login')
        }
    }*/
}
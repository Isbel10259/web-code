<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PersonalController extends Controller
{
    public function index(Request $request){
        if($request->ajax()){
            $personal = DB::select('call sp_personal_listar()');
            return DataTables::of($personal)
                  ->addColumn('action',function($personal){
                      $acciones = '<a href="javascript:void(0)" onclick="editarPersonal('.$personal->per_id.')" class="btn btn-link btn-success btn-lg" data-original-title="Edit Task"><i class="fas fa-user-edit"></i></a>';
                      $acciones .= '&nbsp;  <button type="button" name="delete" id="'.$personal->per_id.'" class="delete btn btn-link btn-danger btn-lg" data-original-title="Remove"><i class="fas fa-user-times"></i></button>';
                        return $acciones;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('personal.index');
    }

    public function registrar(Request $request){
        $animal = DB::select('call sp_personal_insertar(?,?,?,?,?,?,?,?,?)',
            [
                $request->per_dni,
                $request->per_nombre,
                $request->per_apellido,
                $request->per_correo,
                $request->per_direccion,
                $request->per_celular,
                $request->per_area,
                $request->per_piso,
                $request->tper_id
            ]);

        return back();
    }

    public function eliminar($per_id){
        $personal =DB::select('call sp_personal_eliminar(?)', [$per_id]);
        return back();
    }

    public function editar($per_id){
        $personal = DB::select('call sp_personal_editar(?)', [$per_id]);
        return response()->json($personal);
    }

    public function actualizar(Request $request){
        $personal = DB::select('call sp_personal_actualizar(?,?,?,?,?,?,?,?,?,?)',
                 [
                    $request->per_id,
                    $request->per_dni,
                    $request->per_nombre,
                    $request->per_apellido,
                    $request->per_correo,
                    $request->per_direccion,
                    $request->per_celular,
                    $request->per_area,
                    $request->per_piso,
                    $request->tper_id
                 ]);

        return back();
    }
}

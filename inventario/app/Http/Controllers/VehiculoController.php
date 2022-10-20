<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class VehiculoController extends Controller
{
    public function index(Request $request){
        if($request->ajax()){
            $patrimonio = DB::select('call sp_vehiculo_listar()');
            return DataTables::of($patrimonio)
                  ->addColumn('action',function($patrimonio){
                      $acciones = '<a href="javascript:void(0)" onclick="editarVehiculo('.$patrimonio->pat_id.')" class="btn btn-link btn-success btn-lg" data-original-title="Edit Task"> <i class="fas fa-edit"></i></a>';
                      $acciones .= '<button type="button" name="delete" id="'.$patrimonio->pat_id.'" class="delete btn btn-link btn-danger btn-lg" data-original-title="Remove"> <i class="fas fa-trash-alt"></i></button>';
                      return $acciones;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('vehiculo.index');
    }

    public function eliminar($pat_id){
        $patrimonio =DB::select('call sp_vehiculo_eliminar(?)', [$pat_id]);
        return back();
    }

    public function registrar(Request $request){
        $patrimonio = DB::select('call sp_vehiculo_insertar(?,?,?,?,?,?,?,?,?,?)',
            [
                $request->pat_codigo,
                $request->pat_descripcion,
                $request->pat_marca,
                $request->pat_modelo,
                $request->pat_color,
                $request->pat_placa,
                $request->pat_anio,
                $request->pat_estado,
                $request->pat_disponibilidad,
                $request->cat_id
            ]);

        return back();
    }

    public function editar($pat_id){
        $patrimonio = DB::select('call sp_vehiculo_editar(?)', [$pat_id]);
        return response()->json($patrimonio);
    }

    public function actualizar(Request $request){
        $patrimonio = DB::select('call sp_vehiculo_actualizar(?,?,?,?,?,?,?,?,?,?,?)',
                 [
                    $request->pat_id,
                    $request->pat_codigo,
                    $request->pat_descripcion,
                    $request->pat_marca,
                    $request->pat_modelo,
                    $request->pat_color,
                    $request->pat_placa,
                    $request->pat_anio,
                    $request->pat_estado,
                    $request->pat_disponibilidad,
                    $request->cat_id
                 ]);

        return back();
    }
}
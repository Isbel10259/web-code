<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class VEquipoController extends Controller
{
    public function index(Request $request){
        if($request->ajax()){
            $movimiento = DB::select('call sp_movimiento_listar()');
            return DataTables::of($movimiento)
                  ->addColumn('action',function($movimiento){
                      $acciones = '<a href="javascript:void(0)" onclick="editarMovimiento('.$movimiento->mov_id.')" class="btn btn-link btn-success btn-lg" data-original-title="Edit Task"> <i class="fas fa-edit"></i></a>';
                      $acciones .= '<button type="button" name="delete" id="'.$movimiento->mov_id.'" class="delete btn btn-link btn-danger btn-lg" data-original-title="Remove"> <i class="fas fa-trash-alt"></i></button>';
                      return $acciones;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('vequipo.index');
    }

    public function eliminar($mov_id){
        $movimiento =DB::select('call sp_movimiento_eliminar(?)', [$mov_id]);
        return back();
    }

    public function registrar(Request $request){
        $movimiento = DB::select('call sp_movimiento_insertar(?,?,?,?,?)',
            [
                $request->mov_fecha,
                $request->per_dni,
                $request->tmov_id,
                $request->pat_codigo,
                $request->pat_disponibilidad,
            ]);

        return back();
    }

    public function editar($mov_id){
        $movimiento = DB::select('call sp_movimiento_editar(?)', [$mov_id]);
        return response()->json($movimiento);
    }
    
    public function actualizar(Request $request){
        //return response()->json($request);
        $movimiento = DB::select('call sp_movimiento_actualizar(?,?,?,?,?,?)',
                 [
                    $request->mov_id,
                    $request->mov_fecha,
                    $request->per_dni,
                    $request->tmov_id,
                    $request->pat_codigo,
                    $request->pat_disponibilidad,
                 ]);

        return back();
    }

    /*public function buscarpersonal(Request $request){
    public function personal(Request $request )
    {
        $output="";
        $personal=personal::Where('per_nombre','LIKE','%' .$request->personal. '%') -> orWhere('per_apellido','LIKE','%' .$request->personal. '%')->get();

        foreach($personal as $personal)
        {
            $output.=
            '<tr>
            <td>'.$personal->per_nombre.'</td>
            </tr>'; 
        }
        return response($output);
    }

        if($request->get('query'))
        {
            $query=$request-get('query');
            $data=DB::table('personal')
                ->where('per_nombre','LIKE', "%{$query}%")
                ->get();
            $output= '<ul class="dropdown-menu" style="dislay:block; position:relative; width:100%;">';
            foreach($data as $row)
            {
                $output .=
                '<li><a class="dropdown-item" href="">'.$row->per_nombre.'</a></li>';
            }
            $output .= '</ul>';
            echo $output;
        }
    }*/

    public function buscarpersonal(Request $request){

        $querys = DB::select('call sp_buscar_personal (?)',[$request->buscar]);
        $dato = [];
        foreach ($querys as $query) {
            $dato[]=[
                'descrpcion' => $query->nombre_completo,
            ];
        }

        return $dato;
     }

    public function buscarnombre(Request $request){

        $querys = DB::select('call sp_buscar_bien (?)',[$request->buscar]);
        $dato = [];
        foreach ($querys as $query) {
            $dato[]=[
                'nombre' => $query->des_completo,
                'serie' => $query->pat_serie
            ];
        }

        return $dato;
     }

}
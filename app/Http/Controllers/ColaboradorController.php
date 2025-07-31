<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;

class ColaboradorController extends Controller
{    
    public function colaboradorsel(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'p_col_id' => 'required|integer',
            'p_tdi_id' => 'required|integer',
            'p_tge_id' => 'required|integer',
            'p_ard_id' => 'required|integer'
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Error en la validación de datos',
                'errors' => $validator->errors()
            ], 400);
        }
        
        try {
            $p_col_id = $request->has('p_col_id') ? (int) $request->input('p_col_id') : 0;
            $p_tdi_id = $request->has('p_tdi_id') ? (int) $request->input('p_tdi_id') : 0;
            $p_col_numdoi = $request->has('p_col_numdoi') ? (string) $request->input('p_col_numdoi') : '';
            $p_tge_id = $request->has('p_tge_id') ? (int) $request->input('p_tge_id') : 0;
            $p_ard_id = $request->has('p_ard_id') ? (int) $request->input('p_ard_id') : 0;
            $p_col_apepat = $request->has('p_col_apepat') ? (string) $request->input('p_col_apepat') : '';
            $p_col_apemat = $request->has('p_col_apemat') ? (string) $request->input('p_col_apemat') : '';

            $results = DB::select("SELECT * FROM colaborador.spu_colaborador_sel(?,?,?,?,?,?,?)", [
                $p_col_id,$p_tdi_id,$p_col_numdoi,$p_tge_id,$p_ard_id,$p_col_apepat,$p_col_apemat
            ]);
            return response()->json($results);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener los datos',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    
    public function equipotestersel(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'p_eqt_id' => 'required|integer',
            'p_usu_id' => 'required|integer'
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Error en la validación de datos',
                'errors' => $validator->errors()
            ], 400);
        }
        
        try {
            $p_eqt_id = $request->has('p_eqt_id') ? (int) $request->input('p_eqt_id') : 0;
            $p_usu_id = $request->has('p_usu_id') ? (int) $request->input('p_usu_id') : 0;
            $p_eqt_apepat = $request->has('p_eqt_apepat') ? (string) $request->input('p_eqt_apepat') : '';
            $p_eqt_apemat = $request->has('p_eqt_apemat') ? (string) $request->input('p_eqt_apemat') : '';
            $p_eqt_activo = $request->has('p_eqt_activo') ? (int) $request->input('p_eqt_activo') : 9;

            $results = DB::select("SELECT * FROM testsoftware.spu_equipotester_sel(?,?,?,?,?)", [
                $p_eqt_id,$p_usu_id,$p_eqt_apepat,$p_eqt_apemat,$p_eqt_activo
            ]);
            return response()->json($results);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener los datos',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    
    public function equipocalidadsel(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'p_eqc_id' => 'required|integer',
            'p_usu_id' => 'required|integer',
            'p_eqc_activo' => 'required|integer'
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Error en la validación de datos',
                'errors' => $validator->errors()
            ], 400);
        }
        
        try {
            $p_eqc_id = $request->has('p_eqc_id') ? (int) $request->input('p_eqc_id') : 0;
            $p_usu_id = $request->has('p_usu_id') ? (int) $request->input('p_usu_id') : 0;
            $p_eqc_apepat = $request->has('p_eqc_apepat') ? (string) $request->input('p_eqc_apepat') : '';
            $p_eqc_apemat = $request->has('p_eqc_apemat') ? (string) $request->input('p_eqc_apemat') : '';
            $p_eqc_activo = $request->has('p_eqc_activo') ? (int) $request->input('p_eqc_activo') : 9;

            $results = DB::select("SELECT * FROM testsoftware.spu_equipocalidad_sel(?,?,?,?,?)", [
                $p_eqc_id,$p_usu_id,$p_eqc_apepat,$p_eqc_apemat,$p_eqc_activo
            ]);
            return response()->json($results);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener los datos',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}

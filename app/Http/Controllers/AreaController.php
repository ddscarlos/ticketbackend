<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;

class AreaController extends Controller
{    
    public function areausuarioanu(Request $request): JsonResponse{
            $validator = Validator::make($request->all(), [
                'p_aus_id' => 'required|integer',
                'p_aus_activo' => 'required|integer',
                'p_aus_usumov' => 'required|integer'
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error en la validación de datos',
                    'errors' => $validator->errors()
                ], 400);
            }
            
            try {
                $p_aus_id = $request->has('p_aus_id') ? (int) $request->input('p_aus_id') : 0;
                $p_aus_activo = $request->has('p_aus_activo') ? (int) $request->input('p_aus_activo') : 0;
                $p_aus_usumov = $request->has('p_aus_usumov') ? (int) $request->input('p_aus_usumov') : 1;

                $results = DB::select("SELECT * FROM tickets.spu_areausuario_anu(?,?,?)", [
                    $p_aus_id,$p_aus_activo,$p_aus_usumov
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

    public function areausuariogra(Request $request): JsonResponse{
            $validator = Validator::make($request->all(), [
                'p_ard_id' => 'required|integer',
                'p_usu_id' => 'required|integer',
                'p_aus_usumov' => 'required|integer'
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error en la validación de datos',
                    'errors' => $validator->errors()
                ], 400);
            }
            
            try {
                $p_ard_id = $request->has('p_ard_id') ? (int) $request->input('p_ard_id') : 0;
                $p_usu_id = $request->has('p_usu_id') ? (int) $request->input('p_usu_id') : 0;
                $p_aus_usumov = $request->has('p_aus_usumov') ? (int) $request->input('p_aus_usumov') : 1;

                $results = DB::select("SELECT * FROM tickets.spu_areausuario_gra(?,?,?)", [
                    $p_ard_id,$p_usu_id,$p_aus_usumov
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

    public function areausuariosel(Request $request): JsonResponse{
            $validator = Validator::make($request->all(), [
                'p_aus_id' => 'required|integer',
                'p_ard_id' => 'required|integer',
                'p_usu_id' => 'required|integer',
                'p_aus_activo' => 'required|integer'
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error en la validación de datos',
                    'errors' => $validator->errors()
                ], 400);
            }
            
            try {
                $p_aus_id = $request->has('p_aus_id') ? (int) $request->input('p_aus_id') : 0;
                $p_ard_id = $request->has('p_ard_id') ? (int) $request->input('p_ard_id') : 0;
                $p_usu_id = $request->has('p_usu_id') ? (int) $request->input('p_usu_id') : 0;
                $p_aus_activo = $request->has('p_aus_activo') ? (int) $request->input('p_aus_activo') : 1;

                $results = DB::select("SELECT * FROM tickets.spu_areausuario_sel(?,?,?,?)", [
                    $p_aus_id,$p_ard_id,$p_usu_id,$p_aus_activo
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

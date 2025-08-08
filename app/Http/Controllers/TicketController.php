<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;

class TicketController extends Controller
{    
    public function estadossel(Request $request): JsonResponse{
            $validator = Validator::make($request->all(), [
                'p_est_id' => 'required|integer',
                'p_est_activo' => 'required|integer'
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error en la validación de datos',
                    'errors' => $validator->errors()
                ], 400);
            }
            
            try {
                $p_est_id = $request->has('p_est_id') ? (int) $request->input('p_est_id') : 0;
                $p_est_activo = $request->has('p_est_activo') ? (int) $request->input('p_est_activo') : 1;

                $results = DB::select("SELECT * FROM tickets.spu_estados_sel(?,?)", [
                    $p_est_id,$p_est_activo
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

    public function prioridadsel(Request $request): JsonResponse{
            $validator = Validator::make($request->all(), [
                'p_pri_id' => 'required|integer',
                'p_pri_activo' => 'required|integer'
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error en la validación de datos',
                    'errors' => $validator->errors()
                ], 400);
            }
            
            try {
                $p_pri_id = $request->has('p_pri_id') ? (int) $request->input('p_pri_id') : 0;
                $p_pri_activo = $request->has('p_pri_activo') ? (int) $request->input('p_pri_activo') : 1;

                $results = DB::select("SELECT * FROM tickets.spu_prioridad_sel(?,?)", [
                    $p_pri_id,$p_pri_activo
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

    public function rutassel(Request $request): JsonResponse{
            $validator = Validator::make($request->all(), [
                'p_rut_id' => 'required|integer',
                'p_rut_activo' => 'required|integer'
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error en la validación de datos',
                    'errors' => $validator->errors()
                ], 400);
            }
            
            try {
                $p_rut_id = $request->has('p_rut_id') ? (int) $request->input('p_rut_id') : 0;
                $p_rut_activo = $request->has('p_rut_activo') ? (int) $request->input('p_rut_activo') : 1;

                $results = DB::select("SELECT * FROM tickets.spu_rutas_sel(?,?)", [
                    $p_rut_id,$p_rut_activo
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

    public function serviciossel(Request $request): JsonResponse{
            $validator = Validator::make($request->all(), [
                'p_sla_id' => 'required|integer',
                'p_sla_activo' => 'required|integer'
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error en la validación de datos',
                    'errors' => $validator->errors()
                ], 400);
            }
            
            try {
                $p_sla_id = $request->has('p_sla_id') ? (int) $request->input('p_sla_id') : 0;
                $p_sla_activo = $request->has('p_sla_activo') ? (int) $request->input('p_sla_activo') : 1;

                $results = DB::select("SELECT * FROM tickets.spu_servicios_sel(?,?)", [
                    $p_sla_id,$p_sla_activo
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

    public function ticketsanu(Request $request): JsonResponse{
            $validator = Validator::make($request->all(), [
                'p_tkt_id' => 'required|integer',
                'p_anu_usureg' => 'required|integer'
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error en la validación de datos',
                    'errors' => $validator->errors()
                ], 400);
            }
            
            try {
                $p_tkt_id = $request->has('p_tkt_id') ? (int) $request->input('p_tkt_id') : 0;
                $p_tkt_observ = $request->has('p_tkt_observ') ? (string) $request->input('p_tkt_observ') : '';
                $p_anu_usureg = $request->has('p_anu_usureg') ? (int) $request->input('p_anu_usureg') : 0;

                $results = DB::select("SELECT * FROM tickets.spu_tickets_anu(?,?,?)", [
                    $p_tkt_id,$p_tkt_observ,$p_anu_usureg
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

    public function ticketsasg(Request $request): JsonResponse{
            $validator = Validator::make($request->all(), [
                'p_tkt_id' => 'required|integer',
                'p_age_id' => 'required|integer',
                'p_asg_usureg' => 'required|integer'
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error en la validación de datos',
                    'errors' => $validator->errors()
                ], 400);
            }
            
            try {
                $p_tkt_id = $request->has('p_tkt_id') ? (int) $request->input('p_tkt_id') : 0;
                $p_age_id = $request->has('p_age_id') ? (int) $request->input('p_age_id') : 0;
                $p_tkt_observ = $request->has('p_tkt_observ') ? (string) $request->input('p_tkt_observ') : '';
                $p_asg_usureg = $request->has('p_asg_usureg') ? (int) $request->input('p_asg_usureg') : 1;

                //echo "SELECT * FROM tickets.spu_tickets_asg($p_tkt_id,$p_age_id,$p_asg_usureg)";
                
                $results = DB::select("SELECT * FROM tickets.spu_tickets_asg(?,?,?,?)", [
                    $p_tkt_id,$p_age_id,$p_tkt_observ,$p_asg_usureg
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

    public function ticketsate(Request $request): JsonResponse{
            $validator = Validator::make($request->all(), [
                'p_tkt_id' => 'required|integer',
                'p_ate_usureg' => 'required|integer'
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error en la validación de datos',
                    'errors' => $validator->errors()
                ], 400);
            }
            
            try {
                $p_tkt_id = $request->has('p_tkt_id') ? (int) $request->input('p_tkt_id') : 0;
                $p_tkt_observ = $request->has('p_tkt_observ') ? (string) $request->input('p_tkt_observ') : '';
                $p_ate_usureg = $request->has('p_ate_usureg') ? (int) $request->input('p_ate_usureg') : 1;

                $results = DB::select("SELECT * FROM tickets.spu_tickets_ate(?,?,?)", [
                    $p_tkt_id,$p_tkt_observ,$p_ate_usureg
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

    public function ticketscer(Request $request): JsonResponse{
            $validator = Validator::make($request->all(), [
                'p_tkt_id' => 'required|integer',
                'p_cer_usureg' => 'required|integer'
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error en la validación de datos',
                    'errors' => $validator->errors()
                ], 400);
            }
            
            try {
                $p_tkt_id = $request->has('p_tkt_id') ? (int) $request->input('p_tkt_id') : 0;
                $p_tkt_observ = $request->has('p_tkt_observ') ? (string) $request->input('p_tkt_observ') : '';
                $p_cer_usureg = $request->has('p_cer_usureg') ? (int) $request->input('p_cer_usureg') : 0;

                $results = DB::select("SELECT * FROM tickets.spu_tickets_cer(?,?,?)", [
                    $p_tkt_id,$p_tkt_observ,$p_cer_usureg
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

    public function ticketsgra(Request $request): JsonResponse{
            $validator = Validator::make($request->all(), [
                'p_tkt_id' => 'required|integer',
                'p_tea_id' => 'required|integer',
                'p_ori_id' => 'required|integer'
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error en la validación de datos',
                    'errors' => $validator->errors()
                ], 400);
            }
            
            try {
                $p_tkt_id = $request->has('p_tkt_id') ? (int) $request->input('p_tkt_id') : 0;
                $p_tea_id = $request->has('p_tea_id') ? (int) $request->input('p_tea_id') : 0;
                $p_usu_id = (int) $request->input('p_usu_id', 0);
                $p_ori_id = $request->has('p_ori_id') ? (int) $request->input('p_ori_id') : 1;
                $p_tkp_numero = $request->has('p_tkp_numero') ? (int) $request->input('p_tkp_numero') : 0;
                $p_tkt_asunto = $request->has('p_tkt_asunto') ? (string) $request->input('p_tkt_asunto') : '';
                $p_tkt_observ = $request->has('p_tkt_observ') ? (string) $request->input('p_tkt_observ') : '';
                $p_tkt_numcel = $request->has('p_tkt_numcel') ? (string) $request->input('p_tkt_numcel') : '';

                //echo "SELECT * FROM tickets.spu_tickets_gra($p_tkt_id,$p_tea_id,$p_usu_id,$p_ori_id,'$p_tkp_numero','$p_tkt_asunto','$p_tkt_observ','$p_tkt_numcel')";
                $results = DB::select("SELECT * FROM tickets.spu_tickets_gra(?,?,?,?,?,?,?,?)", [
                    $p_tkt_id,$p_tea_id,$p_usu_id,$p_ori_id,$p_tkp_numero,$p_tkt_asunto,$p_tkt_observ,$p_tkt_numcel
                ]);
                
                if (isset($results[0]) && $results[0]->error == 0 && isset($results[0]->numid)) {
                    $ticketId = $results[0]->numid;
                    $uploadPath = storage_path("app/tickets/{$ticketId}");

                    if (!file_exists($uploadPath)) {
                        mkdir($uploadPath, 0755, true);
                    }

                    if ($request->hasFile('files')) {
                        foreach ($request->file('files') as $file) {
                            $originalExtension = $file->getClientOriginalExtension();
                            
                            $nombreArchivoSp = DB::select(
                                "SELECT * FROM tickets.spu_archivos_ins(?, ?, ?)",
                                [$ticketId, $originalExtension, $p_usu_id]
                            );

                            //echo "<pre>SELECT * FROM tickets.spu_archivos_ins($ticketId, '$originalExtension', $p_usu_id)</pre>";

                            if (isset($nombreArchivoSp[0]) && isset($nombreArchivoSp[0]->mensa)) {
                                $nuevoNombre = $nombreArchivoSp[0]->mensa;
                                $file->move($uploadPath, $nuevoNombre);
                            } else {
                                $file->move($uploadPath, $file->getClientOriginalName());
                            }
                        }
                    }
                }

                return response()->json($results);
            } catch (\Exception $e) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error al procesar el ticket',
                    'error' => $e->getMessage()
                ], 500);
            }
    }

    public function ticketsrea(Request $request): JsonResponse{
            $validator = Validator::make($request->all(), [
                'p_tkt_id' => 'required|integer',
                'p_age_id' => 'required|integer',
                'p_rea_usureg' => 'required|integer'
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error en la validación de datos',
                    'errors' => $validator->errors()
                ], 400);
            }
            
            try {
                $p_tkt_id = $request->has('p_tkt_id') ? (int) $request->input('p_tkt_id') : 0;
                $p_age_id = $request->has('p_age_id') ? (int) $request->input('p_age_id') : 0;
                $p_rea_usureg = $request->has('p_rea_usureg') ? (int) $request->input('p_rea_usureg') : 1;
                
                $results = DB::select("SELECT * FROM tickets.spu_tickets_rea(?,?,?)", [
                    $p_tkt_id,$p_age_id,$p_rea_usureg
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

    public function ticketsres(Request $request): JsonResponse{
            $validator = Validator::make($request->all(), [
                'p_tkt_id' => 'required|integer',
                'p_res_usureg' => 'required|integer'
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error en la validación de datos',
                    'errors' => $validator->errors()
                ], 400);
            }
            
            try {
                $p_tkt_id = $request->has('p_tkt_id') ? (int) $request->input('p_tkt_id') : 0;
                $p_tkt_observ = $request->has('p_tkt_observ') ? (string) $request->input('p_tkt_observ') : 0;
                $p_res_usureg = $request->has('p_res_usureg') ? (int) $request->input('p_res_usureg') : 1;

                $results = DB::select("SELECT * FROM tickets.spu_tickets_res(?,?,?)", [
                    $p_tkt_id,$p_tkt_observ,$p_res_usureg
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

    public function ticketsrus(Request $request): JsonResponse{
            $validator = Validator::make($request->all(), [
                'p_tkt_id' => 'required|integer',
                'p_esr_id' => 'required|integer',
                'p_rus_usureg' => 'required|integer'
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error en la validación de datos',
                    'errors' => $validator->errors()
                ], 400);
            }
            
            try {
                $p_tkt_id = $request->has('p_tkt_id') ? (int) $request->input('p_tkt_id') : 0;
                $p_esr_id = $request->has('p_esr_id') ? (int) $request->input('p_esr_id') : 0;
                $p_rus_observ = $request->has('p_rus_observ') ? (string) $request->input('p_rus_observ') : '';
                $p_rus_usureg = $request->has('p_rus_usureg') ? (int) $request->input('p_rus_usureg') : 1;

                $results = DB::select("SELECT * FROM tickets.spu_tickets_rus(?,?,?,?)", [
                    $p_tkt_id,$p_esr_id,$p_rus_observ,$p_rus_usureg
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

    public function ticketsxagesel(Request $request): JsonResponse{
            $validator = Validator::make($request->all(), [
                'p_age_id' => 'required|integer',
                'p_est_id' => 'required|integer',
                'p_tkt_activo' => 'required|integer'
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error en la validación de datos',
                    'errors' => $validator->errors()
                ], 400);
            }
            
            try {
                $p_age_id = $request->has('p_age_id') ? (int) $request->input('p_age_id') : 0;
                $p_est_id = $request->has('p_est_id') ? (int) $request->input('p_est_id') : 0;
                $p_tkt_fecini = $request->has('p_tkt_fecini') ? (string) $request->input('p_tkt_fecini') : '';
                $p_tkt_fecfin = $request->has('p_tkt_fecfin') ? (string) $request->input('p_tkt_fecfin') : '';
                $p_tkt_activo = $request->has('p_tkt_activo') ? (int) $request->input('p_tkt_activo') : 1;

                $results = DB::select("SELECT * FROM tickets.spu_ticketsxage_sel(?,?,?,?,?)", [
                    $p_age_id,$p_est_id,$p_tkt_fecini,$p_tkt_fecfin,$p_tkt_activo
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

    public function ticketsxainsel(Request $request): JsonResponse{
            $validator = Validator::make($request->all(), [
                'p_tkt_activo' => 'required|integer'
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error en la validación de datos',
                    'errors' => $validator->errors()
                ], 400);
            }
            
            try {
                $p_tkt_activo = $request->has('p_tkt_activo') ? (int) $request->input('p_tkt_activo') : 9;
                $p_tkt_fecini = $request->has('p_tkt_fecini') ? (string) $request->input('p_tkt_fecini') : '';
                $p_tkt_fecfin = $request->has('p_tkt_fecfin') ? (string) $request->input('p_tkt_fecfin') : '';

                $results = DB::select("SELECT * FROM tickets.spu_ticketsxain_sel(?,?,?)", [
                    $p_tkt_activo,$p_tkt_fecini,$p_tkt_fecfin
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

    public function ticketsxapesel(Request $request): JsonResponse{
            $validator = Validator::make($request->all(), [
                'p_age_id' => 'required|integer',
                'p_tkt_activo' => 'required|integer'
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error en la validación de datos',
                    'errors' => $validator->errors()
                ], 400);
            }
            
            try {
                $p_age_id = $request->has('p_age_id') ? (int) $request->input('p_age_id') : 0;
                $p_tkt_fecini = $request->has('p_tkt_fecini') ? (string) $request->input('p_tkt_fecini') : '';
                $p_tkt_fecfin = $request->has('p_tkt_fecfin') ? (string) $request->input('p_tkt_fecfin') : '';
                $p_tkt_activo = $request->has('p_tkt_activo') ? (int) $request->input('p_tkt_activo') : 1;

                $results = DB::select("SELECT * FROM tickets.spu_ticketsxape_sel(?,?,?,?)", [
                    $p_age_id,$p_tkt_fecini,$p_tkt_fecfin,$p_tkt_activo
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

    public function ticketsxestsel(Request $request): JsonResponse{
            $validator = Validator::make($request->all(), [
                'p_est_id' => 'required|integer'
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error en la validación de datos',
                    'errors' => $validator->errors()
                ], 400);
            }
            
            try {
                $p_est_id = $request->has('p_est_id') ? (int) $request->input('p_est_id') : 0;
                $p_tkt_fecini = $request->has('p_tkt_fecini') ? (string) $request->input('p_tkt_fecini') : '';
                $p_tkt_fecfin = $request->has('p_tkt_fecfin') ? (string) $request->input('p_tkt_fecfin') : '';

                $results = DB::select("SELECT * FROM tickets.spu_ticketsxest_sel(?,?,?)", [
                    $p_est_id,$p_tkt_fecini,$p_tkt_fecfin
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

    public function ticketsxfecsel(Request $request): JsonResponse{
            $validator = Validator::make($request->all(), [
                'p_tkt_activo' => 'required|integer'
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error en la validación de datos',
                    'errors' => $validator->errors()
                ], 400);
            }
            
            try {
                $p_tkt_fecini = $request->has('p_tkt_fecini') ? (string) $request->input('p_tkt_fecini') : '';
                $p_tkt_fecfin = $request->has('p_tkt_fecfin') ? (string) $request->input('p_tkt_fecfin') : '';
                $p_tkt_activo = $request->has('p_tkt_activo') ? (int) $request->input('p_tkt_activo') : 9;

                $results = DB::select("SELECT * FROM tickets.spu_ticketsxfec_sel(?,?,?)", [
                    $p_tkt_fecini,$p_tkt_fecfin,$p_tkt_activo
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

    public function ticketsxsarsel(Request $request): JsonResponse{
            $validator = Validator::make($request->all(), [
                'p_sed_id' => 'required|integer',
                'p_ard_id' => 'required|integer',
                'p_tkt_activo' => 'required|integer'
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error en la validación de datos',
                    'errors' => $validator->errors()
                ], 400);
            }
            
            try {
                $p_sed_id = $request->has('p_sed_id') ? (int) $request->input('p_sed_id') : 0;
                $p_ard_id = $request->has('p_ard_id') ? (int) $request->input('p_ard_id') : 0;
                $p_tkt_fecini = $request->has('p_tkt_fecini') ? (string) $request->input('p_tkt_fecini') : '';
                $p_tkt_fecfin = $request->has('p_tkt_fecfin') ? (string) $request->input('p_tkt_fecfin') : '';
                $p_tkt_activo = $request->has('p_tkt_activo') ? (int) $request->input('p_tkt_activo') : 9;

                $results = DB::select("SELECT * FROM tickets.spu_ticketsxsar_sel(?,?,?,?,?)", [
                    $p_sed_id,$p_ard_id,$p_tkt_fecini,$p_tkt_fecfin,$p_tkt_activo
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

    public function ticketsxususel(Request $request): JsonResponse{
            $validator = Validator::make($request->all(), [
                'p_usu_id' => 'required|integer',
                'p_tkt_activo' => 'required|integer'
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error en la validación de datos',
                    'errors' => $validator->errors()
                ], 400);
            }
            
            try {
                $p_usu_id = $request->has('p_usu_id') ? (int) $request->input('p_usu_id') : 0;
                $p_tkt_fecini = $request->has('p_tkt_fecini') ? (string) $request->input('p_tkt_fecini') : '';
                $p_tkt_fecfin = $request->has('p_tkt_fecfin') ? (string) $request->input('p_tkt_fecfin') : '';
                $p_tkt_activo = $request->has('p_tkt_activo') ? (int) $request->input('p_tkt_activo') : 1;

                $results = DB::select("SELECT * FROM tickets.spu_ticketsxusu_sel(?,?,?,?)", [
                    $p_usu_id,$p_tkt_fecini,$p_tkt_fecfin,$p_tkt_activo
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
    
    public function ticketssel(Request $request): JsonResponse{
            $validator = Validator::make($request->all(), [
                'p_tkt_id' => 'required|integer',
                'p_tkt_numero' => 'required|integer',
                'p_est_id' => 'required|integer',
                'p_tea_id' => 'required|integer',
                'p_pri_id' => 'required|integer',
                'p_equ_id' => 'required|integer',
                'p_age_id' => 'required|integer',
                'p_usu_id' => 'required|integer',
                'p_ori_id' => 'required|integer',
                'p_sed_id' => 'required|integer',
                'p_ard_id' => 'required|integer',
                'p_tkt_activo' => 'required|integer'
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error en la validación de datos',
                    'errors' => $validator->errors()
                ], 400);
            }
            
            try {
                $p_tkt_id = $request->has('p_tkt_id') ? (int) $request->input('p_tkt_id') : 0;
                $p_tkt_numero = $request->has('p_tkt_numero') ? (int) $request->input('p_tkt_numero') : 0;
                $p_est_id = $request->has('p_est_id') ? (int) $request->input('p_est_id') : 0;
                $p_tea_id = $request->has('p_tea_id') ? (int) $request->input('p_tea_id') : 0;
                $p_pri_id = $request->has('p_pri_id') ? (int) $request->input('p_pri_id') : 0;
                $p_equ_id = $request->has('p_equ_id') ? (int) $request->input('p_equ_id') : 0;
                $p_age_id = $request->has('p_age_id') ? (int) $request->input('p_age_id') : 0;
                $p_usu_id = $request->has('p_usu_id') ? (int) $request->input('p_usu_id') : 0;
                $p_ori_id = $request->has('p_ori_id') ? (int) $request->input('p_ori_id') : 0;
                $p_sed_id = $request->has('p_sed_id') ? (int) $request->input('p_sed_id') : 0;
                $p_ard_id = $request->has('p_ard_id') ? (int) $request->input('p_ard_id') : 0;
                $p_tkt_fecini = $request->has('p_tkt_fecini') ? (string) $request->input('p_tkt_fecini') : '';
                $p_tkt_fecfin = $request->has('p_tkt_fecfin') ? (string) $request->input('p_tkt_fecfin') : '';
                $p_tkt_activo = $request->has('p_tkt_activo') ? (int) $request->input('p_tkt_activo') : 1;

                $results = DB::select("SELECT * FROM tickets.spu_tickets_sel(?,?,?,?,?,?,?,?,?,?,?,?,?,?)", [
                    $p_tkt_id,$p_tkt_numero,$p_est_id,$p_tea_id,$p_pri_id,$p_equ_id,$p_age_id,$p_usu_id,$p_ori_id,$p_sed_id,$p_ard_id,$p_tkt_fecini,$p_tkt_fecfin,$p_tkt_activo
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

    public function ticketslis(Request $request): JsonResponse{
            $validator = Validator::make($request->all(), [
                'p_tkt_id' => 'required|integer',
                'p_tkt_numero' => 'required|integer',
                'p_est_id' => 'required|integer',
                'p_tea_id' => 'required|integer',
                'p_pri_id' => 'required|integer',
                'p_age_id' => 'required|integer',
                'p_usu_id' => 'required|integer',
                'p_tkt_activo' => 'required|integer'
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error en la validación de datos',
                    'errors' => $validator->errors()
                ], 400);
            }
            
            try {
                $p_tkt_id = $request->has('p_tkt_id') ? (int) $request->input('p_tkt_id') : 0;
                $p_tkt_numero = $request->has('p_tkt_numero') ? (int) $request->input('p_tkt_numero') : 0;
                $p_est_id = $request->has('p_est_id') ? (int) $request->input('p_est_id') : 0;
                $p_tea_id = $request->has('p_tea_id') ? (int) $request->input('p_tea_id') : 0;
                $p_pri_id = $request->has('p_pri_id') ? (int) $request->input('p_pri_id') : 0;
                $p_age_id = $request->has('p_age_id') ? (int) $request->input('p_age_id') : 0;
                $p_usu_id = $request->has('p_usu_id') ? (int) $request->input('p_usu_id') : 0;
                $p_tkt_fecini = $request->has('p_tkt_fecini') ? (string) $request->input('p_tkt_fecini') : '';
                $p_tkt_fecfin = $request->has('p_tkt_fecfin') ? (string) $request->input('p_tkt_fecfin') : '';
                $p_tkt_activo = $request->has('p_tkt_activo') ? (int) $request->input('p_tkt_activo') : 1;
                
                $results = DB::select("SELECT * FROM tickets.spu_tickets_lis(?,?,?,?,?,?,?,?,?,?)", [
                    $p_tkt_id,$p_tkt_numero,$p_est_id,$p_tea_id,$p_pri_id,$p_age_id,$p_usu_id,$p_tkt_fecini,$p_tkt_fecfin,$p_tkt_activo
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

    public function ticketsver(Request $request): JsonResponse{
            $validator = Validator::make($request->all(), [
                'p_tkt_id' => 'required|integer',
                'p_tkt_numero' => 'required|integer',
                'p_est_id' => 'required|integer',
                'p_tea_id' => 'required|integer',
                'p_pri_id' => 'required|integer',
                'p_equ_id' => 'required|integer',
                'p_age_id' => 'required|integer',
                'p_usu_id' => 'required|integer',
                'p_ori_id' => 'required|integer',
                'p_sed_id' => 'required|integer',
                'p_ard_id' => 'required|integer',
                'p_tkt_activo' => 'required|integer'
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error en la validación de datos',
                    'errors' => $validator->errors()
                ], 400);
            }
            
            try {
                $p_tkt_id = $request->has('p_tkt_id') ? (int) $request->input('p_tkt_id') : 0;
                $p_tkt_numero = $request->has('p_tkt_numero') ? (int) $request->input('p_tkt_numero') : 0;
                $p_est_id = $request->has('p_est_id') ? (int) $request->input('p_est_id') : 0;
                $p_tea_id = $request->has('p_tea_id') ? (int) $request->input('p_tea_id') : 0;
                $p_pri_id = $request->has('p_pri_id') ? (int) $request->input('p_pri_id') : 0;
                $p_equ_id = $request->has('p_equ_id') ? (int) $request->input('p_equ_id') : 0;
                $p_age_id = $request->has('p_age_id') ? (int) $request->input('p_age_id') : 0;
                $p_usu_id = $request->has('p_usu_id') ? (int) $request->input('p_usu_id') : 0;
                $p_ori_id = $request->has('p_ori_id') ? (int) $request->input('p_ori_id') : 0;
                $p_sed_id = $request->has('p_sed_id') ? (int) $request->input('p_sed_id') : 0;
                $p_ard_id = $request->has('p_ard_id') ? (int) $request->input('p_ard_id') : 0;
                $p_tkt_fecini = $request->has('p_tkt_fecini') ? (string) $request->input('p_tkt_fecini') : '';
                $p_tkt_fecfin = $request->has('p_tkt_fecfin') ? (string) $request->input('p_tkt_fecfin') : '';
                $p_tkt_activo = $request->has('p_tkt_activo') ? (int) $request->input('p_tkt_activo') : 1;

                $results = DB::select("SELECT * FROM tickets.spu_tickets_sel(?,?,?,?,?,?,?,?,?,?,?,?,?,?)", [
                    $p_tkt_id,$p_tkt_numero,$p_est_id,$p_tea_id,$p_pri_id,$p_equ_id,$p_age_id,$p_usu_id,$p_ori_id,$p_sed_id,$p_ard_id,$p_tkt_fecini,$p_tkt_fecfin,$p_tkt_activo
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
    
    public function ticketsdsh(Request $request): JsonResponse{            
            try {
                $p_tkt_fecini = $request->has('p_tkt_fecini') ? (string) $request->input('p_tkt_fecini') : '';
                $p_tkt_fecfin = $request->has('p_tkt_fecfin') ? (string) $request->input('p_tkt_fecfin') : '';

                $results = DB::select("SELECT * FROM tickets.spu_tickets_dsh(?,?)", [
                    $p_tkt_fecini,$p_tkt_fecfin
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

    public function trazabilidadreg(Request $request): JsonResponse{
            $validator = Validator::make($request->all(), [
                'p_tkt_id' => 'required|integer',
                'p_est_id' => 'required|integer',
                'p_trz_usureg' => 'required|integer'
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error en la validación de datos',
                    'errors' => $validator->errors()
                ], 400);
            }
            
            try {
                $p_tkt_id = $request->has('p_tkt_id') ? (int) $request->input('p_tkt_id') : 0;
                $p_est_id = $request->has('p_est_id') ? (int) $request->input('p_est_id') : 0;
                $p_trz_observ = $request->has('p_trz_observ') ? (string) $request->input('p_trz_observ') : '';
                $p_trz_usureg = $request->has('p_trz_usureg') ? (int) $request->input('p_trz_usureg') : 0;

                $results = DB::select("SELECT * FROM tickets.spu_trazabilidad_reg(?,?,?,?)", [
                    $p_tkt_id,$p_est_id,$p_trz_observ,$p_trz_usureg
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

    public function trazabilidadsel(Request $request): JsonResponse{
            $validator = Validator::make($request->all(), [
                'p_trz_id' => 'required|integer',
                'p_tkt_id' => 'required|integer',
                'p_trz_activo' => 'required|integer'
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error en la validación de datos',
                    'errors' => $validator->errors()
                ], 400);
            }
            
            try {
                $p_trz_id = $request->has('p_trz_id') ? (int) $request->input('p_trz_id') : 0;
                $p_tkt_id = $request->has('p_tkt_id') ? (int) $request->input('p_tkt_id') : 0;
                $p_trz_activo = $request->has('p_trz_activo') ? (int) $request->input('p_trz_activo') : 1;

                $results = DB::select("SELECT * FROM tickets.spu_trazabilidad_sel(?,?,?)", [
                    $p_trz_id,$p_tkt_id,$p_trz_activo
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

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class TicketController extends Controller
{    
    private const EMAIL_ATTACH_FILES = false;

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
    
    public function estadosrespuestasel(Request $request): JsonResponse{
            $validator = Validator::make($request->all(), [
                'p_esr_id' => 'required|integer',
                'p_esr_activo' => 'required|integer'
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error en la validación de datos',
                    'errors' => $validator->errors()
                ], 400);
            }
            
            try {
                $p_esr_id = $request->has('p_esr_id') ? (int) $request->input('p_esr_id') : 0;
                $p_esr_activo = $request->has('p_esr_activo') ? (int) $request->input('p_esr_activo') : 1;

                $results = DB::select("SELECT * FROM tickets.spu_estadosrespuesta_sel(?,?)", [
                    $p_esr_id,$p_esr_activo
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

    public function equiposel(Request $request): JsonResponse{
            $validator = Validator::make($request->all(), [
                'p_equ_id' => 'required|integer',
                'p_equ_activo' => 'required|integer'
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error en la validación de datos',
                    'errors' => $validator->errors()
                ], 400);
            }
            
            try {
                $p_equ_id = $request->has('p_equ_id') ? (int) $request->input('p_equ_id') : 0;
                $p_equ_activo = $request->has('p_equ_activo') ? (int) $request->input('p_equ_activo') : 1;

                $results = DB::select("SELECT * FROM tickets.spu_equipo_sel(?,?)", [$p_equ_id,$p_equ_activo]);
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
                'p_ori_id' => 'required|integer',
                'p_tkt_usutkt' => 'required|integer'
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error en la validación de datos',
                    'errors' => $validator->errors()
                ], 400);
            }
            
            try {
                //CORREO DE USUARIO QUE REGISTRA
                $p_usu_correo = $request->has('p_usu_correo') ? (string) $request->input('p_usu_correo') : '';
                
                $p_tkt_id = $request->has('p_tkt_id') ? (int) $request->input('p_tkt_id') : 0;
                $p_tea_id = $request->has('p_tea_id') ? (int) $request->input('p_tea_id') : 0;
                $p_usu_id = (int) $request->input('p_usu_id', 0);
                $p_ori_id = $request->has('p_ori_id') ? (int) $request->input('p_ori_id') : 1;
                $p_tkp_numero = $request->has('p_tkp_numero') ? (int) $request->input('p_tkp_numero') : 0;
                $p_tkt_asunto = $request->has('p_tkt_asunto') ? (string) $request->input('p_tkt_asunto') : '';
                $p_tkt_observ = $request->has('p_tkt_observ') ? (string) $request->input('p_tkt_observ') : '';
                $p_tkt_numcel = $request->has('p_tkt_numcel') ? (string) $request->input('p_tkt_numcel') : '';
                $p_tkt_usutkt = $request->has('p_tkt_usutkt') ? (int) $request->input('p_tkt_usutkt') : 0;
                

                //echo "SELECT * FROM tickets.spu_tickets_gra($p_tkt_id,$p_tea_id,$p_usu_id,$p_ori_id,'$p_tkp_numero','$p_tkt_asunto','$p_tkt_observ','$p_tkt_numcel',$p_tkt_usutkt)";
                $results = DB::select("SELECT * FROM tickets.spu_tickets_gra(?,?,?,?,?,?,?,?,?)", [
                    $p_tkt_id,$p_tea_id,$p_usu_id,$p_ori_id,$p_tkp_numero,$p_tkt_asunto,$p_tkt_observ,$p_tkt_numcel,$p_tkt_usutkt
                ]);
                
                if (isset($results[0]) && $results[0]->error == 0 && isset($results[0]->numid)) {
                    $ticketId = $results[0]->numid;
                    $uploadPath = storage_path("app/tickets/{$ticketId}");

                    if (!file_exists($uploadPath)) {
                        mkdir($uploadPath, 0755, true);
                    }
                    $savedFiles = [];

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
                                $savedFiles[] = $nuevoNombre;
                            } else {
                                $file->move($uploadPath, $file->getClientOriginalName());
                                $savedFiles[] = $original;
                            }
                        }
                    }
                    $this->enviarCorreoTicketCreado($ticketId, $p_usu_correo, $savedFiles, false);
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
                
                $p_jsn_permis = $request->input('p_jsn_permis');
                if (is_array($p_jsn_permis)) {
                    $p_jsn_permis = json_encode($p_jsn_permis, JSON_UNESCAPED_UNICODE);
                }
                
                $p_tkt_activo = $request->has('p_tkt_activo') ? (int) $request->input('p_tkt_activo') : 1;
                
                //echo "SELECT * FROM tickets.spu_tickets_lis($p_tkt_id,$p_tkt_numero,$p_est_id,$p_tea_id,$p_pri_id,$p_age_id,$p_usu_id,'$p_tkt_fecini','$p_tkt_fecfin','$p_jsn_permis',$p_tkt_activo)";
                
                $results = DB::select("SELECT * FROM tickets.spu_tickets_lis(?,?,?,?,?,?,?,?,?,?,?)", [
                    $p_tkt_id,$p_tkt_numero,$p_est_id,$p_tea_id,$p_pri_id,$p_age_id,$p_usu_id,$p_tkt_fecini,$p_tkt_fecfin,$p_jsn_permis,$p_tkt_activo
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
                'p_tkt_id' => 'required|integer'
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

                $results = DB::select("SELECT * FROM tickets.spu_tickets_ver(?)", [
                    $p_tkt_id
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

                $results = DB::select("SELECT * FROM tickets.spu_ticketsxdsh_sel(?,?)", [
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
    
    public function ticketsxfxa(Request $request): JsonResponse{            
            try {
                $p_tkt_fecini = $request->has('p_tkt_fecini') ? (string) $request->input('p_tkt_fecini') : '';
                $p_tkt_fecfin = $request->has('p_tkt_fecfin') ? (string) $request->input('p_tkt_fecfin') : '';

                $results = DB::select("SELECT * FROM tickets.spu_ticketsxfxa_sel(?,?)", [
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
    
    public function ticketsxtaf(Request $request): JsonResponse{            
            try {
                $p_tkt_fecini = $request->has('p_tkt_fecini') ? (string) $request->input('p_tkt_fecini') : '';
                $p_tkt_fecfin = $request->has('p_tkt_fecfin') ? (string) $request->input('p_tkt_fecfin') : '';

                $results = DB::select("SELECT * FROM tickets.spu_ticketsxtaf_sel(?,?)", [
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
    
    public function ticketsxfae(Request $request): JsonResponse{            
            try {
                $p_age_id = $request->has('p_age_id') ? (int) $request->input('p_age_id') : 0;
                $p_tkt_fecini = $request->has('p_tkt_fecini') ? (string) $request->input('p_tkt_fecini') : '';
                $p_tkt_fecfin = $request->has('p_tkt_fecfin') ? (string) $request->input('p_tkt_fecfin') : '';

                $results = DB::select("SELECT * FROM tickets.spu_ticketsxfae_sel(?,?,?)", [
                    $p_age_id,$p_tkt_fecini,$p_tkt_fecfin
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

    private function enviarCorreoTicketCreado(int $ticketId, string $destinatario, array $savedFiles = [], bool $adjuntar = false): void
    {
        try {
            if (empty($destinatario) || !filter_var($destinatario, FILTER_VALIDATE_EMAIL)) {
                Log::warning('[tickets] Correo destinatario inválido', ['ticket_id' => $ticketId, 'correo' => $destinatario]);
                return;
            }

            config([
                'mail.default' => 'outlook',
                'mail.from' => [
                    'address' => env('MAIL_FROM_ADDRESS') ?: (env('MAIL_USERNAME') ?: 'ccuro.os@llamkasunperu.gob.pe'),
                    'name'    => env('MAIL_FROM_NAME', 'Mesa de Ayuda'),
                ],
                'mail.mailers.outlook' => [
                    'transport'  => 'smtp',
                    'host'       => env('MAIL_HOST', 'smtp.office365.com'),
                    'port'       => (int) env('MAIL_PORT', 587),
                    'encryption' => env('MAIL_ENCRYPTION', 'tls'),
                    'username'   => env('MAIL_USERNAME', 'ccuro.os@llamkasunperu.gob.pe'),
                    'password'   => env('MAIL_PASSWORD', 'carloscuro123*'),
                    'timeout'    => 10,
                    'auth_mode'  => null,
                ],
            ]);

            // 1) Traer datos del ticket
            $rows = DB::select('SELECT * FROM tickets.spu_tickets_cor(?)', [$ticketId]);
            $t = $rows[0] ?? null;

            if (!$t) {
                Log::warning('[tickets] spu_tickets_cor no devolvió datos', ['ticket_id' => $ticketId]);
                return; // No enviamos si no hay datos
            }

            // 2) Preparar datos
            $esc = fn($v) => e((string)($v ?? '—'));

            $tkt_numero   = $esc($t->tkt_numero ?? $ticketId);
            $estado       = $esc($t->est_descri ?? '');
            $estadoColor  = $t->est_colors ?? '#999';
            $prioridad    = $esc($t->pri_descri ?? '');
            $prioridadCol = $t->pri_colors ?? '#999';
            $equipo       = $esc($t->equ_descri ?? '');
            $asunto       = $esc($t->tkt_asunto ?? '');
            $agente       = $esc($t->age_nomcom ?? '');
            $tema         = $esc($t->tea_descri ?? '');
            $fec          = $esc($t->tkt_fectkt ?? now()->toDateString());
            $hor          = $esc($t->tkt_hortkt ?? now()->format('H:i:s'));

            $nowHuman     = now()->format('d/m/Y H:i');
            $subject      = '✅ Ticket #'.$tkt_numero.' registrado correctamente';

            // 3) HTML SIN BLADE
            $archivosHtml = '';
            $n = is_array($savedFiles) ? count($savedFiles) : 0;  // cantidad de archivos
            $etq = ($n === 1) ? 'archivo' : 'archivos';           // singular/plural

            if ($n > 0) {
                $archivosHtml = <<<HTML
                    <tr>
                        <td colspan="2" style="padding:12px 16px;">
                            <strong>Archivos cargados:</strong> {$n} {$etq}.
                        </td>
                    </tr>
                HTML;
            }

            $html = <<<HTML
                    <!doctype html>
                    <html>
                    <head>
                    <meta charset="utf-8">
                    <title>{$subject}</title>
                    </head>
                    <body style="margin:0;padding:0;background:#f6f8fb;font-family:Arial,Segoe UI,Helvetica,sans-serif;color:#222;">
                    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background:#f6f8fb;padding:24px 0;">
                        <tr>
                        <td align="center">
                            <table role="presentation" width="640" cellpadding="0" cellspacing="0" style="background:#ffffff;border-radius:12px;box-shadow:0 3px 16px rgba(0,0,0,.06);overflow:hidden;">
                            <tr>
                                <td style="padding:20px 24px;background:#d60000;color:#fff;">
                                <h2 style="margin:0;font-size:20px;">MESA DE AYUDA</h2>
                                <div style="font-size:12px;opacity:.9;">{$nowHuman}</div>
                                </td>
                            </tr>

                            <tr>
                                <td style="padding:20px 24px;">
                                <h1 style="margin:0 0 8px 0;font-size:22px;">Ticket N.º {$tkt_numero}</h1>
                                <div style="margin-top:8px;">
                                    <span style="display:inline-block;padding:6px 10px;border-radius:14px;background:{$estadoColor};color:#fff;font-size:12px;font-weight:600;">{$estado}</span>
                                    <span style="display:inline-block;padding:6px 10px;border-radius:14px;background:{$prioridadCol};color:#fff;font-size:12px;font-weight:600;margin-left:8px;">Prioridad: {$prioridad}</span>
                                </div>
                                </td>
                            </tr>

                            <tr>
                                <td style="padding:0 24px 8px 24px;">
                                <table width="100%" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
                                    <tr>
                                        <td style="padding:5px 16px;border:1px solid #eee;background:#fafafa;"><strong>Asunto</strong></td>
                                        <td style="padding:5px 16px;border:1px solid #eee;">{$asunto}</td>
                                    </tr>
                                    <tr>
                                        <td style="padding:5px 16px;border:1px solid #eee;background:#fafafa;"><strong>Tema</strong></td>
                                        <td style="padding:5px 16px;border:1px solid #eee;">{$tema}</td>
                                    </tr>
                                    <tr>
                                        <td style="padding:5px 16px;border:1px solid #eee;background:#fafafa;"><strong>Equipo</strong></td>
                                        <td style="padding:5px 16px;border:1px solid #eee;">{$equipo}</td>
                                    </tr>
                                    <tr>
                                        <td style="padding:5px 16px;border:1px solid #eee;background:#fafafa;"><strong>Agente</strong></td>
                                        <td style="padding:5px 16px;border:1px solid #eee;">{$agente}</td>
                                    </tr>
                                    <tr>
                                        <td style="padding:5px 16px;border:1px solid #eee;background:#fafafa;"><strong>Fecha/Hora</strong></td>
                                        <td style="padding:5px 16px;border:1px solid #eee;">{$fec} {$hor}</td>
                                    </tr>
                                    {$archivosHtml}
                                </table>
                                </td>
                            </tr>

                            <tr>
                                <td style="padding:20px 24px;color:#666;font-size:12px;background:#fbfbfb;text-align:center;">
                                Si no realizaste esta solicitud, responde este mensaje para revisarlo.
                                <br>Gracias,<br><strong>Mesa de Ayuda</strong>
                                </td>
                            </tr>
                            </table>

                            <div style="color:#9aa0a6;font-size:12px;margin-top:12px;">Este es un mensaje automático realizado desde Mesa de Ayuda</div>
                        </td>
                        </tr>
                    </table>
                    </body>
                    </html>
                    HTML;

            
            // 4) Enviar
            Log::info('mailer-default', ['default' => config('mail.default')]);
            Log::info('smtp', [
            'host' => config('mail.mailers.smtp.host'),
            'port' => config('mail.mailers.smtp.port'),
            ]);
            Log::info('outlook', [
            'host' => config('mail.mailers.outlook.host') ?? null,
            'port' => config('mail.mailers.outlook.port') ?? null,
            ]);

            Mail::mailer('outlook')->html($html, function ($message) use ($destinatario, $subject, $savedFiles, $ticketId, $adjuntar) {
                $message->to($destinatario)->subject($subject);

                if ($adjuntar && !empty($savedFiles)) {
                    $uploadPath = storage_path("app/tickets/{$ticketId}");
                    foreach ($savedFiles as $fn) {
                        $full = $uploadPath . DIRECTORY_SEPARATOR . $fn;
                        if (is_file($full)) {
                            $message->attach($full);
                        }
                    }
                }
            });

        } catch (\Throwable $e) {
            Log::warning('[tickets] Falló envío de correo: '.$e->getMessage(), [
                'ticket_id' => $ticketId,
                'correo'    => $destinatario
            ]);
        }
    }

}

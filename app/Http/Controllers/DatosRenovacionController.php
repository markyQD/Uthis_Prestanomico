<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent;
use App\Models\Datos_Personales;
use App\Models\Datos_Domicilio;
use App\Models\Datos_Credito;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
class DatosRenovacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  
        return view('datosRenovacionOferta');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $RFC = $request->rfc; //Obtiene RFC de la pantalla de captura
        //Post Login API
        $Api_login = Http::post('https://sitiowebdesarrollo.centralus.cloudapp.azure.com/api/login', [
            'email' => "marco.quintero@prestanomico.com",
            'password' => "Marco.Te5t22",
        ]);
        $Data_login = json_decode($Api_login->getBody(),true); //Obtiene cuerpo del response 
        $token_api= $Data_login['token'];//Obtiene bearer token login 
        //Validacion de Logeo Exitoso a la APi a travez de obtener el status code 200  
        if ($Api_login->getStatusCode() == "200") {
                
            if (DB::table("datos_cliente")->where("rfc", "=", $RFC)->exists()) {
                $getStatus = DB::table("datos_cliente")->where("rfc", $RFC)->get()->first();
                $status = $getStatus->status;
                $fecha_modif = $getStatus->updated_at;
                
                   //Validacion para Oferta Aceptada 
                if (strcmp($status, "Oferta Aceptada") === 0) {
                    $fecha_nuevoregis = date("d-m-Y", strtotime($fecha_modif . "+ 1 month"));
                    return Redirect::back()->withErrors(["msg" => "Cuenta con una " . $status . "  No puede registrarse hasta: " . $fecha_nuevoregis, ]);
                   //Validacion para Oferta Rechazada
                   
                }elseif (strcmp($status, "Oferta Rechazada") === 0) {
                    $fecha_nuevoregis = date("d-m-Y", strtotime($fecha_modif . "+ 1 month"));
                    return Redirect::back()->withErrors(["msg" => "Cuenta con:" . $status . " No puede registrarse hasta:" . $fecha_nuevoregis, ]);
                //Validacion para Oferta en status PRE-REGISTRO
                }elseif (strcmp($status, "Pre-Registro") === 0) {
                    $Api_login = Http::post("https://sitiowebdesarrollo.centralus.cloudapp.azure.com/api/login", ["email" => "marco.quintero@prestanomico.com", "password" => "Marco.Te5t22", ]);
                    $Data_login = json_decode($Api_login->getBody(), true); //Obtiene cuerpo del response
                    $token_api = $Data_login["token"]; //Obtiene bearer token login
                    $serch = DB::table("datos_cliente")->where("rfc", $RFC)->get()->first();
                    $Id_Cliente = $serch->cliente_id;
                    $datoscredito = DB::table("datos_credito")->where("cliente_id", $Id_Cliente)->get()->first();
                    $datosdomicilio = DB::table("datos_domicilio")->where("cliente_id", $Id_Cliente)->get()->first();
                    $registro_datospersonales = json_encode($serch, true);
                    $registro_datoscredito = json_encode($datoscredito, true);
                    $registro_datosdomicilio = json_encode($datosdomicilio, true);
                    return view("datosRenovacionOferta", compact("registro_datoscredito", "registro_datospersonales", "registro_datosdomicilio", "token_api"));
                    //Validacion para Oferta en status REGISTRO
                }elseif (strcmp($status, "Registro") === 0) {
                    $serch = DB::table("datos_cliente")->where("rfc", $RFC)->get()->first();
                    $Id_Cliente = $serch->cliente_id;
                    $datoscredito = DB::table("datos_credito")->where("cliente_id", $Id_Cliente)->get()->first();
                    $monto = $datoscredito->monto; //Obtiene cuerpo del response
                    $plazo = $datoscredito->plazo; //Obtiene cuerpo del response
                    $pago_mensual = $datoscredito->pago_mensual; //Obtiene cuerpo del response
                    $tasa_interes = $datoscredito->tasa_interes; //Obtiene cuerpo del response
                    $client_id=$Id_Cliente;
                       return view("oferta", compact("monto", "plazo", "pago_mensual", "tasa_interes","client_id"));
                        //Validacion para Error con el Status
                    }else {
                       return Redirect::back()->withErrors(["msg" => "Cuenta con: Status ", ]);
                   }
                   //Validacion para Oferta sin registro
               } else {
        
                     //Si es exitoso
                       //POST A LA API CON PARAMETRO EL BERARER TOKEN Y EL RFC
                       $Response_DatosRenovacion = Http::withToken($token_api)->post("https://sitiowebdesarrollo.centralus.cloudapp.azure.com/api/datosRenovacion", ["rfc" => $RFC, ]);
                       $Data_DatosRenovacion = json_decode($Response_DatosRenovacion->getBody(), true);
                       $success_rfc = $Data_DatosRenovacion["success"];
                     
                       
                       if($success_rfc == "1"){
                        $Data_Datos = $Data_DatosRenovacion["datos"];
                        $Data_DatosPersonales = $Data_Datos["datos_personales"];
                        $Cliente_id = $Data_DatosPersonales["cliente_id"];
                        $nombre = $Data_DatosPersonales["nombre"];
                        $apellido_paterno = $Data_DatosPersonales["apellido_paterno"];
                        $apellido_materno = $Data_DatosPersonales["apellido_materno"];
                        $fecha_nacimiento = $Data_DatosPersonales["fecha_nacimiento"];
                        $ingresos = $Data_DatosPersonales["ingresos"];
                        $egresos = $Data_DatosPersonales["egresos"];
                        $no_dependientes = $Data_DatosPersonales["no_dependientes"];
                        $estado_civil = $Data_DatosPersonales["estado_civil"];
                        $genero = $Data_DatosPersonales["genero"];
                        $ultimo_grado_estudios = $Data_DatosPersonales["ultimo_grado_estudios"];
                        //Datos Domicilio
                        $Data_DatosDomicilio = $Data_Datos["datos_domicilio"];
                        $calle = $Data_DatosDomicilio["calle"];
                        $no_exterior = $Data_DatosDomicilio["no_exterior"];
                        $no_interior = $Data_DatosDomicilio["no_interior"];
                        $colonia = $Data_DatosDomicilio["colonia"];
                        $municipio = $Data_DatosDomicilio["municipio"];
                        $estado = $Data_DatosDomicilio["estado"];
                        $cp = $Data_DatosDomicilio["cp"];
                        //Datos Credito
                        $Data_DatosCredito = $Data_Datos["datos_credito"];
                        $monto = $Data_DatosCredito["monto"];
                        $plazo = $Data_DatosCredito["plazo"];
                        $pago_mensual = $Data_DatosCredito["pago_mensual"];
                        $tasa_interes = $Data_DatosCredito["tasa_interes"];
                        $registro_datospersonales = Datos_Personales::create(["cliente_id" => $Cliente_id, "status" => "Pre-Registro", "nombre" => $nombre, "apellido_paterno" => $apellido_paterno, "apellido_materno" => $apellido_materno, "rfc" => $RFC, "fecha_nacimiento" => $fecha_nacimiento, "ingresos" => $ingresos, "egresos" => $egresos, "no_dependientes" => $no_dependientes, "estado_civil" => $estado_civil, "genero" => $genero, "ultimo_grado_estudios" => $ultimo_grado_estudios, ]);
                        $registro_datosdomicilio = Datos_Domicilio::create(["cliente_id" => $Cliente_id, "calle" => $calle, "no_exterior" => $no_exterior, "no_interior" => $no_interior, "colonia" => $colonia, "municipio" => $municipio, "estado" => $estado, "cp" => $cp, "actualizado" => "No", ]);
                        $registro_datoscredito = Datos_Credito::create(["cliente_id" => $Cliente_id, "monto" => $monto, "plazo" => $plazo, "pago_mensual" => $pago_mensual, "tasa_interes" => $tasa_interes, ]);
                        return view("datosRenovacionOferta", compact("registro_datoscredito", "registro_datospersonales", "registro_datosdomicilio", "token_api"));
                       }else{
                        $message=$Data_DatosRenovacion["message"];
                        return Redirect::back()->withErrors(["msg" => "ERROR: "  . $message]);
                       }
                       
                      
       
       
               }
       //Validacion para cachar error en la api 
                   }else{
       
                        return Redirect::back()->withErrors(["msg" => "Error en la api" ]);
                   }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Datos_Domicilio::where('id', $id)->update(["calle"=>  "prueba",
        ]); 
       
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

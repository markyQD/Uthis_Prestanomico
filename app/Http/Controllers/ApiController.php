<?php

namespace App\Http\Controllers;
use App\Models\Datos_Personales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "hola";
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
        $rfc_recived = $request->rfc;
        $fecha_inicio=$request->fecha_inicio;
        $fecha_fin=$request->fecha_fin;
        if($fecha_inicio == !null && $fecha_fin == !null && $rfc_recived==null ){

            $validator = Validator::make($request->all(), [
                'fecha_inicio' => 'date',
                'fecha_fin' => 'date',
            ]);
            if($validator->fails()){
                return response()->json(['Error'=> $validator->errors()]);
            }
            $registros_rango = DB::table("datos_cliente")
            ->whereBetween('created_at', [$fecha_inicio,$fecha_fin])->get();
            $registros_array = array();
            for($i=0;$i<count($registros_rango);$i++){
                $nombre = $registros_rango[$i]->nombre;
                $apellido_materno = $registros_rango[$i]->apellido_materno;
                $apellido_paterno = $registros_rango[$i]->apellido_paterno;
                $nombre_completo =
                $nombre . " " . $apellido_materno . " " . $apellido_paterno;
                $rfc = $registros_rango[$i]->rfc;
                $Id_Cliente = $registros_rango[$i]->cliente_id;
                $created_at = $registros_rango[$i]->created_at;
                $datos_domicilio = DB::table("datos_domicilio")
            ->where("cliente_id", $Id_Cliente)
            ->get();
            

        $calle = $datos_domicilio[0]->calle;
       
        $numero_interior = $datos_domicilio[0]->no_interior;
        $numero_exterior = $datos_domicilio[0]->no_exterior;
        $domicilio =
            "Calle: " .
            $calle .
            " No_interior: " .
            $numero_interior .
            " No exterior: " .
            $numero_exterior;
            
        $colonia = $datos_domicilio[0]->colonia;
        
        $cp = $datos_domicilio[0]->cp;
        $estado = $datos_domicilio[0]->estado;
        
        $actualizado = $datos_domicilio[0]->actualizado;
       
        // - Actualizo domicilio (Si: El cliente modifico el domicilio que el servicio regresa. No:
        // El cliente conserva el domicilio que el servicio regresa)

        // $nombre=['Datos_cliente' => $cliente->id];
        $datos_credito = DB::table("datos_credito")
            ->where("cliente_id", $Id_Cliente)
            ->get();
        $monto = $datos_credito[0]->monto;
        $plazo = $datos_credito[0]->plazo;
        $pago_mensual = $datos_credito[0]->pago_mensual;
        $tasa = $datos_credito[0]->tasa_interes;

                array_push($registros_array,array( 
                "Usuario"  => "Usuario ".$i,
                "Creado el" => $created_at,
                "Nombre" => $nombre_completo,
                "RFC" => $rfc,
                "Cliente_id" => $Id_Cliente,
                "Domicilio" => $domicilio,
                "colonia" => $colonia,
                "CP" => $cp,
                "Estado" => $estado,
                "Actualizo Domicilio" => $actualizado,
                "Monto Credito" => $monto,
                "Plazo" => $plazo,
                "Pago Mensual" => $pago_mensual,
                "Tasa interes" => $tasa,));
               
            }
            
      
            return [
                $registros_array,
    
        ];
           


        }if($fecha_inicio == null && $fecha_fin == !null){
            return response()->json(['Error'=> 'Debes ingresar una fecha de inicio']);
        }if($fecha_inicio == !null && $fecha_fin == null){
            return response()->json(['Error'=> 'Debes ingresar una fecha de fin']);
        }
    
        $validator = Validator::make($request->all(), [
            'rfc' => 'required|string|max:10'
        ]);
        if($validator->fails()){
            return response()->json(['Error'=> $validator->errors()]);
        }
        

        $cliente = DB::table("datos_cliente")
            ->where("rfc", $rfc_recived)
            ->get()
            ->first();
     
        if($cliente == null){
            return response()->json(['Error' => 'Cliente no encontrado']);
        }
        else{
    
        $nombre = $cliente->nombre;
        $apellido_materno = $cliente->apellido_materno;
        $apellido_paterno = $cliente->apellido_paterno;
        $nombre_completo =
            $nombre . " " . $apellido_materno . " " . $apellido_paterno;
        $rfc = $cliente->rfc;
        $Id_Cliente = $cliente->cliente_id;
        $created_at = $cliente->created_at;
        $datos_domicilio = DB::table("datos_domicilio")
            ->where("cliente_id", $Id_Cliente)
            ->get()
            ->first();

        $calle = $datos_domicilio->calle;
        $numero_interior = $datos_domicilio->no_interior;
        $numero_exterior = $datos_domicilio->no_exterior;
        $domicilio =
            "Calle: " .
            $calle .
            " No_interior: " .
            $numero_interior .
            " No exterior: " .
            $numero_exterior;
        $colonia = $datos_domicilio->colonia;
        $cp = $datos_domicilio->cp;
        $estado = $datos_domicilio->estado;
        $actualizado = $datos_domicilio->actualizado;
        // - Actualizo domicilio (Si: El cliente modifico el domicilio que el servicio regresa. No:
        // El cliente conserva el domicilio que el servicio regresa)

        // $nombre=['Datos_cliente' => $cliente->id];
        $datos_credito = DB::table("datos_credito")
            ->where("cliente_id", $Id_Cliente)
            ->get()
            ->first();
        $monto = $datos_credito->monto;
        $plazo = $datos_credito->plazo;
        $pago_mensual = $datos_credito->pago_mensual;
        $tasa = $datos_credito->tasa_interes;
        return [
            "Datoscliente" => [
                "Creado el" => $created_at,
                "Nombre" => $nombre_completo,
                "RFC" => $rfc,
                "Cliente_id" => $Id_Cliente,
                "Domicilio" => $domicilio,
                "colonia" => $colonia,
                "CP" => $cp,
                "Estado" => $estado,
                "Actualizo Domicilio" => $actualizado,
                "Monto Credito" => $monto,
                "Plazo" => $plazo,
                "Pago Mensual" => $pago_mensual,
                "Tasa interes" => $tasa,
            ],
        ];
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
        //
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

<?php

namespace App\Http\Controllers;
use App\Models\Datos_Personales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $rfc_recived = $request->only("rfc");

        $cliente = DB::table("Datos_cliente")
            ->where("rfc", $rfc_recived)
            ->get()
            ->first();
            
        // $nombre=$cliente->Nombre;
        // $nombre=$cliente[0]->id;
        $nombre = $cliente->nombre;
        $apellido_materno = $cliente->apellido_materno;
        $apellido_paterno = $cliente->apellido_paterno;
        $nombre_completo =
            $nombre . " " . $apellido_materno . " " . $apellido_paterno;
        $rfc = $cliente->rfc;
        $Id_Cliente = $cliente->cliente_id;

        $datos_domicilio = DB::table("Datos_Domicilio")
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
        $datos_credito = DB::table("Datos_Credito")
            ->where("cliente_id", $Id_Cliente)
            ->get()
            ->first();
        $monto = $datos_credito->monto;
        $plazo = $datos_credito->plazo;
        $pago_mensual = $datos_credito->pago_mensual;
        $tasa = $datos_credito->tasa_interes;
        return [
            "Datoscliente" => [
                "Nombre" => $nombre_completo,
                "RFC" => $rfc,
                "Id_cliente" => $Id_Cliente,
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

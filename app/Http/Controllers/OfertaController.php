<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Datos_Domicilio;
use App\Models\Datos_Personales;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\IndexController;
class OfertaController extends Controller
{
    /**
     * Display a listing of the resourDatosce.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hola= $request->rfc;  //Obtiene RFC de la pantalla de captura 
        return view('oferta');
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
        $client_id= $request->client_id; 
        $calle= $request->calle;
        $no_exterior=$request->no_exterior;
        $no_interior=$request->no_interior;
        $cp= $request->cp; 
        $municipio= $request->municipio; 
        $colonia= $request->colonia; 
        $estado= $request->estado;
       $change_cp=$request->change_cp;
       if (strcmp($change_cp, "Si") === 0) {   
    Datos_Domicilio::where('cliente_id', $client_id)->update(["calle"=>  $calle,
                                                            "cp"=>$cp,
                                                            "municipio"=>$municipio,
                                                            "no_exterior"=>$no_exterior,
                                                            "no_interior"=>$no_interior,
                                                            "colonia"=>$colonia,
                                                            "estado"=>$estado,
                                                            "actualizado"=>"Si"
    ]);
    Datos_Personales::where('cliente_id', $client_id)->update([
        "status"=>"Registro"
    ]);
        // $token_api= $request->monto;  //Obtiene RFC de la pantalla de captura 
        $monto= $request->monto; //Obtiene cuerpo del response 
        $plazo= $request->plazo; //Obtiene cuerpo del response 
        $pago_mensual= $request->pago_mensual; //Obtiene cuerpo del response 
        $tasa_interes= $request->tasa_interes; //Obtiene cuerpo del response 
     
        return view('oferta',compact('monto','plazo','pago_mensual','tasa_interes','client_id'));
    
    }else{
        Datos_Domicilio::where('cliente_id', $client_id)->update(["calle"=>  $calle,
        "cp"=>$cp,
        "municipio"=>$municipio,
        "colonia"=>$colonia,
        "estado"=>$estado,
  
    ]);
    Datos_Personales::where('cliente_id', $client_id)->update([
        "status"=>"Registro"
    ]);
        // $token_api= $request->monto;  //Obtiene RFC de la pantalla de captura 
        $monto= $request->monto; //Obtiene cuerpo del response 
        $plazo= $request->plazo; //Obtiene cuerpo del response 
        $pago_mensual= $request->pago_mensual; //Obtiene cuerpo del response 
        $tasa_interes= $request->tasa_interes; //Obtiene cuerpo del response 
    
        return view('oferta',compact('monto','plazo','pago_mensual','tasa_interes','client_id'));


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
        $oferta=$request->oferta;
        $id_cliente=$request->id_cliente;
        echo "<script>console.log('Console: " . $oferta. "' );</script>"; 
        if($oferta==="rechazada"){
        
        Datos_Personales::where('cliente_id',  $id_cliente)->update([
            "status"=>"Oferta Rechazada"

        ]);
       
    }else{
        Datos_Personales::where('cliente_id',  $id_cliente)->update([
            "status"=>"Oferta Aceptada"
        ]);
      
    }

       

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

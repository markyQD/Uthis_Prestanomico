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
        $s5= $request->client_id; 
        $s10= $request->calle;
        $s6= $request->cp; 
        $s7= $request->municipio; 
        $s8= $request->colonia; 
        $s9= $request->estado;
       
        
    Datos_Domicilio::where('cliente_id', $s5)->update(["calle"=>  $s10,
                                                            "cp"=>$s6,
                                                            "municipio"=>$s7,
                                                            "colonia"=>$s8,
                                                            "estado"=>$s9,
                                                            "actualizado"=>"Si"
    ]);
    Datos_Personales::where('cliente_id', $s5)->update([
        "status"=>"Registro"
    ]);
        // $token_api= $request->monto;  //Obtiene RFC de la pantalla de captura 
        $s= $request->monto; //Obtiene cuerpo del response 
        $s2= $request->plazo; //Obtiene cuerpo del response 
        $s3= $request->pago_mensual; //Obtiene cuerpo del response 
        $s4= $request->tasa_interes; //Obtiene cuerpo del response 
        echo "<script>console.log('Console: " . $s5. "' );</script>"; 
        return view('oferta',compact('s','s2','s3','s4','s5'));
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

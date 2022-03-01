<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent;

class Cambio_CP_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
          
        $cp= $request->cp;
        $RFC= $request->RFC;
        $token_api = $RFC;
        $Response_ChangeCP= Http::withToken($token_api)->get('https://sitiowebdesarrollo.centralus.cloudapp.azure.com/api/codigo_postal/' . $cp, [
            ]);

        $ChangeCp = json_decode($Response_ChangeCP);
        $colonias=$ChangeCp->colonias;
        $municipio=$ChangeCp->delegacion_municipio;
        $estado=$ChangeCp->estado;


        $colonias_array = array();
        foreach ($colonias as $key => $value) {
            array_push($colonias_array,$value->colonia);
          }

                                                        
        return compact('municipio','estado','colonias_array');
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

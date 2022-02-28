<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="{{mix ('css/app.css')}}"  rel="stylesheet">
        <link href="css/datosrenovacion.css" rel="stylesheet">
    </head>
    <body>
 
    <form method="POST" action=DatosRenovacion_oferta class="row g-3 needs-validation" data-toggle="validator">
        <div id="app">
  <div class="row">
    <div class="col">
      <div class="form-group">
      <h1>Datos personales</h1>
     
      {{ csrf_field() }} 
      <datos_personales :datos_personales="{{$registro_datospersonales}}"> </datos_personales>
     
    </div>
    </div>
   
    <div class="col">
      <div class="form-group">
      <h1>Datos Domicilio</h1>
       <datos_domicilio :datos_domicilio="{{$registro_datosdomicilio}}" rfc="{{$token_api}}"></datos_domicilio>
      </div>
    </div>
  </div>

</div>
<script src="{{ mix('/js/app.js') }}"></script>
<button type="submit" class="btn btn-primary">Continuar</button>
      </form>
    </body>
</html>

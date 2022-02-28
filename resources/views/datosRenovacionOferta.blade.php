<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://unpkg.com/vue-form-wizard/dist/vue-form-wizard.min.css">
        <title>Datos Renovacion</title>
        <script src="https://unpkg.com/vue-form-wizard/dist/vue-form-wizard.js"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="{{mix ('css/app.css')}}"  rel="stylesheet">
        <link href="css/welcome.css" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/@icon/themify-icons/themify-icons.css" />
    </head>
    <body >
  
    <div id="app">
     <datos_renovacion :datos_personales="{{$registro_datospersonales}}" :datos_domicilio="{{$registro_datosdomicilio}}" 
     :datos_credito="{{$registro_datoscredito}}"  rfc="{{$token_api}}"> </datos_renovacion>
</div>

<script src="{{ mix('/js/app.js') }}"></script>
    </body>
</html>

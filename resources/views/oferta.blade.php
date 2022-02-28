<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Oferta</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="{{mix ('css/app.css')}}"  rel="stylesheet">
        <link href="css/welcome.css" rel="stylesheet">
    </head>
    <body>
        <div>


        </div>

   

    <form method="POST" action=DatosRenovacion class="row g-3 needs-validation" data-toggle="validator">
    {{ csrf_field() }}
     <div id="app" >
     <oferta monto='{{$s}}' plazo='{{$s2}}' pago_mensual='{{$s3}}' tasa_interes='{{$s4}}'> </oferta>
</div>

<script src="{{ mix('/js/app.js') }}"></script>


</form>
    </body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Uthis</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{mix ('css/app.css')}}" rel="stylesheet">
    <link href="css/welcome.css" rel="stylesheet">
  </head>
  <body>
  @if($errors->any())
  '<script>alert("{{$errors->first()}}")</script>'
@endif
    </div>
    <form method="POST" action=DatosRenovacion class="row g-3 needs-validation" data-toggle="validator">
      {{ csrf_field() }}
      <div id="app">
        <index_rfc></index_rfc>
      </div>
      </div>
      <script src="{{ mix('/js/app.js') }}"></script>
    </form>
  </body>
</html>
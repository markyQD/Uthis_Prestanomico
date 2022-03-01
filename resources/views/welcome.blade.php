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
      <!-- The Modal -->
<div id="myModal" class="modal">

<!-- Modal content -->
<div class="modal-content">
  
  <p> {{$errors->first()}}</p>
  <span class="close">&times;</span>
</div>
</div>
  @if($errors->any())
  '<script>
  var modal = document.getElementById("myModal")
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0]
modal.style.display = "block";
span.onclick = function() {
  modal.style.display = "none";
}</script>'
  


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
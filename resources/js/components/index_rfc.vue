<template>
  <div class="form-group">
    <div class="p-5 text-center bg-light justify-content-center">
      <h1 class="titulo">Uthis</h1>
      <h4 class="titulo">Prueba Tecnica</h4>
      <div class="form-group text-center col-md-5 justify-content-center">
        <label class="rfc" for="rfc">Escriba su RFC: </label>
        <input
          type="text"
          class="form-control"
          id="rfc"
          name="rfc"
          placeholder="Escribe RFC"
          required
        />
      </div>
      <button type="submit" class="btn-enviar">Enviar</button>
    </div>
  </div>
</template>


<script>
function log() {
  rfc = document.getElementById("rfc").value;
}
</script>

<style>
body {
  display: -ms-flexbox;
  display: -webkit-box;
  display: flex;
  -ms-flex-align: center;
  -ms-flex-pack: center;
  -webkit-box-align: center;
  align-items: center;
  -webkit-box-pack: center;
  justify-content: center;
  padding-top: 40px;
  padding-bottom: 40px;
}

.p-5 {
  color: black;
}

.rfc {
  color: rgb(5 0 34);
  font-weight: bold;
  font-size: large;
}

.form-group {
  width: 100%;
  max-width: 550px;
  padding: 15px;
  margin: 5 auto;
  border-color: blue;
  border: 5px;
}
.bg-light {
  background-color: #92c6f78e !important;
  border-color: black;
}

.btn-enviar {
  width: 44%;
  padding: 5px;
  margin: 0 auto;
  border-color: rgb(0, 0, 3);
  background-color: rgb(5, 0, 31);
  font-size: medium;
  font-style: revert;
  font-weight: bold;
  color: #fff;
}

.titulo {
  color: rgb(12 8 56);
  font-weight: bold;
}

.form-control {
  display: block;
  width: 100%;
  height: calc(1.6em + 0.75rem + 2px);
  padding: 0.375rem 0.75rem;
  font-size: 0.9rem;
  font-weight: 400;
  line-height: 1.6;
  color: #000000;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid #ced4da;
  border-radius: 0.25rem;
  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  font-size: medium;
  font-weight: bold;
}
</style>
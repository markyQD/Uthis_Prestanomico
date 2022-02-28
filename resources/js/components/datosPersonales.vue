<template>

  <div class="container">
  <div class="row">
    <div class="col-xs-3 col-md-5">
      <div class="form-group">
        <label for="client_id">Client_id</label>
       
          <input name="client_id" id="client_id" type="text" readonly="readonly" equired class="form-control"  v-bind:value="this.datos_personales.cliente_id">
        <label for="apellido_paterno">Apellido Paterno:</label>
          <input name="apellido_paterno" id="apellido_paterno" type="text" readonly="readonly" required class="form-control" v-bind:value="this.datos_personales.apellido_paterno">
           <label for="rfc">RFC:</label>
          <input name="rfc" id="rfc" type="text" required class="form-control" readonly="readonly" placeholder="rfc" v-bind:value="this.datos_personales.rfc">
             <label for="ingresos">Ingresos:</label>
          <input name="ingresos" id="ingresos" type="text" required class="form-control" readonly="readonly" v-bind:value="this.datos_personales.ingresos">
         <label for="no_dependientes">No Dependientes:</label>
          <input name="no_dependientes" id="no_dependientes" type="text" required class="form-control" readonly="readonly" v-bind:value="this.datos_personales.no_dependientes">
         <label for="genero">Genero:</label>
          <input name="genero" id="genero" type="text" required class="form-control" readonly="readonly" v-bind:value="this.datos_personales.genero">
        
      </div>
    </div>
  
    <div class="col-xs-3 col-md-5">
      <div class="form-group">
        <label for="Nombre">Nombre</label>
          <input name="Nombre" id="Nombre" type="text" required class="form-control" readonly="readonly" v-bind:value="this.datos_personales.nombre">
          <label for="apellido_materno">Apellido Materno:</label>
          <input name="apellido_materno" id="apellido_materno" type="text" required class="form-control" readonly="readonly" v-bind:value="this.datos_personales.apellido_materno">
 <label for="fecha_nacimiento">Fecha Nacimiento:</label>
          <input name="fecha_nacimiento" id="fecha_nacimiento" type="date" required class="form-control" readonly="readonly" v-bind:value="this.datos_personales.fecha_nacimiento">
           <label for="egresos">Egresos:</label>
          <input name="egresos" id="egresos" type="text" required class="form-control" readonly="readonly" v-bind:value="this.datos_personales.egresos">
        <label for="estado_civil">Estado Civil:</label>
          <input name="estado_civil" id="estado_civil" type="text" required class="form-control" readonly="readonly" v-bind:value="this.datos_personales.estado_civil">
        <label for="ultimo_grado_estudios">Ultimo grado Estudios:</label>
          <input name="ultimo_grado_estudios" id="ultimo_grado_estudios" type="text" readonly="readonly" required class="form-control" v-bind:value="this.datos_personales.ultimo_grado_estudios">
      </div>
      
    </div>
  </div>
  
</div>

</template>

<script>
  export default {
    props: ['datos_personales','token_api'],
    mounted () {
      console.dir(this.datos_personales.cliente_id)
    }
  }
</script>

<style>
#client_id,
#Nombre,
#apellido_materno,
#apellido_paterno,
#fecha_nacimiento,
#ingresos,
#egresos,
#rfc,
#no_dependientes,
#estado_civil,
#genero,
#ultimo_grado_estudios{
  border-radius: 15px;
  background: #f8b90c;
  padding: 4px;
  width: 150px;
  height: 35px;
  text-align: center;
  font-weight: bold;
}
</style>
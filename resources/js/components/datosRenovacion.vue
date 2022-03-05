
<template>

<form action="Oferta" method=post name="formulario1" v-csrf-token>
  <input type="hidden" name="_token" :value="csrf" />
<input type="hidden" id="datos_credito" name="datos_credito" v-bind:value="this.datos_credito"/>
<input type="hidden" name="_token" :value="csrf" />
<form-wizard  class="form-w" title="Datos Para Renovacion de Credito" subtitle="" @on-complete="onComplete" method = "post"
validate-on-back
		ref="wizard" 
		shape="circle" color="#110050" error-color="#ff4949">
    <tab-content title="Datos Personales " icon="ti ti-user">
 <div class="container">
  <div class="row">
    <div class="col-4">
     <label class="label-datosPersonales" for="client_id">Cliente_id</label>
       
          <input name="client_id" id="client_id" type="text" readonly="readonly" required class="form-control"  v-bind:value="this.datos_personales.cliente_id">
        <label  class="label-datosPersonales" for="apellido_paterno">Apellido Paterno:</label>
          <input name="apellido_paterno" id="apellido_paterno" type="text" readonly="readonly" required class="form-control" v-bind:value="this.datos_personales.apellido_paterno">
           <label  class="label-datosPersonales" for="rfc">RFC:</label>
          <input  name="rfc" id="rfc" type="text" required class="form-control" readonly="readonly" placeholder="rfc" v-bind:value="this.datos_personales.rfc">
             <label class="label-datosPersonales" for="ingresos">Ingresos:</label>
          <input name="ingresos" id="ingresos"  type="text" data-prefix="$ " required class="form-control" readonly="readonly" v-bind:value="this.datos_personales.ingresos">
         
        
    </div>
    <div class="col-4">
      <label class="label-datosPersonales" for="client_id">Client_id</label>
       
         <label class="label-datosPersonales" for="no_dependientes">No Dependientes:</label>
          <input name="no_dependientes" id="no_dependientes" type="text" required class="form-control" readonly="readonly" v-bind:value="this.datos_personales.no_dependientes">
         <label class="label-datosPersonales" for="genero">Genero:</label>
          <input name="genero" id="genero" type="text" required class="form-control" readonly="readonly" v-bind:value="this.datos_personales.genero">
           <label for="estado_civil">Estado Civil:</label>
          <input name="estado_civil" id="estado_civil" type="text" required class="form-control" readonly="readonly" v-bind:value="this.datos_personales.estado_civil">
        <label class="label-datosPersonales" for="ultimo_grado_estudios">Ultimo grado Estudios:</label>
          <input name="ultimo_grado_estudios" id="ultimo_grado_estudios" type="text" readonly="readonly" required class="form-control" v-bind:value="this.datos_personales.ultimo_grado_estudios">
    </div>
    <div class="col-4">
      <label class="label-datosPersonales"  for="Nombre">Nombre</label>
          <input name="Nombre" id="Nombre" type="text" required class="form-control" readonly="readonly" v-bind:value="this.datos_personales.nombre">
          <label class="label-datosPersonales"  for="apellido_materno">Apellido Materno:</label>
          <input name="apellido_materno" id="apellido_materno" type="text" required class="form-control" readonly="readonly" v-bind:value="this.datos_personales.apellido_materno">
 <label class="label-datosPersonales"  for="fecha_nacimiento">Fecha Nacimiento:</label>
          <input name="fecha_nacimiento" id="fecha_nacimiento" type="date" required class="form-control" readonly="readonly" v-bind:value="this.datos_personales.fecha_nacimiento">
           <label class="label-datosPersonales" for="egresos">Egresos:</label>
          <input name="egresos" id="egresos" type="text" required class="form-control" readonly="readonly" v-bind:value="this.datos_personales.egresos">
       
    </div>
  </div>
</div>
    </tab-content>
    <tab-content title="Datos Domicilio"  icon="ti ti-map-alt">
       <div class="container">
  <div class="row2">
    <div class="col-4">
            <label class="label-datosPersonales"   for="Calle">Calle</label>
         <input name="calle" id="calle" type="text"  :readonly=readonly required class="form-control" v-model="calle">
        <label class="label-datosPersonales"   for="no_exterior"># Exterior</label>
          <input name="no_exterior" id="no_exterior"  type="text"  :readonly=readonly required class="form-control" v-model="no_exterior">
   <label class="label-datosPersonales"  for="colonia">Colonia:  </label> <br>
  

    <select  name="colonia" :readonly=readonly>
  <option selected >{{this.datos_domicilio.colonia}}</option>
  <option  >{{datoscolonia1}}</option>
  <option>{{datoscolonia2}}</option>
</select>
<span>Seleccionado: {{ selected }}</span>
      
          <!-- <input name="colonia" id="colonia" type="text" required class="form-control" placeholder="colonia" v-bind:value="this.datos_domicilio.colonia"> -->
             <label for="estado">Estado:</label>
          <input name="estado" id="estado" type="text" class="form-control"  :readonly=readonly  v-model="estado"  required>
        
    </div>
    <div class="col-4">
      <label class="label-datosPersonales"  for="no_interior"># Interior</label>
          <input name="no_interior" id="no_interior" type="text" :readonly=readonly  required class="form-control" v-model="no_interior">
          <label class="label-datosPersonales"  for="municipio">Municipio:</label>
          <input name="municipio" id="municipio" type="text"  :readonly=readonly :required=required class="form-control" v-model="municipio">
 <label class="label-datosPersonales"  for="cp">CP:</label>
          <input  name="cp" id="cp" type="number"  required class="form-control"  :readonly=readonly v-model="cp" @change="onChange($event)">
         <span class="datos_actuales">¿Son los datos actuales?</span>
 <label class="switch" role="button">
    <input
      id="visibility"
      type="checkbox"
      :value="active"
      @click="readonly=!readonly"
      v-model="checked"
    @change="update"
    />
    <div
      :class="{
        circle: true,
        'circle-on': checked,
        'circle-off': !checked
      }"
    >
   <span>{{ label }}</span>
    </div>
  
  </label>
      
      </div>
    </div>
  </div>

 
    </tab-content>
</form-wizard>
<input name="monto" id="monto" type="hidden"  readonly="readonly"  class="form-control"  v-bind:value="this.datos_credito.monto" >
        
          <input name="plazo" id="plazo" type="hidden"  readonly="readonly" required class="form-control" v-bind:value="this.datos_credito.plazo">

  
       
          <input name="pago_mensual" id="pago_mensual" type="hidden"  required class="form-control" readonly="readonly" v-bind:value="this.datos_credito.pago_mensual">
     
          <input name="tasa_interes" id="tasa_interes" type="hidden"  required class="form-control" readonly="readonly" v-bind:value="this.datos_credito.tasa_interes">
           <input name="chance_cp" id="chance_cp" type="hidden"  required class="form-control" readonly="readonly" v-bind:value="this.change_cp">
 </form>   
</template>

<script>


import axios from "axios";
  export default {
      data() {
    return {
      checked: true,
      label: "",
      // For example purpose (& codepen limitation): active, dataOn & dataOff aren't props.
      active: 1, // 1|0
      dataOn: "Si",
      dataOff: "No",
       readonly: true,
    //  key:this.datos_domicilio.municipio,
    selected: '',
    datoscolonia1:"",
     datoscolonia2:"",
     chance_cp:"No",
      csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
     errors: [],
    };
    
  },
  created() {
    this.checked = Boolean(this.active);
    this.update();
    this.estado=this.datos_domicilio.estado;
    this.calle=this.datos_domicilio.calle;
    this.no_interior=this.datos_domicilio.no_interior;
    this.no_exterior=this.datos_domicilio.no_exterior;
    this.municipio=this.datos_domicilio.municipio;
    this.cp=this.datos_domicilio.cp;
  },
  methods: {

    update() {
      this.label = this.checked ? this.dataOn : this.dataOff;
    },

    onComplete(e) {
   
 console.log(this.calle);
  console.log(this.no_interior);
   console.log(this.no_exterior);
      if(this.datos_domicilio.estado == "CP debe ser 5 números" 
      ||this.datos_domicilio.estado == "Not Found"){
  			alert("Revisa Campo Estado!");
        
  		}
  		if(!this.datos_domicilio.calle){
  			alert("El campo calle no puede estar vacio!");
  		}if(!this.datos_domicilio.no_exterior){
  			alert("El campo # exterior no puede estar vacio!");
  		}
      document.formulario1.submit(this.datos_personales,this.datos_domicilio);
       
        
   },
     onChange(event) {
       this.calle="";
       this.no_interior="";
       this.no_exterior="";
       console.log(this.datos_domicilio.calle);
    axios.post("/DatosRenovacion_cp",{cp:event.target.value,RFC:this.rfc}).then((result) => {
    console.log(result.data.estado);
    console.log(result.data.municipio);
    console.log(result.data.colonias_array[0]);

   
  this.change_cp="Si"
  this.datos_domicilio.cp=event.target.value;
  this.estado=result.data.estado;
  this.municipio=result.data.municipio;
  this.datos_domicilio.colonia=result.data.colonias_array[0];
  this.datoscolonia1=result.data.colonias_array[1];
  this.datoscolonia2=result.data.colonias_array[2];
  this.$forceUpdate()


  }).catch(error => {
      this.errorMessage = error.message;
      console.error("There was an error!", error);
    });
       }
  },
    props:{datos_personales:Object,token_api:String,datos_domicilio:Object,datos_credito:Object,rfc:String},
    mounted () {
      console.dir(this.datos_domicilio)
    }
  }
</script>
<style lang="scss">
$default: black;
$active: rgb(0, 15, 63);
$inactive: rgba(0, 15, 63, 0.247);
$text: #000000;
$text-hover: rgb(0, 0, 0);
$size: 1rem;
$w: 80px;
$h: 20px;
$circle: $h - 4;
$toggle-dis: $w - $circle - 2;





.vue-form-wizard .wizard-title {
     color:#ffffff;
    font-weight: bold;
    margin: 0;
    text-align: center;
}
.label-datosPersonales{
color: #ffffff;
    font-weight: bold;
    font-family: arial;
}

.vue-form-wizard .wizard-nav-pills>li>a {
    color:#ffffff;
    font-weight: bold;
}

.vue-form-wizard .wizard-nav-pills > li > a {
    color: #18064a;
    font-weight: bold;
}


.container{
   align-items: center;

}

.form-control:readonly, .form-control[readonly] {
    background-color: #d3e0ee;
    opacity: 1;
        text-align: center;
        font-weight: bold;
    font-family: arial;
}
.row2 {
    display: -webkit-inline-box;
    flex-wrap: wrap;
    margin-right: -15px;
    margin-left: -15px;
    float: right;
    position: relative;
    top: -21px;
    left: 81px;
}

.common-styles {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 200px;
  height: 200px;
  border: 1px solid black;
}

.redClass {
  border: 1px solid red;
}

.blueClass {
  border: 1px solid blue;
}

.datos_actuales{
  color: rgb(234, 233, 245);
    font-weight: bold;

}
.switch {
  position: relative;
  display: inline-block;
  width: $w;
  height: $h;
  border-radius: 100px;

  .circle {
    display: flex;
    align-items: center;
    width: 100%;
    height: $h - 2;
    border-radius: 100px;
    background-color: $default;

    & > span {
      font-size: $size;
      color: $text;
      padding-left: $h + 4;
    }

    &::before {
      position: absolute;
      content: "";
      height: $circle;
      width: $circle;
      left: 1px;
      top: 1px;
      border-radius: 100px;
      background-color: white;
      -webkit-transition: 0.4s;
      transition: 0.4s;
    }

    &:hover {
      background-color: lighten($default, 20);

      & > span {
        color: $text-hover;
      }
    }
  }

  .circle-on {
    background-color: $active;

    & > span {
      color: white;
    }

    &:hover {
      background-color: white;
      border: 1px $active solid;

      &::before {
        background-color: $active;
      }

      & > span {
        color: $active;
      }
    }
  }

  .circle-off {
    background-color: $inactive;

    & > span {
      color: white;
    }

    &:hover {
      background-color: white;
      border: 1px $inactive solid;

      &::before {
        background-color: $inactive;
      }

      & > span {
        color: $inactive;
      }
    }
  }

  & input {
    display: none;

    &:checked + .circle:before {
      -webkit-transform: translateX($toggle-dis);
      -ms-transform: translateX($toggle-dis);
      transform: translateX($toggle-dis);
    }
  }
}
</style>
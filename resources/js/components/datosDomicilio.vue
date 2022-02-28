<template>
   

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
       disabled: true,
    //  key:this.datos_domicilio.municipio,
    selected: '',
    datoscolonia1:"",
     datoscolonia2:"",
    };
    
  },
  created() {
    this.checked = Boolean(this.active);
    this.update();
  },
  methods: {
    update() {
      this.label = this.checked ? this.dataOn : this.dataOff;
    },
     onChange(event) {
            console.log(event.target.value)

    axios.put("/DatosRenovacion/update",{cp:event.target.value,RFC:this.rfc}).then((result) => {
    console.log(result.data.estado);
    console.log(result.data.municipio);
    console.log(result.data.colonias_array[0]);


  this.datos_domicilio.cp=event.target.value;
  this.datos_domicilio.estado=result.data.estado;
  this.datos_domicilio.municipio=result.data.municipio;
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
    props:{datos_domicilio:Object,rfc:String},
    mounted () {
      console.dir(this.datos_domicilio)
    }
  }
</script>


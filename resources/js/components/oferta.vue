<template>
  <div class="form-group">
    <h1 class="mb-3">UTHIS</h1>
    <h1 class="mb-3">TIENE UNA OFERTA PARA TI:</h1>
    <div class="p-5 text-center bg-light justify-content-center">
      <div>
        <label class="label-oferta" for="monto">Monto: </label>
        <span class="monto">{{ this.monto }}</span>
      </div>

      <div>
        <label class="label-oferta" for="plazo">Plazo:</label>
        <span>{{ this.plazo }}</span>
      </div>
      <div>
        <label class="label-oferta" for="pago_mensual">Pago Mensual: </label>
        <span class="plazo">{{ this.pago_mensual }}</span>
      </div>
      <div>
        <label class="label-oferta" for="tasa_interes">Tasa Interes: </label>
        <span>{{ this.tasa_interes }}</span>
      </div>
      <div>
        <button
          type="button"
          class="btn btn-success"
          v-on:click="Oferta_aceptada('aceptada')"
        >
          Aceptar
        </button>
        <button
          type="button"
          class="btn btn-danger"
          v-on:click="Oferta_rechazada('rechazada')"
        >
          Rechazar
        </button>
      </div>
    </div>
  </div>
</template>


<script>
import axios from "axios";
export default {
  data() {
    return {};
  },
  methods: {
    update() {},
    Oferta_aceptada(value) {
      axios
        .put("/Oferta/update", { oferta: value, id_cliente: this.cliente_id })
        .then((result) => {
          window.location.replace("/");
          console.log(value);
        })
        .catch((error) => {
          this.errorMessage = error.message;
          console.error("There was an error!", error);
        });
    },
    Oferta_rechazada(value) {
      axios
        .put("/Oferta/update", { oferta: value, id_cliente: this.cliente_id })
        .then((result) => {
          window.location.replace("/");
          console.log(value);
        })
        .catch((error) => {
          this.errorMessage = error.message;
          console.error("There was an error!", error);
        });
    },
  },
  props: {
    monto: String,
    plazo: String,
    pago_mensual: String,
    tasa_interes: String,
    cliente_id: String,
  },
  mounted() {
    console.dir(this.datos_domicilio);
  },
};
</script>


<style>
body {
  height: 100%;
  background: rgba(1, 8, 32, 0.699);
  text-align: center;
  /* background: linear-gradient(135deg, rgb(4, 140, 143) 23%, rgb(193, 222, 255) 100%);  */
}

.monto:before {
  content: "$ ";
}

.plazo:before {
  content: "$ ";
}

.btn {
  width: 130;
  padding: 8;
  margin: 0;
  border-color: rgb(255 255 255);
  font-size: large;
  font-weight: bold;
}

.p-5 {
  color: #160808;
  font-size: xx-large;
  font-weight: bold;
}

.mb-3 {
  color: rgb(234, 233, 245);
  font-weight: bold;
}

.label-oferta {
  color: rgb(4, 1, 44);
  font-weight: bold;
  font-size: x-large;
}
</style>
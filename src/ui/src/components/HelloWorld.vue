<template>
  <div>
    <div class="form-row mt-3">
      <div class="form-inline offset-md-4">
        <label for="operacion" class="col-xs-2 control-label">Tipo de Operación</label>
        <div class="col-xs-10 ml-2">
          <div class="form-inline">
            <div class="form-group">
              <select v-model="operacion">
                <option value="A">Alquiler</option>
                <option value="C">Compra</option>
              </select>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="form-row mt-3">
      <div class="col-12 text-center mt-3">
        <button @click="this.getData()" class="btn btn-success">Buscar</button>
      </div>
    </div>
    <div class="row mt-5 mb-5 ml-1">
      <div class="row justify-content-md-center col-12 text-center" v-if="loadingData">
        <div class="col-auto text-center">
          <!-- <bounce-loader :loadingRegisterRegister="loadingRegister" :color="'#ffc400'"></bounce-loader> -->
          <moon-loader :loadingData="loadingData" :color="'#0A93D5'"></moon-loader>
        </div>
      </div>
      <div class="col-12" v-else-if="!loadingData">
        <div v-if="this.validateData(this.data) == 0" class="w-50 text-center offset-md-3">
          <div class="alert alert-warning" role="alert">Ejecute la búsqueda para visualizar viviendas.</div>
        </div>

        <div v-else class="card text-center">
          <div class="card-body" v-for="(row, id) in data" :key="id">
            <h5 class="card-title">
              {{ row.shortdescription }}
              <p class="card-text pull-right" style="float: right">{{ row.value }}</p>
            </h5>
            <p class="card-text">{{ row.description }}</p>
            <div class="card-footer">
              <small class="text-muted">{{ row.owner }}</small>
              <small class="text-info ml-3">{{ row.location }}</small>
              <small class="text-muted ml-3">{{ (row.type=='A')? 'Alquiler':'Compra' }}</small>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Datepicker from 'vue3-datepicker'
import MoonLoader from 'vue-spinner/src/MoonLoader.vue'
export default {
  components: {
    Datepicker,
    MoonLoader
  },
  name: 'HelloWorld',
  props: {
    msg: {
      type: String,
      default: ''
    }
  },
  data() {
    return {
      operacion: 'C',
      loadingData: false,
      data: {}
    }
  },
  methods: {
    getData() {
      this.loadingData = true
      this.axios
        .get(this.url + '/api/viviendas', {
          params: {
            type: this.operacion,
          },
          // headers: { Authorization: this.token }
        }).then((response) => {
          console.log(response.data['hydra:member'])
          this.data = response.data['hydra:member']
        })
        .catch((error) => {
          console.log(error)
        })
        .finally(() => (this.loadingData = false))
    },
    validateData(data) {
      return Object.keys(data).length
    }
  }
 
}
</script>

<style lang="scss" scoped>
h1.msg {
  color: $gray-900;
}
</style>

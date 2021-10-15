<template>
  <div>
    <div class="form-row">
      <div class="col-6">
        <datepicker class="form-control" v-model="this.datepickedIni" type="date" />
      </div>
      <!-- <div class="col-4">
      <datepicker class="form-control" v-model="this.datepickedEnd" type="date" />
    </div> -->
      <div class="col-3">
        <input
          type="number"
          id="form1"
          class="form-control"
          placeholder="Buscador"
          aria-label="Search"
          v-model="this.numPeople"
        />
      </div>
      <div class="col-3 text-center">
        <button @click="this.getData()" class="btn btn-success">Buscar</button>
      </div>
    </div>
    <div class="row mt-5 mb-5 col-12">
      <div class="row justify-content-md-center col-12 text-center" v-if="loadingData">
        <div class="col-auto text-center">
          <!-- <bounce-loader :loadingRegisterRegister="loadingRegister" :color="'#ffc400'"></bounce-loader> -->
          <moon-loader :loadingData="loadingData" :color="'#F70759'"></moon-loader>
        </div>
      </div>
      <div class="col-12" v-else-if="!loadingData">
        <div v-if="this.validateData(this.data) == 0" class="w-50 text-center col-md-6 offset-md-3">
          <div class="alert alert-warning" role="alert">No se encontro actividades para la fecha seleccionada</div>
        </div>

        <div v-else class="card w-50 text-center col-md-8 offset-md-2">
          <div class="card-body" v-for="(row, id) in data" :key="id">
            <h5 class="card-title">
              {{ row.title }}
              <p class="card-text pull-right" style="float: right">{{ row.pu }}</p>
            </h5>
            <p class="card-text">{{ row.description }}</p>
            <a @click="this.buyActivity(row.id)" class="btn btn-warning">Comprar</a>
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
      datepickedIni: new Date(),
      numPeople: 1,
      loadingData: false,
      data: {}
    }
  },
  methods: {
    getData() {
      this.loadingData = true
      this.axios
        .get(this.url + '/api/activities', {
          params: {
            dateStart: this.formatDate(this.datepickedIni),
            num: this.numPeople
          },
          headers: { Authorization: this.token }
        })
        .then((response) => {
          console.log(Object.keys(response.data.data).length)
          this.data = response.data.data
        })
        .catch((error) => {
          console.log(error)
        })
        .finally(() => (this.loadingData = false))
    },
    formatDate(date) {
      var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear()

      if (month.length < 2) month = '0' + month
      if (day.length < 2) day = '0' + day

      return [year, month, day].join('-')
    },
    validateData(data) {
      return Object.keys(data).length
    },
    buyActivity(id) {
      this.loadingData = true
      this.axios
        .post(
          this.url + '/api/bookings',
          {
            dateBooking: this.formatDate(this.datepickedIni),
            num: this.numPeople,
            id: id
          },
          { headers: { Authorization: this.token } }
        )
        .then((response) => {
          if (this.validateData(response.data.data) > 0) {
            this.loadingData=false;
            this.$notify({
              type: 'success',
              title: 'Exito',
              text: 'Acabas de reservar '+response.data.data.activity.title,
              position: 'top center'
            })
          }
        })
        .catch((error) => {
          this.$notify({
            type: 'error',
            title: 'Error',
            text: 'Algo paso no salio bien',
             position: 'top center'
          })
        })
        .finally(() => (this.loadingData = false))
    }
  }
  // created() {
  //   this.axios.get(this.url + '/api/activities', { headers: { Authorization: this.token } }).then((response) => {
  //     console.log(this.url)
  //   })
  // }
}
</script>

<style lang="scss" scoped>
h1.msg {
  color: $gray-900;
}
</style>

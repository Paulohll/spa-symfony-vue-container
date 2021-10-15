<template>
  <nav class="navbar navbar-expand-md navbar-dark bg-civitatis fixed-top">
    <div class="container">
      <router-link to="/" class="navbar-brand" @click="collapseNavbar">Civitatis</router-link>
      <button
        :class="['navbar-toggler', !navbarExpanded && 'collapsed']"
        type="button"
        aria-controls="navbarDefault"
        :aria-expanded="navbarExpanded"
        aria-label="Toggle navigation"
        @click="toggleNavbar"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- <div id="navbarDefault" :class="['collapse navbar-collapse', navbarExpanded && 'show']">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <router-link to="/" class="nav-link" @click="collapseNavbar">Home</router-link>
          </li>
          <li class="nav-item">
            <router-link to="/about" class="nav-link" @click="collapseNavbar">About</router-link>
          </li>
        </ul>
      </div> -->
    </div>
  </nav>
</template>

<script>
export default {
  data() {
    return {
      navbarExpanded: false
    }
  },
  methods: {
    toggleNavbar() {
      this.navbarExpanded = !this.navbarExpanded
    },
    collapseNavbar() {
      this.navbarExpanded = false
    }
  }
}
</script>
<style scoped>
.bg-civitatis {
    background-color: #F70759 !important;
}
</style>
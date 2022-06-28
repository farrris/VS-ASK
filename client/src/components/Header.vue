<template>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand" href="/">VS-ASK</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="nav navbar-nav">
          <div class="nav-item nav-link" style="cursor:pointer" v-if="user.token != null">{{user.username}}</div>
          <a href="/login" class="nav-item nav-link" v-if="!user.token">Войти</a>
          <div class="nav-item nav-link" style="cursor:pointer" v-if="user.token != null" @click="logout()">Выйти</div>
        </div>
      </div>
    </div>
  </nav>
</template>

<script>
export default {
  data() {
    return {}
  },

  methods: {
    logout() {
      localStorage.clear()
      location.reload()
    },
    
    getUser() {
      let user_store = {
        id: localStorage.getItem('id'),
        username: localStorage.getItem('username'),
        email: localStorage.getItem('email'),
        token: localStorage.getItem('token')
      }

      this.$store.commit('SET_USER', user_store)
    }
  },

  computed: {
    user() {
      return this.$store.getters.USER;
    }
  },

  mounted() {
    this.getUser()
  }
}
</script>

<style>
.navbar-nav {
    width: 100%;
    justify-content: flex-end;
}
</style>
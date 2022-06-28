<template>
  <div class="login-view">
    <div class="card w-50 p-4 mt-4 mx-auto">
      <form>
      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control mt-3" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" v-model="email">
      </div>
      <div class="form-group mt-4">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control mt-3" id="exampleInputPassword1" placeholder="Password" v-model="password">
      </div>
      <div class="alert alert-danger mt-4" v-if="error != ''">{{ error }}</div>
      <button type="button" class="btn btn-outline-primary mt-5 w-100 ml-2" @click="login()">Войти</button>
      <div class='text-center mt-4'>Ещё не зарегистрированы? <a href="/register">Регистрация</a></div>
    </form>
  </div>
</div>
</template>

<script>
import axios from "axios"
export default {
  data() {
    return {
      user: {},
      email: '',
      password: '',
      error: ''
    }
  },
  
  methods: {
    async login() {
      if (this.email == '' && this.password == '') {
        this.error = 'Заполните все поля'
      } 
      else {
        const formData = {
          email: this.email,
          password: this.password
        }

        await axios.post('http://localhost:8000/api/auth/login', formData).then((res) => {
          if (res.status == 200) {
            localStorage.setItem('id', res.data.id),
            localStorage.setItem('username', res.data.login),
            localStorage.setItem('email', res.data.email),
            localStorage.setItem('token', res.data.token)

            let user_store = {
              id: localStorage.getItem('id'),
              username: localStorage.getItem('username'),
              email: localStorage.getItem('email'),
              token: localStorage.getItem('token')
            }

            this.$store.commit('SET_USER', user_store)

            this.$router.push('/')
          }
        }).catch((e) => this.error = e.response.data.message);
      }
    }
  }
}
</script>

<style>

</style>
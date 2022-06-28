<template>
  <div class="login-view">
    <div class="card w-50 p-4 mt-4 mx-auto">
      <form>
      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control mt-3" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" v-model="email">
      </div>
      <div class="form-group mt-4">
        <label for="exampleInputPassword1">Login</label>
        <input type="password" class="form-control mt-3" id="exampleInputPassword1" placeholder="Password" v-model="login">
      </div>
      <div class="form-group mt-4">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control mt-3" id="exampleInputPassword1" placeholder="Password" v-model="password1">
      </div>
      <div class="form-group mt-4">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control mt-3" id="exampleInputPassword1" placeholder="Password" v-model="password2">
      </div>
      <div class="alert alert-danger mt-4" v-if="error != ''">{{ error }}</div>
      <button type="button" class="btn btn-outline-primary mt-5 w-100 ml-2" @click="register()">Зарегистрироваться</button>
      <div class='text-center mt-4'>Уже зарегистрированы? <a href="/login">Вход</a></div>
    </form>
  </div>
</div>
</template>

<script>
import axios from "axios"
export default {
  data() {
    return {
      email: '',
      login: '',
      password1: '',
      password2: '',
      error: ''
    }
  },

  methods: {
    async register() {
      if (this.email == '' && this.login == '' && this.password1 == '' && this.password2 == '') {
        this.error = 'Заполните все поля'
      }
      else if (this.password1 != this.password2) {
        this.error = 'Пароли не соответствуют'
      }
      else {
        const formData = {
        email: this.email,
        login: this.login,
        password: this.password1,
      }

      await axios.post('http://localhost:8000/api/auth/registration', formData).then((res) => {
        if (res.status == 200) {
          this.$router.push('/login')
        }
      }).catch((e) => this.error = e.response.data.message);

      }
    }
  }
}
</script>

<style>

</style>
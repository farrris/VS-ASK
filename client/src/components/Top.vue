<template>
  <div class="top-component">
    <div class="card mt-3 p-3">
      <h6 style="text-align:center">Рейтинг пользователей</h6>
      <hr>
        <div v-for="user in users" :key="user.id">
          <div v-if="user.right_answers != 0" class="row mt-3">
            <div class="col-10">{{user.login}}</div>
            <div class="col-2 text-secondary">{{user.right_answers}}</div>
            <hr>
          </div>
        </div>
    </div>
  </div>
</template>

<script>
import axios from "axios"
export default {
  data() {
    return {
      users: []
    }
  },

  methods: {
    getUsers() {
      axios.get('http://localhost:8000/api/users').then((res) => {
        res.data.sort((d1, d2) => { return (d1.answer_rights > d2.asnwer_rights) ? 1 : -1; }) 
        this.users = res.data})
      .catch((e) => console.log(e))
    }
  },

  mounted() {
    this.getUsers()
  }
}
</script>

<style>

</style>
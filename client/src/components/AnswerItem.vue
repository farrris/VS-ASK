<template>
  <div class="answer-item-component">
      <div class="container mt-1" v-if="!rightAnswer">
        <div class="row d-flex">
          <div class="text-secondary col-10 author">{{answer.user}}</div>
          <div class="text-secondary col-2 date">{{answer.date}}</div>
        </div>
      <div class="mt-4 text">{{answer.answer}}</div>
      <button class="btn btn-outline-dark mt-4 w-100" v-if="user.token != null && answer.user != question.user && question.user == user.username" @click="right()">Правильный ответ</button>
    </div>

    <div class="container mt-1 border border-success border-3" v-if="rightAnswer">
        <div class="row d-flex">
          <div class="text-secondary col-10 author">{{answer.user}}</div>
          <div class="text-secondary col-2 date">{{answer.date}}</div>
        </div>
      <div class="mt-4 text">{{answer.answer}}</div>
    </div>

    <hr>
  </div>
</template>

<script>
import axios from "axios"
export default {
  props: ["answer", "question"],
  data() {
    return {
      rightAnswer: false
    }
  },

  methods: {
    right() {
      axios.post("http://localhost:8000/api/right_answer/" + this.answer.id, {}).then((res) => console.log(res)).catch((e) => console.log(e))

      this.rightAnswer = true
    }
  },

  computed: {
    user() {
      return this.$store.getters.USER;
    }
  },

  mounted() {
    if (this.answer.type == 'right') {
      this.rightAnswer = true
    }
  }
}
</script>

<style>

</style>
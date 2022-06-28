<template>
  <div class="answer-form-create-component">
    <div class="card w-75 p-4 mt-4 mx-auto">
      <div class="row d-flex">
        <div class="h3 col-11">Ответить на вопрос</div>
        <button class="btn btn-outline-dark p-1 col-1" @click="closeForm()">-</button>
      </div>

      <div class="input-group">
        <textarea type="text" class="form-control mt-3 w-50" placeholder="Введите ответ..." v-model="answer"></textarea>
        <button class="btn btn-outline-dark mt-3" type="button" @click="createAnswer()">Разместить</button>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios"
import { getDate } from "@/utils/date"
export default {
  data() {
    return {
      answer: ''
    }
  },

  methods: {
    createAnswer() {
      const formData = {
        answer: this.answer,
        user_id: this.$store.getters.USER.id,
        question_id: this.$route.params.id,
        date: getDate()
      }
      axios.post('http://localhost:8000/api/answers', formData)
      .then((res) => {
        console.log(res)
        let answers = this.$store.getters.ANSWERS
        answers.push(res.data)
        this.$store.commit('SET_ANSWERS', answers)
        this.closeForm()
      })
      .catch((e) => console.log(e));
    },

    closeForm() {
      this.$emit('close')
    }
  }
}
</script>

<style>

</style>
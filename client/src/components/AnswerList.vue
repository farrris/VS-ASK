<template>
  <div class="answer-list-component">
    <AnswerFormCreate v-if="formOpen == true" @close="formOpen = false" />
    <div class="card w-75 p-4 mt-4 mb-4 mx-auto">
      <div class="container">
        <div class="row d-flex">
          <div class="h3 col-11">Ответы</div>
          <button class="btn btn-outline-dark p-1 col-1" @click="formOpen = !formOpen" v-if="formOpen == false && user.token != null">+</button>
        </div>
        <hr>
        <AnswerItem v-for="answer in answers" :key="answer.id" :answer="answer" :question='question' />
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios"
import AnswerItem from "@/components/AnswerItem.vue"
import AnswerFormCreate from "@/components/AnswerFormCreate.vue"
import { toHandlers } from "vue"
export default {
  components: {
    AnswerItem,
    AnswerFormCreate
  },

  props: ['question'],

  data() {
    return {
      formOpen: false
    }
  },

  methods: {
    getAnswers() {
      axios.get('http://localhost:8000/api/answers/' + this.$route.params.id).then((res) => this.$store.commit('SET_ANSWERS', res.data))
    },

    formClose() {
      this.formOpen = false
    }
  },

  computed: {
    answers() {
      return this.$store.getters.ANSWERS;
    },

    user() {
      return this.$store.getters.USER;
    }
  },

  mounted() {
    this.getAnswers()
  }
}
</script>

<style>

</style>
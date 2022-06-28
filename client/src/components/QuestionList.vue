<template>
  <div class="question-list-component">
    <div class="card p-4 mt-3" v-if="questions.length == 0">
      <div class="h3 mx-auto">Вопросов нет</div>
    </div>
    <QuestionItem v-for="question in questions" :key="question.id" :question="question" />
  </div>
</template>

<script>
import axios from "axios"
import QuestionItem from "@/components/QuestionItem.vue"
export default {
  components: {
    QuestionItem
  },

  data() {
    return {}
  },

  methods: {
    getQuestions() {
      axios.get('http://localhost:8000/api/questions').then((res) => this.$store.commit('SET_QUESTIONS', res.data))
    }
  },

  computed: {
    questions() {
      return this.$store.getters.QUESTIONS
    }
  },

  mounted() {
    this.getQuestions();
  }
}
</script>

<style scoped>
.card {
  width: 95%
}
</style>
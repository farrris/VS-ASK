<template>
  <div class="question-page">
    <QuestionView :question="question" />
    <AnswerList :question="question" />
  </div>
</template>

<script>
import QuestionView from '@/components/QuestionView.vue'
import AnswerList from '@/components/AnswerList.vue'
import axios from "axios"
export default {
  components: {
    QuestionView,
    AnswerList
  },
  
  data() {
    return {
      question: {}
    }
  },

  methods: {
    getQuestion() {
      axios.get('http://localhost:8000/api/questions/' + this.$route.params.id).then((res) => this.question = res.data)
    },
  },

  mounted() {
    this.getQuestion()
  }
}
</script>

<style>

</style>
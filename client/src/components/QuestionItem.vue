<template>
  <div class="question-item-component">
    <div class="card p-4 mt-3" @click="redirectToQuestion">
      <div class="container">
        <div class="row d-flex">
          <div class="text-secondary col-10 author">{{question.user}}</div>
          <div class="text-secondary col-2 date">{{question.date}}</div>
        </div>
        
        <div class="mt-4 h4 title">{{question.question}}</div>
        <div class="mt-4 text-secondary answers">{{question.answers}} answers</div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["question"],
  methods: {
    redirectToQuestion() {
      this.$router.push({
        path: '/question/' + this.question.id
      })
    }
  }
}
</script>

<style scoped>
.card {
  width: 95%;
  cursor:pointer;
}

.card:hover {
  background-color: #00BFFF;
  color: white;
}
</style>
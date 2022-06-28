<template>
  <div class="question-view">
    <div class="card w-75 p-4 mt-3 mx-auto">
      <div class="container">
        <div class="row">
          <div class="text-secondary col-10 author">{{question.user}}</div>
          <div class="text-secondary col-2 date">{{question.date}}</div>
        </div>
        
        <div class="mt-4 h4 title">{{question.question}}</div>
        <div class="mt-4 body">{{question.description}}</div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios"
export default {
  props: ['question']
}
</script>

<style>

</style>
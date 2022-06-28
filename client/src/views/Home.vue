<template>
  <div class="home-page">
    <div class="row">
      <QuestionList class="col-10" />
      <div class="col-2">
        <button class="btn btn-outline-primary p-2 w-100 mt-3 question" @click="openModal = true" v-if="user.token != null"><b>+</b> Вопрос</button>
        <Top />
      </div>
    </div>

    <QuestionFormCreate :openModal="openModal" @close="openModal = false" />
  </div>
</template>

<script>
import QuestionList from '@/components/QuestionList.vue'
import QuestionFormCreate from '@/components/QuestionFormCreate.vue'
import Top from '@/components/Top.vue'
export default {
  components: {
    QuestionList,
    QuestionFormCreate,
    Top
  },

  data() {
    return {
      openModal: false,
    }
  },

  computed: {
    user() {
      return this.$store.getters.USER;
    }
  }
}
</script>

<style scoped>

</style>
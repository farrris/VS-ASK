<template>
<div class="question-form-create-component">
  <div v-if="openModal == true">
     <div class="simple-modal">
    <div class="simple-modal-backdrop">
      <div class="simple-modal-container">
        <div class="simple-modal-content">
          <header class="simple-modal-header">
            Задать Вопрос
          </header>
          <section class="simple-modal-body">
              <textarea type="text" class="form-control mt-3 w-100" placeholder="Введите вопрос..." v-model="question"></textarea>
          </section>
          <footer class="simple-modal-footer mt-4">
            <button type="button" class="btn btn-outline-primary mt-4" @click="createQuestion()">Разместить</button>
            <button type="button" class="btn btn-outline-danger mt-2" @click="closeModal()">Закрыть</button>
          </footer>
        </div>
      </div>
    </div>
     </div>
  </div>
</div>
</template>

<script>
import axios from "axios"
import { getDate } from "@/utils/date"
export default {
  props: ["openModal"],
  data() {
    return {
      question: ''
    }
  },

  methods: {
    closeModal() {
      this.$emit('close')
    },

    createQuestion() {
      const formData = {
        question: this.question,
        user_id: this.$store.getters.USER.id,
        date: getDate()
      }

      axios.post('http://localhost:8000/api/questions', formData)
      .then((res) => {
        console.log(res)
        let questions = this.$store.getters.QUESTIONS
        questions.push(res.data)
        this.$store.commit('SET_QUESTIONS', questions)
        this.closeModal()
      })
      .catch((e) => console.log(e));
    }

  },

}
</script>

<style lang="scss">
  .simple-modal {
    &-backdrop {
      position: fixed;
      top: 0;
      bottom: 0;
      left: 0;
      right: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.8);
      transition: opacity 0.3s ease;
      z-index: 9999;
    }

    &-container {
      position: fixed;
      top: 0;
      right: 0;
      left: 0;
      bottom: 0;
      width: auto;
      margin: 16px;
    }

    &-content {
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      width: 100%;
      max-width: 500px;
      margin: 1.75rem auto;
      padding: 20px 30px;
      border-radius: 5px;
      color: #000;
      background-color: #fff;
      transform: translate(0, 0);
      transition: all 0.3s ease;
      box-sizing: border-box;
    }

    &-header {
      padding-bottom: 16px;
      font-size: 25px;
      text-align: center;
    }

    &-footer {
      display: flex;
      flex-direction: column;
      justify-content: center;
      height: 80px;
      text-align: center;
    }
  }
</style>
import { createStore } from 'vuex'

export default createStore({
  state: {
    questions: [],
    answers: [],
    user: {}
  },
  getters: {
    QUESTIONS: state => {
      return state.questions;
    },

    ANSWERS: state => {
      return state.answers;
    },

    USER: state => {
      return state.user;
    }
  },
  mutations: {
    SET_QUESTIONS: (state, payload) => {
      state.questions = payload;
    },

    SET_ANSWERS: (state, payload) => {
      state.answers = payload;
    },

    SET_USER: (state, payload) => {
      state.user = payload;
    }
  },
  actions: {
  },
  modules: {
  }
})

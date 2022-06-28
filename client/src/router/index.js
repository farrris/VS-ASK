import { createRouter, createWebHistory } from 'vue-router'

const routes = [
  {
    path: "/",
    name: "home",
    meta: {
      layout: "main"
    },
    component: () => import("../views/Home.vue")
  },

  {
    path: "/question/:id",
    name: "question",
    meta: {
      layout: "main"
    },
    component: () => import("../views/Question.vue")
  },

  {
    path: "/login",
    name: "login",
    meta: {
      layout: "main"
    },
    component: () => import("../views/Login.vue")
  },

  {
    path: "/register",
    name: "register",
    meta: {
      layout: "main"
    },
    component: () => import("../views/Register.vue")
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router

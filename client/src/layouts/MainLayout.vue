<template>
  <div class="app-main-layout">

      <Header />
      <main class="app-content">
        <div class="app-page">
          <div class="wrapper">
            <div class="container">
              <router-view />
            </div>
          </div>
        </div>
      </main> 
  </div>  

</template>

<script>
import Header from "@/components/Header.vue"
export default {
  components: {
    Header,
  },

  data() {
    return {
      
    }
  }
}
</script>

<style>

</style>
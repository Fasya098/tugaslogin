<template>
    <div class="container">
      <Nav />
      <div class="position-absolute top-50 start-50 translate-middle">
        <h2>WELCOME ADMIN</h2>
      </div>
    </div>
  </template>
  
  <script>
  import Nav from '@/components/Nav.vue'
  export default {
    name: 'AdminPage',
    components:{
      Nav
    },
    data () {
      return {
        
      }
    }
  }
  </script>
<template>
    <div class="container">
        <NavUser />
        <div class="position-absolute top-50 start-50 translate-middle">
            <h3>WELCOME USER</h3>
        </div>
    </div>

  </template>
  
  <script>
  import NavUser from '@/components/NavUser.vue'
  export default {
    name: 'UserPage',
    components:{
      NavUser
    },
    data () {
      return {
        
      }
    }
  }
  </script>
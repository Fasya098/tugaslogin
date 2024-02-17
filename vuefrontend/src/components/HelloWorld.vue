<template>
  <div>
      <h1>Welcome to Home Page</h1>
      <a v-on:click="logout" href="#">Logout</a>
  </div>
</template>

<script>
export default {
  name: 'HelloWorld',
  methods: {
    logout()
    {
      localStorage.clear();
      this.$router.push({name:'Login'})
      alert ('logout sukses')
    }
  },
  data () {
    return {
      msg: 'Welcome to Your Vue.js App'
    }
  }
}
</script>
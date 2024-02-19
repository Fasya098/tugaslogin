<template>
  <div>
      <h1>Welcome to Home Page</h1>
      <button v-on:click="logout">Logout</button>
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
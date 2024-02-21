<style>
body {
  background-color: rgb(0, 0, 62);
}

</style>

<template>
  <div style="color: aliceblue;">
      <h1>Selamat Datang DiWebku</h1>
    <div style="margin-top: 250px;">
      <router-link :to="{name: 'Register'}">
        <input type="button" value="REGISTER" class="btn btn-success" style="width: 350px;">
      </router-link>

      <router-link  :to="{name: 'Login'}"> 
        <input type="button" value="LOGIN" class="btn btn-primary" style="width: 350px;">
      </router-link>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Home',
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
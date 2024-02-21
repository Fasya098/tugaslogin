<style>
body {
  background-color: rgb(0, 0, 62);
}

</style>

<template>
  <div class="d-flex justify-content-center">
  <div class="card" align="left" style="background-color: yellow; width :400px ">
  <div class="card-header" align="center" style="background-color: darkgrey;"><b>REGISTER</b></div>
  <div class="card-body">
      <form @submit.prevent="saveData">
        <label>Nama Lengkap</label>
        <input
          type="text"
          v-model="user.name"
          name="name"
          id="name"
          class="form-control"
          placeholder="Jenengmu"
        />
        <br>
        <label>Email</label>
        <input
          type="email"
          v-model="user.email"
          name="email"
          id="email"
          class="form-control"
          placeholder="Emailmu"
        />
        <br>
        <label>Password</label>
        <input
          type="password"
          v-model="user.password"
          name="password"
          id="password"
          class="form-control"
          placeholder="masukkan password"
        />
        <br>
        <label>Password Confirmation</label>
        <input
          type="password"
          v-model="user.password_confirmation"
          name="password_confirmation"
          id="password_confirmation"
          class="form-control"
          placeholder="ulangi password"
        />
        <br>
      <div align="center">
        <input type="submit" value="DAFTAR" class="btn btn-success" style="width: 250px;">
          <br>
        <router-link :to="{name: 'Login'}"> <br>
        <input type="button" value="LOGIN" class="btn btn-primary" style="width: 250px;" >
        </router-link>
      </div>
      </form>
    </div>  
  </div>
</div>
</template>

<script>
import Vue from "vue";
import axios from "axios";
Vue.use(axios);

export default {
  name: "Register",
  data() {
    return {
      result: {},
      user: {
        name: "",
        email: "",
        password: "",
      },
    };
  },
  created() {},
  mounted() {
    console.log("mounted() called");
  },
  methods: {
    saveData() {
      axios.post("http://127.0.0.1:8000/api/register", this.user)
        .then(({ data }) => {
          console.log(data);
          try {
            alert("Data berhasil disimpan")
            this.$router.push({ name: 'Login'})
          } catch (err) {
            alert("failed");
          }
        });
    },
  },
};
</script>

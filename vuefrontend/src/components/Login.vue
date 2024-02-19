<template>
  <div class="d-flex justify-content-center">
  <div class="card">
  <div class="card-header" style="background-color: darkgray;">Login</div>
  <div class="card-body" style="background-color: chartreuse;">
    <form @submit.prevent="LoginData">
      <div class="form-group">
        <label for="">Email</label>
        <input
          type="email"
          v-model="student.email"
          class="form-control"
          placeholder="masukkan email"
          style="margin-bottom: 10px;"
        />
      </div>

      <div class="form-group">
        <label for="">Password</label>
        <input
          type="password"
          v-model="student.password"
          class="form-control"
          placeholder="masukkan password"
          style="margin-bottom: 25px;"
        />
      </div>
      <input type="submit" value="Login" class="btn btn-success" />
      
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
  name: "Login",
  data() {
    return {
      result: {},
      student: {
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
    LoginData() {
      axios.post("http://127.0.0.1:8000/api/login", this.student)
        .then(({data})=>{
    console.log(data);
    try {
        if(data.status === true) {
            alert('login sukses');
            this.$router.push({name: 'HelloWorld'})
        } else {
            alert("login gagal")
        }
    } catch (err) {
        alert("eror, coba lagi")
    }
}
        )
    },
  }
};
</script>

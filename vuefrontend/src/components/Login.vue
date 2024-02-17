<template>
  <div class="card">
    <div class="card-header">Register Form</div>
    <div class="card-body">
    <form @submit.prevent="LoginData">
      <div class="form-group">
        <label for="">Email</label>
        <input
          type="email"
          v-model="student.email"
          class="form-control"
          placeholder="masukkan email"
        />
      </div>

      <div class="form-group">
        <label for="">Password</label>
        <input
          type="password"
          v-model="student.password"
          class="form-control"
          placeholder="masukkan password"
        />
      </div>
      <input type="submit" value="Login" class="btn btn-success" />
      
    </form>
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

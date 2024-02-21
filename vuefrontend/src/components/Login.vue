<style>
body {
  background-color: rgb(0, 0, 62);
  }
</style>

<template>
  <div class="d-flex justify-content-center">
  <div class="card" align="left" style="width: 400px; height: 400px;">
  <div class="card-header" align="center" style="background-color: darkgray;"><b>Login</b></div>
  <div class="card-body" style="background-color: yellow;">
    <form @submit.prevent="LoginData" style="margin-top: 15px;">
      <div class="form-group">
        <label for="">Email</label>
        <input
          type="email"
          v-model="user.email"
          class="form-control"
          placeholder="masukkan email"
          style="margin-bottom: 10px;"
        />
      </div>

      <div class="form-group">
        <label for="">Password</label>
        <input
          type="password"
          v-model="user.password"
          class="form-control"
          placeholder="masukkan password"
          style="margin-bottom: 25px;"
        />

      <div align="center">
      <input type="submit" value="Login" class="btn btn-success" style="width: 250px;"/>
      <br>
      <br>
      
      <p>Belum Memiliki Akun?</p>
      <router-link :to="{name: 'Register'}"> 
      <input type="button" value="Daftar Disini" class="btn btn-primary" style="width: 250px;"/>
      </router-link>
      </div>
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
  name: "Login",
  data() {
    return {
      result: {},
      user: {
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
      axios.post("http://127.0.0.1:8000/api/login", this.user)
        .then( response => {
          const data = response.data; // Ambil data dari respons
            // const role = response.data.role_id; // Ambil data dari respons
            // Cek apakah respons memiliki token
            const role = data.role
            console.log("role id=", data.role)
            if (data.token) {
                // Simpan token di localStorage
                localStorage.setItem('jwt', data.token);
                if(role === 1){
                    // Redirect ke halaman HelloWorld setelah login berhasil
                    this.$router.push({ name: 'AdminPage' });
                    alert("Login Sebagai Admin");
                }else if(role === 2){
                    // Redirect ke halaman HelloWorld setelah login berhasil
                    this.$router.push({ name: 'UserPage' });
                    alert("Login Sebagai User");
                }else{
                    alert('user tidak terdaftar')
                }
            } else {
                // Jika respons tidak memiliki token, tampilkan pesan kesalahan
                alert("Login Gagal");
            }
        })
        .catch(error => {
            // Tangani kesalahan ketika mengirim permintaan
            console.error('Login failed:', error);
            alert('Login failed. Please try again.');
        });
        }
                
        }
        
    }
</script>
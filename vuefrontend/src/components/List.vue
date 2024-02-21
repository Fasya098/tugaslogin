<style>
body {
  background-color: rgb(0, 0, 62);
}

</style>

<template>
    <div class="container">
        <Nav />
        <table class="table table-hover table-striped-columns position-absolute top-50 start-50 translate-middle" border="3">
            <thead class="table-secondary">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                    <th scope="col">role_id</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody v-for="users in user" :key="users.id">
                <tr class="table-secondary-subtle">
                    <td>{{ users.id}}</td>
                    <td>{{ users.name}}</td>
                    <td>{{ users.email}}</td>
                    <td>{{ users.role_id}}</td>
                    <td> <router-link :to="{name:  'EditUser', params: {id: users.id}}" class="btn btn-primary btn-sm">Edit</router-link>  
                    <button type="button"  class="btn btn-danger btn-sm" @click.prevent="deleteUser(users.id)">Delete</button></td>
                </tr>
            </tbody>
        </table>

        <!-- <input type="button" value="Add User" class="mt-4 p-2"> -->
    </div>
</template>

<script>
import Nav from '@/components/Nav.vue'
import axios from 'axios' 

    export default{
        name: 'User',
        components:{
            Nav
        },
        data(){
            return{
                user:Array
            }
        },
        created(){
            this.getUser()
        },
        methods: {
            async getUser(){
                let url = 'http://127.0.0.1:8000/api/show'
                await axios.get(url, {
                    headers: {
                        Authorization: `Bearer ${localStorage.getItem('jwt')}`
                    }
                }).then(response => {
                    this.user = response.data.user
                    console.log(this.user)
                }).catch(error => {
                    console.log(error)
                })
            },
        },
        mounted(){
            console.log('User List Mounted...')
        }
    }
</script>
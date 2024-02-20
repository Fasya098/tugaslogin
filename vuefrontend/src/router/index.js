import Vue from 'vue'
import Router from 'vue-router'
import HelloWorld from '@/components/HelloWorld'
import Register from '@/components/Register'
import Login from '@/components/Login'
import ListUser from '@/components/ListUser'
import EditUser from '@/components/EditUser'
import AdminPage from '@/components/AdminPage'
import UserPage from '@/components/UserPage'
import TambahUser from '@/components/TambahUser'
Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'HelloWorld',
      component: HelloWorld
    },
    {
      path: '/register',
      name: 'Register',
      component: Register
    },
    {
      path: '/login',
      name: 'Login',
      component: Login
    },
    {
      path: '/listuser',
      name: 'ListUser',
      component: ListUser
    },
    {
      path: '/edituser',
      name: 'EditUser',
      component: EditUser
    },
    {
      path: '/Admin',
      name: 'AdminPage',
      component: AdminPage
    },
    {
      path: '/user',
      name: 'UserPage',
      component: UserPage
    },
    {
      path: '/tambahuser',
      name: 'TambahUser',
      component: TambahUser
    }
  ]
})
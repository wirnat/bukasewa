import Vue from 'vue'
import VueRouter from 'vue-router'
import K_Akun from '../components/KelolaAkun.vue'
import Login from '../views/Login.vue'
import Admin from '../views/Admin.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/admin',
    name: 'Admin Panel',
    meta:'Admin Panel',
    component: Admin,
    children:[
      {
        path: '/admin/detail/vendor/:id',
        name: 'detail vendor',
        meta:'Detail vendor',
        component: () => import('../components/DetailVendor.vue')
      },
      {
        path:'/admin/kelola/akun',
        name: 'Kelola Akun',
        meta:'Kelola Akun',
        component: K_Akun
      },
      {
        path: '*',
        name: 'coming soon',
        meta:'Comingsoon',
      },
      {
        path: '/about',
        name: 'about',
        meta:'tentang sistem',
        // route level code-splitting
        // this generates a separate chunk (about.[hash].js) for this route
        // which is lazy-loaded when the route is visited.
        component: () => import(/* webpackChunkName: "about" */ '../views/About.vue')
      }
    ]
  },
  {
    path: '/auth/login',
    name: 'login',
    meta:'Login',
    component: Login
  },
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router

import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import K_Akun from '../components/KelolaAkun.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'home',
    meta:'Dashboard',
    component: Home
  },
  {
    path: '/detail/vendor/:name',
    name: 'detail vendor',
    meta:'Detail vendor',
    component: () => import('../components/DetailVendor.vue')
  },
  {
    path: '*',
    name: 'coming soon',
    meta:'Comingsoon',
  },
  {
    path:'/kelola/akun',
    name: 'Kelola Akun',
    meta:'Kelola Akun',
    component: K_Akun
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

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router

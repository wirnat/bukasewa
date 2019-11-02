<template>
  <v-app id="inspire">
    <v-navigation-drawer
      v-model="drawer"
      app
    >
      <v-list v-for="link in links" :key="link.text" dense>
        <v-list-item :to="link.route">
          <v-list-item-action>
            <v-icon>{{link.icon}}</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>{{link.text}}</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>

    <v-app-bar
      app
      dark
    >
      <v-app-bar-nav-icon @click.stop="drawer = !drawer"><v-icon>apps</v-icon></v-app-bar-nav-icon>
      <v-toolbar-title>{{this.$route.meta}}</v-toolbar-title>
    </v-app-bar>

    <v-content>
      
      <v-container>
        <transition name="slide">
                <router-view></router-view>
        </transition>
      </v-container>
    </v-content>
    <v-footer
    dark
      app
    >
      <span>&copy; 2019 - Bukasewa.com - Versi 1.0.0</span>
    </v-footer>
  </v-app>
</template>

<script>
  export default {
    props: {
      source: String
    },
    data: () => ({
      drawer: false,
      links:[
        {icon:'dashboard',text:'Dashboard',route:'/admin/dashboard'},
        {icon:'person',text:'Kelola Vendor/Agent',route:'/admin/kelola/akun'},
        {icon:'home_work',text:'Kelola Iklan',route:'/admin/kelola/iklan'}
      ]
    }),
    methods: {
      
    },
  }
</script>
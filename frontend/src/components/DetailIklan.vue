<template>
  <v-card>
        <v-toolbar dark>
        <v-btn icon dark >
            <v-icon @click="closedialog()">close</v-icon>
        </v-btn>
        <v-toolbar-title>{{detail_iklan.properti}}</v-toolbar-title>
        <v-spacer></v-spacer>
        <v-toolbar-items>
            <v-btn dark text >Save</v-btn>
        </v-toolbar-items>
        </v-toolbar>
        <v-list three-line subheader>
        <v-subheader>User Controls</v-subheader>
        </v-list>
    </v-card>
</template>

<script>
import axios from 'axios'
export default {
    data:()=>({
        detail_iklan:[],
    }),
    props:['properti'],
    methods:{
        closedialog(){
            this.$emit('mydialog', false);
            console.log("close")
        }
    },
    created(){
        axios.post("/api/iklan/detail",{ id:this.properti})
        .then(res => {
            console.log(res)
            this.detail_iklan=res.data
        })
        .catch(err => {
            console.error(err); 
        })
    }
}
</script>

<style>

</style>
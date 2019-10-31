<template>
  <v-container class="my-5">
    <v-row>
      <v-col cols="8" sm="9" md="9">
        <h3 class="title-card">Daftar Iklan</h3>
        <v-card flat v-for="ixlan in iklan" :key="ixlan.id_properti">
          <v-layout row wrap :class="`pa-3 iklan ${ixlan.aktif}`">
            <v-flex xs12 md4>
              <div class="caption grey--text">Iklan</div>
              <div>{{ ixlan.properti }}</div>
            </v-flex>
            <v-flex xs6 sm4 md2>
              <div class="caption grey--text">Kategori</div>
              <div>{{ ixlan.kategori_name }}</div>
            </v-flex>
            <v-flex xs6 sm4 md2>
              <div class="caption grey--text">Provinsi</div>
              <div>{{ ixlan.provinsi_name }}</div>
            </v-flex>
            <v-flex xs2 sm2 md2>
              <div class="right">
                  <switcher @refresh="get_iklan" :status_iklan="ixlan.aktif" :id_iklan="ixlan.id_properti" :nama_iklan="ixlan.properti"></switcher>
              </div>
            </v-flex>
            <v-flex xs2 sm2 md2>
              <template>
                <v-row justify="center">
                  <v-dialog
                    v-model="dialog"
                    fullscreen
                    hide-overlay
                    transition="dialog-bottom-transition"
                  >
                    <template v-slot:activator="{ on }">
                      <v-btn :class="ixlan.aktif+' mt-4'" dark v-on="on" tile outlined>
                        <v-icon left>find_replace</v-icon>Periksa
                      </v-btn>
                    </template>
                    <iklan  :properti="ixlan.id_properti" @mydialog="updatedialog"></iklan>
                  </v-dialog>
                </v-row>
              </template>
            </v-flex>
          </v-layout>
          <v-divider></v-divider>
        </v-card>
      </v-col>
      <v-col cols="4" sm="3" md="3">
        <v-card class="mx-auto" max-width="400">
          <v-img class="white--text align-end" height="200px" :src="'/'+vendor.img">
            <v-card-title v-if="vendor.paket=='0A'" style="padding:0px;opacity:0.8">
              <v-chip class="ma-2" color="grey" text-color="white">{{vendor.nama_paket}}</v-chip>
            </v-card-title>

            <v-card-title v-if="vendor.paket!='0A'" style="padding:0px;opacity:0.8">
              <v-chip class="ma-2" color="orange" text-color="white">
                {{vendor.nama_paket}}
                <v-icon right>star</v-icon>
              </v-chip>
            </v-card-title>
          </v-img>
          <v-card-subtitle style="font-size:12px" class="pb-0">Terdaftar sejak {{vendor.created_at}}</v-card-subtitle>
          <v-card-text style="font-size:12px" class="text--lighten-1">
            <div class="mb-1"><b>Nama:</b> {{vendor.name}}</div>
            <div class="mb-1"><b>Email:</b> {{vendor.email}}</div>
            <div v-if="vendor.phone" class="mb-1"><b>Phone: </b>{{vendor.phone}}</div>
            <v-divider></v-divider>
            <div style="text-align:center" class="mb-1 mt-1"><span style="font-size:12px">{{vendor.alamat}}</span></div>
          </v-card-text>
          <v-card-actions>
            <v-btn color="orange" text>Ubah Paket</v-btn>
            <v-btn color="red" text>Suspend</v-btn>
          </v-card-actions>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<script>
import axios from "axios";
import iklan from "./DetailIklan";
import switcher from "./Switcher";
export default {
  components: {
    iklan,switcher
  },
  props: {
    source: String
  },
  data: () => ({
    vendor: [],
    iklan: [],
    dialog: "",
    notifications: false,
    sound: true,
    widgets: false,
    id_properti: ""
  }),
  created() {
    console.log(this.$route.params.id);

    //get vendor info
    this.get_vendor();

    //get vendor iklan info
    this.get_iklan();
  },
  computed: {},
  methods: {
    updatedialog(status) {
      this.dialog = status;
    },
    get_iklan() {
      axios
        .post("/api/iklan/vendor", { id: this.$route.params.id })
        .then(res => {
          console.log(res);
          this.iklan = res.data;
        })
        .catch(err => {
          console.error(err);
        });
    },
    get_vendor() {
      axios
        .post("/api/detail/vendor/", { id: this.$route.params.id })
        .then(res => {
          console.log(res);
          this.vendor = res.data;
        })
        .catch(err => {
          console.error(err);
        });
    },
  }
};
</script>
<style>
.card_title {
  color: black;
  text-shadow: 1px 1px cornsilk;
}
.title-card {
  color: grey;
  margin-bottom: 10px;
  border-left: 3px solid gold;
  border-spacing: 20px;
  padding-left: 10px;
}
.iklan.aktif {
  border-left: 4px solid #3cd1c2;
}
.iklan.nonaktif {
  border-left: 4px solid tomato;
}
.v-chip.aktif {
  border-left: 4px solid #3cd1c2;
}
.v-chip.nonaktif {
  border-left: 4px solid tomato;
}
.v-btn.aktif {
  color: #3cd1c2;
}
.v-btn.nonaktif {
  color: tomato;
}
</style>
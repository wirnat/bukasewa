<template>
  <v-data-table
    :headers="headers"
    :items="users"
    sort-by="name"
    class="elevation-1"
  >
    <template v-slot:top>
      <v-toolbar flat color="white">
        <v-toolbar-title>Kelola Akun Vendor</v-toolbar-title>
        <v-divider
          class="mx-4"
          inset
          vertical
        ></v-divider>
        <v-spacer></v-spacer>
        <v-dialog v-model="dialog" max-width="500px">
          <v-card>
            <v-card-title>
              <span class="headline">{{ formTitle }}</span>
            </v-card-title>

            <v-card-text>
              <v-container>
                <v-row>
                  <v-col cols="12" sm="6" md="4">
                    <v-text-field v-model="editedItem.name" label="ID"></v-text-field>
                  </v-col>
                  <v-col cols="12" sm="6" md="4">
                    <v-text-field v-model="editedItem.name" label="Nama"></v-text-field>
                  </v-col>
                  <v-col cols="12" sm="6" md="4">
                    <v-text-field v-model="editedItem.calories" label="Email"></v-text-field>
                  </v-col>
                  <v-col cols="12" sm="6" md="4">
                    <v-text-field v-model="editedItem.fat" label="Hp/tlp"></v-text-field>
                  </v-col>
                  <v-col cols="12" sm="6" md="4">
                    <v-text-field v-model="editedItem.carbs" label="Alamat"></v-text-field>
                  </v-col>
                  <v-col cols="12" sm="6" md="4">
                    <v-text-field v-model="editedItem.protein" label="Paket"></v-text-field>
                  </v-col>
                </v-row>
              </v-container>
            </v-card-text>

            <v-card-actions>
              <v-spacer></v-spacer>
              <v-btn color="blue darken-1" text @click="close">Cancel</v-btn>
              <v-btn color="blue darken-1" text @click="save">Save</v-btn>
            </v-card-actions>
          </v-card>
        </v-dialog>
      </v-toolbar>
    </template>

    <!-- aksi -->
    <template v-slot:item.action="{ item }">
        <router-link :to="'/detail/vendor/'+item.name">
            <v-icon
            small
            class="mr-2"
            @click="detail(item)" to=""
        >
            remove_red_eye
        </v-icon>
        </router-link>
      <v-icon
        small
        class="mr-2"
        @click="editItem(item)"
      >
        edit
      </v-icon>
    </template>

    <!-- //gambar per row -->
    <template v-slot:item.img="{item}">
      <v-img v-if="item.img" :src="'/'+item.img" aspect-ratio="1.7" contain></v-img>
    </template>
    
    <template v-slot:no-data>
      <h1>Kosong</h1>
    </template>
    <router-view></router-view>
  </v-data-table>
</template>

<script>
  import axios from 'axios';
  export default {
    data: () => ({
      dialog: false,
      headers: [
        {
          text: 'ID',
          sortable: true,
          value: 'id',
        },
        { text: 'Photo', value: 'img' },
        { text: 'Nama', value: 'name' },
        { text: 'Email', value: 'email' },
        { text: 'Alamat', value: 'alamat' },
        { text: 'Paket', value: 'paket' },
        { text: 'Aksi',
          align: 'center', value: 'action', sortable: false },
      ],
      users: [],
      editedIndex: -1,
      editedItem: {
        name: '',
        calories: 0,
        fat: 0,
        carbs: 0,
        protein: 0,
      },
      defaultItem: {
        name: '',
        calories: 0,
        fat: 0,
        carbs: 0,
        protein: 0,
      },
    }),

    computed: {
      formTitle () {
        return this.editedIndex === -1 ? 'New Item' : 'Edit Item'
      },
    },

    watch: {
      dialog (val) {
        val || this.close()
      },
    },

    created () {
      this.initialize()

      axios.post("/api/user",{tipe:"vendor"})
      .then(res => {
          console.log(res)
          this.users=res.data;
      })
      .catch(err => {
          console.error(err); 
      })

    },

    methods: {
      initialize () {
        this.desserts = [
          
        ]
      },

      detail (item) {
        console.log(item)
      },

      deleteItem (item) {
        const index = this.desserts.indexOf(item)
        confirm('Are you sure you want to delete this item?') && this.desserts.splice(index, 1)
      },

      close () {
        this.dialog = false
        setTimeout(() => {
          this.editedItem = Object.assign({}, this.defaultItem)
          this.editedIndex = -1
        }, 300)
      },

      save () {
        if (this.editedIndex > -1) {
          Object.assign(this.desserts[this.editedIndex], this.editedItem)
        } else {
          this.desserts.push(this.editedItem)
        }
        this.close()
      },
    },
  }
</script>
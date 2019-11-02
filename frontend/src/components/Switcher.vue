<template>
  <div>
      <v-switch
            @click="aksi_status(id_iklan,'aktif')"
            v-if="status_iklan=='nonaktif'"
        ></v-switch>
        <v-switch
            @click="aksi_status(id_iklan,'nonaktif')"
            value
            input-value="aktif"
            v-if="status_iklan=='aktif'"
        ></v-switch>
  </div>
</template>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<script>
import axios from 'axios'
export default {
    props:['id_iklan','nama_iklan','status_iklan'],
    data:()=>({

    }),
    created(){
        console.log("statusiklan:"+this.status_iklan)
    },
    methods:{
        aksi_status(id, status) {
        axios.post("/api/iklan/status/update", {
          id: this.id_iklan,
          status: status
        })
        .then(res => {
          console.log(res);
            this.$emit('refresh');
            this.toast(this.nama_iklan + " berhasil di" + status + "kan", "success");
        })
        .catch(err => {
          console.log(err);
          this.toast(this.nama_iklan + " gagal di" + status + "kan", "error");
        });
    },
    toast(a, b) {
      const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000
      });

      Toast.fire({
        type: b,
        title: a
      });
    }
    }
}
</script>

<style>

</style>
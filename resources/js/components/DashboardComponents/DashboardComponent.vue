<template id="admin-list">
<div class="contentlist">
<div class="flex-container">
      <div class="columns m-t-10">
        <div class="column">
          <h1 class="title">Dashboard</h1>
        </div>
        
      </div>
     
     <div class="columns">
         <div class="column">
             <div class="card " >
                 <div class="card-content dashboardCardPrimary" v-if="roles != 'user'">
                     Jumlah Siswa
                     <p class="center">
                         {{number.user}}
                     </p>
                 </div>
                 <div class="card-content dashboardCardPrimary" v-else>
                     ID Pengguna anda
                     <p class="center">
                         {{number.user}}
                     </p>
                 </div>
             </div>
         </div>
         <div class="column">
             <div class="card">
                 <div class="card-content dashboardCardWarning">
                     Jumlah Post (Draf)
                    <p class="center">
                         {{number.postDraf}}
                     </p>
                 </div>
             </div>
         </div>
         <div class="column">
             <div class="card">
                 <div class="card-content dashboardCardSuccess">
                     Jumlah Post (Publish)
                    <p class="center">
                         {{number.postPublish}}
                     </p>
                 </div>
             </div>
         </div>

     </div>
    
     <div class="columns">
         <div class="column">
             <div class="card">
                 <div class="card-content">
                      <vue-dropzone ref="myVueDropzone" id="dropzone" 
                            @vdropzone-mounted="vmounted" 
                            @vdropzone-success="vsuccess"
                            @vdropzone-success-multiple="vsuccessMuliple" 
                            @vdropzone-file-added="vfileAdded" 
                            @vdropzone-files-added="vfilesAdded" 
                        :options="dropzoneOptions"
                        :duplicateCheck="true">
                        </vue-dropzone>
                 </div>
             </div>
         </div>
     </div>
     <div class="columns">
         <div class="column">
             <div class="card">
                 <div class="card-content">
                     <div class="columns  is-multiline">
                        <div class="column is-one-third" v-for="foto in dataFoto" :key="foto.id">
                            <img :src="'/images/upload/'+foto.filename" class="m-b-20" />
                            <button class="button button-primary is-danger" @click="deletePicture(foto.id)">Hapus Foto </button>
                            <button class="button button-primary is-info" @click="copyToClipboard(foto.filename)">Copy link</button>
                        </div>
                        
                     </div>
                     
                 </div>
             </div>
         </div>
     </div>
</div>
</div>
</template>

<script>
import vue2Dropzone from 'vue2-dropzone'
import 'vue2-dropzone/dist/vue2Dropzone.min.css'
    export default {
        components: {
            vueDropzone: vue2Dropzone,
        },
        mounted(){
            if(localStorage.getItem('roles') != 'user'){
                this.getCount();
            }else{
                this.getCountPost();
            }
        },
        data(){
            return{
                roles: localStorage.getItem('roles'),
                header: localStorage.getItem('token'),
                dropzoneOptions: {
                    url: '/api/images-save',
                    thumbnailWidth: 150,
                    maxFilesize: 2,
                    addRemoveLinks: true,
                    headers: {  Authorization : ''},
                  autoProcessQueue:true,
                },
                dataFoto: [],
                number:{
                    user:0,
                    postDraf:0,
                    postPublish:0
                },
            }
        },
        methods:{
            copyToClipboard: function(val) {
                let temp = document.createElement('textarea');
                temp.value = '/images/upload/'+val;
                document.body.appendChild(temp);
                temp.select();
                try {
                    let success = document.execCommand('copy');
                    let type = (success ? 'success' : 'warning');
                    let msg = (success ? `Copied to Clipboard: ${val}` : "Copy failed, your browser may not support this feature");
                    this.$emit('copied', type, msg, val);
                    this.$toast.open({
                        duration: 5000,
                        message: 'Berhasil di copy',
                        position: 'is-bottom',
                        type: 'is-success'
                    })
                    
                } catch (err) {
                    this.$emit('copy-failed', val);
                    this.$toast.open({
                        duration: 5000,
                        message: 'Coba lagi',
                        position: 'is-bottom',
                        type: 'is-danger'
                    })
                }
               
                document.body.removeChild(temp);
            },
            
            vmounted() {
                 this.getPicture();
            },
            vfileAdded(file){
                this.dropzoneOptions.headers.Authorization = 'Bearer ' + localStorage.getItem('token');
            },
            vfilesAdded(file) {
                this.dropzoneOptions.headers.Authorization = 'Bearer ' + localStorage.getItem('token');
            },
            getPicture(){
               let uri = '/api/images-show';
                axios.get(uri,{
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token')
                    }
                }).then((response) => {
                    this.dataFoto = response.data;
                    
                });
            },
            getCount(){
                let uri = '/api/count';
                axios.get(uri,{
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token')
                    }
                }).then((response) => {
                    this.number = response.data;
                    
                });
            },
            getCountPost(){
                let uri = '/api/countPost/';
                axios.get(uri,{
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token')
                    }
                }).then((response) => {
                    this.number = response.data;
                    
                });
            },
            deletePicture(id){
                 this.$toast.open({
                        duration: 500,
                        message: 'Menghapus',
                        position: 'is-bottom',
                        type: 'is-info',
                        queue: false,
                    })
                let uri = '/api/images-delete/'+id;
                    axios.delete(uri,{
                        headers: {
                            Authorization: 'Bearer ' + localStorage.getItem('token')
                        }
                    }).then((response) => {
                         this.$toast.open({
                            message: 'Berhasil di hapus',
                            position: 'is-bottom',
                            type: 'is-success'
                        })
                        this.getPicture();
                    }).catch(error=>{
                        this.$toast.open({
                            message: 'Silahkan coba lagi',
                            position: 'is-bottom',
                            type: 'is-danger'
                        })
                    });
            },
            vsuccess(file, response) {
                console.log(response);
               this.getPicture();
            },
            vsuccessMuliple(files, response) {
                this.getPicture();
            },
        }
    }
</script>

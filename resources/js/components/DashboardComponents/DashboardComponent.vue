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
             <div class="card">
                 <div class="card-content" v-if="roles != 'user'">
                     Jumlah Siswa
                     <p class="center">
                         {{number.user}}
                     </p>
                 </div>
                 <div class="card-content" v-else>
                     ID Pengguna anda
                     <p class="center">
                         {{number.user}}
                     </p>
                 </div>
             </div>
         </div>
         <div class="column">
             <div class="card">
                 <div class="card-content">
                     Jumlah Post (Draf)
                    <p class="center">
                         {{number.postDraf}}
                     </p>
                 </div>
             </div>
         </div>
         <div class="column">
             <div class="card">
                 <div class="card-content">
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
                            <img :src="'/images/upload/'+foto.filename" />
                            <button class="button button-primary" @click="deletePicture(foto.id)">Hapus Foto </button>
                            <button class="button button-primary" @click="copyToClipboard(foto.filename)">Copy link</button>
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
                    console.log("Copied to Clipboard:", val);
                } catch (err) {
                    this.$emit('copy-failed', val);
                    console.log("Copy failed, your browser may not support this feature.");
                    console.log("Attempted to copy:", val);
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
                let uri = '/api/images-delete/'+id;
                    axios.delete(uri,{
                        headers: {
                            Authorization: 'Bearer ' + localStorage.getItem('token')
                        }
                    }).then((response) => {
                        this.getPicture();
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

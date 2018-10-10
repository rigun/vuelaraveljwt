<template id="admin-list">
<div class="contentlist">
<div class="flex-container m-b-35">
      <div class="columns m-t-10">
        <div class="column">
          <h1 class="title">Dashboard</h1>
        </div>
        
      </div>
     
     <div class="columns">
         <div class="column">
             <div class="card">
                 <div class="card-content">
                     Jumlah Siswa
                     <p class="center">
                         0
                     </p>
                 </div>
             </div>
         </div>
         <div class="column">
             <div class="card">
                 <div class="card-content">
                     Jumlah Post (Draf)
                    <p class="center">
                         0
                     </p>
                 </div>
             </div>
         </div>
         <div class="column">
             <div class="card">
                 <div class="card-content">
                     Jumlah Post (Publish)
                    <p class="center">
                         0
                     </p>
                 </div>
             </div>
         </div>

     </div>
     <div class="columns">
         <div class="column">
             <div class="card">
                 <div class="card-content">

                     <div class="columns">
                        <div class="column is-one-third">
                            <label class="label">
                                Kontak*
                            </label>
                        </div>
                            <label class="label" style="padding: 0.75rem">
                                :
                            </label>
                        <div class="column">
                            <label class="label">
                                082238097626
                            </label>
                        </div>
                    </div>
                     <div class="columns">
                        <div class="column is-one-third">
                            <label class="label">
                                Kontak (opsional)
                            </label>
                        </div>
                            <label class="label" style="padding: 0.75rem">
                                :
                            </label>
                        <div class="column">
                            <label class="label">
                                -
                            </label>
                        </div>
                    </div>
                     <div class="columns">
                        <div class="column is-one-third">
                            <label class="label">
                                Email 
                            </label>
                        </div>
                            <label class="label" style="padding: 0.75rem">
                                :
                            </label>
                        <div class="column">
                            <label class="label">
                                -
                            </label>
                        </div>
                    </div>
            
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
        data(){
            return{
                dropzoneOptions: {
                    url: 'http://127.0.0.1:8000/api/images-save',
                    thumbnailWidth: 150,
                    maxFilesize: 2,
                    addRemoveLinks: true,
                    headers: {
                      Authorization :'Bearer ' + localStorage.getItem('token')
                  },
                  autoProcessQueue:true,
                  accept(file, done) {
                     done();
                    },
                },
                dataFoto: []
            }
        },
        methods:{
            vmounted() {
                dropzoneOptions.headers = {  Authorization :'Bearer ' + localStorage.getItem('token')}

                 this.getPicture();
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
               this.getPicture();
            },
            vsuccessMuliple(files, response) {
                this.getPicture();
            },
        }
    }
</script>

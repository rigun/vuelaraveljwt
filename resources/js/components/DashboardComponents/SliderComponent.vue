<template id="admin-list">
<div class="contentlist">
<div class="flex-container">

      <div class="columns m-t-10">
        <div class="column">
          <h1 class="title">Slider</h1>
        </div>
      </div>
     
     <div class="columns">
         <div class="column">
             <div class="card">
                 <div class="card-content">
                     <div class="columns is-multiline">

                         <div class="column is-one-third" v-if="dataSlider.slider1 == ''">
                              <vue-dropzone ref="myVueDropzone1" id="dropzone1" 
                                        @vdropzone-mounted="vmounted" 
                                        @vdropzone-success="vsuccess"
                                        @vdropzone-success-multiple="vsuccessMuliple"
                                        @vdropzone-file-added="vfileAdded" 
                            @vdropzone-files-added="vfilesAdded"  
                                    :options="dropzoneOptions1"
                                    :duplicateCheck="true">
                                    </vue-dropzone>
                         </div>
                         <div class="column is-one-third" v-else>
                               <img :src="'/images/upload/'+dataSlider.slider1" />
                            <button class="button button-primary" @click="deletePicture(dataFoto.id1,dataSlider.slider1)">Hapus Foto </button>
                         </div>


                         <div class="column is-one-third" v-if="dataSlider.slider2 == ''">
                              <vue-dropzone ref="myVueDropzone2" id="dropzone2" 
                                        @vdropzone-success="vsuccess"
                                        @vdropzone-success-multiple="vsuccessMuliple"
                                        @vdropzone-file-added="vfileAdded" 
                            @vdropzone-files-added="vfilesAdded"  
                                    :options="dropzoneOptions2"
                                    :duplicateCheck="true">
                                    </vue-dropzone>
                         </div>
                         <div class="column is-one-third" v-else>
                               <img :src="'/images/upload/'+dataSlider.slider2" />
                            <button class="button button-primary" @click="deletePicture(dataFoto.id2,dataSlider.slider2)">Hapus Foto </button>
                         </div>


                         <div class="column is-one-third" v-if="dataSlider.slider3 == ''">
                              <vue-dropzone ref="myVueDropzone3" id="dropzone3" 
                                        @vdropzone-success="vsuccess"
                                        @vdropzone-success-multiple="vsuccessMuliple"
                                        @vdropzone-file-added="vfileAdded" 
                            @vdropzone-files-added="vfilesAdded"  
                                    :options="dropzoneOptions3"
                                    :duplicateCheck="true">
                                    </vue-dropzone>
                         </div>
                        <div class="column is-one-third" v-else>
                               <img :src="'/images/upload/'+dataSlider.slider3" />
                            <button class="button button-primary" @click="deletePicture(dataFoto.id3,dataSlider.slider3)">Hapus Foto </button>
                         </div>

                         <div class="column is-one-third" v-if="dataSlider.slider4 == ''">
                              <vue-dropzone ref="myVueDropzone1" id="dropzone4" 
                                        @vdropzone-success="vsuccess"
                                        @vdropzone-success-multiple="vsuccessMuliple"
                                        @vdropzone-file-added="vfileAdded" 
                            @vdropzone-files-added="vfilesAdded"  
                                    :options="dropzoneOptions4"
                                    :duplicateCheck="true">
                                    </vue-dropzone>
                         </div>
                         <div class="column is-one-third" v-else>
                               <img :src="'/images/upload/'+dataSlider.slider4" />
                            <button class="button button-primary" @click="deletePicture(dataFoto.id4,dataSlider.slider4)">Hapus Foto </button>
                         </div>

                         <div class="column is-one-third" v-if="dataSlider.slider5 == ''">
                              <vue-dropzone ref="myVueDropzone2" id="dropzone2" 
                                        @vdropzone-success="vsuccess"
                                        @vdropzone-success-multiple="vsuccessMuliple"
                                        @vdropzone-file-added="vfileAdded" 
                            @vdropzone-files-added="vfilesAdded"  
                                    :options="dropzoneOptions5"
                                    :duplicateCheck="true">
                                    </vue-dropzone>
                         </div>
                        <div class="column is-one-third" v-else>
                               <img :src="'/images/upload/'+dataSlider.slider5" />
                            <button class="button button-primary" @click="deletePicture(dataFoto.id5,dataSlider.slider5)">Hapus Foto </button>
                         </div>

                         <div class="column is-one-third" v-if="dataSlider.slider6 == ''">
                              <vue-dropzone ref="myVueDropzone3" id="dropzone3" 
                                        @vdropzone-success="vsuccess"
                                        @vdropzone-success-multiple="vsuccessMuliple"
                                        @vdropzone-file-added="vfileAdded" 
                            @vdropzone-files-added="vfilesAdded"  
                                    :options="dropzoneOptions6"
                                    :duplicateCheck="true">
                                    </vue-dropzone>
                         </div>
                        <div class="column is-one-third" v-else>
                               <img :src="'/images/upload/'+dataSlider.slider6" />
                            <button class="button button-primary" @click="deletePicture(dataFoto.id6,dataSlider.slider6)">Hapus Foto </button>
                         </div>

                         <div class="column is-one-third" v-if="dataSlider.slider7 == ''">
                              <vue-dropzone ref="myVueDropzone1" id="dropzone1" 
                                        @vdropzone-success="vsuccess"
                                        @vdropzone-success-multiple="vsuccessMuliple"
                                        @vdropzone-file-added="vfileAdded" 
                            @vdropzone-files-added="vfilesAdded"  
                                    :options="dropzoneOptions7"
                                    :duplicateCheck="true">
                                    </vue-dropzone>
                         </div>
                        <div class="column is-one-third" v-else>
                               <img :src="'/images/upload/'+dataSlider.slider7" />
                            <button class="button button-primary" @click="deletePicture(dataFoto.id7,dataSlider.slider7)">Hapus Foto </button>
                         </div>

                         <div class="column is-one-third" v-if="dataSlider.slider8 == ''">
                              <vue-dropzone ref="myVueDropzone2" id="dropzone2" 
                                        @vdropzone-success="vsuccess"
                                        @vdropzone-success-multiple="vsuccessMuliple"
                                        @vdropzone-file-added="vfileAdded" 
                            @vdropzone-files-added="vfilesAdded"  
                                    :options="dropzoneOptions8"
                                    :duplicateCheck="true">
                                    </vue-dropzone>
                         </div>
                         <div class="column is-one-third" v-else>
                               <img :src="'/images/upload/'+dataSlider.slider8" />
                            <button class="button button-primary" @click="deletePicture(dataFoto.id8,dataSlider.slider8)">Hapus Foto </button>
                         </div>

                         <div class="column is-one-third" v-if="dataSlider.slider9 == ''">
                              <vue-dropzone ref="myVueDropzone3" id="dropzone3" 
                                        @vdropzone-success="vsuccess"
                                        @vdropzone-success-multiple="vsuccessMuliple"
                                        @vdropzone-file-added="vfileAdded" 
                            @vdropzone-files-added="vfilesAdded"  
                                    :options="dropzoneOptions9"
                                    :duplicateCheck="true">
                                    </vue-dropzone>
                         </div>
                        <div class="column is-one-third" v-else>
                               <img :src="'/images/upload/'+dataSlider.slider9" />
                            <button class="button button-primary" @click="deletePicture(dataFoto.id9,dataSlider.slider9)">Hapus Foto </button>
                         </div>

                         <div class="column is-one-third" v-if="dataSlider.slider10 == ''">
                              <vue-dropzone ref="myVueDropzone3" id="dropzone3" 
                                        @vdropzone-success="vsuccess"
                                        @vdropzone-success-multiple="vsuccessMuliple"
                                        @vdropzone-file-added="vfileAdded" 
                            @vdropzone-files-added="vfilesAdded"  
                                    :options="dropzoneOptions10"
                                    :duplicateCheck="true">
                                    </vue-dropzone>
                         </div>
                        <div class="column is-one-third" v-else>
                               <img :src="'/images/upload/'+dataSlider.slider10" />
                            <button class="button button-primary" @click="deletePicture(dataFoto.id10,dataSlider.slider10)">Hapus Foto </button>
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
                dropzoneOptions1: {
                    url:'/api/images-save/slider/slider1',
                    thumbnailWidth: 150,
                    maxFilesize: 2,
                    addRemoveLinks: true,
                    headers: {
                      Authorization :'Bearer ' + localStorage.getItem('token')
                  },
                },
                dropzoneOptions2: {
                    url:'/api/images-save/slider/slider2',
                    thumbnailWidth: 150,
                    maxFilesize: 2,
                    addRemoveLinks: true,
                    headers: {
                      Authorization :'Bearer ' + localStorage.getItem('token')
                  },
                },
                dropzoneOptions3: {
                    url:'/api/images-save/slider/slider3',
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
                dropzoneOptions4: {
                    url:'/api/images-save/slider/slider4',
                    thumbnailWidth: 150,
                    maxFilesize: 2,
                    addRemoveLinks: true,
                    headers: {
                      Authorization :'Bearer ' + localStorage.getItem('token')
                  },
                },
                dropzoneOptions5: {
                    url:'/api/images-save/slider/slider5',
                    thumbnailWidth: 150,
                    maxFilesize: 2,
                    addRemoveLinks: true,
                    headers: {
                      Authorization :'Bearer ' + localStorage.getItem('token')
                  },
                },
                dropzoneOptions6: {
                    url:'/api/images-save/slider/slider6',
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
                dropzoneOptions7: {
                    url:'/api/images-save/slider/slider7',
                    thumbnailWidth: 150,
                    maxFilesize: 2,
                    addRemoveLinks: true,
                    headers: {
                      Authorization :'Bearer ' + localStorage.getItem('token')
                  },
                },
                dropzoneOptions8: {
                    url:'/api/images-save/slider/slider8',
                    thumbnailWidth: 150,
                    maxFilesize: 2,
                    addRemoveLinks: true,
                    headers: {
                      Authorization :'Bearer ' + localStorage.getItem('token')
                  },
                },
                dropzoneOptions9: {
                    url:'/api/images-save/slider/slider9',
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
                dropzoneOptions10: {
                    url:'/api/images-save/slider/slider10',
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
                dataFoto: {
                    id1:'',
                    id2:'',
                    id3:'',
                    id4:'',
                    id5:'',
                    id6:'',
                    id7:'',
                    id8:'',
                    id9:'',
                    id10:'',
                },
                dataSlider: {
                    slider1:'',
                    slider2:'',
                    slider3:'',
                    slider4:'',
                    slider5:'',
                    slider6:'',
                    slider7:'',
                    slider8:'',
                    slider9:'',
                    slider10:'',
                },
            }
        },
        created(){
            this.getPicture();
        },
        methods:{
            vmounted(){
                
            },
            vfileAdded(file){
                this.dropzoneOptions1.headers.Authorization = 'Bearer ' + localStorage.getItem('token');
                this.dropzoneOptions2.headers.Authorization = 'Bearer ' + localStorage.getItem('token');
                this.dropzoneOptions3.headers.Authorization = 'Bearer ' + localStorage.getItem('token');
                this.dropzoneOptions4.headers.Authorization = 'Bearer ' + localStorage.getItem('token');
                this.dropzoneOptions5.headers.Authorization = 'Bearer ' + localStorage.getItem('token');
                this.dropzoneOptions6.headers.Authorization = 'Bearer ' + localStorage.getItem('token');
                this.dropzoneOptions7.headers.Authorization = 'Bearer ' + localStorage.getItem('token');
                this.dropzoneOptions8.headers.Authorization = 'Bearer ' + localStorage.getItem('token');
                this.dropzoneOptions9.headers.Authorization = 'Bearer ' + localStorage.getItem('token');
                this.dropzoneOptions10.headers.Authorization = 'Bearer ' + localStorage.getItem('token');
            },
            vfilesAdded(file) {
                this.dropzoneOptions1.headers.Authorization = 'Bearer ' + localStorage.getItem('token');
                this.dropzoneOptions2.headers.Authorization = 'Bearer ' + localStorage.getItem('token');
                this.dropzoneOptions3.headers.Authorization = 'Bearer ' + localStorage.getItem('token');
                this.dropzoneOptions4.headers.Authorization = 'Bearer ' + localStorage.getItem('token');
                this.dropzoneOptions5.headers.Authorization = 'Bearer ' + localStorage.getItem('token');
                this.dropzoneOptions6.headers.Authorization = 'Bearer ' + localStorage.getItem('token');
                this.dropzoneOptions7.headers.Authorization = 'Bearer ' + localStorage.getItem('token');
                this.dropzoneOptions8.headers.Authorization = 'Bearer ' + localStorage.getItem('token');
                this.dropzoneOptions9.headers.Authorization = 'Bearer ' + localStorage.getItem('token');
                this.dropzoneOptions10.headers.Authorization = 'Bearer ' + localStorage.getItem('token');
            },
            getPicture(){
               
               let uri = '/api/images-show/slider/';
                axios.get(uri,{
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token')
                    }
                }).then((response) => {
                    for(var i in response.data){
                        if(response.data[i].resized_name == 'slider1'){
                            this.dataSlider.slider1 = response.data[i].filename
                            this.dataFoto.id1 = response.data[i].id
                        }else if(response.data[i].resized_name == 'slider2'){
                            this.dataSlider.slider2 = response.data[i].filename
                            this.dataFoto.id2 = response.data[i].id
                        }else if(response.data[i].resized_name == 'slider3'){
                            this.dataSlider.slider3 = response.data[i].filename
                            this.dataFoto.id3 = response.data[i].id
                        }else if(response.data[i].resized_name == 'slider4'){
                            this.dataSlider.slider4 = response.data[i].filename
                            this.dataFoto.id4 = response.data[i].id
                        }else if(response.data[i].resized_name == 'slider5'){
                            this.dataSlider.slider5 = response.data[i].filename
                            this.dataFoto.id5 = response.data[i].id
                        }else if(response.data[i].resized_name == 'slider6'){
                            this.dataSlider.slider6 = response.data[i].filename
                            this.dataFoto.id6 = response.data[i].id
                        }else if(response.data[i].resized_name == 'slider7'){
                            this.dataSlider.slider7 = response.data[i].filename
                            this.dataFoto.id7 = response.data[i].id
                        }else if(response.data[i].resized_name == 'slider8'){
                            this.dataSlider.slider8 = response.data[i].filename
                            this.dataFoto.id8 = response.data[i].id
                        }else if(response.data[i].resized_name == 'slider9'){
                            this.dataSlider.slider9 = response.data[i].filename
                            this.dataFoto.id9 = response.data[i].id
                        }else if(response.data[i].resized_name == 'slider10'){
                            this.dataSlider.slider10 = response.data[i].filename
                            this.dataFoto.id10 = response.data[i].id
                        }
                    }
                });
            },
            deletePicture(id,name){
                let uri = '/api/images-delete/'+id;
                    axios.delete(uri,{
                        headers: {
                            Authorization: 'Bearer ' + localStorage.getItem('token')
                        }
                    }).then((response) => {
                        if(name.slice(0,7) == 'slider1'){
                            this.dataSlider.slider1 = '';
                            this.dataFoto.id1 = '';
                        }else if(name.slice(0,7) == 'slider2'){
                            this.dataSlider.slider2 = '';
                            this.dataFoto.id2 = '';
                        }else if(name.slice(0,7) == 'slider3'){
                            this.dataSlider.slider3 = '';
                            this.dataFoto.id3 = '';
                        }else if(name.slice(0,7) == 'slider4'){
                            this.dataSlider.slider4 = '';
                            this.dataFoto.id4 ='';
                        }else if(name.slice(0,7) == 'slider5'){
                            this.dataSlider.slider5 ='';
                            this.dataFoto.id5 = '';
                        }else if(name.slice(0,7) == 'slider6'){
                            this.dataSlider.slider6 ='';
                            this.dataFoto.id6 = '';
                        }else if(name.slice(0,7) == 'slider7'){
                            this.dataSlider.slider7 ='';
                            this.dataFoto.id7 ='';
                        }else if(name.slice(0,7) == 'slider8'){
                            this.dataSlider.slider8 = '';
                            this.dataFoto.id8 = '';
                        }else if(name.slice(0,7) == 'slider9'){
                            this.dataSlider.slider9 = '';
                            this.dataFoto.id9 = '';
                        }else if(name.slice(0,8) == 'slider10'){
                            this.dataSlider.slider10 = '';
                            this.dataFoto.id10 = '';
                        }
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
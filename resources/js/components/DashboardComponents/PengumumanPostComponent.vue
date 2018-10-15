<template id="admin-list">
<div class="contentlist">
    <div class="flex-container ">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">Pengumuman</h1>
            </div>
        </div>
           
<form v-on:submit.prevent ="createPost()">
        <div class="columns m-t-10">
            <div class="column">
                <div class="card p-b-20">
                    <div class="card-content">
                     
                        <div class="field">
                            <label class="label">
                                Judul
                            </label>
                            <p class="control">
                                <input type="text" class="input" v-model="title">
                            </p>
                            <p class="control">
                                <slug-widget url="/" subdirectory="blog" :title="title" @copied="slugCopied" @slug-changed="updateSlug"></slug-widget>
                                <input type="hidden" v-model="slug" name="slug" />
                            </p>
                        </div>

                        <div class="field">
                            <label class="label">
                                Post
                            </label>
                            <p class="control">
                                <editor v-model="content" :init="{plugins: 'image imagetools', height: '500'}"></editor>
                            </p>
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="column is-one-quarter-desktop is-narrow-tablet">
                <div class="card">
                     <div class="card-content">
                    <div class="columns">
                            
                            <div class="column" v-if="picture == ''">
                              <vue-dropzone ref="myVueDropzone" id="dropzone" 
                                        @vdropzone-success="vsuccess"
                                        @vdropzone-file-added="vfileAdded" 
                                    :options="dropzoneOptions"
                                    :duplicateCheck="true">
                                    </vue-dropzone>
                            </div>
                            <div class="column" v-else>
                                <img :src="'/images/upload/'+picture" />
                                <button class="button button-primary" @click="deletePicture()">Hapus Foto </button>
                            </div>

                        </div>

                    </div>
                    <div class="card-content">

                        <div class="columns">
                            <div class="column is-one-fifth" style="align-self:center">
                               <i class="fa fa-archive" style="padding:0px;font-size: 21px;"></i>
                            </div>
                            <div class="column " v-if="$route.params.detail == 'update'">
                                 <strong>Draft</strong> Tersimpan
                                 <p>dibuat pada tanggal </p>
                                 <p>{{created_at}}</p>
                            </div>
                            <div class="column " v-if="$route.params.detail == 'create'">
                                 <strong>Draft</strong> Belum Tersimpan
                            </div>
                        </div>
                    </div>
                        <hr style="margin:0px;">
                    <div class="card-content">
                    <div class="columns">
                            <div class="column" v-if="$route.params.detail == 'create'" >
                                 <button type="submit" class="button is-fullwidth"  > Draft</button>
                            </div>
                            <div class="column" v-else>
                                <button type="submit" class="button is-success is-fullwidth" > Publish</button>
                            </div>
                        </div>

                    </div>

                </div>
            </div> <!-- end of .column.is-one-quarter -->

        </div>
</form>

    </div>
<!-- <editor api-key="7qnvjsuap7tf4yk5t9v56511ndqs11rpv1autp3kye0xydzd " :init="{plugins: 'wordcount'}"></editor> -->
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
                    url:'/api/images-save/post',
                    thumbnailWidth: 150,
                    maxFilesize: 2,
                    addRemoveLinks: true,
                    headers: {
                      Authorization :'Bearer ' + localStorage.getItem('token')
                  },
                },
                content:'',
                title: '',
                slug: '',
                created_at: '',
                id:'',
                 picture: '',
                picture_id: ''
            }
        },
        watch: {
            '$route' (to, from) {

                if (from.params.kategori !== to.params.kategori) {
                     this.content = '';
                    this.title = '';
                    this.slug = '';
                    this.created_at = '';
                    this.id = '';
                    this.picture = '';
                    this.picture_id = ''
                    return this.getPost();

                }
            }
        },
        created: function() {
            if(this.$route.params.detail == 'update'){
                this.getPost();
            }
        },
         methods: {
              vfileAdded(file){
                this.dropzoneOptions.headers.Authorization = 'Bearer ' + localStorage.getItem('token');
            },
            vsuccess(file, response) {
                this.picture_id = response.picture.id;
               this.getPicture();
            },
            updateSlug: function(val) {
             this.slug = val;
            },
            slugCopied: function(type, msg, val) {
                notifications.toast(msg, {type: `is-${type}`});
            },
            getPost(){
                let uri = '/api/importantpost/detail/'+this.$route.params.id+'/Pengumuman';
                axios.get(uri,{
                  headers: {
                      Authorization: 'Bearer ' + localStorage.getItem('token')
                  }
              }).then((response) => {
                    
                    this.id = response.data.post.id;
                    this.content = response.data.post.content;
                    this.title = response.data.post.title;
                    this.slug = response.data.post.slug;
                    this.created_at = response.data.post.created_at;
                    this.picture = response.data.picture.filename;
                    this.picture_id = response.data.picture.id;
                });
            },
            createPost(){
                if(this.$route.params.detail == 'update'){
                    var uri = '/api/importantpost/update/'+this.$route.params.id;
                }else{
                    var uri = '/api/importantpost/create/Pengumuman';
                }
              axios.post(uri, {content: this.content, slug: this.slug, title: this.title,picture_id: this.picture_id},{
                  headers: {
                      Authorization: 'Bearer ' + localStorage.getItem('token')
                  }
              }).then((response) => {
                  alert('sukses');
                  this.$router.push({ name: 'PengumumanList' });
                // this.getPost();
              }).catch(error => {
                // this.getPost();
                });
            },
            getPicture(){
               let uri = '/api/images-detail/'+this.picture_id;
                axios.get(uri,{
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token')
                    }
                }).then((response) => {
                    console.log(response);
                    this.picture = response.data.filename;
                });
            },
            deletePicture(){
                let uri = '/api/images-delete/'+this.picture_id;
                    axios.delete(uri,{
                        headers: {
                            Authorization: 'Bearer ' + localStorage.getItem('token')
                        }
                    }).then((response) => {
                        this.picture_id='';
                        this.picture = '';
                    });
            },
         },
        computed: {
            
        }
    }
</script>

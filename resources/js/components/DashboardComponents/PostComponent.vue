<template id="admin-list">
<div class="contentlist">
    <div class="flex-container ">
        <div class="columns m-t-10">
            <div class="column">
                <h1 class="title">{{$route.params.kategori}}</h1>
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
                            <div class="control">
    
                             
                                <div class="url-wrapper wrapper">
                                <span class="root-url"></span>
                                <span class="subdirectory-url">https://smpn4depok.sch.id/{{$route.params.kategori}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">
                                Post
                            </label>
                            <p class="control">
                                <editor api-key="7qnvjsuap7tf4yk5t9v56511ndqs11rpv1autp3kye0xydzd" v-model="content" :init="{plugins: 'image imagetools table', height: '500',tools: 'inserttable' }"></editor>
                            </p>
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="column is-one-quarter-desktop">
                <div class="card">
                    <div class="card-content">
                    <div class="columns">
                            
                            <div class="column" v-if="picture == null">
                              <vue-dropzone ref="myVueDropzone" id="dropzone" 
                                        @vdropzone-success="vsuccess"
                                        @vdropzone-file-added="vfileAdded" 
                                    :options="dropzoneOptions"
                                    :duplicateCheck="true">
                                    </vue-dropzone>
                            </div>
                            <div class="column" v-else>
                                <img class="m-b-10" :src="'/images/upload/'+picture" />
                                <a class="button is-danger" style="color: white" :class="{'is-loading' : loadPicture}" @click="deletePicture()">Hapus Foto </a>
                            </div>

                        </div>

                    </div>
                    <div class="card-content">

                        <div class="columns">
                            <div class="column is-one-fifth" style="align-self:center">
                               <i class="fa fa-archive" style="padding:0px;font-size: 21px;"></i>
                            </div>
                            <div class="column " v-if="created_at != ''">
                                 <strong>Status</strong> Publish
                                 <p>dibuat pada tanggal </p>
                                 <p>{{created_at}}</p>
                            </div>
                            <div class="column " v-else>
                                 <strong>Status</strong> Belum Dipublish
                            </div>
                        </div>
                    </div>
                        <hr style="margin:0px;">
                    <div class="card-content">
                    <div class="columns">
                            
                            <div class="column">
                                <button type="submit" class="button is-success is-fullwidth" :class="{'is-loading' : load}" @click="updateLoad()" > Publish</button>
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
                slug: this.$route.params.kategori,
                created_at: '',
                id:'',
                picture: null,
                picture_id: '',
                load: false,
                loadPicture:false
            }
        },
        watch: {
            '$route' (to, from) {

                if (from.params.kategori !== to.params.kategori) {
                    this.content = '';
                    this.title = '';
                    this.slug = this.$route.params.kategori;
                    this.created_at = '';
                    this.id = '';
                    this.picture = null;
                    this.picture_id = ''
                    return this.getPost();

                }
            }
        },
        created: function() {
            if(localStorage.getItem('roles') == 'user'){
                this.$router.push({ name: 'DashboardContent' });
            }else{
                    this.getPost();

            }
        },
         methods: {
            updateLoad(){
                this.load = true;
            },
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
                this.load=false;
                let uri = '/api/posts/detail/'+this.$route.params.kategori;
                axios.get(uri,{
                  headers: {
                      Authorization: 'Bearer ' + localStorage.getItem('token')
                  }
              }).then((response) => {
                    if(response.data != []){
                        this.id = response.data.id;
                        this.content = response.data.content;
                        this.title = response.data.title;
                        this.slug = response.data.slug;
                        this.created_at = response.data.created_at;
                        this.picture_id = response.data.picture_id;
                        if(this.picture_id != null){
                            this.getPicture();
                        }
                    }else{
                        // console.log(reponse);
                    }
                });
            },
            createPost(){
                if((this.$route.params.kategori != 'Pengumuman' || this.$route.params.kategori != 'Karya Siswa' || this.$route.params.kategori!='Prestasi') && this.id != ''){
                    var uri = '/api/posts/update/'+this.id;
                }else{
                    var uri = '/api/posts/create';
                }
              axios.post(uri, {content: this.content, slug: this.slug, title: this.title, kategori_name: this.$route.params.kategori, picture_id: this.picture_id},{
                  headers: {
                      Authorization: 'Bearer ' + localStorage.getItem('token')
                  }
              }).then((response) => {
                this.getPost();
                 this.$toast.open({
                    duration: 2000,
                    message: 'Berhasil ditambahkan',
                    position: 'is-bottom',
                    type: 'is-success',
                    queue: false,
                });
              }).catch(error => {
                this.getPost();
                 this.$toast.open({
                    duration: 2000,
                    message: 'Data tidak legkap',
                    position: 'is-bottom',
                    type: 'is-danger',
                    queue: false,
                });
                });
            },
             getPicture(){
               let uri = '/api/images-detail/'+this.picture_id;
                axios.get(uri,{
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token')
                    }
                }).then((response) => {
                    // console.log(response);
                    this.picture = response.data.filename;
                });
            },
            deletePicture(){
                        this.loadPicture = true;

                let uri = '/api/images-delete/'+this.picture_id;
                    axios.delete(uri,{
                        headers: {
                            Authorization: 'Bearer ' + localStorage.getItem('token')
                        }
                    }).then((response) => {
                        this.picture_id='';
                        this.picture = null;
                        this.loadPicture = false;
                        this.$toast.open({
                            duration: 2000,
                            message: 'Berhasil dihapus, silahkan ganti dengan yang baru',
                            position: 'is-bottom',
                            type: 'is-warning',
                            queue: false,
                        });
                    });
            },
         },
        computed: {
            
        }
    }
</script>

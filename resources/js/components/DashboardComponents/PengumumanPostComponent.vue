<template id="admin-list">
<div class="contentlist">
    <div class="flex-container m-b-35">
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
                                <editor v-model="content" :init="{plugins: 'image imagetools'}"></editor>
                            </p>
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="column is-one-quarter-desktop is-narrow-tablet">
                <div class="card">
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
    export default {
       
        data(){
            
            return{
                content:'',
                title: '',
                slug: '',
                created_at: '',
                id:''
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
                    if(response.data[0] != null){
                        this.id = response.data[0].id;
                        this.content = response.data[0].content;
                        this.title = response.data[0].title;
                        this.slug = response.data[0].slug;
                        this.created_at = response.data[0].created_at;
                    }else{
                        // console.log(reponse);
                    }
                });
            },
            createPost(){
                if(this.$route.params.detail == 'update'){
                    var uri = '/api/importantpost/update/'+this.$route.params.id;
                }else{
                    var uri = '/api/importantpost/create/Pengumuman';
                }
              axios.post(uri, {content: this.content, slug: this.slug, title: this.title},{
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
            }
         },
        computed: {
            
        }
    }
</script>

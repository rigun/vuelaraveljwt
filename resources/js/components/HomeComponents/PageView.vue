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
    
                                <div class="icon-wrapper wrapper">
                                    <i :class="icon"></i>
                                </div>
                                <div class="url-wrapper wrapper">
                                <span class="root-url">https://127.0.0.1/blog</span>
                                <span class="subdirectory-url">/{{$route.params.kategori}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">
                                Post
                            </label>
                            <p class="control">
                                <editor api-key="7qnvjsuap7tf4yk5t9v56511ndqs11rpv1autp3kye0xydzd" v-model="content" :init="{plugins: 'image imagetools', height: '500'}"></editor>
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
</div>
</template>

<script>
    export default {
        data(){
            
            return{
                content:'',
                title: '',
                slug: $route.params.kategori,
                created_at: '',
                id:'',
                picture: '',
                picture_id: '',
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
                    this.getPost();
        },
         methods: {
         
            getPost(){
                this.load=false;
                let uri = '/api/posts/detail/'+this.$route.params.kategori;
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
                        this.picture_id = response.data[0].picture_id;
                        if(this.picture_id != null){
                            this.getPicture();
                        }
                    }else{
                        // console.log(reponse);
                    }
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
          
         },
       
    }
</script>

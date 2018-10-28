<template id="admin-list">
    <div id="pageviewContent" class="flex-container " style="margin-bottom: 10px;">
        <div class="columns">
                <div class="column">
                    <div class="card">
                        <div class="card-content">
                            <h1>{{header}}</h1>
                            <h2>{{created_at}}</h2>
                            <img :src="'../images/upload/'+picture" alt="">
                            <div class="bodyContent">
                                <div class="titleContent">
                                    <h1>{{title}}</h1>
                                </div>
                                <div class="Content" v-html="content">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="column is-one-quarter">
                    <div class="card">
                        <div class="card-content">
                            <h3>Pengumuman</h3>
                            <hr>
                            <h3>Prestasi</h3>
                            <hr>
                            <h3>Karya Siswa</h3>
                        </div>
                    </div>
                </div>
        
    </div>
</div>
</template>

<script>
    export default {
        data(){
            
            return{
                content:'<p>Belum ada content</p>',
                title: '',
                slug: '',
                created_at: '',
                id:'',
                picture: '',
                picture_id: '',
                header: ''
            }
        },
        watch: {
            '$route' (to, from) {
                if (from.params.kategori !== to.params.kategori) {
                    this.content = '<p>Belum ada content</p>';
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
                    if(this.$route.params.kategori != null){
                        this.header = this.$route.params.kategori;
                    }else{
                        this.header = null;
                    }
        },
         methods: {
         
            getPost(){
                this.load=false;
                if(this.$route.params.kategori != null){
                    let uri = '/api/posts/detail/'+this.$route.params.kategori;
                }else{
                    let uri = '/api/posts/detail/'+this.$route.params.kategori;
                }
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
                  console.log(this.created_at);

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

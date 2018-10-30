<template id="admin-list">
    <div id="pageviewContent" class="flex-container " style="margin-bottom: 10px;">
        <div class="columns">
                <div class="column">
                    <div class="card">
                        <div class="card-content blogContent">
                            <h3 >{{kategoriContent}}</h3>
                            <h4>{{created_at}}</h4>
                            <img :src="'../images/upload/'+picture" alt="">
                            <div class="bodyContent">
                                <div class="titleContent">
                                    <h1>'{{title}}'</h1>
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
                            <div  v-for="pengumuman in filterPengumuman" :key="pengumuman.id">
                                <hr>
                                 <router-link v-bind:to="{ name: 'PageViewBlog', params: { post: pengumuman.slug }}"><p class="linkButton">{{pengumuman.title}}</p></router-link>
                            </div>
                            <hr>
                            <h3>Prestasi</h3>
                            <div  v-for="pretasi in filterPrestasi" :key="pretasi.id">
                                <hr>
                                 <router-link v-bind:to="{ name: 'PageViewBlog', params: { post: pretasi.slug }}"><p class="linkButton">{{pretasi.title}}</p></router-link>
                            </div>
                            <hr>
                            <h3>Karya Siswa</h3>
                            <div  v-for="karya in filterCreation" :key="karya.id">
                                <hr>
                                 <router-link v-bind:to="{ name: 'PageViewBlog', params: { post: karya.slug }}"><p class="linkButton">{{karya.title}}</p></router-link>
                            </div>
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
                kategoriContent: '',
                dataCreation: [],
                dataPrestasi: [],
                dataPengumuman: [],
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
                    this.picture = null;
                    this.picture_id = '';
                    this.kategoriContent  = '';
                    return this.getPost();
                }else if(from.params.post !== to.params.post){
                    this.content = '<p>Belum ada content</p>';
                    this.title = '';
                    this.slug = '';
                    this.created_at = '';
                    this.id = '';
                    this.picture = null;
                    this.picture_id = '';
                    this.kategoriContent  = '';
                    return this.getPost();
                }
            }
        },
        created: function() {
            this.getPost();
            this.getPrestasi();
            this.getCreation();
            this.getPengumuman();
        },
         methods: {
         
            getPost(){
                this.load=false;
                if(this.$route.params.kategori != null){
                    var uri = '/api/posts/detail/'+this.$route.params.kategori;
                }else{
                    var uri = '/api/blog/'+this.$route.params.post;
                }
                axios.get(uri,{
                  headers: {
                      Authorization: 'Bearer ' + localStorage.getItem('token')
                  }
              }).then((response) => {
                //   console.log(response);
                    if(response.data != [] && response.data != 'not found'){
                        this.id = response.data.id;
                        this.content = response.data.content;
                        this.title = response.data.title;
                        this.slug = response.data.slug;
                        this.created_at = response.data.created_at;
                        this.picture_id = response.data.picture_id;
                        this.kategoriContent = response.data.kategori[0].name;
                        if(this.picture_id != null){
                            this.getPicture();
                        }
                    }else {
                        if(response.data == 'not found'){
                            this.title = '404';
                            this.content = '<p>Tidak di temukan </p>'
                        }
                        // console.log(reponse);
                    }
                }).catch(error => {
                    //   console.log(error);
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
            getCreation(){
                  let uri = '/api/landingPagePost/Karya Siswa';
                  axios.get(uri).then((response) => {
                      this.dataCreation = response.data;
                  }).catch(error => {
                      // console.log(error);
                  });
            },
            getPrestasi(){
                  let uri = '/api/landingPagePost/Prestasi';
                  axios.get(uri).then((response) => {
                      this.dataPrestasi = response.data;
                  }).catch(error => {
                      // console.log(error);
                  });
            },
            getPengumuman(){
                  let uri = '/api/landingPagePost/Pengumuman';
                  axios.get(uri).then((response) => {
                      this.dataPengumuman = response.data;
                  }).catch(error => {
                      // console.log(error);
                  });
            },
          
         },
       computed: {
            

            filterCreation: function(){
                if(this.dataCreation.length) {
                    return this.dataCreation.filter((row, index) => {                         
                            if(index < 3){ 
                                return true};
                    });
                }
            },
            filterPrestasi: function(){
                if(this.dataPrestasi.length) {
                    
                    return this.dataPrestasi.filter((row, index) => {       
                            if(index < 3){ 
                                return true};
                    });
                }
            },
            filterPengumuman: function(){
                if(this.dataPengumuman.length) {
                    
                    return this.dataPengumuman.filter((row, index) => {       
                            if(index < 3){ 
                                return true};
                    });
                }
            }
        }
    }
</script>

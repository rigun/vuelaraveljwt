<template id="admin-list">
<div id="pageviewContent" class="flex-container ">
        
    
             <div class="columns is-multiline">
                    <div class="column is-one-third"  v-for="content in filterData" :key="content.id">
                        <div class="card postlandingpage">
                            <div class="card-content">
                            <div class="imgPost">
                                <img :src="'/images/upload/'+content.foto.filename">
                            </div>
                                <br/>
                                <h1>{{ content.title }}</h1>
                                <span v-if="$route.params.kategori == 'Karya Siswa'">{{ content.user.name }}</span><br v-if="$route.params.kategori == 'Karya Siswa'"/>
                                <span>{{ content.published_at }}</span><br/>
                                <div class="contentPost"> {{getPostBody(content.content)}} </div>
                                <router-link v-bind:to="{ name: 'PageViewBlog', params: { post: content.slug }}"><p>Selengkapnya</p></router-link>
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
                data: []
            }
        },
        watch: {
            '$route' (to, from) {
                if (from.params.kategori !== to.params.kategori) {
                    return this.getPost();
                }
            }
        },
        created: function() {
                    this.getPost();
        },
         methods: {
            getPost(){
                  let uri = '/api/importantpost/'+this.$route.params.kategori;
                  axios.get(uri).then((response) => {
                      this.data = response.data;
                  }).catch(error => {
                      // console.log(error);
                  });
            },
              getPostBody (post) {
            let body = this.stripTags(post);

            return body.length > 200 ? body.substring(0, 200) + '...' : body;           
            },

            stripTags (text) {
                return text.replace(/(<([^>]+)>)/ig, '');
            }
         },
         computed: {
            filterData: function(){
                if(this.data.length) {
                    return this.data.filter((row, index) => {                         
                            if(row.status != 0) return true;
                    });
                }
            }
        }
       
    }
</script>

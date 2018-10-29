<template id="students-list">
<div class="contentlist">
<div class="flex-container">
      <div class="columns m-t-10">
        <div class="column">
          <h1 class="title">File Upload Pengumuman</h1>
        </div>
        <div class="column">
        <div class="uploadbutton">
              <input class="inputFile is-pulled-right" type="file" name="file" ref="file" v-on:change="handleFileUpload()" style="z-index: 100;right: 21px;height: 35px;"/>
              <button class="button is-success is-pulled-right" :class="{'is-loading' : load}" style=" width: 144px; z-index: 0"><i class="fa fa-user-plus m-r-10"></i> Upload File</button>
        </div>
        </div>
      </div>
      <div class="columns m-t-10">
        <div class="column">
            <div class="field has-addons">
                <p class="control">
                    <input class="input" type="text"  v-model="search"  placeholder="Cari Judul. . ">
                </p>
                <p class="control">
                    <a class="button is-static">
                    <i class="fa fa-search"></i>
                    </a>
                </p>
            </div>
        
        </div>
        
       
        
      </div>

      <div class="card p-b-20">
        <div class="card-content">
          <table class="table is-hoverable is-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama File</th>
                <th>Pemilik</th>
                <th>Url</th>
                <th>Pengaturan</th>
              </tr>
            </thead>

            <tbody>
                  
                <tr v-for="(row, index) in filterFile" :key="row.id">
                  <th>{{ index + 1 + start }}</th>
                  <td>{{ row.original_name }}</td>
                  <td>{{ row.user.name }}</td>
                  <td>http://127.0.0.1/file/{{ row.filename }}</td>
                  <td >
                      <a class="button is-success m-r-5" v-if="row.status == 1" @click="updateStatus(row)" >Show</a>
                      <a class="button is-warning m-r-5" v-if="row.status == 0" @click="updateStatus(row)" >Hide</a>
                      <a class="button is-danger" href="#"  v-on:click.prevent="modalDelete();setIdDelete(row)">Hapus</a></td>
                </tr>
            
            </tbody>
          </table>
          <div class="footer-table-pagination">
            <vue-ads-pagination v-if="count!=0"
                :page="0"
                :itemsPerPage="100"
                :total-items="count"
                :max-visible-pages="3"
                @page-change="pageChange"
            />
        </div>  
        </div>
       
      </div> <!-- end of .card -->
         
    </div>
    
    
    <div  class="modal" v-bind:class="{ 'is-active' : activeDelete }">
      <div class="modal-background" v-on:click="modalDelete()" ></div>
      
        <div class="modal-card">
          <header class="modal-card-head">
            <p class="modal-card-title">Hapus File</p>
            <button class="delete" aria-label="close" v-on:click="modalDelete()"></button>
          </header>
            <form v-on:submit.prevent ="deleteFile()">

            <section class="modal-card-body">
                <p>File yang dihapus tidak dapat dikembalikan lagi, apakah anda yakin ingin menghapusnya ? </p>
          </section>
          <footer class="modal-card-foot">
            <button class="button is-warning" :class="{'is-loading' : load}" @click="updateLoad()">Hapus File</button>
            <a class="button is-danger" v-on:click="modalDelete()" >Cancel</a>
          </footer>
          </form>

      </div>
    </div>


</div>
    
</template>
<style>
.table td, .table th{
    vertical-align:middle;
}    
</style>
<script>
import VueAdsPagination from 'vue-ads-pagination';

    export default {
      components: {
          VueAdsPagination,
      },
        data(){
            return{
              roles: localStorage.getItem('roles'),
                search: '',
                activeDelete:false,
                id:'',
                dataFile: [],
                 page: 0,
                start: 0,
                end: 0,
                count: 0,
                load: false,

            }
        },
        created: function() {
            this.getFile();
        },
         methods: {
           updateStatus(row){
             var stat = 0;
             if(row.status == 0){
               stat = 1;
             }else if(row.status == 1){
               stat = 0;
             }
             axios.put( '/api/file/'+row.id,
                  {status : stat},
                  {
                    headers: {
                          Authorization: 'Bearer ' + localStorage.getItem('token')
                    }
                  }
                ).then((response) => {
                  console.log('SUCCESS!!');
                  this.getFile();
                })
                .catch(error =>{
                  console.log('FAILURE!!');
                  this.getFile();
                });

           },
           pageChange(page, start, end) {
              this.page = page;
              this.start = start;
              this.end = end;
          },
          updateLoad(){
            this.load = true;
          },
            getFile(){
               this.load = false;
                var uri = '/api/file';
                  axios.get(uri).then((response) => {
                console.log(response.data);
                      this.dataFile = response.data;
                      this.count = this.dataFile.length;
                this.filterFile= this.dataFile;

                  }).catch(error => {
                      // console.log(error);
                  });
            },
            
            modalDelete(){
              if(this.activeDelete == true){
                this.activeDelete = false;
              }else if(this.activeDelete == false){
                this.activeDelete = true;
              }else{
                alert("error");
              }
            },
            setIdDelete(data){
              this.id = data.id;
            },
            deleteFile(){
              let uri = '/api/file/'+this.id;
              axios.delete(uri,{
                  headers: {
                      Authorization: 'Bearer ' + localStorage.getItem('token')
                  }
              }).then((response) => {
                this.activeDelete = false;
                this.id = '';
                this.getFile();
                    this.$toast.open({
                  duration: 2000,
                  message: 'Berhasil di hapus',
                  position: 'is-bottom',
                  type: 'is-success',
                  queue: false,
              })
              }).catch(error => {
                this.activeDelete = false;
                this.id = '';
                this.getFile();
                  this.$toast.open({
                  duration: 2000,
                  message: 'Coba lagi',
                  position: 'is-bottom',
                  type: 'is-danger',
                  queue: false,
              })
                });
            },
            handleFileUpload(){
             this.load = true;
              let formData = new FormData();
              formData.append('file',  this.$refs.file.files[0]);
              axios.post( '/api/file',
                  formData,
                  {
                    headers: {
                        'Content-Type': 'multipart/form-data',
                          Authorization: 'Bearer ' + localStorage.getItem('token')
                    }
                  }
                ).then((response) => {
                  console.log('SUCCESS!!');
                  this.getFile();
                })
                .catch(error =>{
                  console.log('FAILURE!!');
                  this.getFile();
                });

            },
         },
        computed: {
            filterFile:{
              get(){
                  return this.dataFile.filter((row, index) => {
                            if(this.search != '') return row.title.toLowerCase().includes(this.search.toLowerCase());
                              if(index >= this.start && index < this.end) return true;
                          });
              },
              set(file){
                this.dataFile = file;

              }
                
            }
        }
    }
</script>


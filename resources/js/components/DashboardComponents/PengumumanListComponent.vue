<template >
<div id="students-list" class="contentlist">
<div class="flex-container ">
      <div class="columns m-t-10">
        <div class="column">
          <h1 class="title">Pengumuman</h1>
        </div>
        <div class="column">
          <router-link v-bind:to="{ name: 'PengumumanPost', params: { detail: 'create', id:'new' }}" class="button is-primary is-pulled-right"><i class="fa fa-user-plus m-r-10"></i> Tambahkan Pengumuman</router-link>
        </div>
      </div>
      <div class="columns m-t-10">
        <div class="column">
            <div class="field has-addons">
                <p class="control">
                    <input class="input"  v-model="search"  type="text" placeholder="Cari Judul. . ">
                </p>
                <p class="control">
                    <a class="button is-static">
                    <i class="fa fa-search"></i>
                    </a>
                </p>
            </div>
        </div>
        
        <div class="column">
            <div class="field is-horizontal is-pulled-right">
              <div class="field-label is-normal">
                <label class="label">Filter</label>
              </div>
              <div class="field-body">
                <div class="field is-narrow">
                  <div class="control">
                    <div class="select is-fullwidth">
                      <select  v-model="filter">
                        <option>Semua</option>
                        <option>Draft</option>
                        <option>Publish</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>

      </div>

      <div class="card p-b-20">
        <div class="card-content">
          <table class="table is-hoverable is-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Url</th>
                <th>Tanggal Pembuatan</th>
                <th>Status</th>
                <th>Pengaturan</th>
              </tr>
            </thead>

            <tbody>
                  
                <tr v-for="(karya, index) in filterCreation" :key="karya.id">
                  <th>{{ index + 1 + start }}</th>
                  <td>{{ karya.title }}</td>
                  <td>{{ karya.user.name }}</td>
                  <td>https://smpn4depok.sch.id/blog/{{ karya.slug }}</td>
                  <td>{{ karya.created_at }}</td>
                  <td><span v-if="karya.status == 1">Publish</span><span v-if="karya.status == 0">Draft</span></td>
                  <td>
                      <router-link v-bind:to="{name: 'PengumumanPost', params: {detail: 'update', id:karya.id}}"  class="button is-primary m-r-5"  >Detail</router-link>
                      <a class="button is-danger" href="#" v-on:click.prevent="modalDelete();setIdDelete(karya)">Hapus</a></td>
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
            <p class="modal-card-title">Hapus Data Siswa</p>
            <button class="delete" aria-label="close" v-on:click="modalDelete()"></button>
          </header>
            <form v-on:submit.prevent ="deleteCreation()">

            <section class="modal-card-body">
                <p>Data Pengumuman yang dihapus tidak dapat dikembalikan lagi, apakah anda yakin ingin menghapusnya ? </p>
          </section>
          <footer class="modal-card-foot">
            <button class="button is-warning" :class="{'is-loading' : load}" @click="updateLoad()">Hapus Data</button>
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
                search: '',
                active: false,
                activeDelete:false,
                id:'',
                dataCreation:{
                  id:'',
                  slug: '',
                  author_id: '',
                  content: '',
                  title: '',
                  status: '',
                  user: [{name: ''}],
                  created_at: '',
                  },
                dataCreationNull:{
                  id:'',
                  slug: '',
                  author_id: '',
                  content: '',
                  title: '',
                  status: '',
                  user: [{name: ''}],
                  created_at: '',
                  },
                karyas:[],
                year:'',
                page: 0,
                start: 0,
                end: 0,
                count: 0,
                filter: 'Semua',
                load: false,

            }
        },
        created: function() {
          if(localStorage.getItem('roles') == 'user'){
                  this.$router.push({ name: 'DashboardContent' });
          }else{
            this.getCreation();
          }
        },
         methods: {
           updateLoad(){
            this.load = true;
          },
          pageChange(page, start, end) {
              this.page = page;
              this.start = start;
              this.end = end;
          },
            getCreation(){
              this.load = false;
                  let uri = '/api/importantpost/Pengumuman';
                  axios.get(uri,{
                  headers: {
                      Authorization: 'Bearer ' + localStorage.getItem('token')
                  }
              }).then((response) => {
                      this.dataCreation = response.data;
                      this.count = this.dataCreation.length;

                  }).catch(error => {
                      // console.log(error);
                  });
            },
            modalCreate: function(event){
              if(this.active == true){
                this.active = false;
              }else if(this.active == false){
                this.active = true;
              }else{
                alert("error");
              }
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
            deleteCreation(){
              let uri = '/api/importantpost/delete/'+this.id;
              axios.delete(uri,{
                  headers: {
                      Authorization: 'Bearer ' + localStorage.getItem('token')
                  }
              }).then((response) => {
                this.activeDelete = false;
                this.id = '';
                this.getCreation();
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
                this.getCreation();
                this.$toast.open({
                  duration: 2000,
                  message: 'Coba lagi',
                  position: 'is-bottom',
                  type: 'is-danger',
                  queue: false,
              })
                });
            }
         },
        computed: {
            filterCreation: function(){
                if(this.dataCreation.length) {
                    return this.dataCreation.filter((row, index) => {
                            if(this.search != '') return row.title.toLowerCase().includes(this.search.toLowerCase());                            
                
                            if(this.filter != 'Semua'){
                                  if(this.filter == 'Publish'){
                                    if(row.status == 1) return true;
                                  }else if(this.filter == 'Draft'){
                                    if(row.status == 0) return true;
                                  }
                                }else{
                                  if(index >= this.start && index < this.end) return true;
                                }      
                      });
                }
            }
        }
    }
</script>


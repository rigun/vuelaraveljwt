<template id="students-list">
<div class="contentlist">
<div class="flex-container ">
      <div class="columns m-t-10">
        <div class="column">
          <h1 class="title">Manage Siswa</h1>
        </div>
        <div class="column" style="height: 60px;">
          <button class="button is-success is-pulled-right" v-on:click="modalCreate"><i class="fa fa-user-plus m-r-10"></i> Tambahkan Data Siswa</button>
      <div class="uploadbutton">
            <input class="inputFile" type="file" name="file" ref="file" v-on:change="handleFileUpload()" style="z-index: 100"/>
            <button class="button is-success is-pulled-right" :class="{'is-loading' : load}" style=" width: 144px; z-index: 0"><i class="fa fa-user-plus m-r-10"></i> Upload Excel</button>
      </div>
          
        </div>
      </div>
      <div class="columns m-t-10">
        <div class="column">
            <div class="field has-addons">
                <p class="control">
                    <input class="input" type="text"  v-model="search" placeholder="Cari Nama. . ">
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
                <th>Nama</th>
                <th>Username</th>
                <th>Tanggal Pembuatan</th>
                <th>Pengaturan</th>
              </tr>
            </thead>

            <tbody>
                  
                <tr v-for="(siswa, index) in filterStudent" :key="siswa.id">
                  <th>{{ index + 1 +start }}</th>
                  <td>{{ siswa.name }}</td>
                  <td>{{ siswa.username }}</td>
                  <td>{{ siswa.created_at }}</td>
                  <td>
                      <router-link v-bind:to="{name: 'DetailStudents', params: {id:siswa.id}}"  class="button is-primary m-r-5"  >Detail</router-link>
                      <a class="button is-danger" href="#" v-on:click.prevent="modalDelete();setIdDelete(siswa)">Hapus</a></td>
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

    <div  class="modal" v-bind:class="{ 'is-active' : active }">
      <div class="modal-background" v-on:click="modalCreate" ></div>
        <div class="modal-card">
          <header class="modal-card-head">
            <p class="modal-card-title">Tambahkan Siswa</p>
            <button class="delete" aria-label="close" v-on:click="modalCreate"></button>
          </header>
            <form v-on:submit.prevent ="createStudent()">

            <section class="modal-card-body">
            
            <div class="columns">
              <div class="column">
                <div class="field">
                  <label for="name" class="label">Nama</label>
                  <p class="control">
                    <input type="text" class="input" v-model="dataStudent.name" name="name" id="name" required>
                  </p>
                </div>
                <div class="field">
                  <label for="name" class="label">Username</label>
                  <p class="control">
                    <input type="text" class="input" v-model="dataStudent.username" name="username" id="username" required>
                  </p>
                </div>
                <div class="columns">
                    <div class="column">
                        <div class="field">
                            <label for="name" class="label">Tempat Lahir</label>
                            <p class="control">
                                <input type="text" class="input" v-model="dataStudent.tempat_lahir" name="tempatLahir" id="tempatLahir" required>
                            </p>
                        </div>
                    </div>
                    <div class="column">
                        <div class="field">
                            <label for="name" class="label">Tanggal Lahir</label>
                            <p class="control">
                                <input type="date" class="input" v-model="dataStudent.tanggal_lahir" name="tanggalLahir" id="tanggalLahir" required>
                            </p>
                        </div>
                    </div>
                </div>

                 <div class="field">
                  <label for="name" class="label">Alamat</label>
                  <p class="control">
                    <input type="text" class="input" v-model="dataStudent.alamat" name="alamat" id="alamat" required>
                  </p>
                </div>

                <div class="columns">
                    <div class="column">
                      <label for="name" class="label">Kelas</label>
                        <div class="select is-rounded">
                            <select  v-model="dataStudent.kelas">
                                <option disabled value="" >Kelas</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>(Alumni)</option>
                            </select>
                        </div>
                    </div>
                    <div class="column">
                      <label for="name" class="label">Angkatan</label>
                        <div class="select is-rounded">
                            <select v-model="dataStudent.angkatan">
                                <option disabled value="" >Tahun</option>
                                <option>{{year}}</option>
                                <option>{{year-1}}</option>
                                <option>{{year-2}}</option>
                            </select>
                        </div>
                    </div>
                </div>
              </div> <!-- end of .column -->
            </div> <!-- end of .columns for forms -->       
          </section>
          <footer class="modal-card-foot">
            <button class="button is-success" :class="{'is-loading' : load}" @click="updateLoad()">Buat Student</button>

            <a class="button is-danger" v-on:click="modalCreate" >Cancel</a>
          </footer>
          </form>

      </div>
    </div>
    
    
    <div  class="modal" v-bind:class="{ 'is-active' : activeDelete }">
      <div class="modal-background" v-on:click="modalDelete()" ></div>
      
        <div class="modal-card">
          <header class="modal-card-head">
            <p class="modal-card-title">Hapus Data Siswa</p>
            <button class="delete" aria-label="close" v-on:click="modalDelete()"></button>
          </header>
            <form v-on:submit.prevent ="deleteStudent()">

            <section class="modal-card-body">
                <p>Data siswa yang dihapus tidak dapat dikembalikan lagi, apakah anda yakin ingin menghapusnya ? </p>
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
                dataStudent:{
                  id:'',
                  name:'',
                  username:'',
                  password:'',
                  tanggal_lahir:'',
                  tempat_lahir:'',
                  alamat:'',
                  kelas: '',
                  angkatan: '',
                  password_options: false,
                  roles:3
                  },
                dataStudentNull:{
                  id:'',
                  name:'',
                  username:'',
                  password:'',
                  password_options: false,
                  roles:3
                  },
                siswas:[],
                year:'',
                page: 0,
                start: 0,
                end: 0,
                count: 0,
                load: false,

            }
        },
        mounted: function() {
          if(localStorage.getItem('roles') == 'user'){
                this.$router.push({ name: 'DashboardContent' });
            }else{
            this.getThisYear();
            this.getStudent();

            }
        },
         methods: {
           handleFileUpload(){
             this.load = true;
            let formData = new FormData();
            formData.append('file',  this.$refs.file.files[0]);
            axios.post( '/api/uploadExcel',
                formData,
                {
                  headers: {
                      'Content-Type': 'multipart/form-data',
                        Authorization: 'Bearer ' + localStorage.getItem('token')
                  }
                }
              ).then((response) => {
                // console.log('SUCCESS!!');
                this.getStudent();

              })
              .catch(error =>{
                // console.log('FAILURE!!');
                this.getStudent();
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
            getStudent(){
                this.load = false;

                  let uri = '/api/siswa';
                  axios.get(uri,{
                  headers: {
                      Authorization: 'Bearer ' + localStorage.getItem('token')
                  }
              }).then((response) => {
                      this.siswas = response.data;
                      this.count = this.siswas.length;
                  }).catch(error => {
                      // console.log(error.response)
                  });
            },
            getThisYear(){
                this.year = new Date().getFullYear();
            },
            modalCreate: function(event){
              if(this.active == true){
                this.active = false;
              }else if(this.active == false){
                this.active = true;
              }else{
                this.$toast.open({
                    duration: 2000,
                    message: 'error',
                    position: 'is-bottom',
                    type: 'is-danger',
                    queue: false,
                });
              }
            },
            modalDelete(){
              if(this.activeDelete == true){
                this.activeDelete = false;
              }else if(this.activeDelete == false){
                this.activeDelete = true;
              }else{
                this.$toast.open({
                    duration: 2000,
                    message: 'error',
                    position: 'is-bottom',
                    type: 'is-danger',
                    queue: false,
                });
              }
            },
            setIdDelete(data){
              this.id = data.id;
            },
            createStudent: function() {
              let uri = '/api/siswa/create';
              axios.post(uri, this.dataStudent,{
                  headers: {
                      Authorization: 'Bearer ' + localStorage.getItem('token')
                  }
              }).then((response) => {
                this.active = false;
                this.dataStudent = this.dataStudentNull;
                this.getStudent();
                this.$toast.open({
                    duration: 2000,
                    message: 'Siswa berhasil di tambahkan',
                    position: 'is-bottom',
                    type: 'is-success',
                    queue: false,
                });
              }).catch(error => {
                this.active = false;
                this.dataStudent = this.dataStudentNull;
                this.getStudent();
                this.$toast.open({
                  duration: 2000,
                  message: 'Terjadi Kesalahan, Silahkan coba lagi',
                  position: 'is-bottom',
                  type: 'is-danger',
                  queue: false,
              })
                });
            },
            deleteStudent(){
              let uri = '/api/siswa/delete/'+this.id;
              axios.delete(uri,{
                  headers: {
                      Authorization: 'Bearer ' + localStorage.getItem('token')
                  }
              }).then((response) => {
                this.activeDelete = false;
                this.load = false;
                this.id = '';
                this.getStudent();
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
                this.getStudent();
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
            filterStudent: function(){
                if(this.siswas.length) {
                    return this.siswas.filter((row, index) => {
                            if(this.search != '') return row.name.toLowerCase().includes(this.search.toLowerCase());                                            
                        if(index >= this.start && index < this.end) return true;
                      });
                }
            }
        }
    }
</script>


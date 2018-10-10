<template id="students-list">
<div class="contentlist">
<div class="flex-container m-b-35">
      <div class="columns m-t-10">
        <div class="column">
          <h1 class="title">Manage Siswa</h1>
        </div>
        <div class="column">
          <button class="button is-success is-pulled-right" v-on:click="modalCreate"><i class="fa fa-user-plus m-r-10"></i> Tambahkan Data Siswa</button>
        </div>
      </div>
      <div class="columns m-t-10">
        <div class="column">
            <div class="field has-addons">
                <p class="control">
                    <input class="input" type="text" placeholder="Cari. . ">
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
                <th>Judul</th>
                <th>Penulis</th>
                <th>Tanggal Pembuatan</th>
                <th>Status</th>
                <th>Pengaturan</th>
              </tr>
            </thead>

            <tbody>
                  
                <tr v-for="(karya, index) in filterCreation" :key="karya.id">
                  <th>{{ index + 1 }}</th>
                  <td>{{ karya.name }}</td>
                  <td>{{ karya.username }}</td>
                  <td>{{ karya.created_at }}</td>
                  <td>
                      <router-link v-bind:to="{name: 'DetailCreations', params: {id:karya.id}}"  class="button is-primary m-r-5"  >Detail</router-link>
                      <a class="button is-danger" href="#" v-on:click.prevent="modalDelete();setIdDelete(karya)">Hapus</a></td>
                </tr>
            
            </tbody>
          </table>
          <div class="footer-table-pagination">
            <span class="is-pulled-left">
                
            </span>
            <span class="is-pulled-right">
           
            </span>
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
            <form v-on:submit.prevent ="createCreation()">

            <section class="modal-card-body">
            
            <div class="columns">
              <div class="column">
                <div class="field">
                  <label for="name" class="label">Nama</label>
                  <p class="control">
                    <input type="text" class="input" v-model="dataCreation.name" name="name" id="name" required>
                  </p>
                </div>
                <div class="field">
                  <label for="name" class="label">Username</label>
                  <p class="control">
                    <input type="text" class="input" v-model="dataCreation.username" name="username" id="username" required>
                  </p>
                </div>
                <div class="columns">
                    <div class="column">
                        <div class="field">
                            <label for="name" class="label">Tempat Lahir</label>
                            <p class="control">
                                <input type="text" class="input" v-model="dataCreation.tempat_lahir" name="tempatLahir" id="tempatLahir" required>
                            </p>
                        </div>
                    </div>
                    <div class="column">
                        <div class="field">
                            <label for="name" class="label">Tanggal Lahir</label>
                            <p class="control">
                                <input type="date" class="input" v-model="dataCreation.tanggal_lahir" name="tanggalLahir" id="tanggalLahir" required>
                            </p>
                        </div>
                    </div>
                </div>

                 <div class="field">
                  <label for="name" class="label">Alamat</label>
                  <p class="control">
                    <input type="text" class="input" v-model="dataCreation.alamat" name="alamat" id="alamat" required>
                  </p>
                </div>

                <div class="columns">
                    <div class="column">
                      <label for="name" class="label">Kelas</label>
                        <div class="select is-rounded">
                            <select  v-model="dataCreation.kelas">
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
                            <select v-model="dataCreation.angkatan">
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
            <button class="button is-success">Post Karya</button>

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
            <form v-on:submit.prevent ="deleteCreation()">

            <section class="modal-card-body">
                <p>Data Karya Siswa yang dihapus tidak dapat dikembalikan lagi, apakah anda yakin ingin menghapusnya ? </p>
          </section>
          <footer class="modal-card-foot">
            <button class="button is-warning">Hapus Data</button>
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
    export default {
        data(){
            return{
                active: false,
                activeDelete:false,
                id:'',
                dataCreation:{
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
                dataCreationNull:{
                  id:'',
                  name:'',
                  username:'',
                  password:'',
                  password_options: false,
                  roles:3
                  },
                karyas:[],
                year:'',
            }
        },
        created: function() {
            this.getThisYear();
            this.getCreation();
        },
         methods: {
            getCreation(){
                  let uri = 'http://127.0.0.1:8000/api/karyaSiswa';
                  axios.get(uri,{
                  headers: {
                      Authorization: 'Bearer ' + localStorage.getItem('token')
                  }
              }).then((response) => {
                      this.karyas = response.data.data;
                  }).catch(error => {
                      console.log(error.response)
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
            createCreation: function() {
              let uri = 'http://127.0.0.1:8000/api/karyaSiswa/create';
              axios.post(uri, this.dataCreation,{
                  headers: {
                      Authorization: 'Bearer ' + localStorage.getItem('token')
                  }
              }).then((response) => {
                this.active = false;
                this.dataCreation = this.dataCreationNull;
                this.getCreation();
              }).catch(error => {
                alert("username sudah ada");
                this.active = false;
                this.dataCreation = this.dataCreationNull;
                this.getCreation();
                });
            },
            deleteCreation(){
              let uri = 'http://127.0.0.1:8000/api/karyaSiswa/delete/'+this.id;
              axios.delete(uri,{
                  headers: {
                      Authorization: 'Bearer ' + localStorage.getItem('token')
                  }
              }).then((response) => {
                alert("Data Siswa berhasil dihapus");
                this.activeDelete = false;
                this.id = '';
                this.getCreation();
              }).catch(error => {
                alert("Mohon maaf, terjadi kesalahan, silahkan coba lagi.");
                this.activeDelete = false;
                this.id = '';
                this.getCreation();
                });
            }
         },
        computed: {
            filterCreation: function(){
                if(this.karyas.length) {
                    return this.karyas;
                }
            }
        }
    }
</script>


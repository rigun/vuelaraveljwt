<template>
<div class="contentDetail p-b-20">
    <div class="card m-b-20">
        <div class="card-content">

            <div class="columns">
                <div class="column is-one-fifth">
                    <label class="label">
                        Nama
                    </label>
                </div>
                    <label class="label" style="padding: 0.75rem">
                        :
                    </label>
                <div class="column">
                    <label class="label">
                        {{dataStudent.name}}
                    </label>
                </div>
            </div>
            <div class="columns">
                <div class="column is-one-fifth">
                    <label class="label">
                        Username
                    </label>
                </div>
                    <label class="label" style="padding: 0.75rem">
                        :
                    </label>
                <div class="column">
                    <label class="label">
                        {{dataStudent.username}}
                    </label>
                </div>
                <div class="column">
                      <button class="button is-info is-pulled-right" v-on:click="modalForget()"> Ubah Password</button>
                      <button class="button is-primary is-pulled-right  m-r-10" v-on:click="modalUpdate()"> Perbaharui Data</button>
                   
                </div>
            </div>
        </div>
    </div>
    <div class="tabs is-boxed">
            
    
    </div>
    <div class="columns">
        <div class="column">
            <div class="card">
                <div class="card-content">
                    <div class="column" v-if="dataStudent.detail == null || dataStudent.detail.foto == null" >
                        <vue-dropzone ref="myVueDropzone" id="dropzone" 
                                @vdropzone-success="vsuccess"
                                @vdropzone-file-added="vfileAdded" 
                            :options="dropzoneOptions"
                            :duplicateCheck="true">
                            </vue-dropzone>
                    </div>
                    <div class="column" v-else>
                        <img :src="'/images/upload/'+picture" />
                        <button class="button button-primary" @click="deletePicture()">Hapus Foto </button>
                    </div>
                    

                </div>
            </div>
        </div>
        <div class="column">

            <div class="card">
                <div v-if="dataStudent.detail == null " class="card-content">
                    <div class="field is-horizontal">
                        <div class="field-label">
                            <label class="label is-pulled-left">Tidak ada detail untuk ditampilkan</label>
                        </div>
                    </div> 
                </div>
                <div v-else class="card-content">

            <div class="field is-horizontal">
                <div class="field-label">
                    <label class="label is-pulled-left">Informasi Umum</label>
                </div>
            </div>            
            <hr>
            <div class="columns">
                <div class="column is-one-third">
                    <label class="label">
                        Tempat Lahir
                    </label>
                </div>
                    <label class="label" style="padding: 0.75rem">
                        :
                    </label>
                <div class="column">
                    <label class="label">
                        {{dataStudent.detail.tempat_lahir}}
                    </label>
                </div>
            </div>
            <div class="columns">
                <div class="column is-one-third">
                    <label class="label">
                        Tanggal Lahir
                    </label>
                </div>
                    <label class="label" style="padding: 0.75rem">
                        :
                    </label>
                <div class="column">
                    <label class="label">
                        {{dataStudent.detail.tanggal_lahir}}
                    </label>
                </div>
            </div>
            <div class="columns">
                <div class="column is-one-third">
                    <label class="label">
                       Alamat
                    </label>
                </div>
                    <label class="label" style="padding: 0.75rem">
                        :
                    </label>
                <div class="column">
                    <label class="label">
                        {{dataStudent.detail.alamat}}
                    </label>
                </div>
            </div>


            <div class="field is-horizontal">
                <div class="field-label">
                    <label class="label is-pulled-left">Informasi Sekolah</label>
                </div>
            </div>            
            <hr>
            <div class="columns">
                <div class="column is-one-third">
                    <label class="label">
                        Kelas
                    </label>
                </div>
                    <label class="label" style="padding: 0.75rem">
                        :
                    </label>
                <div class="column">
                    <label class="label">
                        {{dataStudent.detail.kelas}}
                    </label>
                </div>
            </div>
            <div class="columns">
                <div class="column is-one-third">
                    <label class="label">
                        Angkatan
                    </label>
                </div>
                    <label class="label" style="padding: 0.75rem">
                        :
                    </label>
                <div class="column">
                    <label class="label">
                        {{dataStudent.detail.angkatan}}
                    </label>
                </div>
            </div>
             

                </div>
            </div>

        </div>
    </div>


    <div  class="modal" v-bind:class="{ 'is-active' : activeUpdate }">
      <div class="modal-background" v-on:click="modalUpdate()" ></div>
        <div class="modal-card">
          <header class="modal-card-head">
            <p class="modal-card-title">Perbaharui Data Saya</p>
          </header>
            <form v-on:submit.prevent ="updateStudent()">

            <section class="modal-card-body">
            
            <div class="columns">
              <div class="column">
                <div class="field">
                  <label for="name" class="label">Nama</label>
                  <p class="control">
                    <input type="text" class="input" v-model="dataStudent.name" name="name" id="name" readonly>
                  </p>
                </div>
                <div class="field">
                  <label for="name" class="label">Username</label>
                  <p class="control">
                    <input type="text" class="input" v-model="dataStudent.username" name="username" id="username" readonly>
                  </p>
                </div>
                <div class="columns">
                    <div class="column">
                        <div class="field">
                            <label for="name" class="label">Tempat Lahir</label>
                            <p class="control">
                                <input type="text" class="input" v-model="dataStudent.detail.tempat_lahir" name="tempatLahir" id="tempatLahir" required>
                            </p>
                        </div>
                    </div>
                    <div class="column">
                        <div class="field">
                            <label for="name" class="label">Tanggal Lahir</label>
                            <p class="control">
                                <input type="date" class="input" v-model="dataStudent.detail.tanggal_lahir" name="tanggalLahir" id="tanggalLahir" required>
                            </p>
                        </div>
                    </div>
                </div>

                 <div class="field">
                  <label for="name" class="label">Alamat</label>
                  <p class="control">
                    <input type="text" class="input" v-model="dataStudent.detail.alamat" name="alamat" id="alamat" required>
                  </p>
                </div>

                <div class="columns">
                    <div class="column">
                      <label for="name" class="label">Kelas</label>
                        <div class="select is-rounded">
                            <select  v-model="dataStudent.detail.kelas">
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
                            <select v-model="dataStudent.detail.angkatan">
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
            <button class="button is-success">Perbaharui Data</button>

            <a class="button is-danger" v-on:click="modalUpdate()" >Cancel</a>
          </footer>
          </form>

      </div>
    </div>
    
    <div  class="modal" v-bind:class="{ 'is-active' : activeForget }">
      <div class="modal-background" v-on:click="modalForget()" ></div>
        <div class="modal-card">
          <header class="modal-card-head">
            <p class="modal-card-title">Perbaharui Data Saya</p>
          </header>
            <form v-on:submit.prevent ="updateStudentPassword()">

            <section class="modal-card-body">
            
            <div class="columns">
              <div class="column">
                <div class="field">
                  <label for="name" class="label">Password Lama</label>
                  <p class="control">
                    <input type="password" class="input" v-model="dataPassword.password_lama" required>
                  </p>
                </div>
                <div class="field">
                  <label for="name" class="label">Password Baru</label>
                  <p class="control">
                    <input type="password" class="input" v-bind:class="{ 'is-danger' : wrongPassword }" v-model="dataPassword.password_baru" @keyup="cek" required>
                  </p>

                </div>
                <div class="field">
                  <label for="name" class="label">Konfirmasi Password Baru</label>
                  <p class="control">
                    <input type="password" class="input" v-bind:class="{ 'is-danger' : wrongPassword }" v-model="dataPassword.password_konfirmasi" @keyup="cek" required>
                  </p>
                  <label for="name" class="label" v-if="wrongPassword == true"><span style="color:red">Password tidak cocok</span></label>

                </div>
                
              
                
              </div> <!-- end of .column -->
            </div> <!-- end of .columns for forms -->       
          </section>
          <footer class="modal-card-foot">
            <button class="button is-success" :disabled="wrongPassword">Ubah Password</button>

            <a class="button is-danger" v-on:click="modalForget()" >Cancel</a>
          </footer>
          </form>

      </div>
    </div>
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
                    url:'/api/storeProfile',
                    thumbnailWidth: 150,
                    maxFilesize: 2,
                    addRemoveLinks: true,
                    headers: {
                      Authorization :'Bearer ' + localStorage.getItem('token')
                  },
                },
            dataStudent : [],
            siswas:[],
            picture:'',
            picture_id:null,
            error: null,
            activeUpdate: false,
            activeForget: false,
            year:'',
            dataPassword:{
                password_lama:'',
                password_baru:'',
                password_konfirmasi: '',
            },
            wrongPassword: false,
        }
    },
    created: function() {
        if(localStorage.getItem('roles') != 'user'){
                this.$router.push({ name: 'DashboardContent' });
            }else{

        this.getStudent();
        this.getThisYear();
            }
        
    },
    methods:{
        vfileAdded(file){
                this.dropzoneOptions.headers.Authorization = 'Bearer ' + localStorage.getItem('token');
            },
            vsuccess(file, response) {
                this.picture_id = response.picture.id;
               this.getPicture();
            },
        getThisYear(){
            this.year = new Date().getFullYear();
        },
        modalUpdate(){
              if(this.activeUpdate == true){
                this.activeUpdate = false;
              }else if(this.activeUpdate == false){
                this.activeUpdate = true;
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
        modalForget(){
              if(this.activeForget == true){
                this.activeForget = false;
              }else if(this.activeForget == false){
                this.activeForget = true;
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
        cek(){
            if(this.dataPassword.password_baru != '' && this.dataPassword.password_konfirmasi != ''){
                if(this.dataPassword.password_baru != this.dataPassword.password_konfirmasi){
                    this.wrongPassword = true;
                }else{
                    this.wrongPassword = false;
                }
            }
        },
        updateStudent(){
              let uri = '/api/siswa/update/'+this.$route.params.id;
              axios.patch(uri, this.dataStudent,{
                  headers: {
                      Authorization: 'Bearer ' + localStorage.getItem('token')
                  }
              }).then((response) => {
                  this.$toast.open({
                    duration: 2000,
                    message: response.data.msg,
                    position: 'is-bottom',
                    type: 'is-danger',
                    queue: false,
                });
                this.activeUpdate = false;
                this.getStudent();
              }).catch(error => {
                  this.$toast.open({
                    duration: 2000,
                    message: "username sudah ada",
                    position: 'is-bottom',
                    type: 'is-danger',
                    queue: false,
                });
                this.activeUpdate = false;
                this.getStudent();
                });
            },
        updateStudentPassword(){
              let uri = '/api/updatePassword/'+this.$route.params.id;
              axios.patch(uri, this.dataPassword,{
                  headers: {
                      Authorization: 'Bearer ' + localStorage.getItem('token')
                  }
              }).then((response) => {
                this.$toast.open({
                    duration: 2000,
                    message: response.data.msg,
                    position: 'is-bottom',
                    type: 'is-success',
                    queue: false,
                });
                this.activeForget = false;
                this.getStudent();
              }).catch(error => {
                this.$toast.open({
                    duration: 2000,
                    message: error.data.msg,
                    position: 'is-bottom',
                    type: 'is-danger',
                    queue: false,
                });
                this.activeForget = false;
                this.getStudent();
                });
            },
        getStudent(){
            let uri = '/api/siswa/detail/'+this.$route.params.id;
            axios.get(uri,{
                  headers: {
                      Authorization: 'Bearer ' + localStorage.getItem('token')
                  }
              }).then((response) => {
                this.dataStudent = response.data[0];
                this.dataStudent.password_options =false;
                if(this.dataStudent.detail!=null){
                    if(this.dataStudent.detail.foto != null){
                        this.picture_id = this.dataStudent.detail.foto;
                        this.getPicture();
                    }

                    }else{
                        this.dataStudent.detail = {
                            tanggal_lahir:'tidak tersedia',
                            tempat_lahir:'tidak tersedia',
                            alamat:'tidak tersedia',
                            angkatan:'',
                            kelas:'',
                            foto: null,
                        };
                    }
            });
        },
            getPicture(){
                if(this.picture_id == null){
                    return;
                }
                this.dataStudent.detail.foto = this.picture_id;
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
                let uri = '/api/deleteProfile/'+this.picture_id;
                    axios.delete(uri,{
                        headers: {
                            Authorization: 'Bearer ' + localStorage.getItem('token')
                        }
                    }).then((response) => {
                        this.picture_id= null;
                        this.picture = null;
                        this.dataStudent.detail.foto = null;
                    });
            },
    }
}
</script>


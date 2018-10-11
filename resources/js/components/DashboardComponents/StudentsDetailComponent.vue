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
                      <button class="button is-warning is-pulled-right" v-on:click="modalUpdate()"> Perbaharui Data Siswa</button>
                   
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
                    <img v-if="dataStudent.detail == null || dataStudent.detail.foto == null" src="/images/empty_avatar.jpg">
                    <img v-else :src="{image}">

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
            <div class="columns">
                <div class="column is-one-third">
                    <label class="label">
                       Predikat
                    </label>
                </div>
                    <label class="label" style="padding: 0.75rem">
                        :
                    </label>
                <div class="column">
                    <label class="label">
                        {{dataStudent.detail.predikat}}
                    </label>
                </div>
            </div>
            <div class="columns">
                <div class="column is-one-third">
                    <label class="label">
                       Poin
                    </label>
                </div>
                    <label class="label" style="padding: 0.75rem">
                        :
                    </label>
                <div class="column">
                    <label class="label">
                        {{dataStudent.detail.poin}}
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
            <p class="modal-card-title">Perbaharui Data Siswa</p>
          </header>
            <form v-on:submit.prevent ="updateStudent()">

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
                    <div class="column">
                      <label for="name" class="label">Password</label>
                       <div class="field">
                            <p class="control">
                                <b-checkbox v-model="dataStudent.password_options" >reset</b-checkbox>
                            </p>
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
</div>
    
</template>
<script>
export default {
    data(){
        return{
            dataStudent : null,
            siswas:[],
            image:'/image/',
            error: null,
            activeUpdate: false,
            year:'',
        }
    },
    created: function() {
        this.getStudent();
        this.getThisYear();
    },
    methods:{
        
        getThisYear(){
            this.year = new Date().getFullYear();
        },
        modalUpdate(){
              if(this.activeUpdate == true){
                this.activeUpdate = false;
              }else if(this.activeUpdate == false){
                this.activeUpdate = true;
              }else{
                alert("error");
              }
            },
        updateStudent(){
              let uri = '/api/siswa/update/'+this.$route.params.id;
              axios.patch(uri, this.dataStudent,{
                  headers: {
                      Authorization: 'Bearer ' + localStorage.getItem('token')
                  }
              }).then((response) => {
                alert(response.data.msg);
                this.activeUpdate = false;
                this.getStudent();
              }).catch(error => {
                alert("username sudah ada");
                this.activeUpdate = false;
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
                    this.image = this.image+this.dataStudent.detail.foto;
                    }else{
                        this.dataStudent.detail = {
                            tanggal_lahir:'tidak tersedia',
                            tempat_lahir:'tidak tersedia',
                            alamat:'tidak tersedia',
                            angkatan:'',
                            kelas:'',
                        };
                    }
            });
        }
    }
}
</script>


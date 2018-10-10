<template id="admin-list">
<div class="contentlist">
<div class="flex-container m-b-35">
      <div class="columns m-t-10">
        <div class="column">
          <h1 class="title">Manage Admin</h1>
        </div>
        <div class="column">
          <button class="button is-success is-pulled-right" v-on:click="modalCreate"><i class="fa fa-user-plus m-r-10"></i> Buat Admin Baru</button>
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
                <th>Nama</th>
                <th>Username</th>
                <th>Tanggal Pembuatan</th>
                <th>Pengaturan</th>
              </tr>
            </thead>

            <tbody>
                  
                <tr v-for="(admin, index) in filterAdmin " :key="admin.id">
                  <th>{{ index + 1 }}</th>
                  <td>{{ admin.name }}</td>
                  <td>{{ admin.username }}</td>
                  <td>{{ admin.created_at }}</td>
                  <td><a class="button is-warning m-r-5"  href="#" v-on:click.prevent="modalUpdate();setDataUpdate(admin)" >Ubah</a><a class="button is-danger" href="#" v-on:click.prevent="modalDelete();setIdDelete(admin)">Hapus</a></td>
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
            <p class="modal-card-title">Tambahkan Admin</p>
            <button class="delete" aria-label="close" v-on:click="modalCreate"></button>
          </header>
            <form v-on:submit.prevent ="createAdmin()">

            <section class="modal-card-body">
            
            <div class="columns">
              <div class="column">
                <div class="field">
                  <label for="name" class="label">Nama</label>
                  <p class="control">
                    <input type="text" class="input" v-model="dataAdmin.name" name="name" id="name" required>
                  </p>
                </div>
                <div class="field">
                  <label for="name" class="label">Username</label>
                  <p class="control">
                    <input type="text" class="input" v-model="dataAdmin.username" name="username" id="username" required>
                  </p>
                </div>

                <div class="field">
                  <label for="password" class="label">Password</label>
                  <p class="control">
                    <input type="password" class="input" name="password" v-model="dataAdmin.password" id="password" required >
                  </p>
                </div>

              </div> <!-- end of .column -->
            </div> <!-- end of .columns for forms -->       
          </section>
          <footer class="modal-card-foot">
            <button class="button is-success">Buat Admin</button>

            <a class="button is-danger" v-on:click="modalCreate" >Cancel</a>
          </footer>
          </form>

      </div>
    </div>
    <div  class="modal" v-bind:class="{ 'is-active' : activeUpdate }">
      <div class="modal-background" v-on:click="modalUpdate()" ></div>
      
        <div class="modal-card">
          <header class="modal-card-head">
            <p class="modal-card-title">Perbaharui Admin</p>
            <button class="delete" aria-label="close" v-on:click="modalUpdate()"></button>
          </header>
            <form v-on:submit.prevent ="updateAdmin()">

            <section class="modal-card-body">
            <div class="columns">
              <div class="column">
                <div class="field">
                  <label for="name" class="label">Nama</label>
                  <p class="control">
                    <input type="text" class="input" v-model="dataAdmin.name" name="name" id="name" required>
                  </p>
                </div>
                <div class="field">
                  <label for="name" class="label">Username</label>
                  <p class="control">
                    <input type="text" class="input" v-model="dataAdmin.username" name="username" id="username" required>
                  </p>
                </div>

                <div class="field">
                  <label for="password" class="label">Password</label>
                  <p class="control">
                    <input type="password" class="input" name="password" v-model="dataAdmin.password" id="password" >
                  </p>
                </div>
                <div class="field">
                  <p class="control">
                    <b-checkbox v-model="dataAdmin.password_options" >reset</b-checkbox>
                  </p>
                </div>

              </div> <!-- end of .column -->
            </div> <!-- end of .columns for forms -->       
          </section>
          <footer class="modal-card-foot">
            <button class="button is-success">Ubah Data</button>

            <a class="button is-danger" v-on:click="modalUpdate()" >Cancel</a>
          </footer>
          </form>

      </div>
    </div>
    <div  class="modal" v-bind:class="{ 'is-active' : activeDelete }">
      <div class="modal-background" v-on:click="modalDelete()" ></div>
      
        <div class="modal-card">
          <header class="modal-card-head">
            <p class="modal-card-title">Hapus Admin</p>
            <button class="delete" aria-label="close" v-on:click="modalDelete()"></button>
          </header>
            <form v-on:submit.prevent ="deleteAdmin()">

            <section class="modal-card-body">
                <p>Admin yang dihapus tidak dapat dikembalikan lagi, apakah anda yakin ingin menghapusnya ? </p>
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

<script>
    export default {
        data(){
            return{
                active: false,
                activeUpdate: false,
                activeDelete:false,
                id:'',
                dataAdmin:{
                  id:'',
                  name:'',
                  username:'',
                  password:'',
                  password_options: false,
                  roles:2
                  },
                dataAdminNull:{
                  id:'',
                  name:'',
                  username:'',
                  password:'',
                  password_options: false,
                  roles:2
                  },
                admins:[],
            }
        },
        created: function() {
            this.getAdmin();
        },
         methods: {
            getAdmin(){
                  let uri = '/api/admin';
                  axios.get(uri,{
                  headers: {
                      Authorization: 'Bearer ' + localStorage.getItem('token')
                  }
              }).then((response) => {
                      this.admins = response.data.data;
                  }).catch(error => {
                      console.log(error.response)
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
            modalUpdate(){
              if(this.activeUpdate == true){
                this.activeUpdate = false;
              }else if(this.activeUpdate == false){
                this.activeUpdate = true;
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
            setDataUpdate(data){
              this.dataAdmin = data;
            },
            createAdmin: function() {
              let uri = '/api/admin/create';
              axios.post(uri, this.dataAdmin,{
                headers: {
                    Authorization: 'Bearer ' + localStorage.getItem('token')
                }
            }).then((response) => {
                this.active = false;
                this.dataAdmin = this.dataAdminNull;
                this.getAdmin();
              }).catch(error => {
                alert(error);
                this.active = false;
                this.dataAdmin = this.dataAdminNull;
                this.getAdmin();
                });
            },
            updateAdmin(){
              let uri = '/api/admin/update/'+this.dataAdmin.id;
              axios.patch(uri, this.dataAdmin,{
                headers: {
                    Authorization: 'Bearer ' + localStorage.getItem('token')
                }
            }).then((response) => {
                alert(response.data.msg);
                console.log(response);
                this.activeUpdate = false;
                this.dataAdmin = this.dataAdminNull;
                this.getAdmin();
              }).catch(error => {
                alert("username sudah ada");
                this.activeUpdate = false;
                this.dataAdmin = this.dataAdminNull;
                this.getAdmin();
                });
            },
            deleteAdmin(){
              let uri = '/api/admin/delete/'+this.id;
              axios.delete(uri,{
                headers: {
                    Authorization: 'Bearer ' + localStorage.getItem('token')
                }
            }).then((response) => {
                alert("Admin berhasil dihapus");
                this.activeDelete = false;
                this.id = '';
                this.getAdmin();
              }).catch(error => {
                alert("username sudah ada");
                this.activeDelete = false;
                this.id = '';
                this.getAdmin();
                });
            }
         },
        computed: {
            filterAdmin: function(){
                if(this.admins.length) {
                    return this.admins;
                }
            }
        }
    }
</script>

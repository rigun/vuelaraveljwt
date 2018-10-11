<template>
   <div class="content">
       
    <div id="topnav" class="topnav">
        <nav class="navbar has-shadow">
                <div class="navbar-start">
                    <div class="navbar-item box-hamburger">
                        <div class="hamburger" onclick="myHamburger(this)">
                            <div class="bar1"></div>
                            <div class="bar2"></div>
                            <div class="bar3"></div>
                        </div>
                    </div>
                </div>
                <div class="navbar-end">
                    <div class="navbar-item notif-space">
                        <i class="fa fa-bell"></i>
                    </div>
                    <div class="navbar-item dropdown-space has-dropdown is-hoverable">
                    <div class="navbar-item">
                        <div class="text-item">
                            <p class="mute-text" >
                                {{user.roles[0].name}}
                            </p>
                            <h2 class="name-text">
                            <strong>{{user.name}}
                                </strong>
                            </h2>

                        </div>
                        <i class="fa fa-user-circle m-l-15 size-40"></i>
                    </div>
                    <div class="navbar-dropdown arrow-up"></div>
                        <ul class="navbar-dropdown is-boxed  is-right box-dropdown-custom">
                            <li><a class="navbar-item" href="#">Profile</a></li>
                            <li><a class="navbar-item" href="#">Notifications</a></li>
                            <li><a class="navbar-item" href="#">Settings</a></li>
                            <hr class="navbar-divider">
                            <li>  <router-link v-bind:to="{name: 'Logout'}" class="navbar-item">
                                        <span class="icon">
                                        <i class="fa fa-fw fa-sign-out m-r-5"></i>
                                        </span>
                                        Logout
                        </router-link ></li>
                        </ul>
                    </div>

                </div>
                        
            </nav>
    </div>
       <div id="side-menu"  class="side-menu">
            <aside class="menu">
                <div id="side-header" class="side-header">
                    <div class="menu-label imgLabel">
                        <img src="/images/Logo.png" alt="Logo" />
                        <h1>SMP N 4 Depok</h1>
                    </div>
                </div>
                <hr class="separator-side">
                <div class="side-body">
                
                    <div class="side-label">
                        HOME
                    </div>
                    <ul class="menu-list">
                        <li><router-link v-bind:to="{name: 'DashboardContent'}"><i class="fa fa-home m-r-10" aria-hidden="true"></i>  <span>Dashboard</span> </router-link></li>
                        <li><router-link v-bind:to="{path: '/dashboard/admin'}"><i class="fa fa-user m-r-10" aria-hidden="true"></i>  <span>Manage Admin</span> </router-link></li>
                        <li><router-link v-bind:to="{path: '/dashboard/siswa'}"><i class="fa fa-users m-r-10" aria-hidden="true"></i>  <span>Manage Siswa</span> </router-link></li>
                        <li><router-link v-bind:to="{path: '/dashboard/slider'}"><i class="fa fa-slideshare m-r-10" aria-hidden="true"></i>  <span>Manage Slider</span> </router-link></li>
                        <li><router-link v-bind:to="{ name: 'KaryaSiswaList'}"><i class="fa fa-bookmark m-r-10" aria-hidden="true"></i>  <span>Karya Siswa</span> </router-link></li>
                        <li><router-link v-bind:to="{ name: 'PengumumanList'}"><i class="fa fa-bookmark m-r-10" aria-hidden="true"></i>  <span>Pengumuman</span> </router-link></li>
                        <li><router-link v-bind:to="{ name: 'PostComponent', params: { kategori: 'PPDB' }}"><i class="fa fa-file m-r-10" aria-hidden="true"></i>  <span>PPDB</span> </router-link></li>
                    </ul>

                    <div class="side-label">
                        <div class="dropdown-click" onclick="myDropdwonSide('Tentang')" >
                            Tentang
                            <i class="is-pulled-right fa fa-chevron-down m-r-10" aria-hidden="true"></i>
                        </div>
                    </div>
                    <ul id="listTentang" class="menu-list dropdown-hiddenSide">
                            
                        <li><router-link v-bind:to="{ name: 'PostComponent', params: { kategori: 'Sejarah' }}"> <i class="fa fa-history m-r-10" aria-hidden="true"></i> <span>Sejarah</span></router-link></li>
                        <li><router-link v-bind:to="{ name: 'PostComponent', params: { kategori: 'Struktur Organisasi' }}"><i class="fa fa-address-book m-r-10" aria-hidden="true"></i>  <span>Struktur Organisasi</span></router-link></li>
                        <li><router-link v-bind:to="{ name: 'PostComponent', params: { kategori: 'Kerjasama' }}"><i class="fa fa-balance-scale m-r-10" aria-hidden="true"></i>  <span>Kerjasama</span></router-link></li>
                        <li><router-link v-bind:to="{ name: 'PostComponent', params: { kategori: 'Fasilitas' }}"><i class="fa fa-certificate m-r-10" aria-hidden="true"></i>  <span>Fasilitas</span></router-link></li>
                    </ul>
                    <div class="side-label">
                        <div class="dropdown-click" onclick="myDropdwonSide('Akademik')" >
                        Akademik
                            <i class="is-pulled-right fa fa-chevron-down m-r-10" aria-hidden="true"></i>
                        </div>
                    </div>
                    <ul id="listAkademik" class="menu-list dropdown-hiddenSide">
                        <li><router-link v-bind:to="{ name: 'PostComponent', params: { kategori: 'Mata Pelajaran' }}"><i class="fa fa-list-alt m-r-10" aria-hidden="true"></i>  <span>Mata Pelajaran</span></router-link></li>
                        <li><router-link v-bind:to="{ name: 'PostComponent', params: { kategori: 'Jadwal' }}"><i class="fa fa-calendar m-r-10" aria-hidden="true"></i>  <span>Jadwal</span></router-link></li>
                        <li><router-link v-bind:to="{ name: 'PostComponent', params: { kategori: 'Kurikulum' }}"><i class="fa fa-book m-r-10" aria-hidden="true"></i>  <span>Kurikulum</span></router-link></li>
                    </ul>
                    <div class="side-label">
                        <div class="dropdown-click" onclick="myDropdwonSide('Siswa')" >
                        Siswa
                            <i class="is-pulled-right fa fa-chevron-down m-r-10" aria-hidden="true"></i>
                        </div>
                        
                    </div>
                    <ul id="listSiswa" class="menu-list dropdown-hiddenSide">
                        <li><router-link v-bind:to="{ name: 'PostComponent', params: { kategori: 'Peraturan Akademik' }}"><i class="fa fa-list m-r-10" aria-hidden="true"></i>  <span>Peraturan Akademik</span></router-link></li>
                        <li><router-link v-bind:to="{ name: 'PostComponent', params: { kategori: 'Ekstrakurikuler' }}"><i class="fa fa-flag m-r-10" aria-hidden="true"></i>  <span>Ekstrakulikuler</span></router-link></li>
                        <li><router-link v-bind:to="{ name: 'PrestasiList' }"><i class="fa fa-star m-r-10" aria-hidden="true"></i>  <span>Prestasi</span></router-link></li>
                    </ul>
                    
                </div>
            </aside>
        </div>
        <div id="app">
            <main class="py-4 dashboardContent">
            <transition name="fade">
            <router-view></router-view>
            </transition>
            </main>
        </div>
   </div>
</template>

<script>
       export default {
        data() {
            return {
                user: {name:'', roles:[{name: ''}]},
                error:'',
            }
        },
        created(){
            axios.get('/api/user', {
            headers: {
                Authorization: 'Bearer ' + localStorage.getItem('token')
                }
            })
            .then(response => {
                if(response.data.status == "Token is Expired"){
                    this.$router.push({ name: 'Logout' })
                }else {
                    this.user = response.data.user;
                }
            }).catch(error => {
                this.error = error;
            })  
        },
        mounted(){
             this.getUser();
        },
        methods:{
            getUser(){
                 axios.get('/api/refresh', {
                    headers: {
                        Authorization: 'Bearer ' + localStorage.getItem('token')
                    }
                }).then(response => {
                    localStorage.setItem('token', response.data.access_token);
                      axios.get('/api/user', {
                        headers: {
                            Authorization: 'Bearer ' + localStorage.getItem('token')
                            }
                        })
                        .then(response => {
                            if(response.data.status == "Token is Expired"){
                                this.$router.push({ name: 'Logout' })
                            }else {
                                this.user = response.data.user;
                            }
                        }).catch(error => {
                            this.error = error;
                        })  
                }).catch(error => {
                    this.$router.push({ name: 'Logout' })
                });
            }
        }
    }
</script>

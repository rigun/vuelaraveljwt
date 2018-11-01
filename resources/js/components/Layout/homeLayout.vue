<template>
   <div class="content" id="top">
       <div class="background-color-all"></div>
     <nav class="navbar navbar-expand fixed-top" id="mainNav">

         <div class="row">
             <div class="bg-navFirst bg-navbar">

                     
                     <div class="row">

                         <div class="navbarLogin">
                             <div class="navbar-nav">
                                 <div class="nav-item left-item">
                                     <div class="logo">
                                         <router-link v-bind:to="{name: 'LandingComponent'}" style="padding: 0px;">
                                             <img src="/images/Logo.png">
                                       </router-link>
                                    </div>
                                 </div>
                                 <div class="nav-item right-item">
                                      <router-link v-bind:to="{name: 'LoginLayout'}">
                                       <i v-if="mssg != 'Login'" class="fa fa-user m-r-10" aria-hidden="true"></i> 
                                         <i v-else class="fa fa-home m-r-10" aria-hidden="true"></i>
                                         <span>{{mssg}}</span>
                                       </router-link>
                                </div>
                                 <div class="nav-item box-hamburger">
                                    <div class="hamburger" onclick="myHamburgerLanding(this)">
                                        <div class="bar1"></div>
                                        <div class="bar2"></div>
                                        <div class="bar3"></div>
                                    </div>
                                </div>
                             </div>
                             
                         </div>
                     </div>

             </div>
         </div>
         <div class="arrow-right" onclick="myHamburgerLandingLeft(this)"><span>X</span></div>
         <div id="navSecond" class="row navSecond">

             <div class="bg-navSecond bg-navbar">

                     <div class="row">

                         <div class="navbar-collapse collapse " id="navbarResponsive">

                               <div class="row col-12 text-center">
                                   <div class="col-md-2 col-12">
                                         <div class="dropdown">
                                                 <button class="dropbtn">Tentang
                                                   <i class="fa fa-caret-down"></i>
                                                 </button>
                                                 <div class="dropdown-content">
                                                   <router-link v-bind:to="{ name: 'PageView', params: { kategori: 'Sejarah' }}"> <i class="fa fa-history m-r-10" aria-hidden="true"></i> <span>Sejarah</span></router-link>
                                                    <router-link v-bind:to="{ name: 'PageView', params: { kategori: 'Struktur Organisasi' }}"><i class="fa fa-address-book m-r-10" aria-hidden="true"></i>  <span>Struktur Organisasi</span></router-link>
                                                    <router-link v-bind:to="{ name: 'PageView', params: { kategori: 'Kerjasama' }}"><i class="fa fa-balance-scale m-r-10" aria-hidden="true"></i>  <span>Kerjasama</span></router-link>
                                                    <router-link v-bind:to="{ name: 'PageView', params: { kategori: 'Fasilitas' }}"><i class="fa fa-certificate m-r-10" aria-hidden="true"></i>  <span>Fasilitas</span></router-link>
                                                 </div>
                                               </div>
                                   </div>
                                   <div class="col-md-2 col-12">
                                         <div class="dropdown">
                                                 <button class="dropbtn">Akademik
                                                   <i class="fa fa-caret-down"></i>
                                                 </button>
                                                 <div class="dropdown-content">
                                                  <router-link v-bind:to="{ name: 'PageView', params: { kategori: 'Mata Pelajaran' }}"><i class="fa fa-list-alt m-r-10" aria-hidden="true"></i>  <span>Mata Pelajaran</span></router-link>
                                                    <router-link v-bind:to="{ name: 'PageView', params: { kategori: 'Jadwal' }}"><i class="fa fa-calendar m-r-10" aria-hidden="true"></i>  <span>Jadwal</span></router-link>
                                                    <router-link v-bind:to="{ name: 'PageView', params: { kategori: 'Kurikulum' }}"><i class="fa fa-book m-r-10" aria-hidden="true"></i>  <span>Kurikulum</span></router-link>
                                                 </div>
                                               </div>
                                   </div>
                                   <div class="col-4 middleLogo">
                                         <div class="logo">
                                                 <div class="middle">
                                                     <strong><p>SMP Negeri 4<br/>Depok</p></strong>
                                                    <router-link v-bind:to="{name: 'LandingComponent'}" style="padding: 0px;"> <img src="/images/Logo.png"> </router-link>
                                                 </div>
                                             </div>
                                   </div>
                                   <div class="col-md-2 col-12">
                                         <div class="dropdown">
                                                 <button class="dropbtn">Siswa
                                                   <i class="fa fa-caret-down"></i>
                                                 </button>
                                                 <div class="dropdown-content">
                                                   <router-link v-bind:to="{ name: 'PageView', params: { kategori: 'Peraturan Akademik' }}"><i class="fa fa-list m-r-10" aria-hidden="true"></i>  <span>Peraturan Akademik</span></router-link>
                                                    <router-link v-bind:to="{ name: 'PageView', params: { kategori: 'Ekstrakurikuler' }}"><i class="fa fa-flag m-r-10" aria-hidden="true"></i>  <span>Ekstrakulikuler</span></router-link>
                                                 </div>
                                               </div>
                                   </div>
                                   <div class="col-md-2 col-12">
                                         <div class="dropdown">
                                                        <router-link class="dropbtn" v-bind:to="{ name: 'PageView', params: { kategori: 'PPDB' }}"  ><i class="fa fa-file m-r-10" aria-hidden="true"></i>  <span>PPDB</span> </router-link>
                                                 </div>
                                   </div>
                               </div>

                         </div>
                     </div>
             </div>

         </div>
         <div  id="navThird"  class="row navThird">

             <div class="bg-navThird bg-navbar">

                         <div class="col-12 row text-center">
                             <div class="col-md-2 col-12 ">
                                 <div class="nav-item">
                                 <a class="js-scroll-trigger" href="/#slider">Home</a>
                                 </div>
                             </div>
                             <div class="col-md-2 col-12 ">
                                 <div class="nav-item">
                                 <a class="js-scroll-trigger" href="/#prestasi">Prestasi</a>
                                 </div>
                             </div>
                             <div class="col-md-2 col-12 ">
                                 <div class="nav-item colLeft">
                                 <a class="js-scroll-trigger" href="/#vm">Visi Misi</a>
                                 </div>
                             </div>
                             <div class="col-md-2 col-12 ">
                                 <div class="nav-item colRight">
                                 <a class="js-scroll-trigger" href="/#KaryaSS">Karya Siswa</a>
                                 </div>
                             </div>
                             <div class="col-md-2 col-12 ">
                                 <div class="nav-item">
                                 <a class="js-scroll-trigger" href="/#mapSec">Alamat</a>
                                 </div>
                             </div>
                             <div class="col-md-2 col-12 ">
                                 <div class="nav-item">
                                 <a class="js-scroll-trigger" href="/#CU">Hubungi Kami</a>
                                 </div>
                             </div>
                         </div>

             </div>

         </div>


     </nav>
     <div id="appPage">
            <main class="pageContent">
            <transition name="fade">
            <router-view></router-view>
            </transition>
            </main>
        </div>

             <section id="CU">
                 <div class="container">
                     <h1>Akreditasi SMP Negeri 4 Depok '<strong>A</strong>' </h1><br/>
                     <hr/><br/>
                     <div class="row">
                     <div class="col-xs-12 col-md-6 col-sm-6 col-lg-6">
                     <h2>SMP Negeri 4 Depok</h2>
                     <h4><strong>Kontak</strong></h4>
                     <p>(0274)485542</p>
                     <p>smpnempatdepok@yahoo.com</p><br/>
                     <h4><strong>Alamat</strong></h4>
                     <p>Babarsari, Caturtunggal, Depok, Sleman, Yogyakarta</p>    
                     <h4><strong>Jam Operasional</strong></h4>
                     <p>Pukul 07.00 - 13.30 WIB</p>
                     </div>
                     <div class="col-xs-12 col-md-6 col-sm-6 col-lg-6">
                         <img style="width: 90%;" src="/images/Logo.png">
                     </div>
                 </div>
                     <hr/>
                     <p style="text-align: center">© 2018 SMP Negeri 4 Depok Oleh Universitas Atma Jaya Yogyakarta</p>
                 </div>
             </section>
   </div>



</template>


<script>
   
    import 'bootstrap/dist/css/bootstrap.min.css';
 export default {

        data() {
            return {
                user: {},
                error:'',
                mssg:'Login',
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
                  this.mssg = 'Login';
                }else {
                    this.mssg = response.data.userdata.name;
                }
            }).catch(error => {
                this.mssg = 'Login';
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
                                this.mssg = 'Login';
                            }else {
                                this.mssg = response.data.userdata.name;
                                
                            }
                        }).catch(error => {
                            this.mssg = 'Login';
                        })  
                }).catch(error => {
                   this.mssg = 'Login';
                });
            }
        }
    }
</script>
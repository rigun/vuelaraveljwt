<template>
   <div class="content" id="top">
     <nav class="navbar navbar-expand fixed-top" id="mainNav">

         <div class="row">
             <div class="bg-navFirst bg-navbar">

                     <button id="btnChanges" class="navbar-toggler navbar-toggler-right" onclick="changesFunction(this)" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                         <div class="bar1 bgBar"></div>
                         <div class="bar2 bgBar"></div>
                         <div class="bar3 bgBar"></div>
                     </button>
                     <div class="row">

                         <div class="navbarLogin">
                             <ul class="navbar-nav" style="list-style:none">
                                     <li class="nav-item">
                                       <router-link v-bind:to="{path: '/login'}">
                                         <i class="fa fa-home m-r-10" aria-hidden="true"></i>
                                         <span>Login</span>
                                       </router-link>
                                         <!-- <a class="nav-link" href="#">Login</a> -->
                                     </li>
                                 </ul>
                         </div>
                     </div>

             </div>
         </div>
         <div class="row navSecond">

             <div class="bg-navSecond bg-navbar">

                     <div class="row">

                         <div class="navbar-collapse collapse " id="navbarResponsive">

                               <div class="row col-12 text-center">
                                   <div class="col-2">
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
                                   <div class="col-2">
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
                                   <div class="col-4">
                                         <div class="logo">
                                                 <div class="middle">
                                                     <strong><p>SMP Negeri 4<br/>Depok</p></strong>
                                                     <img src="/images/Logo.png">
                                                 </div>
                                             </div>
                                   </div>
                                   <div class="col-2">
                                         <div class="dropdown">
                                                 <button class="dropbtn">Siswa
                                                   <i class="fa fa-caret-down"></i>
                                                 </button>
                                                 <div class="dropdown-content">
                                                   <router-link v-bind:to="{ name: 'PageView', params: { kategori: 'Peraturan Akademik' }}"><i class="fa fa-list m-r-10" aria-hidden="true"></i>  <span>Peraturan Akademik</span></router-link>
                                                    <router-link v-bind:to="{ name: 'PageView', params: { kategori: 'Ekstrakurikuler' }}"><i class="fa fa-flag m-r-10" aria-hidden="true"></i>  <span>Ekstrakulikuler</span></router-link>
                                                    <router-link v-bind:to="{ name: 'PrestasiList' }"><i class="fa fa-star m-r-10" aria-hidden="true"></i>  <span>Prestasi</span></router-link>
                                                 </div>
                                               </div>
                                   </div>
                                   <div class="col-2">
                                         <div class="dropdown">
                                                        <router-link class="dropbtn" v-bind:to="{ name: 'PageView', params: { kategori: 'PPDB' }}"  ><i class="fa fa-file m-r-10" aria-hidden="true"></i>  <span>PPDB</span> </router-link>
                                                 </div>
                                   </div>
                               </div>

                         </div>
                     </div>
             </div>

         </div>
         <div class="row navThird">

             <div class="bg-navThird bg-navbar">

                         <div class="col-12 row text-center">
                             <div class="col-2 ">
                                 <div class="nav-item">
                                 <a href="#">Home</a>
                                 </div>
                             </div>
                             <div class="col-2 ">
                                 <div class="nav-item">
                                 <a href="#">Prestasi</a>
                                 </div>
                             </div>
                             <div class="col-2 ">
                                 <div class="nav-item colLeft">
                                 <a href="#">Visi Misi</a>
                                 </div>
                             </div>
                             <div class="col-2 ">
                                 <div class="nav-item colRight">
                                 <a href="#">Karya Siswa</a>
                                 </div>
                             </div>
                             <div class="col-2 ">
                                 <div class="nav-item">
                                 <a href="#">Alamat</a>
                                 </div>
                             </div>
                             <div class="col-2 ">
                                 <div class="nav-item">
                                 <a href="#">Hubungi Kami</a>
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
                     <h1>Siap untuk menjadi bagian dari kami ? </h1><br/>
                     <hr/><br/>
                     <div class="row">
                     <div class="col-xs-12 col-md-4 col-sm-6 col-lg-6">
                     <h2>Sekolah Menegah Pertama Negeri 4 Depok</h2>
                     <h4><strong>Kontak</strong></h4>
                     <p>08*********</p>
                     <p>Ex@Example.com</p><br/>
                     <h4><strong>Alamat</strong></h4>
                     <p>08*********</p>
                     <p>Ex@Example.com</p><br/>
                     <h4><strong>Jam Operasional</strong></h4>
                     <p>08*********</p>
                     <p>Ex@Example.com</p><br/>
                     </div>
                     <div class="col-xs-12 col-md-4 col-sm-6 col-lg-6">
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

</script>
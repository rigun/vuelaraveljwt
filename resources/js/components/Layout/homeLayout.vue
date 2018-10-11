<template>
   <!-- <div class="content">
       <div class="container">
           <div class="card">
               <div class="card-content">
                   Selamat Datang di website SMPN 4 Depok
                   <router-link v-bind:to="{path: '/login'}"><i class="fa fa-home m-r-10" aria-hidden="true"></i>  <span>Login</span> </router-link>
               </div>
           </div>
       </div>
   </div> -->
   <div class="content">
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
                             <ul class="navbar-nav">
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
                                                   <a href="#">Sejarah</a>
                                                   <a href="#">Struktur Organinsasi</a>
                                                   <a href="#">Kerjasama</a>
                                                   <a href="#">Fasilitas</a>
                                                 </div>
                                               </div>
                                   </div>
                                   <div class="col-2">
                                         <div class="dropdown">
                                                 <button class="dropbtn">Akademik
                                                   <i class="fa fa-caret-down"></i>
                                                 </button>
                                                 <div class="dropdown-content">
                                                   <a href="#">Mata Pelajar</a>
                                                   <a href="#">Jadwal</a>
                                                   <a href="#">Kurikulum</a>
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
                                                   <a href="#">Peraturan Akademik</a>
                                                   <a href="#">Ekstrakulikuler</a>
                                                   <a href="#">Prestasi</a>
                                                 </div>
                                               </div>
                                   </div>
                                   <div class="col-2">
                                         <div class="dropdown">
                                                 <button class="dropbtn">PPDB
                                                       </button>
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
     <section id="slider">
     <div id="jssor_1" style="position:relative;margin:0 auto;top:140px;left:0px;width:980px;height:380px;overflow:hidden;visibility:hidden;">
             <!-- Loading Screen -->
             <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                 <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="/images/home/spin.svg" />
             </div>
             <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:380px;overflow:hidden;">
                 <div>
                     <img data-u="image" src="/images/home/022.jpg" />
                     <div data-u="thumb">
                         <img data-u="thumb" class="i" src="/images/home/022-s96x48.jpg" />
                         <span class="ti">Title</span><br />
                         <span class="d">Slide Description</span>
                     </div>
                 </div>
                 <div>
                     <img data-u="image" src="/images/home/023.jpg" />
                     <div data-u="thumb">
                         <img data-u="thumb" class="i" src="/images/home/023-s96x48.jpg" />
                         <span class="ti">Title</span><br />
                         <span class="d">Slide Description</span>
                     </div>
                 </div>
                 <div>
                     <img data-u="image" src="/images/home/024.jpg" />
                     <div data-u="thumb">
                         <img data-u="thumb" class="i" src="/images/home/024-s96x48.jpg" />
                         <span class="ti">Title</span><br />
                         <span class="d">Slide Description</span>
                     </div>
                 </div>
                 <div>
                     <img data-u="image" src="/images/home/025.jpg" />
                     <div data-u="thumb">
                         <img data-u="thumb" class="i" src="/images/home/025-s96x48.jpg" />
                         <span class="ti">Title</span><br />
                         <span class="d">Slide Description</span>
                     </div>
                 </div>
                 <div>
                     <img data-u="image" src="/images/home/026.jpg" />
                     <div data-u="thumb">
                         <img data-u="thumb" class="i" src="/images/home/026-s96x48.jpg" />
                         <span class="ti">Title</span><br />
                         <span class="d">Slide Description</span>
                     </div>
                 </div>
                 <div>
                     <img data-u="image" src="/images/home/027.jpg" />
                     <div data-u="thumb">
                         <img data-u="thumb" class="i" src="/images/home/027-s96x48.jpg" />
                         <span class="ti">Title</span><br />
                         <span class="d">Slide Description</span>
                     </div>
                 </div>
                 <div>
                     <img data-u="image" src="/images/home/021.jpg" />
                     <div data-u="thumb">
                         <img data-u="thumb" class="i" src="/images/home/021-s96x48.jpg" />
                         <span class="ti">Title</span><br />
                         <span class="d">Slide Description</span>
                     </div>
                 </div>
                 <div>
                     <img data-u="image" src="/images/home/028.jpg" />
                     <div data-u="thumb">
                         <img data-u="thumb" class="i" src="/images/home/028-s96x48.jpg" />
                         <span class="ti">Title</span><br />
                         <span class="d">Slide Description</span>
                     </div>
                 </div>
                 <div>
                     <img data-u="image" src="/images/home/029.jpg" />
                     <div data-u="thumb">
                         <img data-u="thumb" class="i" src="/images/home/029-s96x48.jpg" />
                         <span class="ti">Title</span><br />
                         <span class="d">Slide Description</span>
                     </div>
                 </div>
                 <div>
                     <img data-u="image" src="/images/home/030.jpg" />
                     <div data-u="thumb">
                         <img data-u="thumb" class="i" src="/images/home/030-s96x48.jpg" />
                         <span class="ti">Title</span><br />
                         <span class="d">Slide Description</span>
                     </div>
                 </div>
                 <div>
                     <img data-u="image" src="/images/home/031.jpg" />
                     <div data-u="thumb">
                         <img data-u="thumb" class="i" src="/images/home/031-s96x48.jpg" />
                         <span class="ti">Title</span><br />
                         <span class="d">Slide Description</span>
                     </div>
                 </div>
                 <div>
                     <img data-u="image" src="/images/home/032.jpg" />
                     <div data-u="thumb">
                         <img data-u="thumb" class="i" src="/images/home/032-s96x48.jpg" />
                         <span class="ti">Title</span><br />
                         <span class="d">Slide Description</span>
                     </div>
                 </div>
             </div>
             <!-- Thumbnail Navigator -->
             <div data-u="thumbnavigator" class="jssort121" style="position:absolute;left:0px;top:0px;width:268px;height:380px;overflow:hidden;cursor:default;" data-autocenter="2" data-scale-left="0.75">
                 <div data-u="slides">
                     <div data-u="prototype" class="p" style="width:268px;height:68px;">
                         <div data-u="thumbnailtemplate" class="t"></div>
                     </div>
                 </div>
             </div>
             <!-- Bullet Navigator -->
             <div data-u="navigator" class="jssorb111" style="position:absolute;bottom:12px;right:12px;" data-scale="0.5">
                 <div data-u="prototype" class="i" style="width:24px;height:24px;font-size:12px;line-height:24px;">
                     <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;z-index:-1;">
                         <circle class="b" cx="8000" cy="8000" r="3000"></circle>
                     </svg>
                     <div data-u="numbertemplate" class="n"></div>
                 </div>
             </div>
         </div>
     </section>

     <section id="article">
         <section id="prestasi">
             <div class="container">
                 <div class="row">
                     <div class="col-4">
                             <div class="box-article">
                                     <img src="/images/home/021.jpg">
                                     <br/>
                                     <h4>Prestasi</h4>
                                     <span>Jumat, 17 Agustus 2018</span><br/>
                                     <h1>Judul Prestasi</h1><br/>
                                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquam eros nulla, vitae volutpat enim ultricies id. Morbi est leo, commodo a massa non, porttitor ultrices ipsum. Praesent felis turpis, ultrices nec efficitur in, feugiat ac lorem. Nullam malesuada nibh ac nisi fringilla pharetra.</p>
                                     <h4>Selengkapnya ></h4>
                                 </div>
                     </div>
                     <div class="col-4">
                             <div class="box-article">
                                     <img src="/images/home/021.jpg">
                                     <br/>
                                     <h4>Prestasi</h4>
                                     <span>Jumat, 17 Agustus 2018</span><br/>
                                     <h1>Judul Prestasi</h1><br/>
                                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquam eros nulla, vitae volutpat enim ultricies id. Morbi est leo, commodo a massa non, porttitor ultrices ipsum. Praesent felis turpis, ultrices nec efficitur in, feugiat ac lorem. Nullam malesuada nibh ac nisi fringilla pharetra.</p>
                                     <h4>Selengkapnya ></h4>
                                 </div>
                     </div>
                     <div class="col-4">
                             <div class="box-article">
                                     <img src="/images/home/021.jpg">
                                     <br/>
                                     <h4>Prestasi</h4>
                                     <span>Jumat, 17 Agustus 2018</span><br/>
                                     <h1>Judul Prestasi</h1><br/>
                                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquam eros nulla, vitae volutpat enim ultricies id. Morbi est leo, commodo a massa non, porttitor ultrices ipsum. Praesent felis turpis, ultrices nec efficitur in, feugiat ac lorem. Nullam malesuada nibh ac nisi fringilla pharetra.</p>
                                     <h4>Selengkapnya ></h4>
                                 </div>
                     </div>
                 </div>
                 <div class="row">
                     <div class="btn-box">
                         <button>Prestasi Lainnya</button>
                         </div>

                 </div>
             </div>

         </section>
         <section id="vm">
             <div class="bg-VM">
                 <h1>Visi Misi</h1><br/>
                 <div class="row bg-text">
                     <div class="col-6">
                         <div class="box-textVM">
                             <h1 style="text-align: center;">Visi</h1>
                             <ul>
                                 <li>1</li>
                                 <li>2</li>
                                 <li>3</li>
                                 <li>4</li>
                                 <li>5</li>
                                 <li>6</li>
                             </ul>
                         </div>
                     </div>
                     <div class="col-6">
                         <div class="box-textVM">
                                 <h1 style="text-align: center;">Misi</h1>
                                 <ul>
                                     <li>1</li>
                                     <li>2</li>
                                     <li>3</li>
                                     <li>4</li>
                                     <li>5</li>
                                     <li>6</li>
                                 </ul>
                         </div>
                     </div>

                 </div>
                 <div class="content">

                     </div>
             </div>
         </section>
         <section id="KaryaSS">
                 <div class="container">
                     <div class="row">
                         <div class="col-9">
                             <h1>Karya Siswa Siswi</h1>
                         </div>
                         <div class="col-3">
                             <h1>Pengumuman</h1>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-3">
                                 <div class="box-article">
                                         <img src="/images/home/021.jpg">
                                         <br/>
                                         <h4>Puisi</h4>
                                         <span>Jumat, 17 Agustus 2018</span><br/>
                                         <span>Abdul</span><br/>
                                         <h2>Judul </h2><br/>
                                         <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquam eros nulla, vitae volutpat enim ultricies id. Morbi est leo, commodo a massa non, porttitor ultrices ipsum. Praesent felis turpis, ultrices nec efficitur in, feugiat ac lorem. Nullam malesuada nibh ac nisi fringilla pharetra.</p>
                                         <h4>Selengkapnya ></h4>
                                     </div>
                         </div>
                         <div class="col-3">
                                 <div class="box-article">
                                         <img src="/images/home/021.jpg">
                                         <br/>
                                         <h4>Cerita Pendek</h4>
                                         <span>Jumat, 17 Agustus 2018</span><br/>
                                         <span>Abdul</span><br/>
                                         <h2>Judul </h2><br/>
                                         <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquam eros nulla, vitae volutpat enim ultricies id. Morbi est leo, commodo a massa non, porttitor ultrices ipsum. Praesent felis turpis, ultrices nec efficitur in, feugiat ac lorem. Nullam malesuada nibh ac nisi fringilla pharetra.</p>
                                         <h4>Selengkapnya ></h4>
                                     </div>
                         </div>
                         <div class="col-3">
                                 <div class="box-article">
                                         <img src="/images/home/021.jpg">
                                         <br/>
                                         <h4>Kerajinan Tangan</h4>
                                         <span>Jumat, 17 Agustus 2018</span><br/>
                                         <span>Abdul</span><br/>
                                         <h2>Judul </h2><br/>
                                         <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquam eros nulla, vitae volutpat enim ultricies id. Morbi est leo, commodo a massa non, porttitor ultrices ipsum. Praesent felis turpis, ultrices nec efficitur in, feugiat ac lorem. Nullam malesuada nibh ac nisi fringilla pharetra.</p>
                                         <h4>Selengkapnya ></h4>
                                     </div>
                         </div>
                         <div class="col-3">
                                 <div class="box-article box-pengumuman">
                                         <img src="/images/home/021.jpg">
                                         <br/>
                                         <h4>Pengumuman</h4>
                                         <span>Jumat, 17 Agustus 2018</span><br/>
                                         <span>Abdul</span><br/>
                                         <h2>Judul </h2><br/>
                                         <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquam eros nulla, vitae volutpat enim ultricies id. Morbi est leo, commodo a massa non, porttitor ultrices ipsum. Praesent felis turpis, ultrices nec efficitur in, feugiat ac lorem. Nullam malesuada nibh ac nisi fringilla pharetra.</p>
                                         <h4>Selengkapnya ></h4>
                                     </div>
                         </div>
                     </div><br/>
                     <div class="row">
                         <div class="btn-box">
                             <button>Prestasi Lainnya</button>
                             </div>

                     </div>
                 </div>

             </section>
             <section id="mapSec">
                     <div id="map" style="width:100%;height:400px;background:yellow;margin-top:40px;"></div>
             </section>
             <section id="CU">
                 <div class="container">
                     <h1>Siap untuk menjadi bagian dari kami ? </h1><br/>
                     <hr/><br/>
                     <div class="row">
                     <div class="col-6">
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
                     <div class="col-6">
                         <img style="width: 90%;" src="backupData/Logo.png">
                     </div>
                 </div>
                     <hr/>
                     <p style="text-align: center">© 2018 SMP Negeri 4 Depok Oleh Universitas Atma Jaya Yogyakarta</p>
                 </div>
             </section>
     </section>
   </div>



</template>

<script>
    import 'bootstrap/dist/css/bootstrap.min.css';
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

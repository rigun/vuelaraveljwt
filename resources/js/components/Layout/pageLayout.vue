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
                     <img data-u="image" :src="'/images/upload/'+dataSlider.slider1" />
                     <h1><br/><br/>{{dataSlider.slider1}}</h1>
                     <div data-u="thumb">
                         <img data-u="thumb" class="i" :src="'/images/upload/'+dataSlider.slider1" />
                         <span class="ti">{{dataSlider.slider1}}</span><br />
                         <span class="d">lorem</span>
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
                 <div class="grid-column-carousel row">
                   <ul class="grid-column-carousel__list initialized list-inline" style="display:inline-flex; margin-left:0px">
                     <li class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                             <div class="box-article" style="margin:0; max-width:none">
                                     <img src="/images/home/021.jpg">
                                     <br/>
                                     <h4>Prestasi</h4>
                                     <span>Jumat, 17 Agustus 2018</span><br/>
                                     <h1>Judul Prestasi</h1><br/>
                                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquam eros nulla, vitae volutpat enim ultricies id. Morbi est leo, commodo a massa non, porttitor ultrices ipsum. Praesent felis turpis, ultrices nec efficitur in, feugiat ac lorem. Nullam malesuada nibh ac nisi fringilla pharetra.</p>
                                     <h4>Selengkapnya ></h4>
                                 </div>
                     </li>

                     <li class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                             <div class="box-article" style="margin:0; max-width:none">
                                     <img src="/images/home/021.jpg">
                                     <br/>
                                     <h4>Prestasi</h4>
                                     <span>Jumat, 17 Agustus 2018</span><br/>
                                     <h1>Judul Prestasi</h1><br/>
                                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquam eros nulla, vitae volutpat enim ultricies id. Morbi est leo, commodo a massa non, porttitor ultrices ipsum. Praesent felis turpis, ultrices nec efficitur in, feugiat ac lorem. Nullam malesuada nibh ac nisi fringilla pharetra.</p>
                                     <h4>Selengkapnya ></h4>
                                 </div>
                     </li>

                     <li class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                             <div class="box-article" style="margin:0; max-width:none">
                                     <img src="/images/home/021.jpg">
                                     <br/>
                                     <h4>Prestasi</h4>
                                     <span>Jumat, 17 Agustus 2018</span><br/>
                                     <h1>Judul Prestasi</h1><br/>
                                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin aliquam eros nulla, vitae volutpat enim ultricies id. Morbi est leo, commodo a massa non, porttitor ultrices ipsum. Praesent felis turpis, ultrices nec efficitur in, feugiat ac lorem. Nullam malesuada nibh ac nisi fringilla pharetra.</p>
                                     <h4>Selengkapnya ></h4>
                                 </div>
                     </li>

                   </ul>

                   <div class="grid-column-carousel__page-indicators">
                    <ul>
                        <li class="dot active hide"></li>
                    </ul>
                  </div>
                 </div>

                 <div class="button-panel">
                  <button class="first btn btn-success btn-sm">Go to First</button>
                  <button class="prev btn btn-success btn-sm">Go to Prev</button>
                  <button class="next btn btn-success btn-sm">Go to Next</button>
                  <button class="last btn btn-success btn-sm">Go to Last</button>
                </div>

                 <div class="row">
                     <div class="btn-box">
                         <button>Prestasi Lainnya</button>
                         </div>

                 </div>
             </div>

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
                         <img style="width: 90%;" src="/images/Logo.png">
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
</script>

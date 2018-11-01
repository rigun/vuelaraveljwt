<template>
<div class="pageDetail">
   <div id="slider">
     <div id="jssor_1" style="position:relative;margin:0 auto;top:140px;left:0px;width:980px;height:380px;overflow:hidden;visibility:hidden;">
             <!-- Loading Screen -->
             <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                 <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="/images/home/spin.svg"/>
             </div>
             <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:380px;overflow:hidden;" >
                 
                  <div>
                     <img data-u="image" :src="'/images/upload/'+dataSlider.slider1" />
                     <div data-u="thumb">
                        <img data-u="thumb" id="slider1"/>
                     </div>
                 </div>
                  <div>
                     <img data-u="image" :src="'/images/upload/'+dataSlider.slider2" />
                     <div data-u="thumb">
                        <img data-u="thumb" id="slider2"/>
                     </div>
                 </div>
                  <div>
                     <img data-u="image" :src="'/images/upload/'+dataSlider.slider3" />
                     <div data-u="thumb">
                        <img data-u="thumb" id="slider3"/>
                     </div>
                 </div>
                  <div>
                     <img data-u="image" :src="'/images/upload/'+dataSlider.slider4" />
                     <div data-u="thumb">
                        <img data-u="thumb" id="slider4"/>
                     </div>
                 </div>
                  <div>
                     <img data-u="image" :src="'/images/upload/'+dataSlider.slider5" />
                     <div data-u="thumb">
                        <img data-u="thumb" id="slider5"/>
                     </div>
                 </div>
                  <div>
                     <img data-u="image" :src="'/images/upload/'+dataSlider.slider6" />
                     <div data-u="thumb">
                        <img data-u="thumb" id="slider6"/>
                     </div>
                 </div>
                  <div>
                     <img data-u="image" :src="'/images/upload/'+dataSlider.slider7" />
                     <div data-u="thumb">
                        <img data-u="thumb" id="slider7"/>
                     </div>
                 </div>
                  <div>
                     <img data-u="image" :src="'/images/upload/'+dataSlider.slider8" />
                     <div data-u="thumb">
                        <img data-u="thumb" id="slider8"/>
                     </div>
                 </div>
                  <div>
                     <img data-u="image" :src="'/images/upload/'+dataSlider.slider9" />
                     <div data-u="thumb">
                        <img data-u="thumb" id="slider9"/>
                     </div>
                 </div>
                  <div>
                     <img data-u="image" :src="'/images/upload/'+dataSlider.slider10" />
                     <div data-u="thumb">
                        <img data-u="thumb" id="slider10"/>
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
     </div>

     <div id="headline" style="margin-top:200px;">
         <div class="container is-fluid">
             <div class="row">
               <h1 style="margin-top:50px">Pengumuman</h1>
             </div>
            <div class="tile is-ancestor">
               

                <div class="tile is-vertical is-8">
                    <div class="tile">
                        <div class="tile is-parent is-vertical">
                            <article class="tile is-child box" v-if="dataPengumuman[0] != null">
                        <img :src="'/images/upload/'+ dataPengumuman[0].foto.filename" alt="">

                                <router-link v-bind:to="{ name: 'PageViewBlog', params: { post: dataPengumuman[0].slug }}"> <p class="title">{{dataPengumuman[0].title}}</p></router-link>
                           
                            <p class="subtitle">{{dataPengumuman[0].published_at}}</p>
                            <p class="subtitle">{{getPostBody(dataPengumuman[0].content)}}</p>
                            </article>
                            <article class="tile is-child box" v-if="dataPengumuman[1] != null">
                       <img :src="'/images/upload/'+ dataPengumuman[1].foto.filename" alt="">

                                <router-link v-bind:to="{ name: 'PageViewBlog', params: { post: dataPengumuman[1].slug }}"> <p class="title">{{dataPengumuman[1].title}}</p></router-link>

                            <p class="subtitle">{{dataPengumuman[1].published_at}}</p>
                            <p class="subtitle">{{getPostBody(dataPengumuman[1].content)}}</p>
                            </article>
                        </div>
                        <div class="tile is-parent is-vertical">
                            <article class="tile is-child box" v-if="dataPengumuman[2] != null">
                      <img :src="'/images/upload/'+ dataPengumuman[2].foto.filename" alt="">

                                <router-link v-bind:to="{ name: 'PageViewBlog', params: { post: dataPengumuman[2].slug }}"> <p class="title">{{dataPengumuman[2].title}}</p></router-link>

                            <p class="subtitle">{{dataPengumuman[2].published_at}}</p>
                            <p class="subtitle">{{getPostBody(dataPengumuman[2].content)}}</p>
                            </article>
                            <article class="tile is-child box" v-if="dataPengumuman[3] != null">
                      <img :src="'/images/upload/'+ dataPengumuman[3].foto.filename" alt="">

                                <router-link v-bind:to="{ name: 'PageViewBlog', params: { post: dataPengumuman[3].slug }}"> <p class="title">{{dataPengumuman[3].title}}</p></router-link>

                            <p class="subtitle">{{dataPengumuman[3].published_at}}</p>
                            <p class="subtitle">{{getPostBody(dataPengumuman[3].content)}}</p>
                            </article>
                        </div>
                       
                    </div>
                </div>
                <div class="tile is-parent">
                    <article class="tile is-child box" style="max-height: 443px">
                        <p class="title">Lainnya</p>
                        <p class="subtitle">Link Download File</p>
                        <div class="content" style="height: auto;max-height: 370px;overflow:auto;">
                            <div v-for="file in files" :key="file.id">
                                <hr>
                            <p ><a :href="'/file/'+file.filename">{{file.original_name}}</a></p>

                            </div>
                            <hr>
                        </div>
                    </article>
                </div>

                </div><!-- end of tile-->

                
         </div><!--end of container -->
     </div>

     <div id="article" style="top:50px;">
         <div id="prestasi">
           <div class="container">
             <div class="row">
               <h1 style="margin-top:0px">Prestasi Siswa</h1>
             </div>
             <div class="columns">
                 <div class="column is-one-third"  v-for="prestasi in filterPrestasi" :key="prestasi.id">
                     <div class="card postlandingpage">
                         <div class="card-content">
                        <div class="imgPost">
                            <img :src="'/images/upload/'+prestasi.foto.filename">
                        </div>
                            <br/>
                            <h1>{{ prestasi.title }}</h1>
                            <p>{{prestasi.published_at}}</p>
                            <div class="contentPost"> {{getPostBody(prestasi.content)}} </div>
                            <router-link v-bind:to="{ name: 'PageViewBlog', params: { post: prestasi.slug }}"><p>Selengkapnya</p></router-link>
                         </div>
                     </div>
                 </div>
             </div>
            



               <div class="row" >
                   <div class="btn-box" style="margin-top:30px;">
                       <router-link v-bind:to="{ name: 'PageList', params: { kategori: 'Prestasi' }}"><button>Prestasi Lainnya</button></router-link>
                       </div>

               </div>
           </div>

         </div>
         <div id="vm">
             <div class="bg-VM">
                 <h1>VISI MISI SEKOLAH</h1>
                 <h1>“BERKUALITAS DALAM IPTEK DAN IMTAQ”</h1>
                 <div class="row bg-text">
                     <div class="col-md-6">
                         <div class="box-textVM">
                             <h1 style="text-align: center;">VISI SEKOLAH</h1>
                             <h2>BERKUALITAS DALAM</h2>
                             <ol>
                                 <li>AKADEMIK</li>
                                 <li>KEIMANAN DAN KETAQWAAN</li>
                                 <li>KEPRIBADIAN (BUDI PEKERI LUHUR)</li>
                                 <li>KEDISIPLINAN</li>
                                 <li>KESEHATAN</li>
                                 <li>KEPEDULIAN SOSIAL DAN LINGKUNGAN</li>
                             </ol>
                         </div>
                     </div>
                     <div class="col-md-6">
                         <div class="box-textVM">
                                 <h1 style="text-align: center;">MISI SEKOLAH</h1>
                                 <ol>
                                     <li>SENANTIASA MELAKSANAKAN PEMBELAJARAN YANG EFEKTIF, PARTISIPATIF DAN MENDALAM</li>
                                     <li>SENANTIASA MENDORONG DAN MEMOTIVASI SISWA UNTUK SELALU MENGEMBANGKAN DIRI SESUAI POTENSI MASING-MASING</li>
                                     <li>SENANTIASA MENINGKATKAN MUTU SUMBER DAYA MANUSIA (SDM) WARGA SEKOLAH</li>
                                     <li>SENANTIASA MENINGKATKAN KEIMANAN DAN KETAQWAAN WARGA SEKOLAH </li>
                                     <li>SENANTIASA MENGEMBANGKAN SIKAP DAN PERILAKU BERBUDI PEKERTI LUHUR</li>
                                     <li>SENANTIASA MENUMBUHKAN SEMANGAT BERDISIPLIN YANG TINGGI</li>
                                     <li>SENANTIASA MENJAGA KUALITAS KESEHATAN JASMANI MAUPUN ROHANI WARGA SEKOLAH</li>
                                     <li>SENANTIASA MENGEMBANGKAN SIKAP DAN PERILAKU PEDULI TERHADAP SESAMA MAUPUN LINGKUNGAN</li>
                                 </ol>
                         </div>
                     </div>

                 </div>
                 <div class="content">

                     </div>
             </div>
         </div>
         <div id="KaryaSS">
           <div class="container">
             <div class="row">
               <h1 style="margin-top:50px">Karya Siswa</h1>
             </div>
                <div class="columns">
                    <div class="column is-one-third"  v-for="karya in filterCreation" :key="karya.id">
                        <div class="card postlandingpage">
                            <div class="card-content">
                            <div class="imgPost">
                                <img :src="'/images/upload/'+karya.foto.filename">
                            </div>
                                <br/>
                                <h1>{{ karya.title }}</h1>
                                <h4>{{ karya.user.name }}</h4>
                                <span>{{ karya.published_at }}</span><br/>
                                <div class="contentPost"> {{getPostBody(karya.content)}} </div>
                                <router-link v-bind:to="{ name: 'PageViewBlog', params: { post: karya.slug }}"><p>Selengkapnya</p></router-link>
                            </div>
                        </div>
                    </div>
                </div>




               <div class="row" >
                   <div class="btn-box" style="margin-top:30px;">
                       <router-link v-bind:to="{ name: 'PageList', params: { kategori: 'Karya Siswa' }}"><button>Karya Lainnya</button></router-link>
                      
                       </div>

               </div>
           </div>
             </div>
             <div id="mapSec">
                     <div id="map" style="width:100%;height:400px;background:yellow;margin-top:40px;"></div>
             </div>
     </div>
</div>
</template>
<script>
import JssorSlider from 'jssor-slider'

    export default {
        data(){
            return{
                dataSlider: {
                    slider1:'dummy.png',
                    slider2:'dummy.png',
                    slider3:'dummy.png',
                    slider4:'dummy.png',
                    slider5:'dummy.png',
                    slider6:'dummy.png',
                    slider7:'dummy.png',
                    slider8:'dummy.png',
                    slider9:'dummy.png',
                    slider10:'dummy.png',
                },
                dataCreation: [],
                dataPrestasi: [],
                dataPengumuman: [],
                files:[],
            }
        },
        mounted(){
            this.getPicture();
            this.getPrestasi();
            this.getCreation();
            this.getPengumuman();
            this.getFile();
        },
        methods:{
            getFile(){
                var uri = '/api/file/landing';
                  axios.get(uri).then((response) => {
                // console.log(response.data);
                      this.files = response.data;
                  }).catch(error => {
                      // console.log(error);
                  });
            },
            getPicture(){
               let uri = '/api/images-show/slider/';
                axios.get(uri).then((response) => {
                    for(var i in response.data){
                        if(response.data[i].resized_name == 'slider1'){
                            this.dataSlider.slider1 = response.data[i].filename;
                        }else if(response.data[i].resized_name == 'slider2'){
                            this.dataSlider.slider2 = response.data[i].filename
                        }else if(response.data[i].resized_name == 'slider3'){
                            this.dataSlider.slider3 = response.data[i].filename
                        }else if(response.data[i].resized_name == 'slider4'){
                            this.dataSlider.slider4 = response.data[i].filename
                        }else if(response.data[i].resized_name == 'slider5'){
                            this.dataSlider.slider5 = response.data[i].filename
                        }else if(response.data[i].resized_name == 'slider6'){
                            this.dataSlider.slider6 = response.data[i].filename
                        }else if(response.data[i].resized_name == 'slider7'){
                            this.dataSlider.slider7 = response.data[i].filename
                        }else if(response.data[i].resized_name == 'slider8'){
                            this.dataSlider.slider8 = response.data[i].filename
                        }else if(response.data[i].resized_name == 'slider9'){
                            this.dataSlider.slider9 = response.data[i].filename
                        }else if(response.data[i].resized_name == 'slider10'){
                            this.dataSlider.slider10 = response.data[i].filename
                        }
                    }
                    this.setSlider();
                });
            },
            setSlider(){
                // console.log("slider");
                $("#slider1").attr("src", '/images/upload/'+this.dataSlider.slider1);
                $("#slider2").attr("src", '/images/upload/'+this.dataSlider.slider2);
                $("#slider3").attr("src", '/images/upload/'+this.dataSlider.slider3);
                $("#slider4").attr("src", '/images/upload/'+this.dataSlider.slider4);
                $("#slider5").attr("src", '/images/upload/'+this.dataSlider.slider5);
                $("#slider6").attr("src", '/images/upload/'+this.dataSlider.slider6);
                $("#slider7").attr("src", '/images/upload/'+this.dataSlider.slider7);
                $("#slider8").attr("src", '/images/upload/'+this.dataSlider.slider8);
                $("#slider9").attr("src", '/images/upload/'+this.dataSlider.slider9);
                $("#slider10").attr("src", '/images/upload/'+this.dataSlider.slider10);

                var jssor_1_SlideshowTransitions = [
                    {$Duration:800,x:0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                    {$Duration:800,x:-0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                    {$Duration:800,x:-0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                    {$Duration:800,x:0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                    {$Duration:800,y:0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                    {$Duration:800,y:-0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                    {$Duration:800,y:-0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                    {$Duration:800,y:0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                    {$Duration:800,x:0.3,$Cols:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                    {$Duration:800,x:0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                    {$Duration:800,y:0.3,$Rows:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                    {$Duration:800,y:0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                    {$Duration:800,y:0.3,$Cols:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                    {$Duration:800,y:-0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                    {$Duration:800,x:0.3,$Rows:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                    {$Duration:800,x:-0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                    {$Duration:800,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                    {$Duration:800,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                    {$Duration:800,$Delay:20,$Clip:3,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                    {$Duration:800,$Delay:20,$Clip:3,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                    {$Duration:800,$Delay:20,$Clip:12,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                    {$Duration:800,$Delay:20,$Clip:12,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2}
                    ];

                    var jssor_1_options = {
                    $AutoPlay: 1,
                    $SlideshowOptions: {
                        $Class: $JssorSlideshowRunner$,
                        $Transitions: jssor_1_SlideshowTransitions,
                        $TransitionsOrder: 1
                    },
                    $BulletNavigatorOptions: {
                        $Class: $JssorBulletNavigator$
                    },
                    $ThumbnailNavigatorOptions: {
                        $Class: $JssorThumbnailNavigator$,
                        $Orientation: 2
                    }
                    };
                    

                    var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

                    /*#region responsive code begin*/

                    var MAX_WIDTH = 1366;

                    function ScaleSlider() {
                        var containerElement = jssor_1_slider.$Elmt.parentNode;
                        var containerWidth = containerElement.clientWidth;

                        if (containerWidth) {

                            var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                            jssor_1_slider.$ScaleWidth(expectedWidth);
                        }
                        else {
                            window.setTimeout(ScaleSlider, 30);
                        }
                    }

                    ScaleSlider();

                    $(window).bind("load", ScaleSlider);
                    $(window).bind("resize", ScaleSlider);
                    $(window).bind("orientationchange", ScaleSlider);
                    /*#endregion responsive code end*/
            },
            getCreation(){
                  let uri = '/api/landingPagePost/Karya Siswa';
                  axios.get(uri).then((response) => {
                      this.dataCreation = response.data;
                  }).catch(error => {
                      // console.log(error);
                  });
            },
            getPrestasi(){
                  let uri = '/api/landingPagePost/Prestasi';
                  axios.get(uri).then((response) => {
                      this.dataPrestasi = response.data;
                  }).catch(error => {
                      // console.log(error);
                  });
            },
            getPengumuman(){
                  let uri = '/api/landingPagePost/Pengumuman';
                  axios.get(uri).then((response) => {
                      this.dataPengumuman = response.data;
                  }).catch(error => {
                      // console.log(error);
                  });
            },
             getPostBody (post) {
            let body = this.stripTags(post);

            return body.length > 200 ? body.substring(0, 200) + '...' : body;           
            },

            stripTags (text) {
                return text.replace(/(<([^>]+)>)/ig, '');
            }
        },
        computed: {
            

            filterCreation: function(){
                if(this.dataCreation.length) {
                    return this.dataCreation.filter((row, index) => {                         
                            if(index < 3){ 
                                return true};
                    });
                }
            },
            filterPrestasi: function(){
                if(this.dataPrestasi.length) {
                    
                    return this.dataPrestasi.filter((row, index) => {       
                            if(index < 3){ 
                                return true};
                    });
                }
            }
        }
    }
</script>


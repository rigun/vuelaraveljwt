<template>
   <div class="content">
       <div class="container">
           <div class="card">
               <div class="card-content">
                   Selamat Datang di website SMPN 4 Depok
                   <router-link v-bind:to="{path: '/login'}"><i class="fa fa-home m-r-10" aria-hidden="true"></i>  <span>Login</span> </router-link>
               </div>
           </div>
       </div>
   </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

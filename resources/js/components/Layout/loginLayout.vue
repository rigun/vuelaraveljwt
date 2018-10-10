<template>
  <div id="content">
    <nav class="navbar has-shadow is-dark">
        <div class="container">
            <div class="navbar-start">
                <a href="#" class="navbar-item">
                    <img src="/images/Logo.png" alt="Logo" />
                    <p class="m-l-15">SMP Negeri 4 Depok</p>
                </a>

            </div>
            
        </div>
    </nav>

<div class="container">
    <div class="box-login">

        <div class="alert alert-danger" v-if="loginError">
            <p>There was an error, unable to sign in with those credentials.</p>
        </div>

        <div class="login-header">
            <h1>Masuk</h1>
        </div>
        <div class="login-body">
            <form autocomplete="off" v-on:submit.prevent="submitLogin"  >
           
            <div class="field">
                    <label class="label">Username</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input " type="text" name="username"  v-model="username" required >
                        <span class="icon is-small is-left">
                        <i class="fa fa-user"></i>
                        </span>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Password</label>
                    <div class="control has-icons-left has-icons-right">
                        <input id="password" type="password" class="form-control input " name="password" v-model="password" required>
                        <span class="icon is-small is-left">
                        <i class="fa fa-lock"></i>
                        </span>
                    </div>

                 
                </div>
                <div class="columns">
                    <div class="column">
                    <input class="checkbox" type="checkbox" name="remember" id="remember"  />

                        <label class="checkbox" for="remember">
                            Ingat Saya
                        </label>
                    </div>
                    <div class="column">
                    <label class="float-right">
                </label>
                    </div>
                </div>
                
              
                <div class="field is-grouped">
                <div class="control">
                    <button class="button btn-custom">Masuk</button>
                </div>
               
                </div>
            </form>
                
        </div>
    </div>
</div>

</div>
</template>

<script>
    import store from '../../store'
    export default {
        data() {
            return {
                username: '',
                password: '',
                loginError: false,
            }
        },
        methods: {
            submitLogin() {
                this.loginError = false;
                axios.post('/api/auth/login', {
                    username: this.username,
                    password: this.password
                }).then(response => {
                    // login user, store the token and redirect to dashboard
                    store.commit('loginUser')
                    localStorage.setItem('token', response.data.access_token)
                    this.$router.push({ name: 'DashboardContent' })
                }).catch(error => {
                    this.loginError = true
                });
            }
        }
    }
</script>

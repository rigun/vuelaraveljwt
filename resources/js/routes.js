

import Vue from 'vue'
import VueRouter from 'vue-router'
import store from './store'

Vue.use(VueRouter)

const DashboardLayout = Vue.component('dashboard-layout', require('./components/Layout/dashboardLayout.vue'))
const HomeLayout = Vue.component('home-layout', require('./components/Layout/homeLayout.vue'))
const LoginLayout = Vue.component('login-layout', require('./components/Layout/loginLayout.vue'))
const Logout = Vue.component('logout', require('./components/LogoutComponent.vue'))

const DashboardContent = Vue.component('DashboardContent', require('./components/DashboardComponents/DashboardComponent.vue'))
const ListAdmin = Vue.component('ListAdmin', require('./components/DashboardComponents/AdminCreateComponent.vue'))
const ListStudents = Vue.component('ListStudents', require('./components/DashboardComponents/StudentsCreateComponent.vue'))
const DetailStudents = Vue.component('DetailStudents', require('./components/DashboardComponents/StudentsDetailComponent.vue'))
const PostComponent = Vue.component('PostComponent', require('./components/DashboardComponents/PostComponent.vue'))
const SliderComponent = Vue.component('SliderComponent', require('./components/DashboardComponents/SliderComponent.vue'))
const KaryaSiswaList = Vue.component('KaryaSiswaList', require('./components/DashboardComponents/KaryaSiswaListComponent.vue'))
const KaryaSiswaPost = Vue.component('KaryaSiswaPost', require('./components/DashboardComponents/KaryaSiswaPostComponent.vue'))


const routes = [
    {
        name: 'DashboardLayout',
        path: '/dashboard/',
        component: DashboardLayout,
        meta: { requiresAuth: true },
        children: [
            {
              name: 'DashboardContent',
              path: '',
              component: DashboardContent
            },
            {
              name: 'ListAdmin',
              path: 'admin',
              component: ListAdmin
            },
            {
                name: 'ListStudents',
                path: 'siswa',
                component: ListStudents,
              },
              {
                name: 'DetailStudents',
                path: 'siswa/detail/:id',
                component: DetailStudents,
              },
              {
                name: 'PostComponent',
                path: 'post/:kategori',
                component: PostComponent,
              },
              {
                  name: 'SliderComponent',
                  path: 'slider',
                  component: SliderComponent
              
              },
              {
                  name: 'KaryaSiswaList',
                  path: 'karyaSiswa',
                  component: KaryaSiswaList
              
              },
              {
                  name: 'KaryaSiswaPost',
                  path: 'karyaSiswa/detail',
                  component: KaryaSiswaPost
              }
          ]
      },
    {
        name: 'HomeLayout',
        path: '/',
        component: HomeLayout,
      },
    {
        name: 'LoginLayout',
        path: '/login',
        component: LoginLayout,
      },
    {
        name: 'Logout',
        path: '/logout',
        component: Logout,
      },
];
const router = new VueRouter({mode: 'history', routes: routes});
router.beforeEach((to, from, next) => {

    // check if the route requires authentication and user is not logged in
    if (to.matched.some(route => route.meta.requiresAuth) && !store.state.isLoggedIn) {
        // redirect to login page
        next({ name: 'LoginLayout' })
        return
    }

    // if logged in redirect to dashboard
    if(to.path === '/login' && store.state.isLoggedIn) {
        next({ name: 'DashboardLayout' })
        return
    }
    // if logged in redirect to dashboard
    if(to.path === '/dashboard' && !store.state.isLoggedIn) {
        next({ name: 'LoginLayout' })
        return
    }

    next()
})
export default router
import { createRouter, createWebHistory } from 'vue-router'
import Loading from '../components/HomePage.vue'
import Home from '../components/Home.vue'
import Contatcs from '../components/Contact.vue'
import Login from '../components/Login.vue'
const routes = [
  {
    path: '/',
    name: 'LoadingScreen',
    component: Loading,
  },
  
{
  path: '/home',
  name: 'HomeScreen',
  component: Home,
}
,
{
  path: '/contact',
  name: 'ContatcsScreen',
  component: Contatcs,

},
    {
      path: '/auth/login',
      name: 'Login',
      component: Login,
    }
]

const router = createRouter({
  history: createWebHistory('/ericcasellas/public/'),
  routes,
})


export default router

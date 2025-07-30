import { createRouter, createWebHistory } from 'vue-router'
import Loading from '../components/HomePage.vue'
import Home from '../components/Home.vue'
import Contatcs from '../components/Contact.vue'
import Login from '../components/Login.vue'
import Works from '../components/works/Works.vue'
import Pictures from '../components/works/Pictures.vue'
import About from '../components/about-us/About.vue'
import AddWorks from '../components/AddWorks.vue'
import AddPictures from '../components/AddPictures.vue'
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
    },
    {
        path: '/works',
        name: 'Works',
        component: Works
    },

    {
        path: '/pictures/:id',
        name: 'pictures',
        component: Pictures
    },
    {
        path: '/about',
        name: 'AboutPage',
        component: About
    },
    {
        path: '/addworks',
        name: 'AddWorks',
        component: AddWorks,
          meta: { requiresAuth: true }
    },
    {
        path: '/addpictures',
        name: 'AddPictures',
        component: AddPictures,
          meta: { requiresAuth: true }
    }
]

const router = createRouter({
  history: createWebHistory('/ericcasellas/public/'),
  routes,
});
router.beforeEach((to, from, next) => {
  const token = localStorage.getItem('auth_token');

  if (to.meta.requiresAuth && !token) {
    next({ name: 'HomeScreen' });
  } else {
    next();
  }
});

export default router

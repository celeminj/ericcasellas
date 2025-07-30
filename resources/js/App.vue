<template>
  <NavbarPage v-if="showNavbar" />
  <div data-lenis-scroll>
    <router-view />
    <FooterPage v-if="showFooter" />
  </div>
  <ArrowUp v-if="showArrow" />
</template>

<script>
import FooterPage from './components/footer/Footer.vue';
import ArrowUp from './components/ArrowUp.vue';
import NavbarPage from './components/navbar/Navbar.vue';

export default {
  name: 'App',
  components: {
    FooterPage,
    ArrowUp,
    NavbarPage
  },
  computed: {
    showFooter() {
      console.log('showFooter', this.$route.path !== '/');
      return this.$route.path !== '/';
    },
    showArrow() {
      console.log('showArrow', this.$route.path !== '/');
      return this.$route.path !== '/';
    },
    showNavbar() {
      console.log('showNavbar', this.$route.path !== '/');
      return this.$route.path !== '/';
    }
  }
}
</script>


<style>
html, body {
  margin: 0;
  padding: 0;
  height: 100%;
  overflow: auto;
}

 .lenis {
  height: auto;
}

.lenis.lenis-smooth {
  scroll-behavior: auto !important;
}

.lenis.lenis-smooth [data-lenis-scroll] {
  will-change: transform;
}
/* Puedes mantener tu estilo de fuente */
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
}


</style>

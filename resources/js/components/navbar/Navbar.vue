<template>
  <nav class="navbar-container">
    <div class="left">
        <router-link to="/home" class="name-casellas"><h1><strong>CASELLAS</strong></h1></router-link>
    </div>
    <div class="center">
      <router-link to="/home" class="nav-link">Home</router-link>
      <router-link to="/works" class="nav-link">Works</router-link>
      <router-link to="/about" class="nav-link">About</router-link>
    </div>
    <div class="right">
      <router-link to="contact" class="contact-name" >Contact</router-link>
    </div>
  </nav>
</template>

<script>
import { gsap } from 'gsap';
export default {
  name: 'NavbarPage',
    mounted() {
        const tl = gsap.timeline();
        tl.fromTo(
        '.navbar-container',
        { opacity: 0, y: -50 },
        { opacity: 1, y: 0, duration: 2, ease: 'power3.out' , smoothOrigin: true }
        );
    }
    
}
</script>

<style scoped>
.navbar-container {
   position: fixed;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 20px 50px;
  top: 0;
  width: 100%;
  z-index: 10;
  background: transparent;
  color: rgb(210, 210, 210);
  font-family: 'Urbanist', sans-serif;
  z-index: 1000;
}

.left h1 {
  margin: 0;
  font-weight: bold;
  font-size: 24px;
}

.center {
  display: flex;
  gap: 30px;
}

.right {
  display: flex;
  
}
.contact-name{
  color: rgba(0, 0, 0, 0.577);
  text-decoration: none;
  font-size: 16px;
  font-weight: 7600;
  transition: 0.3s;
}
.name-casellas {
  color: rgba(0, 0, 0, 0.577);
  text-decoration: none;
  font-size: 16px;
  font-weight: 7600;
  transition: 0.3s;
}

.name-casellas:hover {
  opacity: 0.7;
}
.nav-link {
  margin: 0 15px;
  color: rgba(0, 0, 0, 0.577);
  text-decoration: none;
  transition: transform 0.3s ease;
}

.nav-link:hover {
  transform: translateY(-5px);
}
/* -------------------------
   RESPONSIVE STYLES
------------------------- */

/* Tablets (768px o menos) */
@media (max-width: 768px) {
  .navbar-container {
    padding: 15px 30px;
    flex-direction: column;
    align-items: flex-start;
  }

  .center {
    flex-direction: column;
    gap: 15px;
    margin-top: 10px;
    width: 100%;
  }

  .right {
    margin-top: 10px;
    width: 100%;
    justify-content: flex-start;
  }

  .nav-link,
  .contact-name,
  .name-casellas {
    font-size: 14px;
  }

  .left h1 {
    font-size: 20px;
  }
}

/* Móviles (480px o menos) */
@media (max-width: 480px) {
  .navbar-container {
    padding: 10px 20px;
  }

  .center {
    gap: 10px;
  }

  .nav-link,
  .contact-name,
  .name-casellas {
    font-size: 12px;
  }

  .left h1 {
    font-size: 18px;
  }
}
</style>

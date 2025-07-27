<template>
  <nav class="navbar-container">
    <div class="left">
        <router-link to="/home" class="name-casellas"><h1><strong>CASELLAS</strong></h1></router-link>
    </div>
    <div class="center">
      <router-link to="/home" class="nav-link">Home</router-link>
      <router-link to="/works" class="nav-link">Works</router-link>
      <div v-if="user">
         <router-link to="/addworks" class="nav-link">Add Works</router-link>
      </div>
      <router-link to="/about" class="nav-link">About</router-link>
    </div>
    <div class="right">
      <div v-if="user" class="contact-name">
        Hola, {{ user.username }}
        <button @click="logout" class="logout"><svg xmlns="http://www.w3.org/2000/svg"
     class="icon icon-logout"
     viewBox="0 0 24 24"
     fill="none"
     stroke="currentColor"
     stroke-width="2"
     stroke-linecap="round"
     stroke-linejoin="round"
     width="14"
     height="14">
  <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
  <polyline points="16 17 21 12 16 7"/>
  <line x1="21" y1="12" x2="9" y2="12"/>
</svg>
</button>
      </div>
      <router-link to="contact" class="contact-name" >Contact</router-link>
    </div>
  </nav>
</template>

<script>
import { gsap } from 'gsap';
export default {
  name: 'NavbarPage',
  data(){
    return {
      user: null
    };
  },
    created() {
        const tl = gsap.timeline();
        tl.fromTo(
        '.navbar-container',
        { opacity: 0, y: -50 },
        { opacity: 1, y: 0, duration: 2, ease: 'power3.out' , smoothOrigin: true }
        );

          const userData = localStorage.getItem('auth_user');
          const token = localStorage.getItem('auth_token');
          if (userData && token) {
            this.user = JSON.parse(userData);
          }
    },
    methods: {
      logout() {
        localStorage.removeItem('auth_token');
        localStorage.removeItem('auth_user');
        this.user = null;
        this.$router.push('/home');
      }
    }

}
</script>

<style scoped>
.logout{
  border: none;
  outline: none;
}
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

<template>
   <footer class="footer-container">
    <div class="footer-content">
      <div class="left-footer">
      <h1>ERIC</h1>
      <router-link to="/home" class="name-casellas"><h1><strong>CASELLAS</strong></h1></router-link>
      <h1>©2025</h1>
      </div>
     <div class="center-footer">
      <h1>
            <router-link to="/home" class="nav-link">[Home]</router-link>
            <router-link to="/works" class="nav-link">[Works]</router-link>
            <router-link to="/about" class="nav-link">[About]</router-link>
            <router-link to="/contact" class="contact-name" >[Contact]</router-link>
            </h1>
     </div>
    </div>
   </footer>
</template>

<script>
export default {
  name: 'FooterPage',
  data() {
    return {
     
    }
  },
    mounted() {
 
    }   
}
</script>


<style scoped>
.footer-container {
 
    background: #F9F6EE;
}
.footer-content {
  width: 50%;
  color: rgb(0, 0, 0);
  display: flex;
  justify-content: space-between;
  align-items: start;
  font-family: Playfair Display, serif;
  padding: 20px;
  

}
.left-footer{
  display: flex;
  flex-direction: column;
  color: rgb(0, 0, 0);
  gap: 10px;
  margin-left: 20px;
  margin-top: 50px;

}
.left-footer h1 {
  margin: 0;
  font-weight: bold;
  font-size: 6em;
  
}

router-link  h1{
  text-decoration: none;

}
.center-footer {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 30px;
  font-family: 'Urbanist', sans-serif;
  color: rgb(0, 0, 0);
  margin-left: 500px;  
  margin-top: 70px;

}
.nav-link {
  font-size: 4rem;
  font-weight: bold;
  text-decoration: none;
  color: rgb(0, 0, 0);
  transition: color 0.3s ease;
}
.nav-link:hover {
  color: #7546ff; /* color al pasar el mouse */
}
.contact-name {
  font-size: 4rem;
  font-weight: bold;
  text-decoration: none;
  color: rgb(0, 0, 0);
  transition: color 0.3s ease;
}
.contact-name:hover {
  color: #7546ff; /* color al pasar el mouse */
}
.name-casellas {
  text-decoration: none;
  color: rgb(0, 0, 0);
  transition: color 0.3s ease;
}
.name-casellas:hover{
  color: #7546ff; /* color al pasar el mouse */ 
}
</style>

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
        <a href="https://www.instagram.com/e.casellas/"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 64 64">
        <path d="M 21.580078 7 C 13.541078 7 7 13.544938 7 21.585938 L 7 42.417969 C 7 50.457969 13.544938 57 21.585938 57 L 42.417969 57 C 50.457969 57 57 50.455062 57 42.414062 L 57 21.580078 C 57 13.541078 50.455062 7 42.414062 7 L 21.580078 7 z M 47 15 C 48.104 15 49 15.896 49 17 C 49 18.104 48.104 19 47 19 C 45.896 19 45 18.104 45 17 C 45 15.896 45.896 15 47 15 z M 32 19 C 39.17 19 45 24.83 45 32 C 45 39.17 39.169 45 32 45 C 24.83 45 19 39.169 19 32 C 19 24.831 24.83 19 32 19 z M 32 23 C 27.029 23 23 27.029 23 32 C 23 36.971 27.029 41 32 41 C 36.971 41 41 36.971 41 32 C 41 27.029 36.971 23 32 23 z"></path>
        </svg></a>
        <a href="https://www.linkedin.com/in/eric-casellas-2a8ab617a/"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 50 50">
            <path d="M41,4H9C6.24,4,4,6.24,4,9v32c0,2.76,2.24,5,5,5h32c2.76,0,5-2.24,5-5V9C46,6.24,43.76,4,41,4z M17,20v19h-6V20H17z M11,14.47c0-1.4,1.2-2.47,3-2.47s2.93,1.07,3,2.47c0,1.4-1.12,2.53-3,2.53C12.2,17,11,15.87,11,14.47z M39,39h-6c0,0,0-9.26,0-10 c0-2-1-4-3.5-4.04h-0.08C27,24.96,26,27.02,26,29c0,0.91,0,10,0,10h-6V20h6v2.56c0,0,1.93-2.56,5.81-2.56 c3.97,0,7.19,2.73,7.19,8.26V39z"></path>
        </svg>
        </a>
        <a href="https://www.flickr.com/photos/160973951@N04/"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 64 64">
        <path d="M50,8H14c-3.314,0-6,2.686-6,6v36c0,3.314,2.686,6,6,6h36c3.314,0,6-2.686,6-6V14C56,10.686,53.314,8,50,8z M22,40	c-4.418,0-8-3.582-8-8s3.582-8,8-8s8,3.582,8,8S26.418,40,22,40z M42,40c-4.418,0-8-3.582-8-8s3.582-8,8-8s8,3.582,8,8	S46.418,40,42,40z"></path>
        </svg></a>
        <a href="https://x.com/e_casellas"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 50 50">
        <path d="M 11 4 C 7.134 4 4 7.134 4 11 L 4 39 C 4 42.866 7.134 46 11 46 L 39 46 C 42.866 46 46 42.866 46 39 L 46 11 C 46 7.134 42.866 4 39 4 L 11 4 z M 13.085938 13 L 21.023438 13 L 26.660156 21.009766 L 33.5 13 L 36 13 L 27.789062 22.613281 L 37.914062 37 L 29.978516 37 L 23.4375 27.707031 L 15.5 37 L 13 37 L 22.308594 26.103516 L 13.085938 13 z M 16.914062 15 L 31.021484 35 L 34.085938 35 L 19.978516 15 L 16.914062 15 z"></path>
        </svg></a>
        <a href="tel:+622024922"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 50 50">
        <path d="M 14 3.9902344 C 8.4886661 3.9902344 4 8.4789008 4 13.990234 L 4 35.990234 C 4 41.501568 8.4886661 45.990234 14 45.990234 L 36 45.990234 C 41.511334 45.990234 46 41.501568 46 35.990234 L 46 13.990234 C 46 8.4789008 41.511334 3.9902344 36 3.9902344 L 14 3.9902344 z M 18.005859 12.033203 C 18.633859 12.060203 19.210594 12.414031 19.558594 12.957031 C 19.954594 13.575031 20.569141 14.534156 21.369141 15.785156 C 22.099141 16.926156 22.150047 18.399844 21.498047 19.589844 L 20.033203 21.673828 C 19.637203 22.237828 19.558219 22.959703 19.824219 23.595703 C 20.238219 24.585703 21.040797 26.107203 22.466797 27.533203 C 23.892797 28.959203 25.414297 29.761781 26.404297 30.175781 C 27.040297 30.441781 27.762172 30.362797 28.326172 29.966797 L 30.410156 28.501953 C 31.600156 27.849953 33.073844 27.901859 34.214844 28.630859 C 35.465844 29.430859 36.424969 30.045406 37.042969 30.441406 C 37.585969 30.789406 37.939797 31.366141 37.966797 31.994141 C 38.120797 35.558141 35.359641 37.001953 34.556641 37.001953 C 34.000641 37.001953 27.316344 37.761656 19.777344 30.222656 C 12.238344 22.683656 12.998047 15.999359 12.998047 15.443359 C 12.998047 14.640359 14.441859 11.879203 18.005859 12.033203 z"></path>
        </svg></a>
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
  color: #7546ff;
}
.contact-name {
  font-size: 4rem;
  font-weight: bold;
  text-decoration: none;
  color: rgb(0, 0, 0);
  transition: color 0.3s ease;
}
.contact-name:hover {
  color: #7546ff;
}
.name-casellas {
  text-decoration: none;
  color: rgb(0, 0, 0);
  transition: color 0.3s ease;
}
.name-casellas:hover{
  color: #7546ff;
}
</style>

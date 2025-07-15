<template>
  <div class="hero">
    <div class="gradient-bg"></div>
     <a href="about">
        <div id="text-anim" ref="textAnim">
     ABOUT ME
    </div>
     </a>
     <div class="homep3-image-container">
      <img src="../components/img/city.jpg" alt="img-home" class="img-home" />
    </div>
    <div class="second-image-container">
      <a href="https://www.instagram.com/e.casellas/">
             <img src="../components/img/ecasellas.png" alt="img-home" class="img-person" />
             <span class="text-person">Follow me on Instagram</span>
      </a>
    </div>
  </div>
</template>

<script>
import { gsap } from "gsap";

export default {
  name: "HomepP3",
  data() {
    return {
      showFooter: false,
      hasAnimated: false,
    };
  },
  mounted() {
    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting && !this.hasAnimated) {
            this.animateText(this.$refs.textAnim);
            this.hasAnimated = true;
            this.animarImagen();
            this.animarImagenPersona();
            observer.disconnect();
          }
        });
      },
      { threshold: 0.5 }
    );
    observer.observe(this.$refs.textAnim);
   
  },
  methods: {
    animarImagenPersona() {
      gsap.to(".second-image-container", {
        top: "400px",
        duration: 1,
        ease: "power3.out",
        scrollTrigger: {
          trigger: ".second-image-container",
          start: "top center",
          end: "bottom top",
          scrub: true,
        },
      });
    },
    animarImagen(){
      gsap.to(".homep3-image-container", {
            top: "250px",
            duration: 1,
            ease: "power3.out",
            scrollTrigger: {
              trigger: ".homep3-image-container",
              start: "top center",
              end: "bottom top",
              scrub: true,
            },
          });
    },
    animateText(el) {

      const textContent = el.textContent.toUpperCase();

      el.style.visibility = "hidden"; // ocultar el contenedor antes de animar
      el.textContent = ""; // limpiar texto original
      
      const meIndex = textContent.indexOf("ME");
      

        for (let i = 0; i < textContent.length; i++) {
        const char = textContent[i];
        const span = document.createElement("span");
        span.style.display = "inline-block";
        span.textContent = char === " " ? "\u00A0" : char;
         if (i === meIndex || i === meIndex + 1) {
            span.classList.add("color-ame");
          }

        el.appendChild(span);
      }

      el.style.visibility = "visible"; // hacer visible el contenedor solo cuando ya hay spans

      const spans = el.querySelectorAll("span");

      const tl = gsap.timeline({
        onComplete: () => {
          this.showFooter = true;
        },
      });

      tl.fromTo(
        spans,
        { opacity: 0, y: 20, scale: 0.95 },
        {
          opacity: 1,
          y: 0,
          scale: 1,
          ease: "power3.out",
          duration: 0.5,
          stagger: 0.07,
        }
      );
    },
  },
};
</script>

<style scoped>
:global(html) {
  overflow-y: scroll;
}

.hero {
  position: relative;
  width: 100%;
  height: 180vh;
  overflow: hidden;
  display: flex;
  align-items: center;
  justify-content: center;
  background: #F9F6EE;
}

/* Fondo radial */
.gradient-bg {
  position: absolute;
  inset: 0;
  z-index: -1;
}

/* Texto */
#text-anim {
  font-size: 18rem;
  font-weight: bolder;
  color: #000;
  text-align: center;
  font-family: "Urbanist", sans-serif;
  text-transform: uppercase;

  letter-spacing: normal;
  word-spacing: normal;
  line-height: 1.1;
  white-space: normal;

  visibility: hidden; 
  transition: color 0.8s ease;
  position: relative;
  z-index: 1;

}
#text-anim:hover{
    color: #7546ff;
    cursor: pointer;
}
.color-ame {
  color: #7546ff;
}
.homep3-image-container {
  width: 30%;
  overflow: hidden;
  position: absolute;
  top: 10px;
  left: 200px;
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: #000000; /* color hueso como fondo de la foto */
  padding: 10px; /* espacio tipo marco */
}

.img-home {
  width: 100%;
  height: auto;
  object-fit: cover;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); /* profundidad */
}
.second-image-container{
    width: 35%;
  overflow: hidden;
  position: absolute;
  top: 833px;
  left: 1110px;
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: #16093d;
  padding: 10px; 
  transition: background-color 0.3s ease;

}
.second-image-container:hover {

  background-color: #3b1c97; /* cambia el color de fondo al pasar el mouse */
}
.img-person{
    width: 100%;
  height: auto;
  object-fit: cover;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); /* profundidad */
}
.text-person {
  font-size: 1.5rem;
  font-weight: bold;
  text-decoration: none;
  display: inline-block;
  margin-top: 20px;
  margin-bottom: 10px;
  margin-left: 180px;
  text-align: center;
  color: #feffe7;
  font-family: "Urbanist", sans-serif;
}

</style>

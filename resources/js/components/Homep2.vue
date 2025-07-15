<template>
  <div class="hero">
    <div class="gradient-bg"></div>
      <router-link to="/works" class="nav-link">
        <div id="text-anim" ref="textAnim">
        See more
        </div>
      </router-link>
    <div class="home-m">
    <img src="../components/img/background1.png" alt="img-home" class="home-imagen"  />
    </div>
  
  </div>
</template>

<script>
import { gsap } from "gsap";

export default {
  name: "HomepP2",
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
            observer.disconnect();
          }
        });
      },
      { threshold: 0.5 }
    );
    observer.observe(this.$refs.textAnim);
  },
  methods: {
    animateText(el) {
      const textContent = el.textContent.toUpperCase();
      el.textContent = ""; // limpiar texto original

      for (let char of textContent) {
        const span = document.createElement("span");
        span.style.display = "inline-block";
        span.textContent = char === " " ? "\u00A0" : char;
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
.hero {
  position: relative;
  width: 100%;
  height: 150vh;
  overflow: hidden;
  display: flex;
  align-items: center;
  justify-content: center;
}

/* Fondo radial */
.gradient-bg {
  position: absolute;
  inset: 0;
  z-index: -1;
}

/* Texto */
#text-anim {
  font-size: 17rem;
  font-weight: bolder;

    color: #ffef72b2;
  text-align: center;
  font-family: "Urbanist", sans-serif;
  text-transform: uppercase;

  letter-spacing: normal;
  word-spacing: normal;
  line-height: 1.1;
  white-space: normal;

  visibility: hidden; 
  transition: color 0.8s ease;

}
#text-anim:hover{
     color: #f6ff00; 
    cursor: pointer;
}
.home-m {
  overflow: hidden;
  position: absolute;
  width: 100%;
  height: 100%;
  z-index: -1;
  transition: transform 0.5s ease;
  transform: scale(1.1);
  
}

</style>

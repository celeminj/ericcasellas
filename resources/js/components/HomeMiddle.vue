<template>
  <div class="hero-middle">
    <div class="gradient-bg"></div>
    <div id="text-anim" ref="textAnim">
      Explore my projects!
    </div>
    <div class="home-middle-image-container">
      <img src="../components/img/frame1.png" alt="img-home" class="img-frame" />
    </div>
    <div class="home-image-container-2">
      <img src="../components/img/frame2.png" alt="img-home" class="img-frame2" />
    </div>
  </div>
</template>

<script>
import { gsap } from "gsap";

export default {
  name: "HomeMiddle",
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
            this.animateImageFrame();
            this.animateImageFrame2();
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
    animateImageFrame2() {
      gsap.to(".home-image-container-2", {
        top: "1100px",
        duration: 2,
        ease: "power3.out",
        scrollTrigger: {
          trigger: ".home-image-container-2",
          start: "top center",
          end: "bottom top",
          scrub: true,
        },
      });
    },
    animateImageFrame() {
      gsap.to(".home-middle-image-container", {
        top: "900px",
        duration: 2,
        ease: "power3.out",
        scrollTrigger: {
          trigger: ".home-middle-image-container",
          start: "top center",
          end: "bottom top",
          scrub: true,
        },
      });
    },
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
.hero-middle {
  position: relative;
  width: 100%;
  height: 200vh;
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
  background: radial-gradient(125% 125% at 50% 90%, #fff 40%, #6366f1 100%);
}

/* Texto */
#text-anim {
  font-size: 17rem;
  font-weight: bolder;
  color: #000;
  text-align: center;
  font-family: "Urbanist", sans-serif;
  text-transform: uppercase;

  letter-spacing: normal;
  word-spacing: normal;
  line-height: 1.1;
  white-space: normal;
  z-index: 2;
  visibility: hidden;   /* evitar parpadeo del texto original */
}
.home-middle-image-container{
  width: 30%;
  overflow: hidden;
  position: absolute;
  top: 500px;
  left: 25%;
  rotate: -12deg;
  transform: translate(-50%, -50%);
  z-index: 1;
}
.home-image-container-2 {
  width: 30%;
  overflow: hidden;
  position: absolute;
  top: 500px;
  right: -25%;
  rotate: 6.4deg;
  transform: translate(-50%, -50%);
  z-index: 1;
}
</style>

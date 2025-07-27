<template>
  <div class="hero-container">
    <div class="hero-background"></div>

    <div class="hero-content">
      <!-- Imagen a la izquierda -->
      <div class="hero-image-wrapper">
        <img
          src="https://i.postimg.cc/3RMn3S85/upscalemedia-transformed.jpg"
          alt="Eric Casellas"
          class="hero-images-info"
        />
      </div>

      <div class="hero-text" ref="textAnim">
        <ul class="hero-text-list">
          <li><span>PHOTOGRAPHER</span></li>
          <li><span>BARCELONA, SPAIN</span></li>
          <li><span>FILM AND DIGITAL</span></li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
import { gsap } from "gsap";

export default {
  name: "AboutShortInfo",
  data() {
    return {
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
      const spans = el.querySelectorAll("li span");

      el.style.visibility = "visible";

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
          duration: 1.5,
          stagger: 0.3,
        }
      );
    },
  },
};
</script>

<style scoped>
.hero-container {
  position: relative;
  width: 100%;
  height: 100vh;
  overflow: hidden;
  display: flex;
  align-items: center;
  justify-content: center;
}

.hero-background {
  position: absolute;
  inset: 0;
  z-index: -1;
}

.hero-content {
  display: flex;
  align-items: center;
  justify-content: space-between;
  max-width: 1600px;
  width: 90%;
  z-index: 1;
}

.hero-image-wrapper {
  flex: 1;
  max-width: 50%;
  overflow: hidden;
  padding-right: 2rem;
}

.hero-images-info {
  width: 100%;
  height: auto;
  object-fit: cover;
  border-radius: 20px;
  transform: scale(1.05);
  transition: transform 0.5s ease;
}

.hero-text {
  flex: 1;
  visibility: hidden;
  padding-left: 3rem;
}

.hero-text-list {
  list-style: none;
  padding: 0;
  margin: 0;
}

.hero-text-list li {
  margin: 1rem 0;
  font-size: 5rem;
  font-weight: bold;
  color: #020202e2;
  line-height: 1.2;
  transition: color 0.3s ease;
}

.hero-text-list li span:hover {
  color: #020202;
  cursor: pointer;
}
</style>

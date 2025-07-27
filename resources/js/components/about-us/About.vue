<template>
  <div class="about-page">
    <!-- <div class="image-section" ref="imageSection">
      <img src="https://i.postimg.cc/3RMn3S85/upscalemedia-transformed.jpg" alt="Eric Casellas" class="about-image">

    </div>
    <div class="text-overlay" ref="textOverlay">
        <h1>About me</h1>
        <h1>Eric Casellas Padró</h1>
      </div> -->
  <AboutShortInfo />
    <AboutDesc />
     </div>
</template>


<script>
import { onMounted, ref } from 'vue';
import gsap from 'gsap';
import AboutShortInfo from './About-short-info.vue';
import AboutDesc from './About-desc.vue';
export default {
  name: 'AboutPage',
  components: {
    AboutShortInfo,
    AboutDesc
  },
  setup() {
    const imageSection = ref(null);
    const textOverlay = ref(null);

    onMounted(() => {
      gsap.to(textOverlay.value, {
        scrollTrigger: {
          trigger: imageSection.value,
          start: 'top top',
          end: 'bottom top',
          scrub: true,
           pinSpacing: false
        },
        ease: 'none',
        scale: 0.5,
        y: 100

      });
    });

    return {
      imageSection,
      textOverlay
    };
  }
}
</script>


<style scoped>
.about-page {
  display: flex;
  flex-direction: column;
  gap: 2rem;
}

.image-section {
  position: relative;
  width: 100%;
  height: 180vh;
  overflow: hidden;
}

.about-image {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
}

.text-overlay {
  position: absolute;
  top: 20%;
  left: 50%;
  transform: translate(-50%, 0);
  width: max-content;
  text-align: center;
  z-index: 10;
}

.text-overlay h1 {
   font-weight: 700;
    font-size: 11rem;
    color: white;
   letter-spacing: -20px;
     text-transform: uppercase;
  }
</style>

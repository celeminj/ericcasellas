<template>
  <div class="image-container">
    <div id="text-anim-homepage">Eric Casellas</div>
    <img src="../components/img/download.jpg" alt="img-home" class="img-home" :class="{ zoomedOut: finished }" />
  </div>
  <HomeMiddle />
  <HomepP2 />
  <HomepP3 />
  <FooterPage v-if="showFooter" />
</template>

<script>
import { gsap } from 'gsap';
import HomeMiddle from './HomeMiddle.vue';
import HomepP2 from './Homep2.vue';
import HomepP3 from './Homep3.vue';
export default {
  name: 'HomePage',
  components: {
    HomeMiddle,
    HomepP2,
    HomepP3,
  },
  data() {
    return {
      progress: 0,
      finished: false,
      intervalId: null,
      showFooter: false
    }
  },
  mounted() {
  const animation_text = (element) => {
    const text = document.querySelector(element);
    const textContent = text.textContent.toUpperCase();
    text.innerHTML = '';

    for (let i = 0; i < textContent.length; i++) {
      const char = textContent[i] === ' ' ? '\u00A0' : textContent[i];
      text.innerHTML += `<span style="display:inline-block;">${char}</span>`;
    }

    const spans = text.querySelectorAll('span');

    const tl = gsap.timeline({
      onComplete: () => {
        this.showFooter = true;  // Aquí se activa cuando acaba todo
      }
    });

    tl.fromTo(
      spans,
      { opacity: 0, y: 20, scale: 0.95 },
      {
        opacity: 1,
        y: 0,
        scale: 1,
        smooth: true,
        ease: "power3.out",
        duration: 0.8,
        stagger: 0.07,
      }
    );
  };

animation_text("#text-anim-homepage");

}

}
</script>


<style scoped>
:global(html) {
  overflow-y: scroll;
}

.image-container {
  width: 100%;
  height: 100vh;
  overflow: hidden;
  background: #000000;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  position: relative;
}

.img-home {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  transform-origin: center;
  transform: scale(1);
  transition: transform 1.2s ease;
  pointer-events: none;
  z-index: 0;
}

#text-anim-homepage {
  color: #e5eb3d; 
  font-size: 100px;
  font-weight: bold;
  text-align: center;
  text-transform: uppercase;
  position: absolute;
  font-family: 'Urbanist', serif;
  top: 45%;
  left: 50%;
  transform: translateX(-50%);
  z-index: 1;
  display: inline-block;
  line-height: 1.1;
}

/* ✅ Tablet (hasta 1024px) */
@media (max-width: 1024px) {
  #text-anim-homepage {
    font-size: 70px;
  }
}

/* ✅ Móviles grandes (hasta 768px) */
@media (max-width: 768px) {
  #text-anim-homepage {
    font-size: 50px;
    top: 43%;
  }

  .image-container {
    height: 90vh;
    padding: 0 20px;
  }
}

/* ✅ Móviles pequeños (hasta 480px) */
@media (max-width: 480px) {
  #text-anim-homepage {
    font-size: 36px;
    top: 40%;
  }

  .image-container {
    height: 85vh;
    padding: 0 15px;
  }
}

</style>

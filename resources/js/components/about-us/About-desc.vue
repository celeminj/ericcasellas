<template>
  <div class="about-wrapper">
    <div class="about-section" ref="section">
      <img
        ref="image"
        class="circular-img"
        src="https://user-photos.cherrydeck.com/126185/assets/web_sessi%25C3%25B3-1.jpg"
        alt="Circle"
      />
    </div>

    <div class="cv-section">
      <div class="education">
        <h2>Education</h2>
        <ul>
          <li>60h Course of ZBrush Modelling – CEV Barcelona (2016)</li>
          <li>Online Course of Blender 3D Modelling (2018)</li>
          <li>Medium Grade in Interactive Graphic Design (2016–2018)</li>
          <li>Superior Grade in Audiovisual Graphics (2018–2020)</li>
        </ul>
      </div>

      <div class="knowledge">
        <h2>Knowledge</h2>
        <ul>
          <li>Photoshop</li>
          <li>Illustrator</li>
          <li>Lightroom</li>
          <li>InDesign</li>
          <li>Adobe Animate</li>
          <li>Premiere</li>
          <li>After Effects</li>
          <li>Adobe Dreamweaver</li>
          <li>Blender 3D</li>
          <li>ZBrush</li>
          <li>Windows – High</li>
          <li>MacOS – Medium</li>
        </ul>
      </div>

      <div class="experience">
        <h2>Laboral Experience</h2>
        <h3>Graphic Design – DeMomentSomTres</h3>
        <ul>
          <li>200h of practices</li>
          <li>I was the Junior Designer. I created ads for Facebook and Instagram and assisted with various in-house projects.</li>
        </ul>
      </div>
       <img
        src="https://user-photos.cherrydeck.com/126185/assets/web_sessi%25C3%25B3-1.jpg"
      />
    </div>
  </div>
</template>

<script>
export default {
  name: "AboutScroll",
  mounted() {
    const section = this.$refs.section;
    const image = this.$refs.image;

    gsap.to(image, {
      scrollTrigger: {
        trigger: section,
        start: "top center",
        end: "+=3000",
        scrub: true,
        smoothChildScrolling: true,
      },
      width: "100vw",
      height: "100vh",
      borderRadius: "0%",
      ease: "none",
    });
  },
};
</script>

<style scoped>
.about-wrapper {
  min-height: 200vh;
  font-family: 'Helvetica Neue', sans-serif;
  color: #333;
  padding-bottom: 5rem;
}

.about-section {
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  overflow: hidden;
  position: relative;
}

.circular-img {
  width: 300px;
  height: 300px;
  border-radius: 50%;
  object-fit: cover;
}

.cv-section {
  max-width: 1500px;
  margin: 0 auto;
  padding: 4rem 2rem;
  border-radius: 12px;
}

.cv-section h2 {
  font-size: 1.8rem;
  margin-bottom: 1rem;
  padding-bottom: 0.5rem;
  color: #222;
}

.cv-section h3 {
  font-size: 1.2rem;
  margin-top: 1.5rem;
  color: #555;
}

.cv-section ul {
  padding-left: 1.2rem;
  margin-top: 0.5rem;
}

.cv-section li {
  margin-bottom: 0.5rem;
  line-height: 1.6;
  list-style-type: disc;
}
</style>

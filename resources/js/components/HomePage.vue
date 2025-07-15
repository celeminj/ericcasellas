<template>
  <div class="image-container">
    <div class="progress-text">{{ progress }}%</div>
    <div class="progress-bar">
      <div class="progress" :style="{ width: progress + '%' }"></div>
    </div>
     <img src="../components/img/download.jpg" alt="img-home" class="img-home" :class="{ zoomedOut: finished }" />
  </div>
</template>

<script>
export default {
  name: 'LoadingScreen',
  data() {
    return {
      progress: 0,
      finished: false,
      intervalId: null,
    }
  },
  mounted() {
    this.intervalId = setInterval(() => {
      if (this.progress < 100) {
        this.progress++
        if (this.progress === 100) {
          this.finished = true
            setTimeout(() => {
            this.$router.push({ name: 'HomeScreen' })
            }, 2000) // Espera 1 segundo antes de redirigir
        }
      } else {
        clearInterval(this.intervalId)
        this.finished = true
      }
    }, 20)
  }
}
</script>

<style scoped>
:global(html, body) {
  margin: 0;
  padding: 0;
  height: 100%;
}

.image-container {
  width: 100%;
  height: 100vh; /* ocupa toda la altura de la ventana */
  overflow: hidden;
  position: relative;
  background: #000000;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}


.progress-text {
  color: rgb(255, 255, 255);
  font-size: 24px;
  margin-bottom: 10px;
  font-weight: bold;
  z-index: 1;
  text-shadow: 1px 1px 3px rgba(0,0,0,0.7);
}

.progress-bar {
  width: 80%;
  height: 10px;
  background: #444;
  border-radius: 5px;
  margin-bottom: 20px;
  overflow: hidden;
}

.progress {
  height: 100%;
  background: #42b983;
  width: 0;
  transition: width 0.2s ease;
}

.img-home {
  width: 100%;
  height: auto;
  object-fit: cover;
  
  transform-origin: center;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%) scale(3.5);
  transition: transform 1.5s ease;
  pointer-events: none;
}


.zoomedOut {
  transform: translate(-50%, -50%) scale(1);
}
</style>

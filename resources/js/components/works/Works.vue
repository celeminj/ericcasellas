<template>
  <div class="container-pictures" v-for="(pc, index) in pictures" :key="index">
    <a href="worksonpicture" class="picture-wrapper">
      <img :src="pc.url" :alt="pc.title" />
      <div class="overlay-text">
        <h2>{{ pc.title }}</h2>
        <div class="description-pic">
          <p>Fecha: {{ pc.fecha }}</p>
          <p>{{ pc.hora }}</p>
          <p>Subido por {{ pc.usuario }}</p>
        </div>
      </div>
    </a>
  </div>
</template>

<script>
export default {
  name: 'Works',
  data() {
    return {
      pictures: [
        {
          url: 'https://i.postimg.cc/C5YgPfDr/gelida.jpg',
          title: 'Fotos de Gelida',
          fecha: '29/07/2025',
          hora: '12:23',
          usuario: 'Eric Casellas'
        },
         {
          url: 'https://i.postimg.cc/C5YgPfDr/gelida.jpg',
          title: 'Fotos de Gelida',
          fecha: '29/07/2025',
          hora: '12:23',
          usuario: 'Eric Casellas'
        },
         {
          url: 'https://i.postimg.cc/C5YgPfDr/gelida.jpg',
          title: 'Fotos de Gelida',
          fecha: '29/07/2025',
          hora: '12:23',
          usuario: 'Eric Casellas'
        },
         {
          url: 'https://i.postimg.cc/C5YgPfDr/gelida.jpg',
          title: 'Fotos de Gelida',
          fecha: '29/07/2025',
          hora: '12:23',
          usuario: 'Eric Casellas'
        },
         {
          url: 'https://i.postimg.cc/C5YgPfDr/gelida.jpg',
          title: 'Fotos de Gelida',
          fecha: '29/07/2025',
          hora: '12:23',
          usuario: 'Eric Casellas'
        },

      ]
    }
  }
}
</script>

<style scoped>
.container-pictures {
  width: 100%;
  max-width: 1500px;
  margin: auto;
  padding-bottom: 2rem;
  margin-top: 7%;
}

.picture-wrapper {
  position: relative;
  display: block;
  width: 100%;
  overflow: hidden;
  border-radius: 20px;
}

.picture-wrapper img {
  width: 100%;
  height: auto;
  display: block;
  object-fit: cover;
  border-radius: 20px;
}

.overlay-text {
  position: absolute;
  top: 0;
  left: 0;
  color: white;
  background: rgba(0, 0, 0, 0.5); /* fondo semitransparente */
  width: 100%;
  padding: 1rem;
  border-top-left-radius: 20px;
  border-top-right-radius: 20px;
}

.overlay-text h2 {
  margin: 0;
  font-size: 1.5rem;
}

.description-pic {
  display: flex;
  flex-direction: column;
  gap: 4px;
  font-size: 0.9rem;
  margin-top: 0.5rem;
}

a {
  text-decoration: none;
  color: inherit;
}

</style>

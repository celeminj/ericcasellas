<template>
  <div class="container-pictures" v-for="album in albumes" :key="album.id_album" v-if="albumes.length > 0">
  <router-link :to="`/pictures/${album.id_album}`" class="picture-wrapper">
      <img :src="getImageUrl(album.image_rute)" :alt="album.title" />
      <div class="overlay-text">
        <h2>{{ album.title }}</h2>
        <div class="description-pic">
          <p>Fecha: {{ formatDate(album.date_creation) }}</p>
          <p>{{ album.description_album }}</p>
          <p>Subido por {{ album.user?.username || 'Eric Casellas' }}</p>
        </div>
      </div>
    </router-link>
  </div>
    <div v-else class="container-pictures">
        <div class="download-wrapper">
            <img src="https://upload.wikimedia.org/wikipedia/commons/b/b1/Loading_icon.gif" alt="Cargando álbumes..." />
        <h1>Cargando álbumes disponibles...</h1>
        </div>
    </div>
</template>

<script>
import api from '../../bootstrap'
export default {
  name: 'Works',
  data() {
    return {
      albumes: []
    };
  },
  mounted() {
    this.fetchAlbums();
  },
  methods: {
    async fetchAlbums() {
      try {
        const response = await api.get('album');
        console.log('Albums:', response.data);
        this.albumes = response.data;
      } catch (error) {
        console.error('Error:', error.response || error);
      }
    },
    getImageUrl(imagePath) {
      if (!imagePath) return '/placeholder.jpg';

      if (imagePath.startsWith('http')) return imagePath;

          const baseUrl = import.meta.env.VITE_BACKEND_URL.replace(/\/+$/, ''); // quita / final si hay
        return `${baseUrl}/storage/${imagePath}`;
    },
    formatDate(dateString) {
      return new Date(dateString).toLocaleDateString('es-ES');
    }
  }
}
</script>

<style scoped>
.container-pictures {
  width: 100%;
    display: flex;
    height: 100%;
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
.download-wrapper{
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100%;
    width: 100%;
    text-align: center;

    }
.download-wrapper h1 {
    font-size: 2rem;
    color: #333;
  font-family: 'Urbanist', sans-serif;
    margin-top: 1rem;
}
</style>

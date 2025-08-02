<template>
  <div v-if="albumes.length > 0">
    <div
      class="album-block"
      v-for="(album, index) in albumes"
      :key="album.id_album"
      :class="{ 'reverse': index % 2 !== 0 }"
    >
      <router-link :to="`/pictures/${album.id_album}`" class="image-block">
        <img :src="getImageUrl(album.image_rute)" :alt="album.title" />
      </router-link>

      <div class="text-block">
        <h2>{{ album.title }}</h2>
        <div class="description-pic">
          <p>Fecha: {{ formatDate(album.date_creation) }}</p>
          <p>{{ album.description_album }}</p>
          <p>Subido por {{ album.user?.username || 'Eric Casellas' }}</p>
        </div>
      </div>
    </div>
  </div>

  <div v-else class="download-wrapper">
    <img src="https://upload.wikimedia.org/wikipedia/commons/b/b1/Loading_icon.gif" alt="Cargando álbumes..." />
    <h1>Cargando álbumes disponibles...</h1>
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
.album-block {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 2rem;
  padding: 4rem 1rem;
  max-width: 2000px;
  margin: 0 auto;
  flex-wrap: wrap;
    font-family: 'Urbanist', sans-serif;
    text-align: center;
}

.album-block.reverse {
  flex-direction: row-reverse;
  text-align: center;
}

.image-block {
  flex: 1 1 50%;
  overflow: hidden;
  height: 400px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.image-block img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
}
.image-block img:hover {
  transform: scale(1.05);
  transition: transform 0.3s ease;
}
.image-block img:active {
  transform: scale(0.95);
}
.image-block img:focus {
  outline: none;
}
.text-block {
  flex: 1 1 40%;
  padding: 1rem;
  font-family: 'Urbanist', sans-serif;
    color: #333;
    cursor: pointer;
  transition: all 0.5s ease;
}

.text-block h2 {
  font-size: 3rem;
  margin-bottom: 1rem;
  text-transform: uppercase;
  font-weight: 700;
  transition: all 0.3s ease;
}
.text-block:hover {
  color: #000;
  font-family: 'Playfair Display', serif;
}

.description-pic {
  font-size: 1rem;
  line-height: 1.6;
  color: #333;
}

.download-wrapper {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  height: 100%;
  width: 100%;
  text-align: center;
  padding: 4rem;
}

.download-wrapper h1 {
  font-size: 2rem;
  color: #333;
  font-family: 'Urbanist', sans-serif;
  margin-top: 1rem;
}

a {
  text-decoration: none;
  color: inherit;
}


</style>

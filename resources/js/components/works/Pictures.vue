<template>
  <div class="container-pictures">
    <div v-if="loading" class="download-wrapper">
      <img src="https://upload.wikimedia.org/wikipedia/commons/b/b1/Loading_icon.gif" alt="Cargando álbumes..." />
      <h1>Cargando álbumes disponibles...</h1>
    </div>

    <div v-else-if="pictures.length === 0" class="error-message">
      <img src="https://media.tenor.com/kVrGzZGZnUUAAAAM/pulp-fiction-wtf.gif" alt="No hay imágenes disponibles" />
      <h1>Not found</h1>
    </div>

    <div v-else class="gallery">
      <div
        v-for="(pic, index) in pictures"
        :key="pic.id_picture"
        class="picture-item"
        @click="openGallery(index)"
      >
        <img :src="getImageUrl(pic.ruta_picture)" :alt="pic.title" />
        <p>Fecha: {{ formatDate(pic.date_creation) }}</p>
        <p>Subido por {{ pic.user?.username || 'Eric Casellas' }}</p>
        <h3>{{ pic.title }}</h3>
        <p>{{ pic.description_picture }}</p>
      </div>
    </div>
  </div>
</template>

<script>
import PhotoSwipeLightbox from 'photoswipe/lightbox';
import 'photoswipe/style.css';
import api from '../../bootstrap';

export default {
  name: 'pictures',
  data() {
    return {
      pictures: [],
      loading: true,
      error: null,
      lightbox: null,
    };
  },
  mounted() {
    const albumId = this.$route.params.id;
    this.fetchPictures(albumId);
  },
  beforeUnmount() {
    if (this.lightbox) {
      this.lightbox.destroy();
    }
  },
  methods: {
    async fetchPictures(albumId) {
      try {
        const response = await api.get(`/album/${albumId}/pictures`);
        this.pictures = response.data;
        this.initLightbox();
      } catch (error) {
        this.error = 'No se pudieron cargar las imágenes.';
        console.error(error);
      } finally {
        this.loading = false;
      }
    },
    getImageUrl(imagePath) {
      if (!imagePath) return '/placeholder.jpg';
      if (imagePath.startsWith('http')) return imagePath;
      const baseUrl = import.meta.env.VITE_BACKEND_URL.replace(/\/+$/, '');
      return `${baseUrl}/storage/${imagePath}`;
    },
    formatDate(dateString) {
      return new Date(dateString).toLocaleDateString('es-ES');
    },
    async initLightbox() {
        const imageData = await Promise.all(
            this.pictures.map(pic => {
                return new Promise((resolve) =>{
                    const img = new Image();
                    const src = this.getImageUrl(pic.ruta_picture);
                    img.src = src;
                    img.onload = () => {
                        resolve({
                            src,
                            w: img.naturalWidth,
                            h: img.naturalHeight,
                            title: pic.title,
                            description: pic.description_picture,
                            date: this.formatDate(pic.date_creation),
                });
            }; img.onerror = () => {
                resolve({
                    src,
                    w: 800,
                    h: 600,
                    title: pic.title,
                });
            };
        });
    })
  );
      this.lightbox = new PhotoSwipeLightbox({
       dataSource: imageData,
        pswpModule: () => import('photoswipe'),
      });
      this.lightbox.init();
    },
    openGallery(index) {
      this.lightbox.loadAndOpen(index);
    }
  }
};
</script>

<style scoped>
.gallery {
  columns: 3 250px;
  column-gap: 1rem;
  padding: 1rem;
 margin-top: 50px;
   cursor: pointer;
}

.picture-item {
  break-inside: avoid;
  margin-bottom: 1rem;
  background: #ffffff;
  overflow: hidden;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
  padding: 0.5rem;
}

.picture-item img {
  width: 100%;
  height: auto;
  object-fit: cover;
}


.error-message{
    text-align: center;
    margin-top: 6rem;

}
.error-message h1 {
  margin-top: 1rem;
  font-size: 2rem;

}
.error-message img {
  width: 20%;
  height: auto;
  border-radius: 8px;
    margin-bottom: 1rem;
    display: block;
    margin-left: auto;
    margin-right: auto;
    max-width: 100%;
    height: auto;
    border-radius: 20px;
    object-fit: cover;
}
</style>

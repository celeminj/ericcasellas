<template>

  <div class="container-form" >
   <div class="form-contact">
    <h1><strong>CONTACT</strong></h1>
    <form @submit.prevent="sendMessage">
      <div class="form-group">
        <label for="name">Name *</label>
        <input type="text" id="name" name="name" v-model="form.name" required>
        <label for="email">Email *</label>
        <input type="email" id="email" name="email" v-model="form.email" required>
        <label for="message">Message</label>
        <textarea id="message" name="message" rows="4" v-model="form.message" required></textarea>
      </div>
      <div v-if="success" class="success-message">{{ success }}</div>
      <div v-if="error" class="error-message">{{ error }}</div>
         <button type="submit" :disabled="sending" class="animated-brackets">
        {{ sending ? '[Enviando...]' : 'Send' }}
        </button>
    </form>
   </div>
  <div class="image-container">
    <span class="hover-text">Marcos Alcaraz</span>
    <img src="https://i.postimg.cc/JnSGp5Dp/contactus.jpg" alt="Contact Image" class="img-contact" />
  </div>
  </div>
</template>

<script>
import axios from 'axios';
import api from '../bootstrap.js';
export default {
  name: 'ContatcsScreen',
  data() {
    return {
      form: {
        name: '',
        email: '',
        message: ''
      },
      sending: false,
      error: null,
      success: null
    }
  },
  methods: {
    async sendMessage() {
      this.sending = true;
      this.error = null;
      this.success = null;

      try {
        const response = await api.post('/contact', this.form);
        this.success = response.data.message;
        setTimeout(() => {
          this.success = null;
        }, 5000);

        this.resetForm();
      } catch (err) {
        if (err.response && err.response.data) {
          this.error = err.response.data.message || 'Error al enviar el mensaje';
        } else {
          this.error = 'Error de conexión';
        }
      } finally {
        this.sending = false;
      }
    },
    resetForm() {
      this.form.name = '';
      this.form.email = '';
      this.form.message = '';
    }
  }
}

</script>


<style scoped>
.success-message {
   margin-bottom: 3rem;
  padding: 1rem;
  background-color: #d4edda;
  color: #155724;
  border: 1px solid #c3e6cb;
  border-radius: 5px;
  font-weight: bold;
}

.error-message {
  padding: 1rem;
  margin-bottom: 3rem;
  background-color: #f8d7da;
  color: #721c24;
  border: 1px solid #f5c6cb;
  border-radius: 5px;
  font-weight: bold;
}

.container-form{
      font-family: 'Urbanist', sans-serif;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 20px;
  background-color: #f0f0f0;
  height: 100vh;

}
.form-contact {
     font-family: 'Urbanist', sans-serif;
  width: 90%;
  max-width: 500px;
  margin: 0 auto;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  background-color: #f9f9f9;
  border: 8px solid black;
  padding: 20px 20px 0 20px;

}
.form-contact h1 {
  text-align: center;
  font-size: 34px;
  margin-bottom: 30px;
  color: #000000;
  font-weight: bold;

}
.form-contact .form-group {
  display: flex;
  flex-direction: column;

}
.form-contact label {
  margin-bottom: 5px;
  font-weight: bold;

}
.form-contact input,
.form-contact textarea {
  padding: 10px;
  margin-bottom: 25px;
  border: 1px solid #000000;
    border: 2px solid black;
}
.form-contact input:focus,
.form-contact textarea:focus {
  border-color: #000000;
  outline: none;
}
.form-contact textarea {
  resize: vertical;
  height: 100px;
}

.animated-brackets {
  position: relative;
  background-color: #000000;
  color: white;
  width: 100%;
  font-size: 16px;
  font-weight: bold;
  padding: 10px;
  border: 8px solid black;
  border-top: none;
  border-radius: 0;
  cursor: pointer;
  transform: translateY(-25px);
  margin-bottom: 30px;
  overflow: hidden;
  transition: all 0.3s ease;
  font-family: 'Urbanist', sans-serif;
}

/* Pseudo-elementos para los corchetes */
.animated-brackets::before,
.animated-brackets::after {
  opacity: 0;
  transition: opacity 0.4s ease;
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  font-family: inherit;
  font-weight: bold;
  font-size: inherit;
  color: inherit;
}

.animated-brackets::before {
  content: "[";
  left: 85px;
}

.animated-brackets::after {
  content: " ]";
  right: 85px;
}

/* Al pasar el ratón se muestran los corchetes */
.animated-brackets:hover::before,
.animated-brackets:hover::after {
  opacity: 1;
  transform: translateY(-50%) scale(1.1);
  transition: opacity 0.4s ease, transform 0.4s ease;

}

.form-group{
  display: flex;
  flex-direction: column;
  width: 100%;
  margin-bottom: 15px;
  height: 400px;
}
.image-container {
   position: relative;
    display: inline-block;
  max-width: 580px;
  margin: 0 auto;
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 10px;
  width: 100%;
  height: 130vh;
}
.img-contact {
  height: 70%;
  width: 100%;
  object-fit: cover;
  transition: filter 0.5s ease;
}
.img-contact:hover {
  filter: brightness(0.3);
}
.hover-text {
  display: none;
  position: absolute;
  bottom: 600px; /* Puedes ajustar según necesites */
  left: 50%;
  transform: translateX(-50%);
  color: white;
  padding: 5px 10px;
  border-radius: 4px;
  font-size: 14px;
  white-space: nowrap;
  z-index: 10;
}

.image-container:hover .hover-text {
  display: block;
}
</style>

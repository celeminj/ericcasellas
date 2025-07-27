<template>
  <div class="outer-container">
  <div class="form-container">
    <h2>Login</h2>
    <form @submit.prevent="loginUser">
      <div class="name-container">
        <label for="name">Username:</label>
        <input type="text" v-model="user.username" name="username" required />
      </div>
      <div class="email-container">
        <label for="email">Password:</label>
        <input type="password" v-model="user.password" name="password" required />
      </div>
      <button type="submit" :disabled="sending">Iniciar sesión</button>
    </form>
    <div v-if="error" class="error-message">{{ error }}</div>
    <div v-if="success" class="success-message">{{ success }}</div>
  </div>
   </div>
</template>

<script>
import api from '../bootstrap.js';

export default {
  name: 'Login',
  data() {
    return {
      user: {
        username: '',
        password: ''
      },
      sending: false,
      error: '',
      success: ''
    };
  },
  methods: {
    async loginUser() {
      this.sending = true;
      this.error = '';
      this.success = '';
      try {
        const response = await api.post('/register', this.user);

          localStorage.setItem('auth_token', response.data.token);
          localStorage.setItem('auth_user', JSON.stringify(response.data.user));

        this.success = response.data.message;

      console.log("Token: " + response.data.token)
      console.log(response.data);

          this.$router.push('/works')
      } catch (error) {
        if (error.response && error.response.data && error.response.data.message) {
          this.error = error.response.data.message;
        } else {
          this.error = 'Error al registrar el usuario';
        }
      } finally {
        this.sending = false;
      }
    }
  }
};
</script>



<style scoped>
.outer-container {
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
  background-color: #f0f4f8; /* opcional para contraste */
}

.form-container {
  width: 400px;
  padding: 2rem;
  text-align: center;
  font-family: "Urbanist", sans-serif;
  background-color: aliceblue;
  border-radius: 20px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

.name-container,
.email-container {
  margin-bottom: 20px;
}

input {
  width: 100%;
  padding: 8px;
  border: 1px solid black;
  border-radius: 5px;
}

button {
  padding: 10px 20px;
  border: none;
  background-color: #007bff;
  color: white;
  font-weight: bold;
  cursor: pointer;
  border-radius: 5px;
}

button:disabled {
  background-color: #aaa;
  cursor: not-allowed;
}

.error-message {
  color: red;
  margin-top: 10px;
}

.success-message {
  color: green;
  margin-top: 10px;
}
</style>

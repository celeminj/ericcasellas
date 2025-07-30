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
        <div class="checkbox-container">
            <input type="checkbox" id="remember"  v-model="user.remember"  />
            <label for="remember">Remember me</label>
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
        password: '',
        remember: false
      },
      sending: false,
      error: '',
      success: ''
    };
  },
 mounted() {
  const rememberedUsername = localStorage.getItem('remembered_username');
  const rememberedPassword = localStorage.getItem('remembered_password');
  if (rememberedUsername && rememberedPassword) {
    this.user.username = rememberedUsername;
    this.user.password = rememberedPassword;
    this.user.remember = true;
  }
}
,
  methods: {
    async loginUser() {
      this.sending = true;
      this.error = '';
      this.success = '';
      try {
        const response = await api.post('/auth/login', this.user);

          localStorage.setItem('auth_token', response.data.token);
          localStorage.setItem('auth_user', JSON.stringify(response.data.user));

        this.success = response.data.message;

      console.log("Token: " + response.data.token)
      console.log(response.data);
                if (this.user.remember) {
                localStorage.setItem('remembered_username', this.user.username);
                localStorage.setItem('remembered_password', this.user.password);
            } else {
                localStorage.removeItem('remembered_username');
                localStorage.removeItem('remembered_password');
            }
            window.dispatchEvent(new Event('login'));

          this.$router.push('/addworks')
      } catch (error) {
        if (error.response && error.response.data && error.response.data.message) {
          this.error = error.response.data.message;
        } else {
          this.error = 'Error al Iniciar sesion, por favor intente de nuevo.';
        }
      } finally {
        this.sending = false;
      }
    }
  }
};
</script>



<style scoped>
.checkbox-container{
    display: flex;
    align-items: center;
    margin-bottom: 20px;
    font-family: "Urbanist", sans-serif;
}
.checkbox-container label {
  margin-left: 10px;
  font-size: 14px;
  color: #333;
}
.checkbox-container input {
    width: 20px;
    height: 20px;
    cursor: pointer;
    accent-color: #007bff; /* Cambia el color del checkbox */
    border-radius: 5px;
    border: 1px solid #ccc;
    transition: background-color 0.3s ease, border-color 0.3s ease;
}
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

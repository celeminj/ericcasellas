<template>
  <div class="form-container">
    <h2>Login</h2>
    <form @submit.prevent="loginUser">
      <div class="name-container">
        <label for="name">Name:</label>
        <input type="text" v-model="user" name="username" required />
      </div>
      <div class="email-container">
        <label for="email">Email:</label>
        <input type="email" v-model="user" name="password" required />
      </div>
      <button type="submit" :disabled="sending">Iniciar session</button>
    </form>
    <div v-if="error" class="error-message">{{ error }}</div>
    <div v-if="success" class="success-message">{{ success }}</div>
    </div>
</template>

<script>
export default {
  name: 'Login',
  methods: {
   
  }
}
</script>



<style scoped>
.form-container {
    display: flex;
    width: 100%;
    height: 100%;
     overflow: hidden;
    align-items: center;
    justify-content: center;
    margin-top: 200px;
    margin-bottom: 200px;
}

</style>

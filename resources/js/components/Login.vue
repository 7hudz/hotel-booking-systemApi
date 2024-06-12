<template>
    <div class="login-container">
      <h2>Login</h2>
      <form @submit.prevent="login">
        <div class="form-group">
          <label for="email">Email address</label>
          <input
            type="email"
            class="form-control"
            id="email"
            v-model="email"
            required
          />
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input
            type="password"
            class="form-control"
            id="password"
            v-model="password"
            required
          />
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
      </form>
      <p v-if="error" class="text-danger">{{ error }}</p>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    name: 'Login',
    data() {
      return {
        email: '',
        password: '',
        error: '',
      };
    },
    methods: {
      login() {
        axios
          .post('/api/login', {
            email: this.email,
            password: this.password,
          })
          .then((response) => {
            // Handle successful login, e.g., store token and redirect
            localStorage.setItem('token', response.data.token);
            this.$router.push('/');
          })
          .catch((error) => {
            if (error.response && error.response.status === 401) {
              this.error = 'Invalid email or password.';
            } else {
              this.error = 'An error occurred. Please try again later.';
            }
          });
      },
    },
  };
  </script>
  
  
  <style scoped>
  .login-container {
    max-width: 400px;
    margin: 0 auto;
    padding: 2rem;
    border: 1px solid #ddd;
    border-radius: 4px;
  }
  </style>
  
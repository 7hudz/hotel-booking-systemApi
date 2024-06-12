<template>
    <div class="register-container">
      <h1>Register</h1>
      <form @submit.prevent="register" class="register-form">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" id="name" v-model="form.name" required>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" v-model="form.email" required>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" id="password" v-model="form.password" required>
        </div>
        <button type="submit">Register</button>
      </form>
    </div>
  </template>
  
  <script>
import axios from 'axios';
// Register Component
export default {
  name: 'Register',
  data() {
    return {
      form: {
        name: '',
        email: '',
        password: ''
      }
    };
  },
  methods: {
    async register() {
      try {
        const response = await axios.post('/api/register', this.form);
        console.log('Registration successful:', response.data);
        // Redirect or show success message
      } catch (error) {
        console.error('Registration failed:', error.response.data);
      }
    }
  }
};



  </script>
  
  <style scoped>
  .register-container {
    max-width: 400px;
    margin: auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
  }
  
  .register-form {
    display: flex;
    flex-direction: column;
  }
  
  .form-group {
    margin-bottom: 10px;
  }
  
  label {
    font-weight: bold;
  }
  
  input {
    padding: 5px;
    border-radius: 3px;
    border: 1px solid #ccc;
  }
  
  button {
    padding: 5px 10px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 3px;
    cursor: pointer;
  }
  
  button:hover {
    background-color: #0056b3;
  }
  </style>
  
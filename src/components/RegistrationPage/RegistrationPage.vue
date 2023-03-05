<template>
    <div class="registration">
      <h1>Register</h1>
      <form @submit.prevent="submitForm">
        <div class="form-group">
          <label for="username">Username:</label>
          <input type="text" id="username" v-model="form.username" required>
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" id="email" v-model="form.email" required>
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" id="password" v-model="form.password" required>
        </div>
        <button type="submit">Register</button>
      </form>
    </div>
  </template>
  
  <script>
    export default {
        data() {
        return {
            form: {
            username: '',
            email: '',
            password: ''
            }
        }
        },
        methods: {
        submitForm() {
            fetch('register.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(this.form)
            })
            .then(response => {
            if (response.ok) {
                alert('Registration successful')
            } else {
                alert('Registration failed')
            }
            })
            .catch(error => {
            console.error('Error submitting form:', error)
            alert('Registration failed')
            })
        }
        }
    }
  </script>
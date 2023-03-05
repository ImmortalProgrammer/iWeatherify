<template>
    <div class="registration">
      <h1>Register Page</h1>
      <br/>
      <form>
        <label for="username">Username:</label>
        <input type="text" id="username">
        <br/>
        <label for="email">Email:</label>
        <input type="email" id="email">
        <br/>
        <label for="password">Password:</label>
        <input type="password" id="password">
        <br/>
        <button type="submit" @click="registerUser()">Register</button>
      </form>
    </div>
  </template>
  
  <script>
    export default {
      data() {
        return {
        }
      },
      methods: {
        registerUser() { 
            alert("registerUser was called")
          // TODO
        }
      }
    }
  </script>
  
  <style>
  </style>
  
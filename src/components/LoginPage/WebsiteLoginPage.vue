<template>
  <div class="Login">
    <h1>Login Page</h1>
    <br/>
    <form action="" method="POST">
      <label for="username">Username:</label>
      <input type="text" id="username" required v-model="username">
      <br/>
      <label for="password">Password:</label>
      <input type="password" id="password" required v-model="password">
      <br/>
      <button type="submit" @click.prevent="loginUser()">Login</button>
    </form>
  </div>
</template>

<script>
  import axios from "axios"
  export default {
    data() {
      return {
          username: null,
          password: null
      }
    },
    methods: {
      loginUser() {
        let formData = new FormData();
       
        formData.append("username", this.username);
        formData.append("password", this.password);

        axios.post("http://localhost/project_s23-iweatherify/backend/login.php?action=login", formData).then(
          (res) => {
            console.log(res.data)
            if (res.data[0].status == 1) {
              alert('Login Successfully');
            } else {
              alert("User does not exist");
            }
        }).catch((err) => {
          console.log("Unsuccessful axios post", err)
        })
      }
    }
  }
</script>

<style>
</style>

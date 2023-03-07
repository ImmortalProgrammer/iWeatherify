<template>
    <div class="Registration">
      <h1>Register Page</h1>
      <br/>
      <form action="" method="POST">
        <label for="email">Email:</label>
        <input type="email" id="email" required v-model="email">
        <br/>
        <label for="username">Username:</label>
        <input type="text" id="username" required v-model="username">
        <br/>
        <label for="password">Password:</label>
        <input type="password" id="password" required v-model="password">
        <br/>
        <button type="submit" @click.prevent="registerUser()">Register</button>
      </form>
    </div>
</template>
  
  <script>
    import axios from "axios"
    export default {
      data() {
        return {
            email: null,
            username: null,
            password: null
        }
      },
      methods: {
        registerUser() { //TODO: Registration validation
          let formData = new FormData();
         
          formData.append("email", this.email);
          formData.append("username", this.username);
          formData.append("password", this.password);

          axios.post("https://www-student.cse.buffalo.edu/CSE442-542/2023-Spring/cse-442a/backend/register.php?action=register", formData).then(
            (res) => {
              if(res.error){
                console.log("Couldnt send post request")
              } else {
                console.log(res)
                console.log("Sent post request to backend")
                this.$router.push("/"); //TODO - redirect to the login page
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
  
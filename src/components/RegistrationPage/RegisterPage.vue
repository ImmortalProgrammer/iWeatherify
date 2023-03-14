<template>
  <div class = "RegistrationPage">
  <div class="Rectangle">
    <img src="../../../img/figure-with-umbrella.svg"/>
    <h1 class="Header">iWeatherify</h1>
    <p class="Slogan"> Curated outfits for everyday weather </p>
  </div>

  <div class="RegisterForm">
    <h1 class="Header">Register</h1>
    <br/>

    <form action="" method="POST">
      <label for="email">Email:</label>
      <br />
      <input type="email" id="email" required v-model="email">
      <br/>
      <br/>

      <label for="username">Username:</label>
      <br/>
      <input type="text" id="username" required v-model="username">
      <br/>
      <br/>

      <label for="password">Password:</label>
      <br/>
      <input type="password" id="password" required v-model="password">
      <br/>

      <br/>
      <button type="submit" @click.prevent="registerUser">Register</button>
    </form>

    <br/>
    <p> <a href="#/login">Login</a></p> <!-- TODO: Need to look at this closer -->                
  </div>
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
            alert(res.data)
            if(res.error){
              console.log("Couldnt send post request")
            } else {
              console.log("Sent post request to backend")
              // this.$router.push("/login");
            }
        }).catch((err) => {
          console.log("Unsuccessful axios post", err)
        })
      }
    }
  }
</script>

<style scoped>
.RegistrationPage {
  display: flex;
  flex-direction: row;
  align-items: center;
}

.Rectangle {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  background-color: #264653;
  color: white;
  height: 100vh;
  width: 40%;
  padding: 0em 2em;
}

.RegisterForm{
display: flex;
flex-direction: column;
margin: auto;
}

.Header {
font-size: xx-large;
}

input {
  height: 3em;
  width: 30.5em;
}

button {
  font-size: large;
  font-weight: bold;
  /* padding: 0.7em 10em; */
  color: white;
  background-color: black;
  cursor: pointer;
}

a {
color: #2a9d8f;
}

@media screen and (max-width: 800px) {
  .Rectangle {
    display: none;
  }
}
</style>
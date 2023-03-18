<template>
  <div class = "LoginPage">
    <menu-bar style = "margin-top: -25px; margin-left: -5px;"></menu-bar>
    <div class="Rectangle">
      <img src="../../../img/figure-with-umbrella.svg"/>
      <h1 class="Header">iWeatherify</h1>
      <p class="Slogan"> Curated outfits for everyday weather </p>
    </div>

    <div class="LoginForm">
      <h1 class="Header">Login</h1>
      <br/>

      <form action="" method="POST">
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
        <button type="submit" @click.prevent="loginUser">Login</button>
      </form>

      <br/>
      <p> <a href="#/register">Create an account</a></p> <!-- TODO: Need to look at this closer -->                
    </div>
  </div>
</template>

<script>
  import axios from "axios"
  import menuBar from "@/components/menuBars/menuBarNonLoggedIn.vue";
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

        axios.post("https://www-student.cse.buffalo.edu/CSE442-542/2023-Spring/cse-442a/backend/login.php?action=login", formData).then(
          (res) => {
            if(res.data.status === 1){
              document.cookie = "auth_token=" + res.data.auth_token; //Retrieve the auth token from the server and store it as a cookie
              this.$router.push("/homepage");
            } else {
              alert("Invalid username and password combo");
            }
        }).catch((err) => {
          console.log("Unsuccessful axios post", err)
        })
      }
    },
    components: {
      menuBar
    }
  }
</script>

<style>
.LoginPage {
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

.LoginForm{
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
    padding: 0.7em 10em;
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
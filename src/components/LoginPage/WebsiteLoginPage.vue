<template>
  <div class = "LoginPage">
    <div v-if="showErrorModal" class="overlay">
      <error-modal
        :show-modal="showErrorModal"
        :title="errorTitle"
        :message="errorMessage"
        @close-modal="showErrorModal = false"
      ></error-modal>
    </div>


      <menu-bar class = "menuBarLogin" ></menu-bar>

    
    <div class="Rectangle">
      <img src="../../../img/figure-with-umbrella.svg"/>
      <h1 class="Header">iWeatherify</h1>
      <p class="Slogan"> Curated outfits for everyday weather </p>
    </div>

    <div class="LoginForm">
      <h1 class="Header">Login</h1>
      <br/>

      <form class = "Labels" action="" method="POST">
        <label for="username">Username:</label>
        <br/>
        <input 
          type="text" 
          id="username" 
          required 
          v-model="username" 
          :class="{ error: usernameError }"
          @focus="usernameError = false"
        > <!-- Dont know why required attribute isnt working -->
        <br/>
        <br/>

        <label for="password">Password:</label>
        <br/>
        <input 
          type="password" 
          id="password" 
          required 
          v-model="password"
          :class="{ error: passwordError }"
          @focus="passwordError = false"
        >
        <br/>

        <br/>
        <button type="submit" @click.prevent="validateForm">Login</button>
      </form>

      <br/>
      <p class = "LoginText"> <a class ="AccountCreate" href="#/register">Create an account</a></p>
    </div>
  </div>
</template>

<script>
  import axios from "axios";
  import menuBar from "@/components/menuBars/menuBarNonLoggedIn.vue";
  import ErrorModal from "@/components/ModalBox/ErrorModal.vue";
  export default {
    data() {
      return {
        username: null,
        password: null,
        errorTitle: "",
        errorMessage: "",
        showErrorModal: false,
        usernameError: false,
        passwordError: false,
      };
    },
    methods: {
      validateForm(){
        if(!this.username && !this.password){
          this.errorTitle = "Login Error";
          this.errorMessage = "Make sure you fill both username and password";
          this.showErrorModal = true;
          this.usernameError = true;
          this.passwordError = true;
        } 
        else if (!this.username) {
          this.errorTitle = "Login Error";
          this.errorMessage = "Please enter an username";
          this.showErrorModal = true;
          this.usernameError = true;
          this.passwordError = false;
        } 
        else if (!this.password) {
          this.errorTitle = "Login Error";
          this.errorMessage = "Please enter a password";
          this.showErrorModal = true;
          this.usernameError = false;
          this.passwordError = true;
        }
        else {
          this.loginUser()
        }     
      },
      loginUser() {
        let formData = new FormData();
       
        formData.append("username", this.username);
        formData.append("password", this.password);
        
        axios.post(process.env.VUE_APP_WEB_DOMAIN + "/backend/login.php?action=login", formData, { withCredentials: true })
        .then((res) => {
            console.log(res)
            console.log(res.data)
            if(res.data.status === 1){
              document.cookie = "auth_token=" + res.data.auth_token; //Retrieve the auth token from the server and store it as a cookie
              this.$router.push("/homepage");
            } else {
              this.errorTitle = "Login Error";
              this.errorMessage = "Invalid username and/or password";
              this.showErrorModal = true;
              this.usernameError = true;
              this.passwordError = true;
            }
        }).catch((err) => {
          console.log("Unsuccessful axios post", err)
        })
      }
    },
    components: {
      menuBar,
      ErrorModal,
    }
  }
</script>

<style scoped>
@keyframes fadeInAnimation {
    0% {
        opacity: 0;
    }
    100% {
        opacity: 1;
     }
}

* {
  animation: fadeInAnimation ease .5s;
  animation-iteration-count: 1;
  /* animation-fill-mode: forwards; */
}

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
.LoginText {
    scale: 115%;
    margin-left: 29px;
}
.menuBarLogin {
    margin-top: -5px;
    margin-left: -100px;
    max-width: 5%
}
.Header {
  font-size: xx-large;
}
.error {
  border: 2px solid red;
}
.overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  z-index: 1000;
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

  .AccountCreate {
    margin-left: 40px;
    margin-top: -53px;
  }
  .menuBarLogin {
      margin-top: -5px;
      margin-left: -60px;
      max-width: 5%
  }
  .LoginForm {
      margin-top: 90px;
      margin-left: -15px;
      scale: 95%;
  }

  .Header {
      margin-left: 140px;
      font-size: 2.5em;
      padding: 10px;
  }

  .Labels {
      scale: 90%;
  }
  button {
      font-size: large;
      font-weight: bold;
      margin-top: 10px;
      padding: 0.9em 10em;
      color: white;
      margin-left: -10px;
      background-color: black;
      cursor: pointer;
      scale: 85%;
  }
}
</style>

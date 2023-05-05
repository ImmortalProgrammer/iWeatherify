<template>
  <div class = "RegistrationPage">
    <div v-if="showErrorModal" class="overlay">
      <error-modal
        :show-modal="showErrorModal"
        :title="errorTitle"
        :message="errorMessage"
        @close-modal="showErrorModal = false"
      ></error-modal>
    </div>

    <div>
        <menu-bar style = " margin-top: -15px; margin-left: -60px; max-width: 5%"></menu-bar>
    </div>

    <div class="Rectangle">
      <img src="../../../img/figure-with-umbrella.svg"/>
      <h1 class="Header">iWeatherify</h1>
      <p class="Slogan"> Curated outfits for everyday weather </p>
    </div>

    <div class="RegisterForm">
      <h1 class="Header">Register</h1>
      <br/>

      <form class = "PostForm" action="" method="POST">
        <label for="email">Email:</label>
        <br/>
        <input 
          type="email" 
          id="email" 
          required 
          v-model="email"
          :class="{ 'input-error': emailError }"
          @focus="emailError = false"
        >
        <br/>
        <br/>

        <label for="username">Username:</label>
        <br/>
        <input 
          type="text" 
          id="username" 
          required 
          v-model="username"
          :class="{ 'input-error': usernameError }"
          @focus="usernameError = false"
        >
        <br/>
        <br/>

        <label for="password">Password:</label>
        <br/>
        <input 
          type="password" 
          id="password" 
          required 
          v-model="password"
          :class="{ 'input-error': passwordError }"
          @focus="passwordError = false"
        >
        <br/>

        <br/>
        <button class = "ButtonSubmit" type="submit" @click.prevent="validateForm">Register</button>
      </form>

      <br/>
      <p style = "scale: 115%; margin-left: 30px; margin-top: -30px"> <a style = "margin-left: 40px" href="#/login">Login</a></p>
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
        email: null,
        username: null,
        password: null,
        showErrorModal: false,
        errorTitle: "",
        errorMessage: "",
        emailError: false,
        usernameError: false,
        passwordError: false,
      };
    },
    methods: {
      isValidEmail(email) {
        const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
      },
      validateForm(){
        if(!this.email && !this.username && !this.password) {
          this.showErrorModal = true;
          this.errorTitle = "Registration Error";
          this.errorMessage = "Please fill all required information";
          this.emailError = true;
          this.usernameError = true;
          this.passwordError = true;
        }
        else if (!this.email && !this.username) {
          this.showErrorModal = true;
          this.errorTitle = "Registration Error";
          this.errorMessage = "Email address and username are empty";
          this.emailError = true;
          this.usernameError = true;
          this.passwordError = false;
        }
        else if (!this.email && !this.password) {
          this.showErrorModal = true;
          this.errorTitle = "Registration Error";
          this.errorMessage = "Email address and password are empty";
          this.emailError = true;
          this.usernameError = false;
          this.passwordError = true;
        }
        else if (!this.username && !this.password) {
          this.showErrorModal = true;
          this.errorTitle = "Registration Error";
          this.errorMessage = "Username and password are empty";
          this.usernameError = true;
          this.emailError = false;
          this.passwordError = true;
        } 
        else if (!this.email) {
          this.showErrorModal = true;
          this.errorTitle = "Registration Error";
          this.errorMessage = "Please enter an email address";
          this.emailError = true;
          this.usernameError = false;
          this.passwordError = false;
        }
        else if (!this.isValidEmail(this.email)) {
          this.showErrorModal = true;
          this.errorTitle = "Registration Error";
          this.errorMessage = "Please enter a valid email address";
          this.emailError = true;
          this.usernameError = false;
          this.passwordError = false;
        }
        else if (!this.username) {
          this.showErrorModal = true;
          this.errorTitle = "Registration Error";
          this.errorMessage = "Please enter an username";
          this.usernameError = true;
          this.emailError = false;
          this.passwordError = false;
        }
        else if (!this.password) {
          this.showErrorModal = true;
          this.errorTitle = "Registration Error";
          this.errorMessage = "Please enter a password";
          this.passwordError = true;
          this.emailError = false;
          this.usernameError = false;
        }
        else {
          this.registerUser();
        }
      }, 
      registerUser() {
        let formData = new FormData();
       
        formData.append("email", this.email);
        formData.append("username", this.username);
        formData.append("password", this.password);

        axios.post("https://www-student.cse.buffalo.edu/CSE442-542/2023-Spring/cse-442a/backend/register.php?action=register", formData)
        .then((res) => {
            if(res.data.status === "error"){
              console.log("Couldnt send post request")
              this.handleResponse(res.data.message);
            } else {
              console.log("Sent post request to backend")
              this.handleResponse(res.data.message);
            }
        }).catch((err) => {
          console.log("Unsuccessful axios post", err)
        })
      },
      handleResponse(response) {
        switch (response) {
          case "Both the email and username are taken. Try logging in":
            this.emailError = true;
            this.usernameError = true;
            this.showErrorModal = true;
            this.errorTitle = "Registration Error";
            this.errorMessage = response;
            break;
          case "This email is already in use":
            this.emailError = true;
            this.showErrorModal = true;
            this.errorTitle = "Registration Error";
            this.errorMessage = response;
            break;
          case "This username is already in use":
            this.usernameError = true;
            this.showErrorModal = true;
            this.errorTitle = "Registration Error";
            this.errorMessage = response;
            break;
          case "Your username must contain at least one character":
            this.usernameError = true;
            this.showErrorModal = true;
            this.errorTitle = "Registration Error";
            this.errorMessage = response;
            break;
          case "Your password should be a mix between characters and numbers":
            this.passwordError = true;
            this.showErrorModal = true;
            this.errorTitle = "Registration Error";
            this.errorMessage = response;
            break;
          case "Your password needs to be at least 9 characters long":
            this.passwordError = true;
            this.showErrorModal = true;
            this.errorTitle = "Registration Error";
            this.errorMessage = response;
            break;
          case "Please enter some valid information!":
            this.showErrorModal = true;
            this.errorTitle = "Registration Error";
            this.errorMessage = response;
            break;
          case "Successful insertion":
            this.showErrorModal = true;
            this.errorTitle = "Registration Successful";
            this.errorMessage = "You are now registered. Please login";
            break;
          default:
            console.log("Unexpected response:", response);
        }
      }
    },
    components: {
      menuBar,
      ErrorModal,
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

.input-error {
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
  /* padding: 0.7em 10em; */
  color: white;
  background-color: black;
  cursor: pointer;
}

a {
  color: #2a9d8f;
}

@media screen and (max-width: 800px) {
  .PostForm {
      scale: 80%;
      margin-top: -25px;
  }

  .ButtonSubmit {
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
  .Header {
      margin-left: 125px;
      font-size: 2.5em;
      padding: 10px;
  }

  .Rectangle {
    display: none;
  }
  .RegisterForm {
      margin-top: 80px;
      margin-left: -10px;
      width: 90%;
  }
}
</style>
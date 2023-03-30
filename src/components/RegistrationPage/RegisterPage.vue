<template>
  <div class = "RegistrationPage">
    <menu-bar style = "margin-top: -25px; margin-left: -30px;"></menu-bar>
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
      <button type="submit" @click.prevent="validateForm">Register</button>

      <error-modal
        :show-modal="showErrorModal"
        :title="errorTitle"
        :message="errorMessage"
        @close-modal="showErrorModal = false"></error-modal>
    </form>

    <br/>
    <p> <a href="#/login">Login</a></p>        
  </div>
</div>
</template>

<script>
  import axios from "axios"
  import menuBar from "@/components/menuBars/menuBarNonLoggedIn.vue";
  import ErrorModal from "@/components/RegistrationPage/ErrorModal.vue";
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
      validateForm(){
        if(!this.email || !this.username || !this.password){
          alert("Please fill all required information")
        }
        this.registerUser()
      }, 
      registerUser() {
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
          case "Your password should be a mix between characters and numbers":
            this.passwordError = true;
            this.showErrorModal = true;
            this.errorTitle = "Registration Error";
            this.errorMessage = response;
          case "Your password needs to be at least 8 characters long":
            this.passwordError = true;
            this.showErrorModal = true;
            this.errorTitle = "Registration Error";
            this.errorMessage = response;
          case "Please enter some valid information!":
            this.showErrorModal = true;
            this.errorTitle = "Registration Error";
            this.errorMessage = response;
            break;
          case "Successful insertion":
            this.$router.push("#/login");
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
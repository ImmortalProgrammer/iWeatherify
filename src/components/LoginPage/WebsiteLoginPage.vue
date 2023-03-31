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

    <div>
      <menu-bar style = "margin-top: -25px; margin-left: -5px;"></menu-bar>
    </div>
    
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
        <input 
          type="text" 
          id="username" 
          required 
          v-model="username" 
          :class="{ error: showErrorModal && !username }"
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
          :class="{ error: showErrorModal && !password }"
        >
        <br/>

        <br/>
        <button type="submit" @click.prevent="validateForm">Login</button>
      </form>

      <br/>
      <p> <a href="#/register">Create an account</a></p>            
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
      };
    },
    methods: {
      validateForm(){
        if(!this.username || !this.password){
          this.errorTitle = "Error";
          this.errorMessage = "Make sure you fill both username and password";
          this.showErrorModal = true;
        } else {
          this.loginUser()
        }     
      },
      loginUser() {
        let formData = new FormData();
       
        formData.append("username", this.username);
        formData.append("password", this.password);
        
        // axios.post("https://www-student.cse.buffalo.edu/CSE442-542/2023-Spring/cse-442a/backend/login.php?action=login", formData)
        axios.post("http://localhost/project_s23-iweatherify/backend/login.php", formData)
        .then((res) => {
            console.log(res)
            console.log(res.data)
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
      menuBar,
      ErrorModal,
    }
  }
</script>

<style scoped>
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
}
</style>
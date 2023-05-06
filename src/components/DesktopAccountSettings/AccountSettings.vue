<template>
    <div class="container-center-horizontal">
        <nav-bar class = "accountSettingsNav"></nav-bar>
      <div class="accountSettings_screen">

        <div v-if="showErrorModal" class="overlay">
          <error-modal
            :show-modal="showErrorModal"
            :title="errorTitle"
            :message="errorMessage"
            @close-modal="showErrorModal = false"
          ></error-modal>
        </div>

        <div class="accountSettings-title">
          <h1 class="account-settings-title">{{ title }}</h1>
        </div>
  
        <div class="accountSettings-text-container">
        
        <form method="post" action="">
      <div class="old-password">
          <h2 class="old-password-title">Current Password:</h2>
          <input type="password" id="oldPassword" v-model="oldPassword">
          
      </div>

      <div class="new-password">
          <h2 class="new-password-title">New Password:</h2>
          <input type="password" id="newPassword" v-model="newPassword"> 
          <ul class="password-list">
            <li>Password must be at least 8 characters</li>
            <li>Password must be a mix of letters and numbers</li>
          </ul>
          
          <div class="reenter-password">
          <h2 class="confirm-password-title">Re-Type New Password:</h2>
          <input type="password" id="confirmPassword" v-model="confirmPassword" />
          <button @click.prevent="changePassword">Change</button>
        </div>

      </div>
    </form>
    
      </div>
     
      <settings-component></settings-component>
      </div>
    </div>
  
</template>
  
  <script>
import axios from "axios"; 
import NavBar from "@/NavBar/NavBar.vue";
import SettingsComponent from "@/SettingsComponent/SettingsComponent.vue";
import ErrorModal from "@/components/ModalBox/ErrorModal.vue";

export default {
  name: "AccountSettings",
  
  data(){
    return{
      oldPassword: '',
      newPassword: '',
      confirmPassword: '',
      user_id: null,
      errorTitle: "",
      errorMessage: "",
      showErrorModal: false,
    };
  },
  
  created() {
    this.getUserId(); 
  },
  
  methods: {
    
    async getUserId() {
      try {
        const response = await axios.get("https://www-student.cse.buffalo.edu/CSE442-542/2023-Spring/cse-442a/backend/get_userid.php", { withCredentials: true });
        this.user_id = response.data.userid;
        console.log("User_id: "+response.data.userid);
      } catch (error) {
        console.error("Unsuccessful request in getUserId().", error);
      }
    }, 
  
    async changePassword() {
      if(!this.oldPassword || !this.newPassword || !this.confirmPassword){
        this.errorTitle = 'Error';
        this.errorMessage = 'Please fill in all the fields.';
        this.showErrorModal = true;
        // alert("Please fill in all the fields.");//Here
      }
      
      if (this.newPassword !== this.confirmPassword) {
        this.errorTitle = 'Error';
        this.errorMessage = 'New password and confirmation do not match';
        this.showErrorModal = true;
    // alert("New password and confirmation do not match");//Here
  }

  
  if (this.newPassword.length < 8 || !/\d/.test(this.newPassword) || !/[a-zA-Z]/.test(this.newPassword)) {
    this.errorTitle = 'Error';
    this.errorMessage = 'New password should be at least 8 characters and contain both letters and numbers';
    this.showErrorModal = true;
    // alert("New password should be at least 8 characters and contain both letters and numbers");//Here
  }

  if (this.oldPassword === this.newPassword) {
    this.errorTitle = 'Error';
    this.errorMessage = 'New password should not be the same as the old password';
    this.showErrorModal = true;
    // alert("New password should not be the same as the old password");//Here
  }

    let formData = new FormData();
  
    formData.append("userid", this.user_id);
    formData.append("old_password", this.oldPassword);
    formData.append("new_password", this.newPassword);

    axios
      .post("https://www-student.cse.buffalo.edu/CSE442-542/2023-Spring/cse-442a/backend/changePassword.php?action=changePassword", 
        formData,
        {
          withCredentials: true,
      })
      .then((response) => {
        console.log(response); 

        if (response.data.status === 1) {
          this.errorTitle = 'Success';
          this.errorMessage = 'Password updated successfully!';
          this.showErrorModal = true;
          // alert("Password updated successfully!");//Here
        }  else if (response.data.status === 0) {
          this.errorTitle = 'Error';
          this.errorMessage = response.data.msg;
          this.showErrorModal = true;
          // alert(response.data.msg);//Here
          return;
        }  else if (response.data.status === -1) {
          this.errorTitle = 'Error';
          this.errorMessage = 'Old password is incorrect';
          this.showErrorModal = true;
          // alert("Old password is incorrect");//Here
        }
      })
      .catch((error) => {
        console.log(error);
        this.errorTitle = 'Error';
        this.errorMessage = 'Failed to update password';
        this.showErrorModal = true;
        // alert("Failed to update password");//Here
      });

  }, 

},

components: {
    NavBar,
    SettingsComponent,
    ErrorModal,
  },
 
  props: [
    "title",
  ],
};
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

.overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  z-index: 1000;
}

.accountSettings-title {
position: relative;
top: 60px;
margin: auto;
display: flex;
justify-content: center;
align-items: center;
width: 105%;
}

.account-settings-title {
color: var(--black);
font-weight: 600;
font-size: 2em;
font-family: 'Inter';
font-style: normal;
}

.accountSettingsNav{
  top: -0.85%;
}


.accountSettings-text-container{
  
  font-size: 0.8em; 
  position: fixed;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  align-items: center;
  width: 100%;
  height: 100px;
  transform: scale(1.8); 
  margin-top: 100px; 
  margin-left: -350px; 
}

ul{
  list-style-type: disc; 
  transform:scale(0.8);
  margin-left: -50px; 
}

button{
font-family: 'Inter';
font-style: normal;
font-size: small;
font-weight: bold;
color: white;
background-color: black;
cursor: pointer;
margin-left: 20px; 

}



.old-password{
  margin-left: -400px; 
  margin-top: 120px; 
}

.new-password{
  margin-top: 20px; 
  margin-left: -400px;  
}

.reenter-password{
  margin-top: 10px; 
}


@media screen and (min-width: 992px) and (max-width: 2000px) {

  .accountSettings-text-container{
    margin-left: 100px; 
    margin-top: -20px; 
  }



}

@media screen and (min-width: 576px) and (max-width: 992px) {


 
}

@media screen and (min-width: 375px) and (max-width: 576px) {

.account-settings-title{
  margin-top: 150px; 
  transform: scale(0.8);
}



.accountSettings-text-container{
  transform: scale(1.2);
  margin-left: 330px; 
  margin-top: -10px;

}


}

@media screen and (max-width: 374px) {


}

</style>


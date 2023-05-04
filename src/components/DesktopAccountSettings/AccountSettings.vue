<template>
    <div class="container-center-horizontal">
      <div class="accountSettings screen">

        <nav-bar class = "accountSettingsNav"></nav-bar>
        
        
        <div class="accountSettings-title">
          <h1 class="account-settings-title">{{ title }}</h1>
        </div>

        <div class="profile-image-container">
          <img src="../../../img/changeProfileImage.png" alt="ProfileImage"/>
          <button class="change">Change</button>
          <button class= "remove">Remove</button>
        </div>
  
        <div class="accountSettings-text-container">
        
        <div class="new-username">
            <h2 class="new-username-title">New Username</h2>
            <input class="username" type="text" name="searching" placeholder=""> 
            <button>Change</button>
        </div>

        <div class="old-password">
            <h2 class="old-password-title">Old Password</h2>
            <input class="oldPassword" type="text" name="searching" placeholder="">
            
        </div>

        <div class="new-password">
            <h2 class="new-password-title">New Password</h2>
            <input class="newPassword" type="text" name="searching" placeholder=""> 
            <button>Change</button>
        </div>
  
          
          
        </div>
       
        <settings-component></settings-component>
        </div>
      </div>
    
  </template>
  
  <script>
  import axios from "axios"; 
  import NavBar from "@/NavBar/NavBar.vue";
  import SettingsComponent from "@/SettingsComponent/SettingsComponent.vue"
  
  
  export default {
    name: "AccountSettings",
    
    
    components: {
      NavBar,
      SettingsComponent,
    },
   
    props: [
      "title",
    ],
  };
  </script>
  
  <style scoped>

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
    margin-top: 55px;
    font-size: 3em;
    font-family: 'Inter';
    font-style: normal;
}
  
  .accountSettingsNav{
    top: -0.85%;
  }

  .profile-image-container{
    transform: scale(0.4); 
    margin-top: 200px; 
  }

  .change{
    transform: scale(3.3);
  }

  .remove{
    transform: scale(3.3); 
    margin-left: 200px; 
  }


  .accountSettings-text-container{
    
    font-size: 0.8em; 
    position: fixed;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
    top: 40%;
    width: 100%;
    height: 300px;
    left: 20px; 
    transform: scale(1.3); 
  }

  button{
  font-family: 'Inter';
  font-style: normal;
  font-size: small;
  font-weight: bold;
  color: white;
  background-color: black;
  cursor: pointer;
  margin-left: 40px; 
  }

  .username{
      margin-top: 10px; 

  }

  .oldPassword{
    margin-top: 10px; 
  }

  .newPassword{
    margin-top: 10px; 
  }

  .new-username{
    margin-top: 100px; 

  }

  .old-password{
    margin-left: -110px; 
   
  }

 

 
  
  
  @media screen and (min-width: 992px) and (max-width: 2000px) {
  
  
  .profile-image-container{
    margin-top: 10px; 
  }
  
  
  }
  
  @media screen and (min-width: 576px) and (max-width: 992px) {
  
  
   
  }
  
  @media screen and (min-width: 375px) and (max-width: 576px) {
  
  .account-settings-title{
    margin-top: 150px; 
    transform: scale(0.8);
  }

  .profile-image-container{
    margin-top: -10px; 
  }

  .accountSettings-text-container{
    margin-left: -130px; 
    margin-top: -70px; 
  }
  
  
  }
  
  @media screen and (max-width: 374px) {
  
  
  }
  
  </style>

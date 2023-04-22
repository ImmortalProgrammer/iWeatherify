<template>
    <div class="container-center-horizontal">
      <div class="accountSettings screen">
        
        <nav-bar class = "accountSettingsNav"></nav-bar>
        
        
        <div class="accountSettings-title">
          <h1 class="account-settings-title">{{ title }}</h1>
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
  font-weight: 500;
  font-size: 1.8em;
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
    top: 30%;
    width: 100%;
    height: 300px;
    left: 20px; 
    transform: scale(1.3); 
  }

  .old-password{
    margin-left: -110px; 
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
  
  
  /*
  @media screen and (min-width: 992px) and (max-width: 1240px) {
  
  
  
  
  
  }
  
  @media screen and (min-width: 576px) and (max-width: 992px) {
  
  
   
  }
  
  @media screen and (min-width: 375px) and (max-width: 576px) {
  
  
  
  
  }
  
  @media screen and (max-width: 374px) {
  
  
  }
  */ 
  </style>
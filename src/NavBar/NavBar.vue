<template>
  <div class="nav-bar-container_1">

    <div class="main_logo"></div>

    <div class="main_menu_container">
      <menu-bar-logged-in class = "menu-edit"></menu-bar-logged-in>
    </div>

    <div class = "profile_image_loggedin">
      <a id ="savedoutfits" :href="$router.resolve('/savedOutfits').href" style = "text-decoration:none; color: inherit;">
        <img src="../../img/Profile image.png" alt="ProfileImage"/> </a>
    </div>


  </div>


</template>

<script>
import MenuBarLoggedIn from "@/components/menuBars/menuBarLoggedIn.vue";
export default {
  name: "NavBar",
  components: {
    MenuBarLoggedIn,

  },
  data() {
    return {
      //Store variables in here
      navInfo: {
      }
    }
  },
  methods: {
    //Execute on Profile Click
    onProfileClick() {
      alert("test");
    }
  }
}
</script>

<style scoped>
.nav-bar-container_1 {
  position: absolute;
  display: inline-block;
  align-items: safe center;
  width: 100%;
  left: 2%;
  height: 7vh;
  max-height: 7vh;
  padding-top: 0.3vh;
  white-space: nowrap;
  margin-top: 1.3vh;
  z-index: 1;
}
.profile_image_loggedin{
  position: absolute;
  margin: 0;
  left: 80.5%;
  object-fit: scale-down;
  height: 100%;
  width: 7%;
  max-width: 100%;
  overflow: visible;
  white-space: nowrap;
}
.main_logo {
  background-image: url("../../img/Logo.png");
  background-repeat: no-repeat;
  background-size: contain;
  background-position: center;
  position: absolute;
  margin: 0;
  top: 14%;
  object-fit: cover;
  height: 80%;
  width: 15%;
  overflow: hidden;
  max-width: 100%;
}
.main_menu_container {
  position: absolute;
  margin: 0;
  top: -0.4%;
  left: 83.5%;
  object-fit: scale-down;
  height: 100%;
  width: 7%;
  max-width: 100%;
  overflow: visible;
  white-space: nowrap;
}
.menu-edit {
  top: 27%;
  left: 35%;
  height: 55px;
  width: 45px;
}

@media only screen and (min-width: 760px) and (max-width: 1300px) {
  .main_logo {
    scale: 1.4;
    left: 2.9%;
  }
  .main_menu_container {
    left: 88.5%;
  }

  .profile_image_loggedin{
    margin-top: -0.5%;
    height: 40px;
    left: 80.5%;
  }
}
@media only screen and (min-width: 500px) and (max-width: 759px) {
  .main_logo {
    scale: 1.7;
    left: 5.1%;
  }
  .menu-edit {
    top: 1.9%;
    left: 80.5%;
    height: 55px;
    width: 45px;
  }

  .profile_image_loggedin{
   top: 1.9%;
   left: 80.5%;
   height: 55px;
   width: 45px; 
  }
}
@media screen and (min-width: 200px) and (max-width: 499px) {
  .main_logo {
    scale: 2.1;
    left: 12.1%;
  }
  .menu-edit {
    top: 1.1%;
    left: 75.5%;
    height: 55px;
    width: 45px;
  }

  .profile_image_loggedin{
    margin-top: -2.2%;
    height: 40px;
    left: 60%;
    transform: scale(0.7)
  }
}
</style>

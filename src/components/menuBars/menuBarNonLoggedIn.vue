<template>
  <div class = "menu">
    <div class="menucontainer" @click="menuPress()">
      <img src="../../../img/Vector.png" alt="Vector"/>
    </div>

    <div class = "profile_image_nonloggedin">
      <a id ="loginpage" :href="$router.resolve('/login').href" style = "text-decoration:none; color: inherit;">
      <img src="../../../img/default-profile-icon.png" alt="ProfileImage0"/> </a>
    </div>

    <div id = "routes-container1">
      <div class = "links">
        <a id ="link1_1" :href="$router.resolve('/').href" style = "text-decoration:none; color: inherit;">Homepage</a>
        <a id ="link2_1" :href="$router.resolve('/register').href" style = "text-decoration:none; color: inherit;">Register</a>
        <a id ="link3_1" :href="$router.resolve('/login').href" style = "text-decoration:none; color: inherit;">Login</a>
      </div>
    </div>
  </div>
</template>


<script>
import router from "@/router";
export default {
  name: "menuBar",
  data() {
    return {
      disabled: true,
      homepage: true,
      register: true,
      login: true,
    }
  }, methods: {
    routeDetection() {
      const route = this.$route.name;
      switch (route) {
        case 'NHomepage':
          this.$data.homepage = false;
          break;
        case 'Register':
          this.$data.register = false;
          break;
        case 'Login':
          this.$data.login = false;
          break;
      }
    },
    menuPress() {
      this.routeDetection();
      //The gray out effect
      this.grayOut();
      if (this.$data.disabled) {
        document.getElementById("routes-container1").style.visibility = 'visible';
        this.$data.disabled = false;
      } else {
        document.getElementById("routes-container1").style.visibility = 'hidden';
        this.$data.disabled = true;
      }
    }, grayOut() {
      //this.resetGrayEffects(id) aka link[id]_1
      if (!this.$data.homepage) {
        document.getElementById("link1_1").style.pointerEvents = "none";
        document.getElementById("link1_1").style.opacity = "0.3";
        this.resetGrayEffects(2);
        this.resetGrayEffects(3);
      } else if (!this.$data.register) {
        document.getElementById("link2_1").style.pointerEvents = "none";
        document.getElementById("link2_1").style.opacity = "0.3";
        this.resetGrayEffects(1);
        this.resetGrayEffects(3);
      } else if (!this.$data.login) {
        document.getElementById("link3_1").style.pointerEvents = "none";
        document.getElementById("link3_1").style.opacity = "0.3";
        this.resetGrayEffects(1);
        this.resetGrayEffects(2);
      }
    },
    resetGrayEffects(id) {
      document.getElementById("link" + id + "_1").style.pointerEvents = "auto";
      document.getElementById("link" + id + "_1").style.opacity = "1";
    },
  }
}
</script>

<style scoped>
.menu {
  z-index: 1;
  position: absolute;
  left: 99.5%;
  top: 5.5vh;
  height: 4.5vh;
  transform: translate(-50%, 0);
  width: auto;
}

.profile_image_nonloggedin{
  position: absolute;
  margin-left: -85px; 
  top: -3px;
}
.bar {
  width: 2.05vw;
  height: 0.35vh;
  background-color: black;
  margin: 0.3vw 0;
}
#routes-container1 {
  border: none;
  position: relative;
  height: auto;
  left: -10%;
  top: -2.3vh;
  bottom: 0;
  border-top: 0;
  margin-top: 1.1vh;
  transform: translate(-50%, 0);
  width: 15vw;
  scale: 0.7;
  color: rgb(255, 255, 255);
  font-weight: 500;
  text-align: center;
  background-color: gray;
  overflow-y: scroll;
  overflow-x: hidden;
  visibility: hidden;
}
.links {
  border: solid black 0.3vh;
  border-bottom: none;
}
#link1_1, #link2_1, #link3_1 {
  font-size: 2.1em;
  background-color: dimgray;
  padding: 1.6vh;
  display: block;
  border-bottom: solid black 0.3vh;
}
@media screen and (min-width: 700px) and (max-width: 1100px) {
  .menu {
    left: 100%;
    top: 3.6vh;
  }
  .bar {
    width: 3.5vw;
    height: 0.35vh;
    background-color: black;
    margin: 0.5vh 0;
  }
  #routes-container1 {
    border: none;
    position: relative;
    height: auto;
    left: -7%;
    top: -2.3vh;
    bottom: 0;
    border-top: 0;
    margin-top: 1.1vh;
    transform: translate(-50%, 0);
    width: 25vw;
    scale: 0.7;
    color: rgb(255, 255, 255);
    font-weight: 500;
    text-align: center;
    background-color: gray;
    overflow-y: scroll;
    overflow-x: hidden;
    visibility: hidden;
  }
  #link1_1, #link2_1, #link3_1 {
    font-size: 1.6em;
  }
}
@media screen and (min-width: 200px) and (max-width: 699px) {
  .menu {
    left: 98%;
    top: 3.3vh;
    scale: 0.9;
  }

  .profile_image_nonloggedin{
    left: 20%; 
    scale: 0.8; 
  }
  .bar {
    width: 5.5vw;
    height: 0.35vh;
    background-color: black;
    margin: 0.7vw 0;
  }
  #routes-container1 {
    border: none;
    position: relative;
    height: auto;
    left: -7%;
    top: -2.3vh;
    bottom: 0;
    border-top: 0;
    margin-top: 1.1vh;
    transform: translate(-50%, 0);
    width: 40vw;
    scale: 0.7;
    color: rgb(255, 255, 255);
    font-weight: 500;
    text-align: center;
    background-color: gray;
    overflow-y: scroll;
    overflow-x: hidden;
    visibility: hidden;
  }
  #link1_1, #link2_1, #link3_1 {
    font-size: 1.6em;
  }
}
</style>

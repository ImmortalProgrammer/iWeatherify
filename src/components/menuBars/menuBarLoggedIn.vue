<template>
  <div class = "menu_2">
    <div class="menu-container_2" @click="menuPress()">
      <img src="../../../img/Vector.png" alt="Vector"/>
    </div>
    <div id = "routes-container1_2">
      <div class = "links_2">
        <a id ="link1_2" :href="$router.resolve('/homepage').href" style = "text-decoration:none; color: inherit;">Homepage</a>
        <a id ="link2_2" :href="$router.resolve('/myItems').href" style = "text-decoration:none; color: inherit;">My Items</a>
        <a id ="link3_2" :href="$router.resolve('/locationSettings').href" style = "text-decoration:none; color: inherit;">Location Settings</a>
        <a id ="link4_2" :href="$router.resolve('/unitsSettings').href" style = "text-decoration:none; color: inherit;">Unit Settings</a>
        <a id ="link5_2" :href="$router.resolve('/tempSettings').href" style = "text-decoration:none; color: inherit;">Temperature Settings</a>
        <a id ="link6_2"  style = "text-decoration:none; color: inherit;" @click = "logOutAccount()" :href="$router.resolve('/').href">Log Out</a>
      </div>
    </div>
  </div>
</template>


<script>
import router from "@/router";
import axios from "axios";

export default {
  name: "menuBarLoggedIn",
  data() {
    return {
      disabled: true,
      homepage: true,
      locationSettings: true,
      myItems: true,
      units: true,
      tempSettings: false,
      logOut: false,
    }
  }, methods: {
    routeDetection() {
      const route = this.$route.name;
      switch (route) {
        case 'Homepage':
          this.$data.homepage = false;
          break;
        case 'LocationSettings':
          this.$data.locationSettings = false;
          break;
        case 'myItems':
          this.$data.myItems = false;
          break;
        case 'Units':
          this.$data.units = false;
          break;
        case 'TemperatureSettings':
          this.$data.tempSettings = false;
          break;
      }
    },
    logOutAccount() {
      document.cookie = "auth_token" + "=; Max-Age=-999999999;";
      //You need to delete the auth_token from the database, currently not working, so it was left out for now
    },
    menuPress() {
      this.routeDetection();
      //The gray out effect
      this.grayOut();

      if (this.$data.disabled) {
        document.getElementById("routes-container1_2").style.visibility = 'visible';
        this.$data.disabled = false;
      } else {
        document.getElementById("routes-container1_2").style.visibility = 'hidden';
        this.$data.disabled = true;
      }
    },
    grayOut() {
     // this.resetGrayEffects(id) aka link[id]_2
      if (!this.$data.homepage) {
        document.getElementById("link1_2").style.pointerEvents = "none";
        document.getElementById("link1_2").style.opacity = "0.3";

        this.resetGrayEffects(2);
        this.resetGrayEffects(3);
        this.resetGrayEffects(4);
        this.resetGrayEffects(5);

      } else if (!this.$data.myItems) {
        document.getElementById("link2_2").style.pointerEvents = "none";
        document.getElementById("link2_2").style.opacity = "0.3";

        this.resetGrayEffects(1);
        this.resetGrayEffects(3);
        this.resetGrayEffects(4);
        this.resetGrayEffects(5);

      } else if (!this.$data.locationSettings) {
       document.getElementById("link3_2").style.pointerEvents = "none";
        document.getElementById("link3_2").style.opacity = "0.3";

        this.resetGrayEffects(1);
        this.resetGrayEffects(2);
        this.resetGrayEffects(4);
        this.resetGrayEffects(5);

      } else if (!this.$data.units) {
        document.getElementById("link4_2").style.pointerEvents = "none";
        document.getElementById("link4_2").style.opacity = "0.3";

        this.resetGrayEffects(1);
        this.resetGrayEffects(2);
        this.resetGrayEffects(3);
        this.resetGrayEffects(5);

      } else if (!this.$data.tempSettings) {
        document.getElementById("link5_2").style.pointerEvents = "none";
        document.getElementById("link5_2").style.opacity = "0.3";

        this.resetGrayEffects(1);
        this.resetGrayEffects(2);
        this.resetGrayEffects(3);
        this.resetGrayEffects(4);
      }
    },
    resetGrayEffects(id) {
      document.getElementById("link" + id + "_2").style.pointerEvents = "auto";
      document.getElementById("link" + id + "_2").style.opacity = "1";
    }
  }
}
</script>

<style scoped>

.menu-container_2 {
  cursor: pointer;
}


.menu_2 {
  position: relative;
  z-index: 1;

}

#routes-container1_2 {
  border: none;
  border-radius: 20px;
  position: relative;
  height: auto;
  left: -60%;
  top: -4.0vh;
  bottom: 0;
  border-top: 0;
  margin-top: 0.6vh;
  transform: translate(-50%, 0);
  width: 20vw;
  scale: 0.7;
  color: rgb(255, 255, 255);
  font-weight: 500;
  text-align: center;
  background-color: #14565C;
  overflow-y: hidden;
  overflow-x: hidden;
  visibility: hidden;
}


.links_2 {
  border: solid black 0.3vh;
  border-bottom: none;
}


#link1_2, #link2_2, #link3_2, #link4_2, #link5_2, #link6_2 {
  font-size: 1.8em;
  background-color: #1e7c85;
  padding: 1.6vh;
  display: block;
  border-bottom: solid black 0.3vh;

}

@media screen and (min-width: 1000px) and (max-width: 1400px) {
  .menu_2 {
    position: relative;
    z-index: 1;
  }

  #routes-container1_2 {
    border: none;
    position: relative;
    height: auto;
    left: -40.5%;
    top: -3.5vh;
    bottom: 0;
    border-top: 0;
    margin-top: 0.6vh;
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
  #link1_2, #link2_2, #link3_2, #link4_2, #link5_2, #link6_2 {
    font-size: 1.5em;
  }
}

@media screen and (min-width: 700px) and (max-width: 999px) {
  .menu_2 {
    position: relative;
    z-index: 1;
  }

  #routes-container1_2 {
    border: none;
    position: relative;
    height: auto;
    left: -30.5%;
    top: -2.5vh;
    bottom: 0;
    border-top: 0;
    margin-top: 0.6vh;
    transform: translate(-50%, 0);
    width: 35vw;
    scale: 0.7;
    color: rgb(255, 255, 255);
    font-weight: 500;
    text-align: center;
    background-color: gray;
    overflow-y: scroll;
    overflow-x: hidden;
    visibility: hidden;
  }
  #link1_2, #link2_2, #link3_2, #link4_2, #link5_2, #link6_2 {
    font-size: 1.2em;
  }
}

@media screen and (min-width: 500px) and (max-width: 699px) {
  .menu_2 {
    z-index: 1;
    position: fixed;
    scale: 0.7;
  }

  #routes-container1_2 {
    border: none;
    position: relative;
    height: auto;
    left: -1.5vh;
    top: -4.5vh;
    bottom: 0;
    border-top: 0;
    margin-top: 1.1vh;
    transform: translate(-50%, 0);
    width: 50vw;
    color: rgb(255, 255, 255);
    font-weight: 500;
    text-align: center;
    background-color: gray;
    overflow-y: scroll;
    overflow-x: hidden;
    visibility: hidden;
  }
  #link1_2, #link2_2, #link3_2, #link4_2, #link5_2, #link6_2{
    font-size: 1.7em;
  }
}

@media screen and (max-width: 499px) {
  .menu_2 {
    z-index: 1;
    position: fixed;
    scale: 0.7;
  }

  #routes-container1_2 {
    border: none;
    position: relative;
    height: auto;
    left: -2.5vh;
    top: -2.5vh;
    bottom: 0;
    border-top: 0;
    margin-top: 1.1vh;
    transform: translate(-50%, 0);
    width: 65vw;
    color: rgb(255, 255, 255);
    font-weight: 500;
    text-align: center;
    background-color: gray;
    overflow-y: scroll;
    overflow-x: hidden;
    visibility: hidden;
  }
  #link1_2, #link2_2, #link3_2, #link4_2, #link5_2, #link6_2{
    font-size: 1.2em;
  }
}


</style>
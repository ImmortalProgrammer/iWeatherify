<template>
  <div class = "menu_2">
    <div class="menu-container_2">
      <img src="../../../img/Vector.png" alt="Vector" @click="menuPress()"/>
    </div>
    <div id = "routes-container1_2">
      <div class = "links_2">
        <a id ="link1_2" :href="$router.resolve('/homepage').href" style = "text-decoration:none; color: inherit;">Homepage</a>
        <a id ="link2_2" :href="$router.resolve('/myItems').href" style = "text-decoration:none; color: inherit;">My Items</a>
        <a id ="link3_2" :href="$router.resolve('/savedOutfits').href" style = "text-decoration:none; color: inherit;">Saved Outfits</a>
        <a id ="link5_2" :href="$router.resolve('/unitsSettings').href" style = "text-decoration:none; color: inherit;">Settings</a>
        <a id ="link7_2"  style = "text-decoration:none; color: inherit;" @click = "logOutAccount()" :href="$router.resolve('/').href">Log Out</a>
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
      savedOutfits: true,
      myItems: true,
      units: true,
      tempSettings: true,
      logOut: false,
    }
  }, methods: {
    routeDetection() {
      const route = this.$route.name;
      switch (route) {
        case 'Homepage':
          this.$data.homepage = false;
          break;
        case 'myItems':
          this.$data.myItems = false;
          break;
        case 'Units':
          this.$data.units = false;
          break;
        case 'LocationSettings':
          this.$data.units = false;
          break;
        case 'TemperatureSettings':
          this.$data.units = false;
          break;
        case 'SavedOutfits':
          this.$data.savedOutfits = false;
          break;
        case 'AccountSettings':
          this.$data.units = false;
          break; 
      }
    },
    logOutAccount() {
      axios.post(process.env.VUE_APP_WEB_DOMAIN + "/backend/logout.php?action=logout", null, { withCredentials: true })
    .then((res) => {
      console.log(res);
      console.log(res.data);
      if (res.data.status === 1) {
        document.cookie = "auth_token=; Max-Age=-999999999;"; // delete the auth_token cookie
        this.$router.push("/login"); // redirect to login page after successful logout
      } else {
        console.log("Logout unsuccessful");
      }
    })
    .catch((err) => {
      console.log("Unsuccessful axios post", err);
    });
    },
    menuPress() {
      this.routeDetection();
      //The gray out effect
      this.grayOut();
 
      if (this.$data.disabled) {
        if (navigator.userAgent.match(/iPhone/i)) {
            document.getElementById("routes-container1_2").style.height = '28.5vh';
        } else if (navigator.userAgent.indexOf('Chrome') !== -1 && navigator.userAgent.indexOf('Mobile') !== -1) {
            document.getElementById("routes-container1_2").style.height = '28vh';
        } else {
            document.getElementById("routes-container1_2").style.height = '31.5vh';
        }
        this.$data.disabled = false;
      } else {
        document.getElementById("routes-container1_2").style.height = '0vh';
        this.$data.disabled = true;
      }
    },
    grayOut() {
      const links = [
        { id: 'link1_2', data: 'homepage'},
        { id: 'link2_2', data: 'myItems'},
        { id: 'link3_2', data: 'savedOutfits'},
        { id: 'link5_2', data: 'units'},
      ];
 
      links.forEach((link) => {
        const element = document.getElementById(link.id);
        if (!this.$data[link.data]) {
          element.style.pointerEvents = 'none';
          element.style.opacity = '0.3';
        } else {
          element.style.pointerEvents = 'auto';
          element.style.opacity = '1';
        }
      });
    },
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
  height: 0;
  left: -60%;
  top: -3vh;
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
  /* visibility: hidden; */
  transition: 0.5s;
}
 
 
.links_2 {
  border: solid black 0.3vh;
  border-bottom: none;
}
 
 
#link1_2, #link2_2, #link3_2, #link4_2, #link5_2, #link6_2, #link7_2 {
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
    height: 0;
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
    /* visibility: hidden; */
  }
  #link1_2, #link2_2, #link3_2, #link4_2, #link5_2, #link6_2, #link7_2 {
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
    height: 0;
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
    /* visibility: hidden; */
  }
  #link1_2, #link2_2, #link3_2, #link4_2, #link5_2, #link6_2, #link7_2 {
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
    height: 0;
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
    /* visibility: hidden; */
  }
  #link1_2, #link2_2, #link3_2, #link4_2, #link5_2, #link6_2, #link7_2{
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
    height: 0;
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
    /* visibility: hidden; */
  }
  #link1_2, #link2_2, #link3_2, #link4_2, #link5_2, #link6_2,#link7_2{
    font-size: 1.2em;
  }
}
 
 
</style>

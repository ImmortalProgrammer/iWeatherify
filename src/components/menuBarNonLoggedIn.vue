<template>
  <div class = "menu">
    <div class = "menu-container">
      <div class = "bar" ></div>
      <div class = "bar"></div>
      <div class = "bar "></div>
      <div class = "bar" ></div>
    </div>
    <div class = "routes-container">
      <div class = "links">
        <router-link class = "link" to="/" style = "text-decoration:none; color: inherit;">Homepage</router-link>
        <router-link class = "link" to="/register" style = "text-decoration:none; color: inherit;">Register</router-link>
        <router-link class = "link" to="/login" style = "text-decoration:none; color: inherit;">Login</router-link>
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
      homepage: false,
      register: false,
      login: false,
    }
  }, mounted: async function() {
    await this.linkPress();
  }, methods: {
    async linkPress() {
      try {
      } catch (Exception) {

      }
    }
  }
}
</script>

<style scoped>

.menu {
  z-index: 1;
  position: absolute;
  left: 100%;
  top: 3.5vh;
  height: 4.5vh;
  transform: translate(-50%, 0);
  width: auto;
  scale: 1.15;
}

.bar {
  width: 2.05vw;
  height: 0.35vh;
  background-color: black;
  margin: 0.3vw 0;
}

.routes-container {
  border: none;
  position: relative;
  height: auto;
  left: -7%;
  top: -2.1vh;
  bottom: 0;
  border-top: 0;
  margin-top: 1.1vh;
  transform: translate(-50%, 0);
  width: 20vw;
  scale: 0.7;
  color: rgb(255, 255, 255);
  font-weight: 500;
  text-align: center;
  background-color: gray;
  overflow-y: scroll;
  overflow-x: hidden;
}


.links {
  border: solid black;

}


.link {
  font-size: 2.1em;
  padding: 1.6vh;
  display: block;
  border-bottom: solid black 0.3vh;

}


</style>
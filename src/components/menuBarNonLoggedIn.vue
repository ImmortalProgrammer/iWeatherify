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
        <p class = "link">Homepage</p>
        <p class = "link">Register</p>
        <p class = "link">Login</p>
      </div>
    </div>
  </div>
</template>


<script>
export default {
  name: "menuBar"
}
</script>

<style scoped>

.routes-container {
  border: none;
  position: relative;
  height: auto;
  left: -5%;
  top: -2.5vh;
  bottom: 0;
  border-top: 0;
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

.menu {
  z-index: 1;
  position: relative;
  left: 25vw;
  top: 3.5vh;
  scale: 1.2;
}

.bar {
  width: 2.05vw;
  height: 0.35vh;
  background-color: black;
  margin: 0.3vw 0;
}

.links {
  border: solid black;

}

.link {
  padding: 2vh;
  font-size: 2.1em;
  border: solid black;

}


</style>
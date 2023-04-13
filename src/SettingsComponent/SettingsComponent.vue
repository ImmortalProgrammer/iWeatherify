<template>
  <div class= "settings-sidebar">
    <p class = "settingsText">Settings</p>
      <ul class = "settings">
        <li class = "button" ><a href="#/unitsSettings">Unit Settings</a></li>
        <li class = "button" ><a href="#/locationSettings"ocationSettings>Location Settings</a></li>
        <li class = "button" ><a href="#/tempSettings">Temperature Settings</a></li>
      </ul>

  </div>


</template>


<script>


</script>

<style scoped>

.settings-sidebar {
  user-select: none;
  background-color: #1e7c85;
  color: white;
  padding: 20px;

  position: fixed;
  height: 60vh;
  font-size: 100%;
  top: 15%;
  left: 0%;
  width: 15%;
  float: left;
}

.button {
  padding-top: 25px;
  border-top: none;
}

.settingsText {
  padding-bottom: 10px;
  text-align: center;
  font-size: 2.6em;
  border-bottom: 11px black solid;
}


.settings {
  font-size: 1.7em;
  text-align: center;
}

.settings-sidebar h2 {
  font-size: 24px;
  margin-bottom: 20px;
  text-align: center;
}

.settings-sidebar ul {
  list-style: none;
  margin: 0;
  padding: 0;
}

.settings-sidebar ul li {
  margin-bottom: 10px;
}

.settings-sidebar ul li a {
  color: white;
  text-decoration: none;
  display: block;
  padding: 10px;
  border-radius: 5px;
}

.settings-sidebar ul li a:hover {
  background-color: gray;
}



</style>

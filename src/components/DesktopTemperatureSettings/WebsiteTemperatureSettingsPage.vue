<template>
  <div class="website-temperature-settings-page screen">
    <div class="nav-bar-container">
      <div class="logo-container">
        <img src="../../../img/Logo.png" alt="Default Logo 4" />
      </div>
      <div class="profile-img-container">
        <img src="../../../img/Profile image.png" />
      </div>
      <div class="menu-bar-container"> 
        <img src="../../../img/Vector.png" alt="Vector"/>
      </div>
    </div>

    <div class="title-container">
      <h1 class="temp-setting-title">{{ title }}</h1>
    </div>
    
    <div class="temp-entries-container">
      <div class="hot-to-freezing-container">
        <div class="temp-rows">
            <label for="hot" class="hot-to-freezing-font">Hot:</label>
            <input type="text" id="hot" name="hot" placeholder="Enter Degree° Here"/>
            <button name="hot-button">Save</button>
        </div>

        <div div class="temp-rows">
          <label for="warm" class="hot-to-freezing-font">Warm:</label>
            <input type="text" id="warm" name="warm" placeholder="Enter Degree° Here"/>
            <button name="warm-button">Save</button>
        </div>

        <div div class="temp-rows">
          <label for="just-right" class="hot-to-freezing-font">Just Right:</label>
            <input type="text" id="just-right" name="just-right" placeholder="Enter Degree° Here"/>
            <button name="just-right-button">Save</button>
        </div>

        <div div class="temp-rows">
          <label for ="chilly" class="hot-to-freezing-font">Chilly:</label>
            <input type="text" id="chilly" name="chilly" placeholder="Enter Degree° Here"/>
            <button name="chilly-button">Save</button>
        </div>

        <div div class="temp-rows">
          <label for ="cold" class="hot-to-freezing-font">Cold:</label>
            <input type="text" id="cold" name="cold" placeholder="Enter Degree° Here"/>
            <button name="cold-button">Save</button>
        </div>

        <div div class="temp-rows">
          <label for ="freezing" class="hot-to-freezing-font">Freezing:</label>
            <input type="text" id="freezing" name="freezing" placeholder="Enter Degree° Here"/>
            <button name="freezing-button">Save</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "WebsiteTemperatureSettingsPage",
  data() {
    return {
      
    }
  },
  props: [
    "title"
  ]
};
</script>

<style>

.website-temperature-settings-page {
  position: absolute;
  width: 100%; 
  height: 100%;
  background: #FFFFFF;
  overflow: auto;
}

.nav-bar-container {
  position: relative;
  display: inline-flex;
  align-items: safe center;
  margin-top: 2%;
  width: 100%;
}
  
.logo-container {
  position: relative;
  width: 5%;
  left: 5%;
}

.menu-bar-container {
  position: relative;
  left: 85%;
}

.profile-img-container {
  position: relative;
  top: 5px;
  left: 85%;
}

.title-container {
  position: relative;
  margin: auto;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 10%;
}

.temp-setting-title {
  color: var(--black);
  font-weight: 600;
  font-size: 3em;
  font-family: 'Inter';
  font-style: normal;
}

.temp-entries-container {
  position: relative;
  display: flex;
  justify-content: safe center;
  align-items: center;
  width: 100%;
  height: 40%;
  margin: auto;
}

.temp-rows {
  position: relative;
  display: flex;
  align-items: center;
  justify-content: end;
  height: 10%;
}

.temperatures-font {
  color: var(--black);
  font-family: 'Inter';
  font-style: normal;
  font-weight: 600;
  font-size: 2.5em;
}

.hot-to-freezing-container {
  position: relative;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  line-height: 100px;
  text-align: center;
  height: 100%;
}

.hot-to-freezing-font {
  color: var(--black);
  font-family: 'Inter';
  font-style: normal;
  font-weight: 400;
  font-size: 1.5em;
}

::placeholder {
  font-style: italic;
}

input {
  color: var(--black);
  font-family: 'Inter';
  font-style: normal;
  font-weight: 400;
  font-size: 1em;
  width: 55%;
  margin-left: 5px;
  padding-left: 5px;
  border-radius: 15px;
}

button {
  color: white;
  font-family: 'Inter';
  font-style: normal;
  font-size: 1em;
  background-color: #478887;
  margin-left: -38px;
  padding: 0 5px 0 5px;
  cursor: pointer;
  border-radius: 0 15px 15px 0;
}

@media screen and (min-width: 992px) and (max-width: 1440px) {
  .menu-bar-container {
    left: 80%;
  }

  .profile-img-container {
    left: 80%;
  }
}

@media screen and (min-width: 576px) and (max-width: 992px) {
  .title-container{
    transform: scale(0.8);
  }

  .temperatures-font {
    font-size: 1.75em;
  }

  .menu-bar-container {
    left: 70%;
  }

  .profile-img-container {
    left: 70%;
  }
}

@media screen and (min-width: 375px) and (max-width: 576px) {
  .logo-container {
    transform: scale(0.7); 
  }

  .title-container{
    transform: scale(0.8);
  }

  .temp-entries-container {
    transform: scale(0.8);
  }

  .temp-setting-title {
    font-size: 2em;
  }

  .temperatures-font {
    font-size: 1.5em;
  }

  .menu-bar-container {
    left: 60%;
  }

  .profile-img-container {
    left: 60%;
  }
}

@media screen and (max-width: 375px) {
  .logo-container {
    transform: scale(0.7); 
  }

  .title-container {
    transform: scale(0.6);
  }

  .temp-entries-container {
    transform: scale(0.7);
  }

  .temp-setting-title {
    font-size: 2em;
  }

  .temperatures-font {
    font-size: 1.5em;
  }

  .menu-bar-container {
    left: 55%;
  }

  .profile-img-container {
    left: 55%;
  }
}
</style>

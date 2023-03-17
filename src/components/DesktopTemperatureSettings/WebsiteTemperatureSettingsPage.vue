<template>
  <div class="website-temperature-settings-page screen">
    <div class="nav-bar-container">
      <nav-bar style = "margin-top: 3.4vh;"></nav-bar>
    </div>

    <div class = "pushDowTempDisplay">

    <div class="title-container">
      <h1 class="temp-setting-title">{{ title }}</h1>
    </div>
    
    <div class="temp-container">
      <div class="hot-to-freezing-container">
        <div class="temp-rows">
          <label for="hot" class="hot-to-freezing-font">Hot:</label>
          <input class="temp-slider" type="range" min="-100" max="100" value="0" v-model="hotSliderValue" @input="updateHotInputValue"/>
          <input class="temp-input" type="text" id="hot" name="hot" v-model="hotInputValue" @input="updateHotSliderValue"/>
          <button name="hot-button">Save</button>
        </div>

        <div div class="temp-rows">
          <label for="warm" class="hot-to-freezing-font">Warm:</label>
          <input class="temp-slider" type="range" min="-100" max="100" value="0" v-model="warmSliderValue" @input="updateWarmInputValue"/>
          <input class="temp-input" type="text" id="warm" name="warm" v-model="warmInputValue" @input="updateWarmSliderValue"/>
          <button name="warm-button">Save</button>
        </div>

        <div div class="temp-rows">
          <label for="ideal" class="hot-to-freezing-font">Ideal:</label> 
          <input class="temp-slider" type="range" min="-100" max="100" value="0" v-model="idealSliderValue" @input="updateIdealInputValue"/>
          <input class= "temp-input" type="text" id="ideal" name="ideal" v-model="idealInputValue" @input="updateIdealSliderValue"/>
          <button name="ideal-button">Save</button>
        </div>

        <div div class="temp-rows">
          <label for="chilly" class="hot-to-freezing-font">Chilly:</label>
          <input class="temp-slider" type="range" min="-100" max="100" value="0" v-model="chillySliderValue" @input="updateChillyInputValue"/>
          <input class= "temp-input" type="text" id="chilly" name="chilly" v-model="chillyInputValue" @input="updateChillySliderValue"/>
          <button name="chilly-button">Save</button>
        </div>

        <div div class="temp-rows">
          <label for="cold" class="hot-to-freezing-font">Cold:</label>
          <input class="temp-slider" type="range" min="-100" max="100" value="0" v-model="coldSliderValue" @input="updateColdInputValue"/>
          <input class= "temp-input" type="text" id="cold" name="cold" v-model="coldInputValue" @input="updateColdSliderValue"/>
          <button name="cold-button">Save</button>
        </div>

        <div div class="temp-rows">
          <label for="freezing" class="hot-to-freezing-font">Freezing:</label>
          <input class="temp-slider" type="range" min="-100" max="100" value="0" v-model="freezingSliderValue" @input="updateFreezingInputValue"/>
          <input class= "temp-input" type="text" id="freezing" name="freezing" v-model="freezingInputValue" @input="updateFreezingSliderValue"/>
          <button name="freezing-button">Save</button>
        </div>
      </div>
    </div>
      </div>
  </div>

</template>

<script>
import menuBar from "@/components/menuBars/menuBarLoggedIn.vue";
import MenuBarLoggedIn from "@/components/menuBars/menuBarLoggedIn.vue";
import NavBar from "@/NavBar/NavBar.vue";
export default {
  name: "WebsiteTemperatureSettingsPage",
  data() {
    return {
      hotSliderValue: 0,
      hotInputValue: 0,
      warmSliderValue: 0,
      warmInputValue: 0,
      idealSliderValue: 0,
      idealInputValue: 0,
      chillySliderValue: 0,
      chillyInputValue: 0,
      coldSliderValue: 0,
      coldInputValue: 0,
      freezingInputValue: 0,
      freezingSliderValue: 0,
    };
  },
  methods: {
    updateHotInputValue(event) {
      this.hotInputValue = event.target.value;
    },
    updateHotSliderValue(event) {
      this.hotSliderValue = event.target.value;
    },
    updateWarmInputValue(event) {
      this.warmInputValue = event.target.value;
    },
    updateWarmSliderValue(event) {
      this.warmSliderValue = event.target.value;
    },
    updateIdealInputValue(event) {
      this.idealInputValue = event.target.value;
    },
    updateIdealSliderValue(event) {
      this.idealSliderValue = event.target.value;
    },
    updateChillyInputValue(event) {
      this.chillyInputValue = event.target.value;
    },
    updateChillySliderValue(event) {
      this.chillySliderValue = event.target.value;
    },
    updateColdInputValue(event) {
      this.coldInputValue = event.target.value;
    },
    updateColdSliderValue(event) {
      this.coldSliderValue = event.target.value;
    },
    updateFreezingInputValue(event) {
      this.freezingInputValue = event.target.value;
    },
    updateFreezingSliderValue(event) {
      this.freezingSliderValue = event.target.value;
    }
  },
  components: {
    NavBar,
    MenuBarLoggedIn,
    menuBar,
  },
  props: [
    "title"
  ]
};
</script>

<style scoped>

.website-temperature-settings-page {
  position: absolute;
  width: 100%; 
  height: 100%;
  background: #FFFFFF;
}

.pushDowTempDisplay {
  margin-top: 5.5%;
}

.nav-bar-container {
  position: relative;
  display: inline-flex;
  align-items: safe center;
  top: -0.2%;
  margin-top: 2%;
  width: 88%;
  z-index: 1;
}
  
.logo-container {
  position: relative;
  width: 5%;
  left: 5%;
}

.menu-bar-container {
  position: relative;
  left: 106.5%;
  top: -6.80vh;
  scale: 1.1;
}

.profile-img-container {
  position: relative;
  top: 0.1vh;
  scale: 1.1;
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
  padding-top: 15px;
  padding-bottom: 25px;
}

.temp-setting-title {
  color: var(--black);
  font-weight: 600;
  font-size: 3em;
  font-family: 'Inter';
  font-style: normal;
}

.temp-container {
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
  justify-content: flex-end;
  width: 100%;
  height: 10%;
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

.temp-slider {
  display: flex;
  justify-content: center;
  align-items: center;
  accent-color: #478887;
  margin:0 10px 0 10px;
  width: 350px;
}

.temp-input {
  color: var(--black);
  font-family: 'Inter';
  font-style: normal;
  font-weight: 400;
  font-size: 1em;
  width: 100px;
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
  margin-left: -51px;
  padding: 0 5px 0 5px;
  cursor: pointer;
  border-radius: 0 15px 15px 0;
}

@media screen and (min-width: 992px) and (max-width: 1440px) {
  .nav-bar-container {
    position: relative;
    display: inline-flex;
    align-items: safe center;
    margin-top: 2%;
    width: 83%;
    z-index: 1;
  }

  .logo-container {
    position: relative;
    width: 5%;
    left: 5%;
  }

  .menu-bar-container {
    position: relative;
    left: 108.5%;
    top: -6.20vh;
    scale: 1.15;
  }
  .profile-img-container {
    position: relative;
    scale: 1;
    left: 85%;
  }

}

@media screen and (min-width: 576px) and (max-width: 992px) {
  .title-container{
    transform: scale(0.8);
  }

  .hot-to-freezing-container {
    transform: scale(0.8);
  }

  .nav-bar-container {
    position: relative;
    display: inline-flex;
    align-items: safe center;
    margin-top: 2%;
    width: 75%;
    z-index: 1;
  }

  .logo-container {
    position: relative;
    width: 5%;
    left: 5%;
  }

  .menu-bar-container {
    position: relative;
    left: 109.5%;
    top: -5.1vh;
    scale: 1;
  }
  .profile-img-container {
    position: relative;
    scale: 0.90;
    top: 0.5vh;
    left: 85%;
  }
}

@media screen and (min-width: 375px) and (max-width: 576px) {
  .logo-container {
    transform: scale(0.7); 
  }

  .title-container{
    transform: scale(0.8);
    padding-top: 55px;
    margin-bottom: -120px;
  }

  .temp-container {
    transform: scale(0.8);
  }

  .hot-to-freezing-container {
    transform: scale(0.8);
  }

  .temp-setting-title {
    font-size: 2em;
  }

  .nav-bar-container {
    position: relative;
    display: inline-flex;
    align-items: safe center;
    margin-top: 2%;
    width: 70%;
    z-index: 1;
  }

  .logo-container {
    position: relative;
    width: 5%;
    left: 5%;
  }

  .menu-bar-container {
    position: relative;
    left: 112.5%;
    top: -5.1vh;
    scale: 1;
  }
  .profile-img-container {
    position: relative;
    scale: 0.90;
    top: 0.5vh;
    left: 85%;
  }
}

@media screen and (max-width: 375px) {
  .logo-container {
    transform: scale(0.7); 
  }

  .title-container {
    transform: scale(0.6);
    width: 50%;
    margin-bottom: -150px;
  }

  .temp-container {
    transform: scale(0.7);
  }

  .hot-to-freezing-container {
    transform: scale(0.7);
  }

  .nav-bar-container {
    position: relative;
    display: inline-flex;
    align-items: safe center;
    margin-top: 2%;
    width: 80%;
    z-index: 1;
  }

  .logo-container {
    position: relative;
    width: 5%;
    left: 5%;
  }

  .menu-bar-container {
    position: relative;
    left: 124.5%;
    top: -8.3vh;
    scale: 1.55;
  }
  .profile-img-container {
    position: relative;
    scale: 0.65;
    top: 0.5vh;
    left: 80%;
  }

  .temp-setting-title {
    font-size: 2em;
  }
}
</style>

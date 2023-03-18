<template>
  <div class="website-temperature-settings-page">
    <div class="nav-bar-container">
      <nav-bar style = "margin-top: 3.4vh;"></nav-bar>
    </div>

    <div class = "pushDowTempDisplay">

    <div class="title-container">
      <h1 class="temp-setting-title">{{ title }}</h1>
    </div>
    
    <div class="temp-container">
      <div class="hot-to-freezing-container">

        <div v-for="(label, index) in labels" :key="index" class="temp-rows">
          <label :for="label" class="hot-to-freezing-font">{{ label }}:</label>

          <input class="temp-slider" type="range" min="-100" max="100" v-model="tempValues[label]" @input="updateInputValue(label, $event)"/>

          <input class= "temp-input" type="text" :id="label" :name="label" v-model="tempValues[label]" @input="updateSliderValue(label, $event)"/>

          <button :name="label + '-button'" @click="saveTempSettings()">Save</button>
        </div>
      </div>
    </div>
      </div>
  </div>

</template>

<script>
import axios from "axios";
import menuBar from "@/components/menuBars/menuBarLoggedIn.vue";
import MenuBarLoggedIn from "@/components/menuBars/menuBarLoggedIn.vue";
import NavBar from "@/NavBar/NavBar.vue";
export default {
  name: "WebsiteTemperatureSettingsPage",
  data() {
    return {
      labels: ["hot", "warm", "ideal", "chilly", "cold", "freezing"],
      tempValues: {
        hot: 0,
        warm: 0,
        ideal: 0,
        chilly: 0,
        cold: 0,
        freezing: 0
      },
    };
  },
  created() {
    this.loadTempSettings();
  },
  methods: {
    loadTempSettings() {
      axios.get("https://www-student.cse.buffalo.edu/CSE442-542/2023-Spring/cse-442a/backend/load_temperatures.php")
      .then(response => {
        if (typeof response.data === 'object') {
          this.tempValues = response.data;
        } else {
          console.error('Invalid response data:', response.data);
        }
      })
      .catch(error => {
        console.error(error);
      });
    },
    saveTempSettings() {
      axios.post("https://www-student.cse.buffalo.edu/CSE442-542/2023-Spring/cse-442a/backend/saved_temperatures.php", {
        userid: 1,
        hot: this.tempValues.hot,
        warm: this.tempValues.warm,
        ideal: this.tempValues.ideal,
        cold: this.tempValues.cold,
        chilly: this.tempValues.chilly,
        freezing: this.tempValues.freezing
      })
      .then(response => {
        console.log(response.data);
      })
      .catch(error => {
        console.error(error);
      });
    },
    updateInputValue(label, event) {
      this.tempValues[label] = event.target.value;
    },
    updateSliderValue(label, event) {
      this.tempValues[label] = event.target.value;  
    },
  },
  watch: {
    tempValues: {
      handler: function(newVal) {
        for (let key in newVal) {
          if (newVal[key] > 100) {
            this.tempValues[key] = 100;
          } else if (newVal[key] < -100) {
            this.tempValues[key] = -100;
          }
        }
      },
      deep: true,
    },
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

<template>
  <div class="website-temperature-settings-page">
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
    
    <div class="temp-container">
      <div class="hot-to-freezing-container">

        <div v-for="(label, index) in labels" :key="index" class="temp-rows">
          <label :for="label" class="hot-to-freezing-font">{{ label }}:</label>

          <input class="temp-slider" type="range" min="-100" max="100" v-model="tempValues[label]" @input="updateInputValue(label, $event)"/>

          <input class= "temp-input" :type="text" :id="label" :name="label" v-model="tempValues[label]" @input="updateSliderValue(label, $event)"/>

          <button :name="label + '-button'" @click="saveSettings(label)">Save</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
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
    loadSettings() {
      axios.get("https://www-student.cse.buffalo.edu/CSE442-542/2023-Spring/cse-442a/backend/load_temperatures.php")
        .then(response => {
          this.tempValues = response.data;
        })
        .catch(error => {
          console.error(error);
        });
    },
    saveSettings(label) {
      axios.post("https://www-student.cse.buffalo.edu/CSE442-542/2023-Spring/cse-442a/backend/saved_temperatures.php", {
        userid: 29,
        label: label,
        value: this.tempValues[label]
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

  .hot-to-freezing-container {
    transform: scale(0.8);
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

  .temp-container {
    transform: scale(0.8);
  }

  .hot-to-freezing-container {
    transform: scale(0.8);
  }

  .temp-setting-title {
    font-size: 2em;
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
    width: 50%;
  }

  .temp-container {
    transform: scale(0.7);
  }

  .hot-to-freezing-container {
    transform: scale(0.7);
  }

  .menu-bar-container {
    left: 55%;
  }

  .profile-img-container {
    left: 55%;
  }

  .temp-setting-title {
    font-size: 2em;
  }
}
</style>

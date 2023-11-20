<template>
  <div class="website-temperature-settings-page">
    <nav-bar class = "tempSettingsPageNav"></nav-bar>

    <div v-if="showErrorModal" class="overlay">
      <error-modal
        :show-modal="showErrorModal"
        :title="errorTitle"
        :message="errorMessage"
        @close-modal="showErrorModal = false"
      ></error-modal>
    </div>

    <div class = "pushDowTempDisplay">
      <div class="title-container">
        <h1 class="temp-setting-title">Temperature Settings</h1>
      </div>
      
      <div class="temp-container">
        <div class="hot-to-freezing-container">

          <div v-for="(label, index) in labels" :key="index" class="temp-rows">
            <label :for="label" class="hot-to-freezing-font">{{ label }}:</label>

            <input class="temp-slider" type="range" min="-100" max="100" v-model="tempValues[label]" @input="updateInputValue(label, $event)"/>

            <input class= "temp-input" type="text" :id="label" :name="label" v-model="tempValues[label]" @input="updateSliderValue(label, $event)" @keypress="isNumber($event)" pattern="\d*"/>

          </div>
        
          <div id="save-button-container">
            <button @click="saveTempSettings()">Save</button>
          </div>
        
        </div>
      </div>
      <SettingsComponent></SettingsComponent>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import menuBar from "@/components/menuBars/menuBarLoggedIn.vue";
import MenuBarLoggedIn from "@/components/menuBars/menuBarLoggedIn.vue";
import NavBar from "@/NavBar/NavBar.vue";
import SettingsComponent from "@/SettingsComponent/SettingsComponent.vue"
import ErrorModal from "@/components/ModalBox/ErrorModal.vue";

export default {
  name: "WebsiteTemperatureSettingsPage",
  data() {
    return {
      userid: null,
      labels: ["hot", "warm", "ideal", "chilly", "cold", "freezing"],
      tempValues: {
        hot: 0,
        warm: 0,
        ideal: 0,
        chilly: 0,
        cold: 0,
        freezing: 0
      },
      errorTitle: "",
      errorMessage: "",
      showErrorModal: false,
    };
  },
  created() {
    this.getUserId();
  },
  methods: {
    enforceTemperatureConstraints() {
      this.tempValues.warm = Math.min(this.tempValues.warm, this.tempValues.hot - 1);
      this.tempValues.ideal = Math.min(this.tempValues.ideal, this.tempValues.warm - 1);
      this.tempValues.chilly = Math.min(this.tempValues.chilly, this.tempValues.ideal - 1);
      this.tempValues.cold = Math.min(this.tempValues.cold, this.tempValues.chilly - 1);
      this.tempValues.freezing = Math.min(this.tempValues.freezing, this.tempValues.cold - 1);
    },
    async getUserId() {
      try {
        const response = await axios.get(process.env.VUE_APP_WEB_DOMAIN + "/backend/get_userid.php", { withCredentials: true });
        this.userid = response.data.userid;
        this.loadTempSettings();
      } catch (error) {
        console.error("Unsuccessful request in getUserId().", error);
      }
    },
    loadTempSettings() {
      axios.get(process.env.VUE_APP_WEB_DOMAIN + "/backend/load_temperatures.php",
      {
        params: {
          userid: this.userid,
        },
      })
      .then(response => {
        if (typeof response.data === 'object') {
          this.tempValues = response.data;
        } else {
          console.error('Invalid response data:', response.data);
        }
      })
      .catch(error => {
        console.error("Unsuccessful axios post in loadTempSettings().", error);
      });
    },
    saveTempSettings() {
      axios.post(process.env.VUE_APP_WEB_DOMAIN + "/backend/saved_temperatures.php",
      {
        userid: this.userid,
        hot: this.tempValues.hot,
        warm: this.tempValues.warm,
        ideal: this.tempValues.ideal,
        cold: this.tempValues.cold,
        chilly: this.tempValues.chilly,
        freezing: this.tempValues.freezing
      })
      .then(response => {
        this.errorTitle = 'Success';
        this.errorMessage = 'Temperatures Saved Successfully!';
        this.showErrorModal = true;
        // alert("Temperatures Saved Successfully!");//Here
      })
      .catch(error => {
        console.error("Unsuccessful axios post in saveTempSettings().", error);
      });
    },
    updateInputValue(label, event) {
      this.tempValues[label] = event.target.value;
      this.enforceTemperatureConstraints();
    },
    updateSliderValue(label, event) {
      this.tempValues[label] = event.target.value;
      this.enforceTemperatureConstraints();
    },
    isNumber(event) {
      if (event.key.match(/[\d-]/)) {
        return event;
      }
      event.preventDefault();
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
    SettingsComponent,
    ErrorModal,
  },
};
</script>

<style scoped>
@keyframes fadeInAnimation {
    0% {
        opacity: 0;
    }
    100% {
        opacity: 1;
     }
}
* {
  animation: fadeInAnimation ease .5s;
  animation-iteration-count: 1;
  /* animation-fill-mode: forwards; */
}
.website-temperature-settings-page {
  position: absolute;
  width: 100%; 
  height: 100%;
  background: #FFFFFF;
}

.overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  z-index: 1000;
}

.tempSettingsPageNav {
  top: -0.85%;
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
  padding-right: 60px;
}

.hot-to-freezing-container {
  position: relative;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  line-height: 100px;
  text-align: center;
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
  text-align: center;
  font-size: 1em;
  width: 50px;
  border-radius: 15px;
}

#save-button-container{
  display: flex;
  justify-content: center;
}

button {
  font-family: 'Inter';
  font-style: normal;
  font-size: large;
  font-weight: bold;
  text-align: center;
  padding: 0.7em 9em;
  color: white;
  background-color: black;
  cursor: pointer;
  border-radius: 15px;
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
  .pushDowTempDisplay {
    margin-top: 30.5%;
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

}

@media screen and (max-width: 375px) {
  .logo-container {
    transform: scale(0.7); 
  }

  .title-container {
    transform: scale(0.5);
    width: auto;
    top: 30px;
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

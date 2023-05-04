<template>
  <div class="website-units-page screen">
    <nav-bar class = "unitSettingsPageNav"></nav-bar>

    <div v-if="showErrorModal" class="overlay">
      <error-modal
        :show-modal="showErrorModal"
        :title="errorTitle"
        :message="errorMessage"
        @close-modal="showErrorModal = false"
      ></error-modal>
    </div>

    <div class="title-container">
      <h1 class="unit-title">Unit Settings</h1>
    </div>

    <div class="row-format-container">
      <div class="row">
        <p class="unit-font">Temperature</p>
        <select class="degree-container" id="dropdown-container-font" v-model="temperature">
          <option value="f">°F</option>
          <option value="c">°C</option>
        </select>
      </div>

      <div class="row">
        <p class="unit-font">Wind</p>
        <select class="wind-container" id="dropdown-container-font" v-model="wind">
          <option value="mph">mph</option>
          <option value="kmh">km/h</option>
        </select>
      </div>

      <div class="row">
        <p class="unit-font">Pressure</p>
        <select class="pressure-container" id="dropdown-container-font" v-model="pressure">
          <option value="hg">Hg</option>
          <option value="mb">mb</option>
        </select>
      </div>

      <div>
        <button @click="saveUnits()">Save</button>
      </div>
      <SettingsComponent></SettingsComponent>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import NavBar from "@/NavBar/NavBar.vue";
import SettingsComponent from "@/SettingsComponent/SettingsComponent.vue"
import ErrorModal from "@/components/ModalBox/ErrorModal.vue";

export default {
  name: "WebsiteUnitsPage",
  components: {
    NavBar,
    SettingsComponent,
    ErrorModal,
  },
  data() {
    return {
      userid: null,
      temperature: "f",
      wind: "mph",
      pressure: "mb",
      errorTitle: "",
      errorMessage: "",
      showErrorModal: false,
    };
  },
  created() {
    this.getUserId();
  },
  methods: {
    async getUserId() {
      try {
        const response = await axios.get("https://www-student.cse.buffalo.edu/CSE442-542/2023-Spring/cse-442a/backend/get_userid.php", { withCredentials: true });
        this.userid = response.data.userid;
        this.loadUnits();
      } catch (error) {
        console.error("Unsuccessful request in getUserId().", error);
      }
    },
    saveUnits() {
      axios.post("https://www-student.cse.buffalo.edu/CSE442-542/2023-Spring/cse-442a/backend/saved_units.php", 
      {
        userid: this.userid,
        temperature: this.temperature,
        wind: this.wind,
        pressure: this.pressure,
      })
      .then(response => {
        this.errorTitle = 'Success';
        this.errorMessage = 'Units saved successfully!';
        this.showErrorModal = true;
        // alert("Units saved successfully."); //Here
      })
      .catch(error => {
        console.error("Unsuccessful axios post in saveUnits().", error);
      });
    },
    loadUnits() {
      axios.get("https://www-student.cse.buffalo.edu/CSE442-542/2023-Spring/cse-442a/backend/load_units.php",
      {
        params: {
          userid: this.userid,
        }
      })
      .then(response => {
        this.temperature = response.data.temperature;
        this.wind = response.data.wind;
        this.pressure = response.data.pressure;
      })
      .catch(error => {
        console.error("Unsuccessful axios get in loadUnits().", error);
      });
    },
  },
};
</script>

<style scoped>
.website-units-page {
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

.unitSettingsPageNav {
  top: -0.85%;
}

.title-container {
  position: relative;
  top: 75px;
  margin: auto;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 45%;
}

.unit-title {
  color: var(--black);
  font-weight: 600;
  font-size: 3em;
  font-family: 'Inter';
  font-style: normal;
}

.row-format-container {
  position: fixed;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  align-items: center;
  top: 30%;
  width: 100%;
  height: 300px;
}

.degree-container {
  position: relative;
  width: fit-content;
  border: none;
}

.wind-container {
  position: relative;
  width: fit-content;
  border: none;
}

.pressure-container {
  position: relative;
  width: fit-content;
  border: none;
}

.distance-container {
  position: relative;
  width: fit-content;
  border: none;
}

.row {
  border-bottom: 1px solid #C6C6C8;
  width: 30%;
  display: flex;
  flex-direction: row;
  align-items: left;
  justify-content: space-between;
}

.unit-font {
  font-size: 1.5em;
  font-family: 'Inter';
  font-style: normal;
  font-weight: 400;
}

#dropdown-container-font {
  font-size: 1.5em;
  font-family: 'Inter';
  font-style: normal;
  font-weight: 400;
  opacity: 0.5;
  cursor: pointer;
}

button {
  font-family: 'Inter';
  font-style: normal;
  font-size: large;
  font-weight: bold;
  padding: 0.7em 10em;
  color: white;
  background-color: black;
  border-radius: 15px;
  cursor: pointer;
}

@media screen and (min-width: 992px) and (max-width: 1440px) {
  .row {
    width: 50%;
  }
}

@media screen and (min-width: 576px) and (max-width: 992px) {
  .title-container{
    transform: scale(0.9);
    width: auto;
    top: 150px;
  }

  .row-format-container {
    height: 200px;
  }


  .row {
    width: 60%;
  }

  button {
    transform: scale(0.8);
  }
}

@media screen and (min-width: 375px) and (max-width: 576px) {
  .title-container{
    transform: scale(0.7);
    width: auto;
    top: 170px;
  }

  .row {
    width: 90%;
  }

  button {
    transform: scale(0.8);
  }
}

@media screen and (max-width: 375px) {
  .title-container{
    transform: scale(0.5);
    width: auto;
  }

  .row {
    width: 90%;
  }

  button {
    transform: scale(0.7);
  }
}
</style>
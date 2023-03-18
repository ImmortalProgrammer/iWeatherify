<template>
  <div class="website-units-page screen">
    <nav-bar class = "unitSettingsPageNav"></nav-bar>

    <div class="title-container">
      <h1 class="unit-title">{{ title }}</h1>
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
          <option value="in">in</option>
          <option value="mm">mm</option>
        </select>
      </div>

      <div class="row">
        <p class="unit-font">Distance</p>
        <select class="distance-container" id="dropdown-container-font" v-model="distance">
          <option value="mi">mi</option>
          <option value="km">km</option>
        </select>
      </div>

      <div>
        <button @click="saveUnits">Save</button>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import NavBar from "@/NavBar/NavBar.vue";
export default {
  name: "WebsiteUnitsPage",
  components: {NavBar},
  data() {
    return {
      temperature: "f",
      wind: "mph",
      pressure: "in",
      distance: "mi",
    };
  },
  methods: {
    saveUnits() {
      // Send an AJAX request to the server to save the units
      axios.post("https://www-student.cse.buffalo.edu/CSE442-542/2023-Spring/cse-442a/backend/save_units.php", {
        temperature: this.temperature,
        wind: this.wind,
        pressure: this.pressure,
        distance: this.distance
      })
          .then(response => {
            console.log(response.data);
          })
          .catch(error => {
            console.error(error);
          })
    },
  },
  props: [
    "defaultLogo4",
    "title",
    "ellipse6Props",
  ]
};
</script>

<style scoped>
.website-units-page {
  position: absolute;
  width: 100%;
  height: 100%;
  background: #FFFFFF;
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
  height: 10%;
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
  cursor: pointer;
}

@media screen and (min-width: 992px) and (max-width: 1440px) {


  .row {
    width: 50%;
  }
}

@media screen and (min-width: 576px) and (max-width: 992px) {
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

  .row {
    width: 90%;
  }

  button {
    transform: scale(0.8);
  }
}

@media screen and (max-width: 375px) {


  .row {
    width: 90%;
  }

  button {
    transform: scale(0.7);
  }
}
</style>
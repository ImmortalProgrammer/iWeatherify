<template>
  <div id="app">
  <div class="container-center-horizontal">
    <div class="website-home-page-not-logged-in screen">
      <div class="overlap-group3">
        <div class ="weather-wrapper">
            <div class ="locationBox">
              <div class ="location">{{this.weatherData.locationOutput.charAt(0).
              toUpperCase() + this.weatherData.locationOutput.slice(1)}}</div>
            </div>
            <div class = "weather-box">
              <div class = "CurrentTemp">{{this.weatherData.currentTemp}}°</div>
              <div class = "HighLowTemp">H: {{this.weatherData.tempHigh}}° L: {{this.weatherData.tempLow}}°</div>
              <div class = "FeelsLike">Feels like: {{this.weatherData.feelsLike}}° </div>
            </div>
        </div>

        <div class ="searching-input">
        <input class="search-bar" type="text" name="searching" placeholder="Search up a city..."
               v-model="weatherData.locationInput" @keyup.enter="retrieveAPI()">
        </div>
        <div class="weather-for-today">
          <weather-throughout-the-day
            :now1Props="weatherThroughoutTheDay1Props.now1Props"
            :now2Props="weatherThroughoutTheDay1Props.now2Props"
            :now3Props="weatherThroughoutTheDay1Props.now3Props"
          />
          <weather-throughout-the-day
            :now1Props="weatherThroughoutTheDay2Props.now1Props"
            :now2Props="weatherThroughoutTheDay2Props.now2Props"
            :now3Props="weatherThroughoutTheDay2Props.now3Props"
          />
          <weather-throughout-the-day
            :now1Props="weatherThroughoutTheDay3Props.now1Props"
            :now2Props="weatherThroughoutTheDay3Props.now2Props"
            :now3Props="weatherThroughoutTheDay3Props.now3Props"
          />
        </div>
        <div class="flex-row-4">
          <ellipse64 />
          <img
            class="vector-4"
            src="https://anima-uploads.s3.amazonaws.com/projects/6402851d6a37db7167320ed4/releases/64028608c9953e08464983be/img/vector-1.svg"
            alt="Vector"
          />

        </div>
        <img class="home-logo-2" :src="homeLogo2" alt="Home Logo 2" />
        <div class="frame-7">
          <img
            class="vector-5"
            src="https://anima-uploads.s3.amazonaws.com/projects/6402851d6a37db7167320ed4/releases/64028608c9953e08464983be/img/vector.svg"
            alt="Vector"
          />
          <h1 class="login-to-view-a-pers">{{ loginToViewAPers }}</h1>
        </div>
      </div>
    </div>
  </div>
  </div>
</template>

<script>
import WeatherThroughoutTheDay from "./WeatherThroughoutTheDay";
import Ellipse64 from "./Ellipse64";
import axios from "axios";

export default {
  name: "WebsiteHomePageNotLoggedIn",
  data() {
    return {
      weatherData: {
        locationInput: 'Buffalo',
        locationOutput: '',
        currentTemp: '',
        feelsLike: ' ',
        tempLow: ' ',
        tempHigh: ' ',
      }
    }
  },
  mounted: async function() {
    await this.retrieveAPI();
  },
  methods: {
    async retrieveAPI() {
      if (this.weatherData.locationInput === '') {
      } else {
        function returnFahrenheit(Kelvin) {
          return Math.floor(((Kelvin-273.15)*1.8)+32);
        }
        const locationFormatting = this.weatherData.locationInput.replaceAll(' ', '%20');
        const weatherAPI = await axios.get(`https://api.openweathermap.org/data/2.5/weather?
      units=metric&q=${locationFormatting}&appid=c984db1322335af0a97e0dd951e5cb69`);
        const geoLocationStatus = weatherAPI['statusText'];
        const geoLocationData = weatherAPI['data'];
        if (geoLocationStatus === 'OK') {
          let nameOfLocation = geoLocationData['name'];
          let currentTemp = returnFahrenheit(geoLocationData['main']['temp']);
          let minTemp = returnFahrenheit(geoLocationData['main']['temp_min']);
          let maxTemp = returnFahrenheit(geoLocationData['main']['temp_max']);
          let feelslike = returnFahrenheit(geoLocationData['main']['feels_like']);
          console.log(nameOfLocation + " " + currentTemp + " " + minTemp + " " + maxTemp + " " + feelslike);
          this.weatherData.locationOutput = this.weatherData.locationInput;
          this.weatherData.feelsLike = feelslike;
          this.weatherData.tempLow = minTemp;
          this.weatherData.tempHigh = maxTemp;
          this.weatherData.currentTemp = currentTemp;
        } else {
          alert("Error Status Request Failed!");
        }
        this.weatherData.locationInput = '';
      }
      }
  },
  components: {
    WeatherThroughoutTheDay,
    Ellipse64,
  },
  props: [
    "overlapGroup3",
    "homeLogo2",
    "loginToViewAPers",
    "weatherProps",
    "inputSearchProps",
    "weatherThroughoutTheDay1Props",
    "weatherThroughoutTheDay2Props",
    "weatherThroughoutTheDay3Props",
  ],
};
</script>

<style>

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

.weather-wrapper {
  position: relative;
  left: 420px;
  top: 220px;
  width: 600px;
  overflow: scroll;
  height: auto;
  padding: 15px;
  scale: 1.25;

}

.locationBox {
  color: #000000;
  font-size: 32px;
  font-weight: 500;
  text-align: center;
  margin-bottom: 10px;
}

.CurrentTemp {
  color: #000000;
  font-size: 60px;
  font-weight: 500;
  text-align: center;
  margin-bottom: 10px;
}

.HighLowTemp {
  color: #000000;
  font-size: 20px;
  font-weight: 500;
  text-align: center;
  margin-bottom: 5px;
}

.FeelsLike {
  color: #000000;
  font-size: 20px;
  font-weight: 500;
  text-align: center;
}


#app {
  background-image: url(../../../img/background-img.png);
  background-size: cover;
  background-position: bottom;
  overflow-x: auto;
  background-attachment: scroll;

}

.searching-input {
  background-image: url(../../../img/bg.svg);
  background-size: 100% 100%;
  height: 50px;
  left: 305px;
  position: absolute;
  top: 105px;
  width: 838px;
}

.search-bar {
  background-color: transparent;
  border: 0;
  color: rgba(0, 0, 0);
  font-weight: 500;
  height: 19px;
  left: 16px;
  line-height: normal;
  padding: 0;
  position: relative;
  top: 15px;
  width: 800px;
}


main {
  min-height: 100vh;
  padding: 25px;
}

.website-home-page-not-logged-in {
  align-items: flex-start;
  display: flex;
  top: -150px;
  margin-right: 2050px;
  min-height: 100vh;
  position: relative;
}


.weather-for-today {
  align-items: flex-start;
  display: flex;
  height: 104px;
  left: 380px;
  position: absolute;
  top: 850px;
  width: 693px;
  scale: 1.35;
  visibility: hidden;
}

.flex-row-4 {
  align-items: center;
  display: flex;
  gap: 720px;
  height: 50px;
  left: 315px;
  min-width: 129px;
  position: absolute;
  top: 35px;
}

.vector-4 {
  height: 41px;
  margin-bottom: 1px;
  width: 41px;
}


.home-logo-2 {
  height: 51px;
  left: 640px;
  object-fit: cover;
  position: absolute;
  top: 35px;
  width: 192px;
}


.frame-7 {
  height: 312px;
  left: 475px;
  position: absolute;
  top: 470px;
  scale: 1.1;

}


.vector-5 {
  height: 292px;
  left: 10px;
  position: absolute;
  top: 10px;
  width: 431px;
}

.login-to-view-a-pers {
  color: #000000bf;
  font-family: var(--font-family-inter);
  font-size: var(--font-size-xxxxl);
  font-weight: 400;
  left: 20px;
  letter-spacing: 0;
  line-height: normal;
  position: absolute;
  text-align: center;
  top: 66px;
  width: 420px;
}

@media only screen and (min-width: 880px) and (max-width: 1300px) {
  .weather-for-today {
    scale: 1.15;
    left: 390px;
  }
}

@media only screen and (min-width: 533px) and (max-width: 879px) {
  #app {
    overflow: hidden;
  }

  .home-logo-2 {
    scale: 0.75;
  }
  .flex-row-4 {
    left: 415px;
    gap: 530px;
    scale: 0.75;
  }
  .weather-for-today {
    top: 470px;
    display: block;
    left: 690px;

  }
  .searching-input {
    height: 50px;
    left: 480px;
    position: absolute;
    top: 95px;
    width: 500px;
  }
  .search-bar {
    background-color: transparent;
    border: 0;
    color: rgba(0, 0, 0);
    font-weight: 500;
    height: 16px;
    left: 16px;
    line-height: normal;
    padding: 0;
    position: relative;
    top: 15px;
    width: 450px;
  }
}

@media only screen and (min-width: 532px) and (max-width: 879px) and (max-height: 850px) {
  #app {
    overflow: auto;
  }
}

@media only screen and (min-width: 365px) and (max-width: 532px) {
  #app {
    overflow: hidden;
  }
  .weather-wrapper {
    scale: 1.10;
    top: 130px;
  }
  .home-logo-2 {
      height: 51px;
      left: 640px;
      object-fit: cover;
      position: absolute;
      top: 35px;
      width: 192px;
      scale: 0.65;
  }
  .flex-row-4 {
    align-items: center;
    display: flex;
    gap: 395px;
    height: 50px;
    left: 485px;
    min-width: 129px;
    position: absolute;
    top: 35px;
    scale: 0.65;
  }
  .frame-7 {
    scale: 0.60;
    top: 280px;
    left: 580px;
  }
  .weather-for-today {
    top: 340px;
    left: 635px;
    scale: 1.10;
    display: block;

  }
  .searching-input {
    height: 50px;
    left: 530px;
    position: absolute;
    top: 75px;
    width: 400px;
    scale: 0.85;
  }
  .search-bar {
    background-color: transparent;
    border: 0;
    color: var(--black);
    font-weight: 500;
    height: 16px;
    left: 16px;
    line-height: normal;
    padding: 0;
    position: relative;
    top: 15px;
    width: 175px;
  }
}

@media only screen and (min-width: 260px) and (max-width: 365px) {
  #app {
    overflow: hidden;
  }
  .weather-wrapper {
    top: 130px;
    left: 430px;
    scale: 0.85;
  }
  .home-logo-2 {
    height: 51px;
    left: 640px;
    object-fit: cover;
    position: absolute;
    top: 35px;
    width: 192px;
    scale: 0.5;
  }
  .flex-row-4 {
    align-items: center;
    display: flex;
    gap: 365px;
    height: 50px;
    left: 510px;
    min-width: 129px;
    position: absolute;
    top: 35px;
    scale: 0.5;
  }
  .frame-7 {
    scale: 0.5;
    top: 245px;
    left: 620px;
  }
  .weather-for-today {
    top: 340px;
    left: 670px;
    display: block;
  }
  .searching-input {
    height: 50px;
    left: 590px;
    position: absolute;
    top: 75px;
    width: 300px;
    scale: 0.8;
  }
  .search-bar {
    background-color: transparent;
    border: 0;
    color: var(--black);
    font-weight: 500;
    height: 16px;
    left: 16px;
    line-height: normal;
    padding: 0;
    position: relative;
    top: 15px;
    width: 245px;
  }
}

@media only screen and (min-width: 100px) and (max-width: 532px) and (max-height: 850px) {
  body {
    overflow-x: hidden;
  }
  .container-center-horizontal {
    overflow-x: hidden;
  }
  #app {
    overflow-x: hidden;
  }
}
</style>

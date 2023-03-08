<template>
  <div id="app2">
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
              <div class = "FeelsLike2">Feels like: {{this.weatherData.feelsLike}}° </div>
            </div>
        </div>

        <div class ="searching-bar">
        <input class="search-input" type="text" name="searching" placeholder="Search up a City..."
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
        <img class="home-logo-2" :src="homeLogo2" alt="Home Logo 2" />
        <div class="frame-732">
          <p class ="myOutfit">My Outfit:</p>
          <img
              class="vector-532"
              src="../../../img/vectorNon.svg"
              alt="My Outfit"
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
  name: "WebsiteHomePageLoggedIn",
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
        const locationFormatting = this.weatherData.locationInput.replaceAll(' ', '%20');
        const weatherAPI = await axios.get(`https://pro.openweathermap.org/data/2.5/weather?q=${locationFormatting}
        &units=imperial&APPID=c984db1322335af0a97e0dd951e5cb69`);
        const geoLocationStatus = weatherAPI['statusText'];
        const geoLocationData = weatherAPI['data'];
        if (geoLocationStatus === 'OK') {
          const nameOfLocation = geoLocationData['name'];
          const currentTemp = Math.round(geoLocationData['main']['temp']);
          const minTemp = Math.round(geoLocationData['main']['temp_min']);
          const maxTemp = Math.round(geoLocationData['main']['temp_max']);
          const feelslike = Math.round(geoLocationData['main']['feels_like']);
          this.weatherData.locationOutput = nameOfLocation;
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



#app2 {
  background-image: url(../../../img/background-img.png);
  background-size: cover;
  background-position: bottom;
  overflow-x: auto;
  background-attachment: scroll;

}

.weather-wrapper {
  position: relative;
  left: 1000px;
  top: 370px;
  width: 1000px;
  overflow: hidden;
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

.FeelsLike2 {
  color: #000000;
  font-size: 20px;
  font-weight: 500;
  text-align: center;
}



.searching-bar {
  background-image: url(../../../img/bg.svg);
  background-size: 100% 100%;
  height: 50px;
  left: 1100px;
  position: absolute;
  top: 260px;
  width: 838px;
}

.search-input {
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


.home-logo-2 {
  position: absolute;
  top: 180px;
  height: 51px;
  left: 1400px;
  width: 192px;
}


.frame-732 {
  height: 250px;
  width: 500px;
  left: 1250px;
  position: absolute;
  top: 700px;
  scale: 1.4;

}

.myOutfit {
  text-align: center;
  font-size: 40px;
}

.vector-532 {
  height: 292px;
  left: 30px;
  position: absolute;
  top: -10px;
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
  #app2 {
    overflow: hidden;
  }
  .container-center-horizontal {
    padding-left: 50px;
  }

  .home-logo-2 {
    position: absolute;
    height: 51px;
    top: 165px;
    left: 1400px;
    width: 192px;
    scale: 0.85;
  }

  .weather-wrapper {
    top: 280px;
  }
  .frame-732 {
    height: 250px;
    width: 500px;
    left: 1250px;
    position: absolute;
    top: 530px;
    scale: 1.1;
  }

  .myOutfit {
    text-align: center;
    font-size: 40px;
  }
  .weather-for-today {
    top: 470px;
    display: block;
    left: 690px;
  }
  .searching-bar {
    background-image: url(../../../img/bg.svg);
    background-size: 100% 100%;
    height: 50px;
    left: 1280px;
    position: absolute;
    top: 215px;
    width: 450px;
  }
  .search-input {
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
    width: 410px;
  }
}

@media only screen and (min-width: 532px) and (max-width: 879px) and (max-height: 850px) {
  #app2 {
    overflow: auto;
  }
}

@media only screen and (min-width: 365px) and (max-width: 532px) {
  #app2 {
    overflow: hidden;
  }

  .container-center-horizontal {
    padding-left: 50px;
  }

  .home-logo-2 {
    position: absolute;
    height: 51px;
    top: 165px;
    left: 1400px;
    width: 192px;
    scale: 0.75;
  }


  .weather-wrapper {
    top: 280px;
  }
  .frame-732 {
    height: 250px;
    width: 500px;
    left: 1250px;
    position: absolute;
    top: 490px;
    scale: 0.8;
  }

  .myOutfit {
    text-align: center;
    font-size: 40px;
  }
  .weather-for-today {
    top: 470px;
    display: block;
    left: 690px;
  }
  .searching-bar {
    background-image: url(../../../img/bg.svg);
    background-size: 100% 100%;
    height: 50px;
    left: 1280px;
    position: absolute;
    top: 210px;
    scale: 0.65;
    width: 450px;
  }
  .search-input {
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
    width: 410px;
  }
}

@media only screen and (min-width: 260px) and (max-width: 365px) {
  #app2 {
    overflow: hidden;
  }

  .home-logo-2 {
    position: absolute;
    height: 51px;
    top: 165px;
    left: 1425px;
    width: 192px;
    scale: 0.65;
  }

  .weather-wrapper {
    position: relative;
    left: 1015px;
    top: 250px;
    width: 1000px;
    overflow: hidden;
    height: auto;
    padding: 15px;
    scale: 0.9;
  }
  .frame-732 {
    height: 250px;
    width: 500px;
    left: 1260px;
    position: absolute;
    top: 400px;
    scale: 0.6;
  }

  .myOutfit {
    text-align: center;
    font-size: 40px;
  }
  .weather-for-today {
    top: 470px;
    display: block;
    left: 690px;
  }

  .searching-bar {
    background-image: url(../../../img/bg.svg);
    background-size: 100% 100%;
    height: 50px;
    left: 1320px;
    position: absolute;
    top: 205px;
    scale: 0.60;
    width: 400px;
  }
  .search-input {
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
    width: 250px;
  }
}

@media only screen and (min-width: 100px) and (max-width: 532px) and (max-height: 850px) {
  body {
    overflow-x: hidden;
  }
  .container-center-horizontal {
    overflow-x: hidden;
  }
  #app2 {
    overflow-x: hidden;
  }
}

@media only screen and (min-width: 2000px) and (max-width: 3000px) {
  .container-center-horizontal {
    padding-top: 15px;
  }
}
</style>

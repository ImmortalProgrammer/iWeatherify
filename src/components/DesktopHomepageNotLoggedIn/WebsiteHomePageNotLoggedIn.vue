<template>
  <div id="app2">
  <div class="container-center-horizontal">
        <div class = "menu-location">
          <menu-bar></menu-bar>
        </div>
      <div class = "options_logged_in_2">
        <div class ="menu_homepage_logged_in_2" @click="pressOptions()">
          <p id = "optionsText_2">Open Options</p>
        </div>
        <div id="menu-container_2_2">
          <div class = "diff_options_2">
            <div class = "diff_options_2">
              <a id = "menu_option_2_0" @click="pressOptionsMenuItems('menu_option_2_0')" style = "text-decoration:none; color: inherit;">24-Hour Forecast</a>
              <a id = "menu_option_2_1"  @click="pressOptionsMenuItems('menu_option_2_1')" style = "text-decoration:none; color: inherit;">8-Day Forecast</a>
              <a id = "menu_option_2_2" @click="pressOptionsMenuItems('menu_option_2_2')" style = "text-decoration:none; color: inherit;">Outfit of the Day</a>
            </div>
          </div>
          </div>
        </div>
        <div class ="bar-search">
        <input class="search-input" type="text" name="searching" placeholder="Search up a City..."
               v-model="currentWeatherData.locationInput" @keyup.enter="retrieveAPI()">
        </div>
        <div class="daily-weather">
            <div class = "current-unit">
              <p class ="city-display">{{this.currentWeatherData.locationOutput.charAt(0).toUpperCase() + this.currentWeatherData.locationOutput.slice(1)
                }}</p>
              <p class = "current-day">{{ this.currentWeatherData.currentDay }}</p>
              <p class = "weatherDescription">{{ this.currentWeatherData.iconDescription}}</p>
              <div class = "currentWeatherContainer">
                <div class = "weather-icon-current">
                  <img :src = "this.currentWeatherData.iconUrl">
                </div>
              </div>
              <p class = "high-low-temp">{{this.currentWeatherData.tempHigh}}°
                / {{this.currentWeatherData.tempLow}}°</p>
              <p class = "feelslike_1">Feels Like: {{this.currentWeatherData.feelsLike}}°</p>
            </div>
          </div>

        <div id="TwentyFourHour-weather_2">
          <p style="font-size: 5vh; padding-bottom: 3vh;">24-Hour Forecast</p>
          <div class="hour-next-2" v-for="(hour, index) in twentyFourHourForecastData.UTCdates" :key="index">
            <p class="next_hour-2">{{hour}}</p>
            <p class="weatherStateHour-2">{{twentyFourHourForecastData.iconDescription[index]}}</p>
            <div class="TwentyFourHourForecastImg-2">
              <img :src="twentyFourHourForecastData.iconUrlArr[index]">
            </div>
            <p class="HighLowTempHourly_2">{{twentyFourHourForecastData.highTempArr[index]}}° / {{twentyFourHourForecastData.lowTempArr[index]}}°</p>
            <p class="feelslikeHourly-2">Feels Like: {{twentyFourHourForecastData.feelsLikeArr[index]}}°</p>
          </div>
        </div>

        <div id="weekly-weather_2">
          <p style="font-size: 5vh; padding-bottom: 3vh;">8-Day Forecast: </p>
          <div class="day-next" v-for="(day, index) in eightDayForecastData.dates" :key="index">
            <p class = "next">{{ eightDayForecastData.dates[index] }}</p>
            <p class = "weatherState">{{ eightDayForecastData.iconDescription[index] }}</p>
            <div class = "eightDayForecastImg">
              <img :src = "eightDayForecastData.iconUrlArr[index]">
            </div>
            <p class = "HighLowTemp_1">{{ eightDayForecastData.highTempArr[index] }}°
              / {{ eightDayForecastData.lowTempArr[index] }}°</p>
            <p class = "feelslike">Feels Like: {{ eightDayForecastData.feelsLikeArr[index] }}°</p>
           </div>
        </div>
        <img class="home-logo-2" :src="homeLogo2" alt="Home Logo 2" />
      </div>


  </div>
</template>

<script>
import axios from "axios";
import menuBar from "@/components/menuBars/menuBarNonLoggedIn.vue";
export default {
  name: "WebsiteHomePageNotLoggedIn",
  data() {
    return {
      currentWeatherData: {
        locationInput: 'Buffalo',
        currentDay: ' ',
        locationOutput: '',
        currentTemp: '',
        feelsLike: ' ',
        tempLow: ' ',
        tempHigh: ' ',
        iconUrl: ' ',
        iconDescription: ' ',
      },
      eightDayForecastData: {
        //Index 0 starts one day after the current weather)
        dates: ['', '', '', '', '', '', '', ''],
        iconDescription: ['', '', '', '', '', '', '', ''],
        highTempArr: ['', '', '', '', '', '', '', ''],
        lowTempArr: [' ', ' ', ' ', ' ', ' ', ' ', ' ', ''],
        feelsLikeArr: ['', '', '', '', '', '', '', ''],
        iconUrlArr: ['', '', '', '', '', '', '', ''],
      },
      twentyFourHourForecastData: {
        //Index 0 starts one hour after the current weather
        UTCdates: new Array(24),
        hours: new Array(24),
        iconDescription: new Array(24),
        highTempArr: new Array(24),
        lowTempArr: new Array(24),
        feelsLikeArr: new Array(24),
        iconUrlArr: new Array(24),
        windArr: new Array(24),
        pressureArr: new Array(24),
        timezoneOffset: 0,
      },
      data: {
        APIKEY: 'c984db1322335af0a97e0dd951e5cb69',
        optionsVisibility: false,
        eightDayForecastGrayOut: true,
      }
    }
  },
  mounted: async function() {
    await this.retrieveAPI();
  },
  methods: {
    pressOptions() {
      const menuContainer = document.getElementById("menu-container_2_2");
      const optionsText = document.getElementById("optionsText_2");
      if (this.$data.data.optionsVisibility) {
        menuContainer.style.visibility = 'visible';
        optionsText.textContent = "Close Options";
      } else {
        menuContainer.style.visibility = 'hidden';
        optionsText.textContent = "Open Options";
      }
      this.$data.data.optionsVisibility = !this.$data.data.optionsVisibility;
    },
    pressOptionsMenuItems(menuOption) {
      const menuOpt2_0 = document.getElementById("menu_option_2_0");
      const menuOpt2_1 = document.getElementById("menu_option_2_1");
      const weeklyWeather2 = document.getElementById("weekly-weather_2");
      const twentyFourHour2 = document.getElementById("TwentyFourHour-weather_2")
      if (menuOption === "menu_option_2_0") {
        console.log(menuOption);
        menuOpt2_0.style.opacity = "0.3";
        menuOpt2_1.style.opacity = "1";
        weeklyWeather2.style.visibility = "hidden";
        twentyFourHour2.style.visibility = "visible";
      } else if (menuOption === "menu_option_2_1") {
        menuOpt2_0.style.opacity = "1";
        menuOpt2_1.style.opacity = "0.3";
        twentyFourHour2.style.visibility = "hidden";
        weeklyWeather2.style.visibility = "visible";
      } else if (menuOption === "menu_option_2_2") {
        this.$router.push('/login');
      }
      this.pressOptions();
    },
    async retrieveAPI() {
      try {
        if (this.currentWeatherData.locationInput === '') {
        } else {
          //Setup the dates data structure
          this.setupDays();
          //Sets up the current weather as of now
          await this.currentWeather();
          //Twenty-Four Hour Forecast
          await this.twentyFourForecast();
          //Eight-Day Forecast
          await this.eightDayForecast();

          this.currentWeatherData.locationInput = '';

        }
      } catch (Exception) {
        alert("City unrecognized!")
      }
    },
    async currentWeather() {
      const locationFormatting = this.currentWeatherData.locationInput.replaceAll(' ', '%20');
      const weatherAPI = await axios.get(`https://pro.openweathermap.org/data/2.5/weather?q=${locationFormatting}
        &units=imperial&APPID=${this.$data.data.APIKEY}`).catch(function (error) {
        console.log(error.toJSON());
      });
      const geoLocationStatus = weatherAPI['statusText'];
      const geoLocationData = weatherAPI['data'];
      //Get current Weather
      if (geoLocationStatus === 'OK') {
        const nameOfLocation = geoLocationData['name'];
        const currentTemp = Math.round(geoLocationData['main']['temp']);
        const minTemp = Math.round(geoLocationData['main']['temp_min']);
        const maxTemp = Math.round(geoLocationData['main']['temp_max']);
        const feelslike = Math.round(geoLocationData['main']['feels_like']);
        this.currentWeatherData.locationOutput = nameOfLocation;
        this.currentWeatherData.feelsLike = feelslike;
        this.currentWeatherData.tempLow = minTemp;
        this.currentWeatherData.tempHigh = maxTemp;
        this.currentWeatherData.currentTemp = currentTemp;
        const iconCode = geoLocationData['weather']['0']['icon'];
        const iconUrl = 'https://openweathermap.org/img/wn/'
            + iconCode + ".png";
        this.currentWeatherData.iconUrl = iconUrl;
        this.currentWeatherData.iconDescription = geoLocationData['weather']['0']['description'].split(' ')
            .map((s) => s.charAt(0).toUpperCase() + s.substring(1))
            .join(' ');
      } else {
        alert("Error Status Request Failed!");
      }
    },
    async twentyFourForecast() {
      const locationFormatting = this.currentWeatherData.locationInput.replaceAll(' ', '%20');
      const weatherAPI = await axios.get(`https://pro.openweathermap.org/data/2.5/forecast/hourly?q=${locationFormatting}
        &units=imperial&cnt=24&APPID=${this.$data.data.APIKEY}`).catch(function (error) {
        console.log(error.toJSON());
      });
      this.twentyFourHourForecastData.timezoneOffset = weatherAPI['data']['city']['timezone'];
      const data = weatherAPI['data']['list'];
      for (let x in data) {
        const currentData = data[x.toString()];
        this.twentyFourHourForecastData.UTCdates[x] = currentData['dt_txt'].toString().slice(11) + ' UTC';;
        this.twentyFourHourForecastData.iconDescription[x] = currentData['weather']['0']['description'].split(' ')
            .map((s) => s.charAt(0).toUpperCase() + s.substring(1))
            .join(' ');
        //Low Temp
        this.twentyFourHourForecastData.lowTempArr[x] = Math.round(currentData['main']['temp_min']).toString();
        // High Temp
        this.twentyFourHourForecastData.highTempArr[x] = Math.round(currentData['main']['temp_max']).toString();
        //Feels Like
        this.twentyFourHourForecastData.feelsLikeArr[x] = Math.round(currentData['main']['feels_like']).toString();
        const iconCode = currentData['weather']['0']['icon'];
        const iconUrl = 'https://openweathermap.org/img/wn/'
            + iconCode + ".png";
        this.twentyFourHourForecastData.iconUrlArr[x] = iconUrl;
      }
    },
    async eightDayForecast() {
      const locationFormatting = this.currentWeatherData.locationInput.replaceAll(' ', '%20');
      const weatherAPI = await axios.get(`https://pro.openweathermap.org/data/2.5/forecast/daily?q=${locationFormatting}
        &units=imperial&cnt=9&APPID=${this.$data.data.APIKEY}`).catch(function (error) {
        console.log(error.toJSON());
      });
      const data = weatherAPI['data']['list'];
      let x = 0;
      for (let i in data) {
        if (x !== 0) {
          let currentData = data[i.toString()];
          let feelsLikeData = currentData['feels_like']
          this.eightDayForecastData.iconDescription[i-1] = currentData['weather']['0']['description'].split(' ')
              .map((s) => s.charAt(0).toUpperCase() + s.substring(1))
              .join(' ');
          //Low Temp
          this.eightDayForecastData.lowTempArr[i-1] = Math.round(currentData['temp']['min']).toString();
          // High Temp
          this.eightDayForecastData.highTempArr[i-1] = Math.round(currentData['temp']['max']).toString();
          //Feels Like
          this.eightDayForecastData.feelsLikeArr[i-1] = Math.round(
              (feelsLikeData['day'] + feelsLikeData['night'] + feelsLikeData['eve'] + feelsLikeData['morn']) / 4);

          const iconCode = currentData['weather']['0']['icon'];
          const iconUrl = 'https://openweathermap.org/img/wn/'
              + iconCode + ".png";
          this.eightDayForecastData.iconUrlArr[i-1] = iconUrl;
        }
        x++;
      }
    },
    setupDays() {
      const weekdays = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
      const currentDate = new Date();
      let currentDay = currentDate.getDay();
      this.currentWeatherData.currentDay = weekdays[currentDay];
      for (let i in this.eightDayForecastData.dates) {
        currentDay = (currentDay + 1) % 7;
        this.eightDayForecastData.dates[i] = weekdays[currentDay];
      }
    },
  },
  components: {
    menuBar
  },
  props: [
    "homeLogo2",
  ],
};
</script>

<style scoped>

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}



#app2 {
  background-image: url(../../../img/background-img.png);
  background-size: cover;
  background-position: bottom;
  overflow-x: hidden;
  background-attachment: scroll;

}



.menu_homepage_logged_in_2 {
  z-index: 1;
  position: absolute;
  height: 7.5vh;
  margin-bottom: -15vh;
  left: 45%;
  top: 58vh;
  border: black solid 6px;
  bottom: 0;
  transform: translate(-50%, 0);
  width: 32.5vw;
  padding: 1.3vh;
  scale: 0.7;
  color: rgb(255, 255, 255);
  font-size: 3.2vh;
  font-weight: 500;
  text-align: center;
  background-color: rgba(102, 102, 102, 0.83);
  overflow-y: hidden;
  overflow-x: hidden;
  -webkit-touch-callout: none; /* iOS Safari */
  -webkit-user-select: none; /* Safari */
  -khtml-user-select: none; /* Konqueror HTML */
  -moz-user-select: none; /* Old versions of Firefox */
  -ms-user-select: none; /* Internet Explorer/Edge */
  user-select: none; /* Non-prefixed version, currently
                                  supported by Chrome, Edge, Opera and Firefox */
}


#menu-container_2_2 {
  z-index: 1;
  position: absolute;
  height: 21.8vh;
  margin-bottom: -15vh;
  left: 45.0%;
  top: 61.1vh;
  border-left: black solid 6px;
  border-right: black solid 6px;
  border-bottom: black solid 3.5px;
  bottom: 0;
  transform: translate(-50%, 0);
  width: 32.5vw;
  padding: 1.3vh;
  scale: 0.7;
  color: rgb(255, 255, 255);
  font-size: 3.5vh;
  font-weight: 500;
  text-align: center;
  background-color: rgb(124, 124, 124);
  overflow-y: hidden;
  overflow-x: hidden;
  visibility: hidden;
}

.diff_options_2 {
  border: none;
  position: relative;
  height: auto;
  display: block;
  width: 130%;
  top: -0.625vh;
  margin-left: -14%;
  background-color: #14565C;
  color: rgb(255, 255, 255);
  font-weight: 500;
}

#menu_option_2_0, #menu_option_2_1, #menu_option_2_2 {
  font-size: 2.5vh;
  background-color: #1e7c85;
  padding: 2.1vh;
  display: block;
  border-bottom: solid black 0.5vh;
  -webkit-touch-callout: none; /* iOS Safari */
  -webkit-user-select: none; /* Safari */
  -khtml-user-select: none; /* Konqueror HTML */
  -moz-user-select: none; /* Old versions of Firefox */
  -ms-user-select: none; /* Internet Explorer/Edge */
  user-select: none; /* Non-prefixed version, currently
                                  supported by Chrome, Edge, Opera and Firefox */
}

#menu_option_2_0 {
  opacity: 0.3;
}



#TwentyFourHour-weather_2 {
  border: none;
  position: absolute;
  height: auto;
  margin-bottom: -15vh;
  left: 33%;
  top: 55.4vh;
  bottom: 0;
  border-top: 0;
  transform: translate(-50%, 0);
  width: 110vw;
  padding: 2.5vh;
  scale: 0.7;
  color: rgb(255, 255, 255);
  font-size: 25px;
  font-weight: 500;
  text-align: center;
  background-color: rgba(102, 102, 102, 0.83);
  overflow-y: scroll;
  overflow-x: hidden;
}

.hour-next-2 {
  padding: 2.3vw;
  display: inline-block;
  margin: 0.4em 1.5% 0.4em 0;
}


.next_hour-2 {
  font-size: 4vh;
  padding-bottom: 1.5vh;
}

.weatherStateHour-2 {
  font-size: 2.3vh;
  padding-bottom: 1.5vh;
}


.HighLowTempHourly_2 {
  font-size: 2.5vh;
  padding-bottom: 1.5vh;
}

.feelslikeHourly-2 {
  font-size: 2.5vh;
  padding-bottom: 1.5vh;
}


.TwentyFourHourForecastImg-2 {
  padding-top: 0.5vh;
  padding-bottom: 1vh;
  scale: 2;
  height: auto;
}


#weekly-weather_2 {
  border: none;
  position: absolute;
  height: auto;
  margin-bottom: -15vh;
  left: 33%;
  top: 55.4vh;
  bottom: 0;
  border-top: 0;
  transform: translate(-50%, 0);
  width: 110vw;
  padding: 2.5vh;
  scale: 0.7;
  color: rgb(255, 255, 255);
  font-size: 25px;
  font-weight: 500;
  text-align: center;
  background-color: rgba(102, 102, 102, 0.83);
  overflow-y: scroll;
  overflow-x: hidden;
  visibility: hidden;
}


.day-next {
  padding: 1.8vw;
  display: inline-block;
}


.next {
  font-size: 4vh;
  padding-bottom: 1.5vh;
}

.weatherState {
  font-size: 2.3vh;
  padding-bottom: 1.5vh;
}


.HighLowTemp_1 {
  font-size: 2.5vh;
  padding-bottom: 1.5vh;
}

.feelslike {
  font-size: 2.5vh;
  padding-bottom: 1.5vh;
}

.eightDayForecastImg {
  padding-top: 0.5vh;
  padding-bottom: 1vh;
  scale: 2;
  height: auto;
}


.current-unit {
  position: absolute;
  border: none;
  height: 45vh;
  left: 45%;
  top: 16vh;
  bottom: 0;
  transform: translate(-50%, 0);
  width: 50vw;
  scale: 0.8;
  color: rgb(255, 255, 255);
  font-size: 25px;
  font-weight: 500;
  text-align: center;
  background-color: rgba(102, 102, 102, 0.83);
  overflow-y: hidden;
  overflow-x: hidden;
}

.city-display {
  padding-top: 2vh;
  padding-bottom: 0.5vh;
  font-size: 6vh;
  border-bottom: 1vh solid #000
}

.current-day {
  padding-top: 1.5vh;
  font-size: 5vh;
}

.weatherDescription {
  padding-top: 1.5vh;
  padding-bottom: 1.5vh;
  font-size: 3vh;
}

.high-low-temp {
  padding-bottom: 1.5vh;
  font-size: 3vh;
}

.currentWeatherContainer {
  width: auto;
  height: auto;
  position: relative;
  overflow: hidden;
  border-radius: 50%;
  scale: 2.0;
  padding-bottom: 0.8vh;
}

.weather-icon-current {
  display: inline;
  margin: 0 auto;
  height: 100%;
  width: auto;
}

.feelslike_1 {
  font-size: 3vh;
}


.bar-search {
  background-color: rgb(255, 255, 255);
  background-size: 100% 100%;
  height: 5vh;
  left: 30%;
  position: absolute;
  top: 11vh;
  width: 40vw;
  border-radius: 5vh;
}

.search-input {
  background-color: transparent;
  opacity: 1;
  border: 0;
  font-size: 1.9vw;
  text-align: center;
  color: rgba(0, 0, 0);
  font-weight: 500;
  height: 4vh;
  line-height: normal;
  left: 2.1vh;
  padding: 0;
  position: absolute;
  top: 0.6vh;
  width: 93%;
}

.menu-location {
}


main {
  min-height: 100vh;
  padding: 25px;
}

.container-center-horizontal {
  align-items: flex-start;
  display: flex;
  margin-right: 2050px;
  min-height: 100vh;
  position: relative;
}


.home-logo-2 {
  position: absolute;
  height: 4.5vh;
  top: 3vh;
  left: 52.5%;
  transform: translate(-50%, 0);
  width: auto;
  scale: 1.3;
}

@media only screen and (min-width: 427px) and (max-width: 901px) {

  .menu_homepage_logged_in_2 {
    z-index: 1;
    position: absolute;
    height: 7.5vh;
    margin-bottom: -15vh;
    left: 40%;
    top: 50vh;
    border: black solid 6px;
    bottom: 0;
    transform: translate(-50%, 0);
    width: 50vw;
    padding: 1.3vh;
    scale: 0.7;
    color: rgb(255, 255, 255);
    font-size: 3vh;
    font-weight: 500;
    text-align: center;
    background-color: rgba(102, 102, 102, 0.83);
    overflow-y: hidden;
    overflow-x: hidden;
  }

  #menu-container_2_2 {
    z-index: 1;
    position: absolute;
    height: 22.2vh;
    margin-bottom: -15vh;
    left: 40.0%;
    top: 52.1vh;
    border-top: black solid 3.5px;
    border-left: black solid 6px;
    border-right: black solid 6px;
    border-bottom: black solid 3.5px;
    bottom: 0;
    transform: translate(-50%, 0);
    width: 50.1vw;
    padding: 1.3vh;
    scale: 0.7;
    color: rgb(255, 255, 255);
    font-size: 3.5vh;
    font-weight: 500;
    text-align: center;
    background-color: rgb(124, 124, 124);
    overflow-y: hidden;
    overflow-x: hidden;
    visibility: hidden;
  }

  .diff_options_2 {
    border: none;
    position: relative;
    height: auto;
    display: block;
    width: 130%;
    margin-left: -14%;
    background-color: #14565C;
    color: rgb(255, 255, 255);
    font-weight: 500;
  }


  #TwentyFourHour-weather_2 {
    border: none;
    position: absolute;
    height: auto;
    margin-bottom: -20vh;
    left: 11.5%;
    top: 35vh;
    bottom: 0;
    border-top: 0;
    transform: translate(-50%, 0);
    width: 140vw;
    padding: 2vh;
    scale: 0.5;
    color: rgb(255, 255, 255);
    font-size: 1.5vh;
    font-weight: 500;
    text-align: center;
    background-color: rgba(102, 102, 102, 0.83);
    overflow-y: scroll;
    overflow-x: hidden;
  }

  .hour-next-2 {
    padding: 5.0vw;
    display: inline-block;
    margin: 0.4em 1.5% 0.4em 0;
  }


  .next_hour-2 {
    font-size: 3.5vh;
    padding-bottom: 1.5vh;
  }

  .weatherStateHour-2 {
    font-size: 2.3vh;
    padding-bottom: 1.5vh;
  }


  .HighLowTempHourly_2 {
    font-size: 2.5vh;
    padding-bottom: 1.5vh;
  }

  .feelslikeHourly-2 {
    font-size: 2.5vh;
    padding-bottom: 1.5vh;
  }

  .TwentyFourHourForecastImg-2 {
    padding-top: 0.5vh;
    padding-bottom: 1vh;
    scale: 2;
    height: auto;
  }

  #weekly-weather_2 {
    border: none;
    position: absolute;
    height: auto;
    margin-bottom: -20vh;
    left: 11.5%;
    top: 35vh;
    bottom: 0;
    border-top: 0;
    transform: translate(-50%, 0);
    width: 140vw;
    padding: 2vh;
    scale: 0.5;
    color: rgb(255, 255, 255);
    font-size: 1.5vh;
    font-weight: 500;
    text-align: center;
    background-color: rgba(102, 102, 102, 0.83);
    overflow-y: scroll;
    overflow-x: hidden;
  }

  .day-next {
    padding: 1.8vw;
    display: inline-block;
  }


  .next {
    font-size: 3.5vh;
    padding-bottom: 1.5vh;
  }

  .weatherState {
    font-size: 2.3vh;
    padding-bottom: 1.5vh;
  }


  .HighLowTemp_1 {
    font-size: 2.5vh;
    padding-bottom: 1.5vh;
  }

  .feelslike {
    font-size: 2.5vh;
    padding-bottom: 1.5vh;
  }

  .eightDayForecastImg {
    padding-top: 0.5vh;
    padding-bottom: 1vh;
    scale: 2;
    height: auto;
  }

  .current-unit {
    position: absolute;
    border: none;
    height: 45vh;
    left: 23.18%;
    top: 12vh;
    bottom: 0;
    transform: translate(-50%, 0);
    width: 116.5vw;
    scale: 0.6;
    color: rgb(255, 255, 255);
    font-size: 25px;
    font-weight: 500;
    text-align: center;
    background-color: rgba(102, 102, 102, 0.83);
    overflow-y: hidden;
    overflow-x: hidden;
  }

  .city-display {
    padding-top: 2vh;
    padding-bottom: 0.5vh;
    font-size: 6vh;
    border-bottom: 1vh solid #000
  }
  .current-day {
    padding-top: 1.5vh;
    font-size: 5vh;
  }

  .weatherDescription {
    padding-top: 1.5vh;
    padding-bottom: 1.5vh;
    font-size: 3vh;
  }

  .high-low-temp {
    padding-bottom: 1.5vh;
    font-size: 3vh;
  }



  .currentWeatherContainer {
    width: auto;
    height: auto;
    position: relative;
    overflow: hidden;
    border-radius: 50%;
    scale: 1.5;
    padding-bottom: 0.8vh;
  }

  .weather-icon-current {
    display: inline;
    margin: 0 auto;
    height: 100%;
    width: auto;
  }

  .feelslike_1 {
    font-size: 3vh;
  }


  .bar-search {
    background-color: rgb(255, 255, 255);
    background-size: 100% 100%;
    height: 5vh;
    position: absolute;
    transform: translate(-50%, 0);
    left: 47%;
    top: 11vh;
    width: 73vw;
    border-radius: 5vh;
  }

  .search-input {
    background-color: transparent;
    opacity: 1;
    border: 0;
    font-size: 3.2vw;
    text-align: center;
    color: rgba(0, 0, 0);
    font-weight: 500;
    height: 4vh;
    left: 1.5vw;
    line-height: normal;
    padding: 0;
    position: absolute;
    top: 0.6vh;
    width: 93%;
  }


  main {
    min-height: 100vh;
    padding: 25px;
  }

  .container-center-horizontal {
    align-items: flex-start;
    display: flex;
    margin-right: 2050px;
    min-height: 100vh;
    position: relative;
  }


  .home-logo-2 {
    position: absolute;
    height: 4.5vh;
    top: 3vh;
    left: 50%;
    transform: translate(-50%, 0);
    width: auto;
    scale: 1.3;
  }
}

@media only screen and (max-width: 426px) {
  .menu_homepage_logged_in_2 {
    z-index: 1;
    position: absolute;
    height: 7.5vh;
    margin-bottom: -15vh;
    left: 40%;
    top: 50vh;
    border: black solid 6px;
    bottom: 0;
    transform: translate(-50%, 0);
    width: 50vw;
    padding: 1.6vh;
    scale: 0.7;
    color: rgb(255, 255, 255);
    font-size: 2.1vh;
    font-weight: 500;
    text-align: center;
    background-color: rgba(102, 102, 102, 0.83);
    overflow-y: hidden;
    overflow-x: hidden;
    -webkit-touch-callout: none; /* iOS Safari */
    -webkit-user-select: none; /* Safari */
    -khtml-user-select: none; /* Konqueror HTML */
    -moz-user-select: none; /* Old versions of Firefox */
    -ms-user-select: none; /* Internet Explorer/Edge */
    user-select: none; /* Non-prefixed version, currently
                                  supported by Chrome, Edge, Opera and Firefox */
  }

  #menu-container_2_2 {
    z-index: 1;
    position: absolute;
    height: 22.0vh;
    margin-bottom: -15vh;
    left: 40.0%;
    top: 52.1vh;
    border-top: black solid 3.5px;
    border-left: black solid 6px;
    border-right: black solid 6px;
    border-bottom: black solid 3.5px;
    bottom: 0;
    transform: translate(-50%, 0);
    width: 50.1vw;
    padding: 1.3vh;
    scale: 0.7;
    color: rgb(255, 255, 255);
    font-size: 3.5vh;
    font-weight: 500;
    text-align: center;
    background-color: rgb(124, 124, 124);
    overflow-y: hidden;
    overflow-x: hidden;
  }

  .diff_options_2 {
    border: none;
    position: relative;
    height: auto;
    display: block;
    width: 130%;
    margin-left: -14%;
    background-color: #14565C;
    color: rgb(255, 255, 255);
    font-weight: 500;
  }

  #weekly-weather_2 {
    border: none;
    position: absolute;
    height: auto;
    margin-bottom: -20vh;
    left: 11.5%;
    top: 35vh;
    bottom: 0;
    border-top: 0;
    transform: translate(-50%, 0);
    width: 140vw;
    padding: 2vh;
    scale: 0.5;
    color: rgb(255, 255, 255);
    font-size: 1.5vh;
    font-weight: 500;
    text-align: center;
    background-color: rgba(102, 102, 102, 0.83);
    overflow-y: scroll;
    overflow-x: hidden;

  }

  .day-next {
    padding: 1.8vw;
    display: inline-block;
  }


  .next {
    font-size: 3.5vh;
    padding-bottom: 1.5vh;
  }

  .weatherState {
    font-size: 2.3vh;
    padding-bottom: 1.5vh;
  }


  .HighLowTemp_1 {
    font-size: 2.5vh;
    padding-bottom: 1.5vh;
  }

  .feelslike {
    font-size: 2.5vh;
    padding-bottom: 1.5vh;
  }

  .eightDayForecastImg {
    padding-top: 0.5vh;
    padding-bottom: 1vh;
    scale: 2;
    height: auto;
  }

  #TwentyFourHour-weather_2 {
    border: none;
    position: absolute;
    height: auto;
    margin-bottom: -20vh;
    left: 11.5%;
    top: 35vh;
    bottom: 0;
    border-top: 0;
    transform: translate(-50%, 0);
    width: 140vw;
    padding: 2vh;
    scale: 0.5;
    color: rgb(255, 255, 255);
    font-size: 1.5vh;
    font-weight: 500;
    text-align: center;
    background-color: rgba(102, 102, 102, 0.83);
    overflow-y: scroll;
    overflow-x: hidden;
  }

  .hour-next-2 {
    padding: 5.0vw;
    display: inline-block;
    margin: 0.4em 1.5% 0.4em 0;
  }


  .next_hour-2 {
    font-size: 3.5vh;
    padding-bottom: 1.5vh;
  }

  .weatherStateHour-2 {
    font-size: 2.3vh;
    padding-bottom: 1.5vh;
  }


  .HighLowTempHourly_2 {
    font-size: 2.5vh;
    padding-bottom: 1.5vh;
  }

  .feelslikeHourly-2 {
    font-size: 2.5vh;
    padding-bottom: 1.5vh;
  }


  .TwentyFourHourForecastImg-2 {
    padding-top: 0.5vh;
    padding-bottom: 1vh;
    scale: 2;
    height: auto;
  }


  .current-unit {
    position: absolute;
    border: none;
    height: 45vh;
    left: 23.18%;
    top: 12vh;
    bottom: 0;
    transform: translate(-50%, 0);
    width: 116.5vw;
    scale: 0.6;
    color: rgb(255, 255, 255);
    font-size: 25px;
    font-weight: 500;
    text-align: center;
    background-color: rgba(102, 102, 102, 0.83);
    overflow-y: hidden;
    overflow-x: hidden;
  }

  .city-display {
    padding-top: 2vh;
    padding-bottom: 0.5vh;
    font-size: 6vh;
    border-bottom: 1vh solid #000
  }
  .current-day {
    padding-top: 1.5vh;
    font-size: 5vh;
  }

  .weatherDescription {
    padding-top: 1.5vh;
    padding-bottom: 1.5vh;
    font-size: 3vh;
  }

  .high-low-temp {
    padding-bottom: 1.5vh;
    font-size: 3vh;
  }

  .currentWeatherContainer {
    width: auto;
    height: auto;
    position: relative;
    overflow: hidden;
    border-radius: 50%;
    scale: 1.5;
    padding-bottom: 0.8vh;
  }


  .weather-icon-current {
    display: inline;
    margin: 0 auto;
    height: 100%;
    width: auto;
  }

  .feelslike_1 {
    font-size: 3vh;
  }


  .bar-search {
    background-color: rgb(255, 255, 255);
    background-size: 100% 100%;
    height: 5vh;
    position: absolute;
    transform: translate(-50%, 0);
    left: 47%;
    top: 11vh;
    width: 73vw;
    border-radius: 5vh;
  }

  .search-input {
    background-color: transparent;
    opacity: 1;
    border: 0;
    font-size: 5.5vw;
    text-align: center;
    color: rgba(0, 0, 0);
    font-weight: 500;
    height: 4vh;
    left: 1.5vw;
    line-height: normal;
    padding: 0;
    position: absolute;
    top: 0.6vh;
    width: 86%;
  }


  main {
    min-height: 100vh;
    padding: 25px;
  }

  .container-center-horizontal {
    align-items: flex-start;
    display: flex;
    margin-right: 2050px;
    min-height: 100vh;
    position: relative;
  }


  .home-logo-2 {
    position: absolute;
    height: 4.5vh;
    top: 3vh;
    left: 50%;
    transform: translate(-50%, 0);
    width: auto;
    scale: 1;
  }
}

</style>

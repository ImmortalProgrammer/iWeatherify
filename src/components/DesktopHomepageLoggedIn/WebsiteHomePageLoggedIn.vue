<!--NOTE: WebsiteHomePageLoggedin.vue is a duplicate of WebsiteHomePageNotLoggedIn.vue, so make sure you change the class
 name of the classes you want to change for this page. It's also easier to write separate components for this page. Otherwise
 It would require making the same changes twice, requiring a great deal of necessary effort-->

<template>
  <div id="app1">
  <div class="container-center-horizontal">
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
        <div class="weekly-weather">
          <p style="font-size: 5vh; padding-bottom: 3vh;">8-Day Forecast: </p>
          <div class = "day-next">
            <p class = "next">{{ this.eightDayForecastData.dates[0] }}</p>
            <p class = "weatherState">{{ this.eightDayForecastData.iconDescription[0] }}</p>
            <div class = "eightDayForecastImg">
              <img :src = "this.eightDayForecastData.iconUrlArr[0]">
            </div>
            <p class = "HighLowTemp_1">{{ this.eightDayForecastData.highTempArr[0] }}°
              / {{ this.eightDayForecastData.lowTempArr[0] }}°</p>
            <p class = "feelslike">Feels Like: {{ this.eightDayForecastData.feelsLikeArr[0] }}°</p>
           </div>
          <div class = "day-next">
            <p class = "next">{{ this.eightDayForecastData.dates[1] }}</p>
            <p class = "weatherState">{{ this.eightDayForecastData.iconDescription[1] }}</p>
            <div class = "eightDayForecastImg">
              <img :src = "this.eightDayForecastData.iconUrlArr[1]">
            </div>
            <p class = "HighLowTemp_1">{{ this.eightDayForecastData.highTempArr[1] }}°
              / {{ this.eightDayForecastData.lowTempArr[1] }}°</p>
            <p class = "feelslike">Feels Like: {{ this.eightDayForecastData.feelsLikeArr[1] }}°</p>
          </div>
          <div class = "day-next">
            <p class = "next">{{ this.eightDayForecastData.dates[2] }}</p>
            <p class = "weatherState">{{ this.eightDayForecastData.iconDescription[2] }}</p>
            <div class = "eightDayForecastImg">
              <img :src = "this.eightDayForecastData.iconUrlArr[2]">
            </div>
            <p class = "HighLowTemp_1">{{ this.eightDayForecastData.highTempArr[2] }}°
              / {{ this.eightDayForecastData.lowTempArr[2] }}°</p>
            <p class = "feelslike">Feels Like: {{ this.eightDayForecastData.feelsLikeArr[2] }}°</p>
          </div>
          <div class = "day-next">
            <p class = "next">{{ this.eightDayForecastData.dates[3] }}</p>
            <p class = "weatherState">{{ this.eightDayForecastData.iconDescription[3] }}</p>
            <div class = "eightDayForecastImg">
              <img :src = "this.eightDayForecastData.iconUrlArr[3]">
            </div>
            <p class = "HighLowTemp_1">{{ this.eightDayForecastData.highTempArr[3] }}°
              / {{ this.eightDayForecastData.lowTempArr[3] }}°</p>
            <p class = "feelslike">Feels Like: {{ this.eightDayForecastData.feelsLikeArr[3] }}°</p>
          </div>
          <div class = "day-next">
            <p class = "next">{{ this.eightDayForecastData.dates[4] }}</p>
            <p class = "weatherState">{{ this.eightDayForecastData.iconDescription[4] }}</p>
            <div class = "eightDayForecastImg">
              <img :src = "this.eightDayForecastData.iconUrlArr[4]">
            </div>
            <p class = "HighLowTemp_1">{{ this.eightDayForecastData.highTempArr[4] }}°
              / {{ this.eightDayForecastData.lowTempArr[4] }}°</p>
            <p class = "feelslike">Feels Like: {{ this.eightDayForecastData.feelsLikeArr[4] }}°</p>
          </div>
          <div class = "day-next">
            <p class = "next">{{ this.eightDayForecastData.dates[5] }}</p>
            <p class = "weatherState">{{ this.eightDayForecastData.iconDescription[5] }}</p>
            <div class = "eightDayForecastImg">
              <img :src = "this.eightDayForecastData.iconUrlArr[5]">
            </div>
            <p class = "HighLowTemp_1">{{ this.eightDayForecastData.highTempArr[5] }}°
              / {{ this.eightDayForecastData.lowTempArr[5] }}°</p>
            <p class = "feelslike">Feels Like: {{ this.eightDayForecastData.feelsLikeArr[5] }}°</p>
          </div>
          <div class = "day-next">
            <p class = "next">{{ this.eightDayForecastData.dates[6] }}</p>
            <p class = "weatherState">{{ this.eightDayForecastData.iconDescription[6] }}</p>
            <div class = "eightDayForecastImg">
              <img :src = "this.eightDayForecastData.iconUrlArr[6]">
            </div>
            <p class = "HighLowTemp_1">{{ this.eightDayForecastData.highTempArr[6] }}°
              / {{ this.eightDayForecastData.lowTempArr[6] }}°</p>
            <p class = "feelslike">Feels Like: {{ this.eightDayForecastData.feelsLikeArr[6] }}°</p>
          </div>
          <div class = "day-next">
            <p class = "next">{{ this.eightDayForecastData.dates[7] }}</p>
            <p class = "weatherState">{{ this.eightDayForecastData.iconDescription[7] }}</p>
            <div class = "eightDayForecastImg">
              <img :src = "this.eightDayForecastData.iconUrlArr[7]">
            </div>
            <p class = "HighLowTemp_1">{{ this.eightDayForecastData.highTempArr[7] }}°
              / {{ this.eightDayForecastData.lowTempArr[7] }}°</p>
            <p class = "feelslike">Feels Like: {{ this.eightDayForecastData.feelsLikeArr[7] }}°</p>
          </div>
        </div>
        <img class="home-logo-2" :src="homeLogo2" alt="Home Logo 2" />
      </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "WebsiteHomePageLoggedIn",
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
      }
    }
  },
  mounted: async function() {
    await this.retrieveAPI();
  },
  methods: {
    async retrieveAPI() {
      try {
        if (this.currentWeatherData.locationInput === '') {
        } else {
          //Setup the dates data structure
          this.setupDays();
          //Sets up the current weather as of now
          await this.currentWeather();
          //Seven-Day Forecast
          await this.eightDayForecast();

          console.log(this.eightDayForecastData.iconUrlArr[0]);
          this.currentWeatherData.locationInput = '';

        }
      } catch (Exception) {
        alert("City unrecognized!")
      }
    },
    async currentWeather() {
      const locationFormatting = this.currentWeatherData.locationInput.replaceAll(' ', '%20');
      const weatherAPI = await axios.get(`https://pro.openweathermap.org/data/2.5/weather?q=${locationFormatting}
        &units=imperial&APPID=c984db1322335af0a97e0dd951e5cb69`).catch(function (error) {
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
    async eightDayForecast() {
      const locationFormatting = this.currentWeatherData.locationInput.replaceAll(' ', '%20');
      const weatherAPI = await axios.get(`https://pro.openweathermap.org/data/2.5/forecast/daily?q=${locationFormatting}
        &units=imperial&cnt=9&APPID=c984db1322335af0a97e0dd951e5cb69`).catch(function (error) {
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
      const currentDate = new Date();
      let currentDay = currentDate.getDay();
      //too lazy to change up the code, so this was a quick solution (in the future refactor into another method)
      switch (currentDay) {
        case 0:
          this.currentWeatherData.currentDay = 'Sunday';
          break;
        case 1:
          this.currentWeatherData.currentDay = 'Monday';
          break;
        case 2:
          this.currentWeatherData.currentDay = 'Tuesday';
          break;
        case 3:
          this.currentWeatherData.currentDay = 'Wednesday';
          break;
        case 4:
          this.currentWeatherData.currentDay = 'Thursday';
          break;
        case 5:
          this.currentWeatherData.currentDay = 'Friday';
          break;
        case 6:
          this.currentWeatherData.currentDay= 'Saturday';
          break;
      }
      for (let i in this.eightDayForecastData.dates) {
        currentDay++;
        if (currentDay === 7) {
          currentDay = 0;
        }
        switch (currentDay) {
          case 0:
            this.eightDayForecastData.dates[i] = 'Sunday';
            break;
          case 1:
            this.eightDayForecastData.dates[i] = 'Monday';
            break;
          case 2:
            this.eightDayForecastData.dates[i] = 'Tuesday';
            break;
          case 3:
            this.eightDayForecastData.dates[i] = 'Wednesday';
            break;
          case 4:
            this.eightDayForecastData.dates[i] = 'Thursday';
            break;
          case 5:
            this.eightDayForecastData.dates[i] = 'Friday';
            break;
          case 6:
            this.eightDayForecastData.dates[i] = 'Saturday';
            break;
        }
      }
    },
  },
  components: {
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



#app1 {
  background-image: url(../../../img/background-img.png);
  background-size: cover;
  background-position: bottom;
  overflow-x: hidden;
  background-attachment: scroll;

}

.weekly-weather {
  border: none;
  position: absolute;
  height: auto;
  margin-bottom: -15vh;
  left: 33%;
  top: 52vh;
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

@media only screen and (min-width: 359px) and (max-width: 900px) {

  .weekly-weather {
    border: none;
    position: absolute;
    height: auto;
    margin-bottom: -20vh;
    left: 11.5%;
    top: 28vh;
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

@media only screen and (max-width: 358px) {
  .weekly-weather {
    border: none;
    position: absolute;
    height: auto;
    margin-bottom: -20vh;
    left: 11.5%;
    top: 28vh;
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

<template>
  <div id="app">
  <div class="container-center-horizontal">
        <div class ="searching-bar">
        <input class="search-input" type="text" name="searching" placeholder="Search up a City..."
               v-model="currentWeatherData.locationInput" @keyup.enter="retrieveAPI()">
        </div>
        <div class="daily-weather">
            <div class = "current-unit">
              <p class ="city-display">{{this.currentWeatherData.locationOutput.charAt(0).toUpperCase() + this.currentWeatherData.locationOutput.slice(1)
                }}</p>
              <p class = "current-day">{{ this.currentWeatherData.currentDay }}</p>
              <p class = "weatherDescription">{{ this.currentWeatherData.iconDescription}}</p>
              <div class = "currentWeatherIcon">
                <img :src = "this.currentWeatherData.iconUrl">
              </div>
              <p class = "HighLowTemp_2">{{this.currentWeatherData.tempLow}}°
                / {{this.currentWeatherData.tempHigh}}°</p>
              <p class = "feelslike_1">Feels Like: {{this.currentWeatherData.feelsLike}}°</p>
            </div>
          </div>
        <div class="weekly-weather">
          <p style="font-size: 5vh; padding-bottom: 3vh;">Seven Day Forecast: </p>
          <div class = "day-next">
            <p class = "next">{{ this.sevenDayForecastData.dates[0] }}</p>
            <p class = "weatherState">{{ this.sevenDayForecastData.iconDescription[0] }}</p>
            <div class = "sevenDayForecastImg">
              <img :src = "this.sevenDayForecastData.iconUrlArr[0]">
            </div>
            <p class = "HighLowTemp_1">{{this.sevenDayForecastData.highTempArr[0]}}°
              / {{this.sevenDayForecastData.lowTempArr[0]}}°</p>
            <p class = "feelslike">Feels Like: {{this.sevenDayForecastData.feelsLikeArr[0]}}°</p>
           </div>
          <div class = "day-next">
            <p class = "next">{{ this.sevenDayForecastData.dates[1] }}</p>
            <p class = "weatherState">{{ this.sevenDayForecastData.iconDescription[1] }}</p>
            <div class = "sevenDayForecastImg">
              <img :src = "this.sevenDayForecastData.iconUrlArr[1]">
            </div>
            <p class = "HighLowTemp_1">{{this.sevenDayForecastData.highTempArr[1]}}°
              / {{this.sevenDayForecastData.lowTempArr[1]}}°</p>
            <p class = "feelslike">Feels Like: {{this.sevenDayForecastData.feelsLikeArr[1]}}°</p>
          </div>
          <div class = "day-next">
            <p class = "next">{{ this.sevenDayForecastData.dates[2] }}</p>
            <p class = "weatherState">{{ this.sevenDayForecastData.iconDescription[2] }}</p>
            <div class = "sevenDayForecastImg">
              <img :src = "this.sevenDayForecastData.iconUrlArr[2]">
            </div>
            <p class = "HighLowTemp_1">{{this.sevenDayForecastData.highTempArr[2]}}°
              / {{this.sevenDayForecastData.lowTempArr[2]}}°</p>
            <p class = "feelslike">Feels Like: {{this.sevenDayForecastData.feelsLikeArr[2]}}°</p>
          </div>
          <div class = "day-next">
            <p class = "next">{{ this.sevenDayForecastData.dates[3] }}</p>
            <p class = "weatherState">{{ this.sevenDayForecastData.iconDescription[3] }}</p>
            <div class = "sevenDayForecastImg">
              <img :src = "this.sevenDayForecastData.iconUrlArr[3]">
            </div>
            <p class = "HighLowTemp_1">{{this.sevenDayForecastData.highTempArr[3]}}°
              / {{this.sevenDayForecastData.lowTempArr[3]}}°</p>
            <p class = "feelslike">Feels Like: {{this.sevenDayForecastData.feelsLikeArr[3]}}°</p>
          </div>
          <div class = "day-next">
            <p class = "next">{{ this.sevenDayForecastData.dates[4] }}</p>
            <p class = "weatherState">{{ this.sevenDayForecastData.iconDescription[4] }}</p>
            <div class = "sevenDayForecastImg">
              <img :src = "this.sevenDayForecastData.iconUrlArr[4]">
            </div>
            <p class = "HighLowTemp_1">{{this.sevenDayForecastData.highTempArr[4]}}°
              / {{this.sevenDayForecastData.lowTempArr[4]}}°</p>
            <p class = "feelslike">Feels Like: {{this.sevenDayForecastData.feelsLikeArr[4]}}°</p>
          </div>
          <div class = "day-next">
            <p class = "next">{{ this.sevenDayForecastData.dates[5] }}</p>
            <p class = "weatherState">{{ this.sevenDayForecastData.iconDescription[5] }}</p>
            <div class = "sevenDayForecastImg">
              <img :src = "this.sevenDayForecastData.iconUrlArr[5]">
            </div>
            <p class = "HighLowTemp_1">{{this.sevenDayForecastData.highTempArr[5]}}°
              / {{this.sevenDayForecastData.lowTempArr[5]}}°</p>
            <p class = "feelslike">Feels Like: {{this.sevenDayForecastData.feelsLikeArr[5]}}°</p>
          </div>
          <div class = "day-next">
            <p class = "next">{{ this.sevenDayForecastData.dates[6]}}</p>
            <p class = "weatherState">{{ this.sevenDayForecastData.iconDescription[6] }}</p>
            <div class = "sevenDayForecastImg">
              <img :src = "this.sevenDayForecastData.iconUrlArr[6]">
            </div>
            <p class = "HighLowTemp_1">{{this.sevenDayForecastData.highTempArr[6]}}°
              / {{this.sevenDayForecastData.lowTempArr[6]}}°</p>
            <p class = "feelslike">Feels Like: {{this.sevenDayForecastData.feelsLikeArr[6]}}°</p>
          </div>

        </div>
        <img class="home-logo-2" :src="homeLogo2" alt="Home Logo 2" />
      </div>
  </div>
</template>

<script>
import axios from "axios";

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
      sevenDayForecastData: {
        //Index 0 starts one day after the current weather)
        dates: ['', '', '', '', '', '', ''],
        iconDescription: ['', '', '', '', '', '', ''],
        highTempArr: ['', '', '', '', '', '', ''],
        lowTempArr: [' ', ' ', ' ', ' ', ' ', ' ', ' '],
        feelsLikeArr: ['', '', '', '', '', '', ''],
        iconUrlArr: ['', '', '', '', '', '', ''],
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
          await this.sevenDayForecast();

          console.log(this.sevenDayForecastData.iconUrlArr[0]);
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
    async sevenDayForecast() {
      const locationFormatting = this.currentWeatherData.locationInput.replaceAll(' ', '%20');
      const weatherAPI = await axios.get(`https://pro.openweathermap.org/data/2.5/forecast/daily?q=${locationFormatting}
        &units=imperial&cnt=8&APPID=c984db1322335af0a97e0dd951e5cb69`).catch(function (error) {
        console.log(error.toJSON());
      });
      const data = weatherAPI['data']['list'];
      let x = 0;
      for (let i in data) {
        if (x !== 0) {
          let currentData = data[i.toString()];
          let feelsLikeData = currentData['feels_like']
          this.sevenDayForecastData.iconDescription[i-1] = currentData['weather']['0']['description'].split(' ')
              .map((s) => s.charAt(0).toUpperCase() + s.substring(1))
              .join(' ');
          //Low Temp
          this.sevenDayForecastData.lowTempArr[i-1] = Math.round(currentData['temp']['min']).toString();
          // High Temp
          this.sevenDayForecastData.highTempArr[i-1] = Math.round(currentData['temp']['max']).toString();
          //Feels Like
          this.sevenDayForecastData.feelsLikeArr[i-1] = Math.round(
              (feelsLikeData['day'] + feelsLikeData['night'] + feelsLikeData['eve'] + feelsLikeData['morn']) / 4);

          const iconCode = currentData['weather']['0']['icon'];
          const iconUrl = 'https://openweathermap.org/img/wn/'
              + iconCode + ".png";
          this.sevenDayForecastData.iconUrlArr[i-1] = iconUrl;
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
      for (let i in this.sevenDayForecastData.dates) {
        currentDay++;
        if (currentDay === 7) {
          currentDay = 0;
        }
        switch (currentDay) {
          case 0:
            this.sevenDayForecastData.dates[i] = 'Sunday';
            break;
          case 1:
            this.sevenDayForecastData.dates[i] = 'Monday';
            break;
          case 2:
            this.sevenDayForecastData.dates[i] = 'Tuesday';
            break;
          case 3:
            this.sevenDayForecastData.dates[i] = 'Wednesday';
            break;
          case 4:
            this.sevenDayForecastData.dates[i] = 'Thursday';
            break;
          case 5:
            this.sevenDayForecastData.dates[i] = 'Friday';
            break;
          case 6:
            this.sevenDayForecastData.dates[i] = 'Saturday';
            break;
        }
      }
    },
  },
  components: {
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



#app {
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
  margin-bottom: -10vh;
  left: 33%;
  top: 52vh;
  bottom: 0;
  border-top: 0;
  transform: translate(-50%, 0);
  width: 100vw;
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

.sevenDayForecastImg {
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
  width: 40vw;
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

.HighLowTemp_2 {
  padding-bottom: 1.5vh;
  font-size: 3vh;
}

.currentWeatherIcon {
  padding-top: 0.3vh;
  padding-bottom: 0.8vh;
  scale: 200%;
}

.feelslike_1 {
  font-size: 3vh;
}


.searching-bar {
  background-color: rgb(255, 255, 255);
  background-size: 100% 100%;
  height: 5vh;
  position: absolute;
  top: 11vh;
  width: 50vw;
  border-radius: 5vh;
}

.search-input {
  background-color: transparent;
  opacity: 1;
  border: 0;
  font-size: 1.5vw;
  text-align: center;
  color: rgba(0, 0, 0);
  font-weight: 500;
  height: 4vh;
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

@media only screen and (min-width: 533px) and (max-width: 879px) {

  .weekly-weather {
    border: none;
    position: absolute;
    height: auto;
    margin-bottom: -10vh;
    left: 30%;
    top: 48vh;
    bottom: 0;
    border-top: 0;
    transform: translate(-50%, 0);
    width: 130vw;
    padding: 2vh;
    scale: 0.7;
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

  .sevenDayForecastImg {
    padding-top: 0.5vh;
    padding-bottom: 1vh;
    scale: 2;
    height: auto;
  }

  .current-unit {
    position: absolute;
    border: none;
    height: 50vh;
    left: 35%;
    top: 12vh;
    bottom: 0;
    transform: translate(-50%, 0);
    width: 80vw;
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

  .HighLowTemp_2 {
    padding-bottom: 1.5vh;
    font-size: 3vh;
  }

  .currentWeatherIcon {
    padding-top: 0.3vh;
    padding-bottom: 0.8vh;
    scale: 200%;
  }

  .feelslike_1 {
    font-size: 3vh;
  }


  .searching-bar {
    background-color: rgb(255, 255, 255);
    background-size: 100% 100%;
    height: 5vh;
    position: absolute;
    top: 11vh;
    width: 50vw;
    border-radius: 5vh;
  }

  .search-input {
    background-color: transparent;
    opacity: 1;
    border: 0;
    font-size: 2.5vw;
    text-align: center;
    color: rgba(0, 0, 0);
    font-weight: 500;
    height: 4vh;
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

@media only screen and (min-width: 359px) and (max-width: 532px) {

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

  .sevenDayForecastImg {
    padding-top: 0.5vh;
    padding-bottom: 1vh;
    scale: 2;
    height: auto;
  }

  .current-unit {
    position: absolute;
    border: none;
    height: 45vh;
    left: 30%;
    top: 11vh;
    bottom: 0;
    transform: translate(-50%, 0);
    width: 80vw;
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

  .HighLowTemp_2 {
    padding-bottom: 1.5vh;
    font-size: 3vh;
  }

  .currentWeatherIcon {
    padding-top: 0.3vh;
    padding-bottom: 0.8vh;
    scale: 200%;
  }

  .feelslike_1 {
    font-size: 3vh;
  }


  .searching-bar {
    background-color: rgb(255, 255, 255);
    background-size: 100% 100%;
    height: 5vh;
    position: absolute;
    top: 11vh;
    width: 80vw;
    border-radius: 5vh;
  }

  .search-input {
    background-color: transparent;
    opacity: 1;
    border: 0;
    font-size: 3.5vw;
    text-align: center;
    color: rgba(0, 0, 0);
    font-weight: 500;
    height: 4vh;
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
    left: 54%;
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
    left: 13%;
    top: 30vh;
    bottom: 0;
    border-top: 0;
    transform: translate(-50%, 0);
    width: 130vw;
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

  .sevenDayForecastImg {
    padding-top: 0.5vh;
    padding-bottom: 1vh;
    scale: 1.3;
    height: auto;
  }

  .current-unit {
    position: absolute;
    border: none;
    height: 45vh;
    left: 30%;
    top: 11vh;
    bottom: 0;
    transform: translate(-50%, 0);
    width: 80vw;
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

  .HighLowTemp_2 {
    padding-bottom: 1.5vh;
    font-size: 3vh;
  }

  .currentWeatherIcon {
    padding-top: 0.3vh;
    padding-bottom: 0.8vh;
    scale: 130%;
  }

  .feelslike_1 {
    font-size: 3vh;
  }


  .searching-bar {
    background-color: rgb(255, 255, 255);
    background-size: 100% 100%;
    height: 5vh;
    position: absolute;
    top: 11vh;
    width: 80vw;
    border-radius: 5vh;
  }

  .search-input {
    background-color: transparent;
    opacity: 1;
    border: 0;
    font-size: 3.3vw;
    text-align: center;
    color: rgba(0, 0, 0);
    font-weight: 500;
    height: 4vh;
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
    left: 54%;
    transform: translate(-50%, 0);
    width: auto;
    scale: 1.3;
  }
}

</style>

<template>
  <div id="app1">
    <nav-bar class = "HomePageNavBar"></nav-bar>

    <div class="container-center-horizontal1">
      <div class = "options_logged_in">
        <div class ="menu_homepage_logged_in" @click="pressOptions()">
          <p id = "optionsText">Open Options</p>
        </div>
        <div id="menu-container_2">
          <div class = "diff_options">
            <a id = "menu_option_1_0" @click="pressOptionsMenuItems('menu_option_1_0')" style = "text-decoration:none; color: inherit;">24-Hour Forecast</a>
            <a id = "menu_option_1_1"  @click="pressOptionsMenuItems('menu_option_1_1')" style = "text-decoration:none; color: inherit;">8-Day Forecast</a>
            <a id = "menu_option_1_2" @click="pressOptionsMenuItems('menu_option_1_2'); fetchRecommendedOutfit();" style = "text-decoration:none; color: inherit;">Outfit of the Day</a>
            </div>
        </div>
      </div>

      <div id = "outfit-of-the-day_1">
        <p style="font-size: 5.5vh; border-bottom: 1vh solid black; padding: 0 5vw 1vh 5vw;">Outfit Recommendations for Today</p>
        <p style="font-size: 3.5vh; padding-top: 3vh;" v-if="currentWeatherData.suggestedDescription" >
          {{ currentWeatherData.suggestedDescription.split("Today's temperature is: ")[0] }}
          Today's temperature is: <span :class="temperatureClass">{{ temperatureClass }}</span>
          {{ currentWeatherData.suggestedDescription.split("Today's temperature is: ")[1].split(temperatureClass)[1] }}
        </p>

        <div class="outfit-recommendations">
          <div class="outfit-box" v-if="recommendedOutfit.outerwear">
            <h1>Outerwear</h1>
            <img :src="`https://www-student.cse.buffalo.edu/CSE442-542/2023-Spring/cse-442a/uploads/${recommendedOutfit.outerwear.image}`" alt="Outerwear" />
            <p>{{ recommendedOutfit.outerwear.name }}</p>
          </div>
          <div class="outfit-box" v-if="recommendedOutfit.middlewear">
            <h1>Middlewear</h1>
            <img :src="`https://www-student.cse.buffalo.edu/CSE442-542/2023-Spring/cse-442a/uploads/${recommendedOutfit.middlewear.image}`" alt="Middlewear" />
            <p>{{ recommendedOutfit.middlewear.name }}</p>
          </div>
          <div class="outfit-box" v-if="recommendedOutfit.innerwear">
            <h1>Innerwear</h1>
            <img :src="`https://www-student.cse.buffalo.edu/CSE442-542/2023-Spring/cse-442a/uploads/${recommendedOutfit.innerwear.image}`" alt="Innerwear" />
            <p>{{ recommendedOutfit.innerwear.name }}</p>
          </div>
          <div class="outfit-box" v-if="recommendedOutfit.pants">
            <h1>Pants</h1>
            <img :src="`https://www-student.cse.buffalo.edu/CSE442-542/2023-Spring/cse-442a/uploads/${recommendedOutfit.pants.image}`" alt="Pants" />
            <p>{{ recommendedOutfit.pants.name }}</p>
          </div>
          <div class="outfit-box" v-if="recommendedOutfit.headwear">
            <h1>Headwear</h1>
            <img :src="`https://www-student.cse.buffalo.edu/CSE442-542/2023-Spring/cse-442a/uploads/${recommendedOutfit.headwear.image}`" alt="Headwear" />
            <p>{{ recommendedOutfit.headwear.name }}</p>
          </div>
          <div class="outfit-box" v-if="recommendedOutfit.shoes">
            <h1>Shoes</h1>
            <img :src="`https://www-student.cse.buffalo.edu/CSE442-542/2023-Spring/cse-442a/uploads/${recommendedOutfit.shoes.image}`" alt="Shoes" />
            <p>{{ recommendedOutfit.shoes.name }}</p>
          </div>
          <button class="save-to-my-items" @click.prevent="saveToMyItems">Save to My Items</button>
        </div>
      </div>

      <div class ="bar-search1">
        <input class="search-input1" type="text" name="searching" placeholder="Search up a City..."
               v-model="currentWeatherData.locationInput" @keyup.enter="retrieveAPI()">
      </div>
      <div class="daily-weather1">
        <div class="current-unit1">
          <p class="city-display1">{{this.currentWeatherData.locationOutput.charAt(0).toUpperCase() + this.currentWeatherData.locationOutput.slice(1)}}</p>
          <p class="current-day1">{{this.currentWeatherData.currentDay}}</p>
          <p class="weatherDescription1">{{this.currentWeatherData.iconDescription}}</p>
          <div class="currentWeatherContainer1">
            <div class="weather-icon-current1">
              <img :src="this.currentWeatherData.iconUrl">
            </div>
          </div>
          <p class="high-low-temp1">{{this.currentWeatherData.tempHigh}}° / {{this.currentWeatherData.tempLow}}°</p>
          <p class="feelslike_1_1">Feels Like: {{this.currentWeatherData.feelsLike}}°</p>
          <p class="current-conditions-1">Wind: {{this.currentWeatherData.wind}} {{this.outputPreferences.windPrefOutput}}</p>
          <p class="pressure_1_current">Pressure: {{this.currentWeatherData.pressure}} {{this.outputPreferences.pressurePrefOutput}}</p>
        </div>
      </div>

      <div id="weekly-weather_1">
        <p style="font-size: 5vh; border-bottom: 1vh solid black; padding: 0 5vw 1vh 5vw;">8-Day Forecast</p>
        <div class="day-next-1" v-for="(day, index) in eightDayForecastData.dates" :key="index">
          <p class="next-1">{{day}}</p>
          <p class="weatherState-1">{{eightDayForecastData.iconDescription[index]}}</p>
          <div class="eightDayForecastImg-1">
            <img :src="eightDayForecastData.iconUrlArr[index]">
          </div>
          <p class="HighLowTemp_1">{{eightDayForecastData.highTempArr[index]}}° / {{eightDayForecastData.lowTempArr[index]}}°</p>
          <p class="feelslike-1">Feels Like: {{eightDayForecastData.feelsLikeArr[index]}}°</p>
          <p class="windy-1">Wind: {{eightDayForecastData.windArr[index]}} {{outputPreferences.windPrefOutput}}</p>
          <p class="pressure-1">Pressure: {{eightDayForecastData.pressureArr[index]}} {{outputPreferences.pressurePrefOutput}}</p>
         </div>
      </div>

      <div id="TwentyFourHour-weather_1">
        <p style="font-size: 5vh; border-bottom: 1vh solid black; padding: 0 5vw 1vh 5vw;">24-Hour Forecast</p>
        <div class="hour-next-1" v-for="(hour, index) in twentyFourHourForecastData.UTCdates" :key="index">
          <p class="next_hour-1">{{hour}}</p>
          <p class="weatherStateHour-1">{{twentyFourHourForecastData.iconDescription[index]}}</p>
          <div class="TwentyFourHourForecastImg-1">
            <img :src="twentyFourHourForecastData.iconUrlArr[index]">
          </div>
          <p class="HighLowTempHourly_1">{{twentyFourHourForecastData.highTempArr[index]}}° / {{twentyFourHourForecastData.lowTempArr[index]}}°</p>
          <p class="feelslikeHourly-1">Feels Like: {{twentyFourHourForecastData.feelsLikeArr[index]}}°</p>
          <p class="windy-1Hourly">Wind: {{twentyFourHourForecastData.windArr[index]}} {{outputPreferences.windPrefOutput}}</p>
          <p class="pressure-1Hourly">Pressure: {{twentyFourHourForecastData.pressureArr[index]}} {{outputPreferences.pressurePrefOutput}}</p>
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
  name: "WebsiteHomePageLoggedIn",
  data() {
    return {
      currentWeatherData: {
        locationInput: '',
        currentDay: '',
        locationOutput: '',
        currentTemp: '',
        feelsLike: '',
        tempLow: '',
        tempHigh: '',
        iconUrl: '',
        mainDescription: '',
        iconDescription: '',
        suggestedDescription: '',
        suggestedOutfit: '',
        wind: '',
        pressure: '',
      },
      eightDayForecastData: {
        //Index 0 starts one day after the current weather
        dates: ['', '', '', '', '', '', '', ''],
        iconDescription: ['', '', '', '', '', '', '', ''],
        highTempArr: ['', '', '', '', '', '', '', ''],
        lowTempArr: [' ', ' ', ' ', ' ', ' ', ' ', ' ', ''],
        feelsLikeArr: ['', '', '', '', '', '', '', ''],
        iconUrlArr: ['', '', '', '', '', '', '', ''],
        windArr: ['', '', '', '', '', '', '', ''],
        pressureArr: ['', '', '', '', '', '', '', ''],
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
        pressureArr: new Array(24)
      },
      userPreferences: {
        tempPref: '',
        windPref: '',
        pressurePref: '',
      },
      outputPreferences: {
        tempPrefOutput: '',
        windPrefOutput: '',
        pressurePrefOutput: '',
      },
      tempValues: {
        hot: 0,
        warm: 0,
        ideal: 0,
        chilly: 0,
        cold: 0,
        freezing: 0,
      },
      recommendedOutfit: {
        outerwear: null,
        middlewear: null,
        innerwear: null,
        pants: null,
        headwear: null,
        shoes: null,
      },
      data: {
        userid: null,
        userIdLoaded: false,
        APIKEY: 'c984db1322335af0a97e0dd951e5cb69',
        optionsVisibility: false,
        eightDayForecastGrayOut: true,
        outfitOfTheDayGrayOut: false,
      }
    }
  },
  async created() {
    await this.getUserId();
    await this.retrieveAPI();
  },
  methods: {
    async getUserId() {
      try {
        const response = await axios.get("https://www-student.cse.buffalo.edu/CSE442-542/2023-Spring/cse-442a/backend/get_userid.php", { withCredentials: true });
        this.$data.data.userid = response.data.userid;
        await this.loadLocation();
        await this.loadUnits();
        await this.loadTempSettings();
        await new Promise(resolve => setTimeout(resolve, 400));
        this.userIdLoaded = true;
      } catch (error) {
        console.error("Unsuccessful request in getUserId().", error);
      }
    },
    async loadLocation() {
	      axios.get("https://www-student.cse.buffalo.edu/CSE442-542/2023-Spring/cse-442a/backend/load_location.php",
	      {
	        params: {
	          userid: this.$data.data.userid,
	        }
	      })
	      .then(response => {
	        this.$data.currentWeatherData.locationInput = response.data.city;
	      })
	      .catch(error => {
	        console.error("Unsuccessful axios get in loadLocation().", error);
	      });
     }, 
    async loadUnits() {
      axios.get("https://www-student.cse.buffalo.edu/CSE442-542/2023-Spring/cse-442a/backend/load_units.php",
          {
            params: {
              userid: this.$data.data.userid,
            }
          })
          .then(response => {
            this.$data.userPreferences.tempPref = response.data.temperature;
            this.$data.userPreferences.windPref = response.data.wind;
            this.$data.userPreferences.pressurePref = response.data.pressure;
            //Set up the Temp Output
            this.outputTempPreferences();
          })
          .catch(error => {
            console.error("Unsuccessful axios get in loadUnits().", error);
          });
    },
    async loadTempSettings() {
      axios.get("https://www-student.cse.buffalo.edu/CSE442-542/2023-Spring/cse-442a/backend/load_temperatures.php", 
      {
        params: {
          userid: this.$data.data.userid,
        },
      })
      .then(response => {
        if (typeof response.data === 'object') {
          this.tempValues = response.data;
        } else {
          console.error('Invalid response data:', response.data);
        }
        return Promise.resolve();
      })
      .catch(error => {
        console.error("Unsuccessful axios post in loadTempSettings().", error);
        return Promise.reject(error);
      });
    },
    async fetchRecommendedOutfit() {
      if (!this.userIdLoaded) {
        console.log("User ID not loaded yet.");
        return;
      }
      const temperatureCategory = this.temperatureClass;
      try {
        const items = await this.getAllItems(temperatureCategory);
        this.recommendedOutfit.outerwear = items.outerwear || null;
        this.recommendedOutfit.middlewear = items.middlewear || null;
        this.recommendedOutfit.innerwear = items.innerwear || null;
        this.recommendedOutfit.pants = items.pants || null;
        this.recommendedOutfit.headwear = items.headwear || null;
        this.recommendedOutfit.shoes = items.shoes || null;
      } catch (error) {
        console.error("Failed to fetch the recommended outfit.", error);
      }
    },
    async getAllItems(temp_category) {
      let items = {};
      try {
        const response = await axios.post("https://www-student.cse.buffalo.edu/CSE442-542/2023-Spring/cse-442a/backend/get_my_items.php", {
          user_id: this.$data.data.userid,
          temp_category: temp_category,
        });

        if (response.data.message) {
          for (const item of response.data.message) {
            items[item.clothing_category] = {
              name: item.clothing_name,
              image: item.upload_path,
            };
          }
        }
      } catch (err) {
        console.log(err);
      }
      return items;
    },
    async outputTempPreferences() {
      if (this.userPreferences.tempPref === 'c') {
        this.outputPreferences.tempPrefOutput = 'C';
      } else if (this.userPreferences.tempPref === 'f') {
        this.outputPreferences.tempPrefOutput = 'F';
      }
      this.outputPreferences.windPrefOutput = (this.userPreferences.windPref === 'kmh') ? 'km/h' : 'mph';
      this.outputPreferences.pressurePrefOutput = (this.userPreferences.pressurePref === 'hg') ? 'Hg' : 'mb';

    },
    pressOptionsMenuItems(menuOption) {
      const menuOpt1_0 = document.getElementById("menu_option_1_0");
      const menuOpt1_1 = document.getElementById("menu_option_1_1");
      const menuOpt1_2 = document.getElementById("menu_option_1_2");
      const weeklyWeather1 = document.getElementById("weekly-weather_1");
      const twentyFourHour1 = document.getElementById("TwentyFourHour-weather_1")
      const outfitOfDay1 = document.getElementById("outfit-of-the-day_1");
      if (menuOption === "menu_option_1_0") {
        console.log(menuOption);
        menuOpt1_0.style.opacity = "0.3";
        menuOpt1_1.style.opacity = "1";
        menuOpt1_2.style.opacity = "1";
        twentyFourHour1.style.visibility = "visible";
        weeklyWeather1.style.visibility = "hidden";
        outfitOfDay1.style.visibility = "hidden";
      } else if (menuOption === "menu_option_1_1") {
        menuOpt1_0.style.opacity = "1";
        menuOpt1_1.style.opacity = "0.3";
        menuOpt1_2.style.opacity = "1";
        twentyFourHour1.style.visibility = "hidden";
        weeklyWeather1.style.visibility = "visible";
        outfitOfDay1.style.visibility = "hidden";
      } else if (menuOption === "menu_option_1_2") {
        menuOpt1_0.style.opacity = "1";
        menuOpt1_1.style.opacity = "1";
        menuOpt1_2.style.opacity = "0.3";
        twentyFourHour1.style.visibility = "hidden";
        weeklyWeather1.style.visibility = "hidden";
        outfitOfDay1.style.visibility = "visible";
      }
      this.pressOptions();
    },
    outfitSuggestions() {
      const DESCRIPTIONS = {
        "Drizzle": "When it's raining outside, it is important to wear clothing that will keep you dry and comfortable. So, wear a waterproof jacket and footwear to keep yourself dry when it's raining or drizzling outside!",
        "Rain": "When it's raining outside, it is important to wear clothing that will keep you dry and comfortable. So, wear a waterproof jacket and footwear to keep yourself dry when it's raining or drizzling outside!",
        "Thunderstorm": "There is a thunderstorm! Seek shelter immediately! Do not go outside. But, if you must go outside then avoid electronics and wear protective rain gear!",
        "Snow": "When it is snowing outside, it is important to wear clothing that will keep you warm and dry. So, wear a coat, hat, gloves, and boots, to protect yourself from the cold when there's snow outside!",
        "Tornado": "Tornado Warning! Please seek shelter immediately. Wear sturdy shoes and clothing to protect yourself from debris in case of a tornado outside!",
        "Mist": "Wear waterproof clothing or bring an umbrella to protect yourself from the mist!",
        "Smoke": "When it's smoky outside, it is important to protect yourself from the harmful effects of smoke inhalation. So, wear an N95 mask or respirator to filter out small smoke particles outside!",
        "Haze": "Wear long-sleeved shirts and pants that cover your skin to protect yourself from pollutants in the hazy air!",
        "Dust": "Wear a mask or a cloth over your mouth and nose to protect yourself from the dust when it's dusty outside!",
        "Fog": "Wear reflective clothing if you need to be outside to increase visibility when it's foggy outside!",
        "Sand": "Wear protective eye-wear and a mask or cloth over your mouth and nose to protect yourself from sand particles when it's sandy outside!",
        "Ash": "Wear a mask or a cloth over your mouth and nose and cover your skin with long-sleeved shirts and pants to protect yourself from ash!",
        "Squall": "Stay indoors and avoid going outside during a squall as it could be dangerous, but if necessary, wear sturdy shoes and clothing to protect yourself from flying debris!",
        "Clear": "Wear clothing appropriate for the weather and your activities when it's clear outside!",
        "Clouds": "Wear layers of clothing in case it gets cooler or starts to rain when it's cloudy outside!"
      };
      const DESCRIPTION = this.$data.currentWeatherData.mainDescription;
      if (DESCRIPTION in DESCRIPTIONS) {
        this.$data.currentWeatherData.suggestedDescription = DESCRIPTIONS[DESCRIPTION] + " " + this.temperatureMessage() + " based on the current temperature and your set temperature preferences.";
        this.$data.currentWeatherData.suggestedOutfit = "";
      }
    },
    saveToMyItems(){
      axios.post("http://localhost/project_s23-iweatherify/backend/saved_items.php", {
        "outerwear": this.recommendedOutfit.outerwear,
        "middlewear": this.recommendedOutfit.middlewear,
        "innerwear": this.recommendedOutfit.innerwear,
        "pants": this.recommendedOutfit.pants,
        "headwear": this.recommendedOutfit.headwear,
        "shoes": this.recommendedOutfit.shoes,
        "user_id": this.$data.data.userid,
        "location": this.$data.currentWeatherData.locationInput,
        "temp_category": this.temperatureClass,
        "temp": this.currentWeatherData.currentTemp,
        "temp_unit": this.userPreferences.tempPref
      }).then((res) => {
        console.log(res)
        alert(res.data.result)
      })
    },
    temperatureMessage() {
      const currentTemp = parseFloat(this.$data.currentWeatherData.feelsLike);
      let temperatureMessage = "Today's temperature is: ";

      const userTemps = {
        freezing: parseFloat(this.tempValues.freezing),
        cold: parseFloat(this.tempValues.cold),
        chilly: parseFloat(this.tempValues.chilly),
        ideal: parseFloat(this.tempValues.ideal),
        warm: parseFloat(this.tempValues.warm),
        hot: parseFloat(this.tempValues.hot),
      };

      console.log(
        "Hot:"+userTemps.hot+
        " Warm:"+userTemps.warm+
        " Idea:"+userTemps.ideal+
        " Chilly:"+userTemps.chilly+
        " Cold:"+userTemps.cold+
        " Freezing:"+userTemps.freezing
      );

      const differences = {};
      for (const key in userTemps) {
        differences[key] = Math.abs(currentTemp - userTemps[key]);
      }

      let closestCategory = 'freezing';
      let smallerDifference = differences['freezing'];

      for (const key in differences) {
        if (differences[key] < smallerDifference) {
          smallerDifference = differences[key];
          closestCategory = key;
        }
      }
      temperatureMessage += closestCategory;

      return temperatureMessage;
    },
    pressOptions() {
      const menuContainer = document.getElementById("menu-container_2");
      const optionsText = document.getElementById("optionsText");
      if (this.$data.data.optionsVisibility) {
        menuContainer.style.visibility = 'visible';
        optionsText.textContent = "Close Options";
      } else {
        menuContainer.style.visibility = 'hidden';
        optionsText.textContent = "Open Options";
      }
      this.$data.data.optionsVisibility = !this.$data.data.optionsVisibility;
    },
    async retrieveAPI() {
      try {
        if (this.currentWeatherData.locationInput === '') {
        } else {
          //Setup the dates data structure
          this.setupDays();
          //Sets up the current weather as of now
          await this.currentWeather();
          //24-Hour Forecast
          await this.twentyFourForecast();
          //Seven-Day Forecast
          await this.eightDayForecast();

          this.currentWeatherData.locationInput = '';
        }
      } catch (Exception) {
        alert("City not found by the API!")
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
        const currentTemp = geoLocationData['main']['temp'];
        const minTemp = geoLocationData['main']['temp_min'];
        const maxTemp = geoLocationData['main']['temp_max'];
        const feelslike = geoLocationData['main']['feels_like'];
        const pressure = geoLocationData['main']['pressure'];
        const windSpeed = geoLocationData['wind']['speed'];

        this.currentWeatherData.locationOutput = nameOfLocation;

        if (this.userPreferences.tempPref === 'f') {
          this.currentWeatherData.currentTemp = Math.round(currentTemp);
          this.currentWeatherData.feelsLike = Math.round(feelslike);
          this.currentWeatherData.tempLow = Math.round(minTemp);
          this.currentWeatherData.tempHigh = Math.round(maxTemp);
        } else if (this.userPreferences.tempPref === 'c') {
          this.currentWeatherData.currentTemp = Math.round((((currentTemp) - 32) * 5) / 9);
          this.currentWeatherData.feelsLike = Math.round((((feelslike) - 32) * 5) / 9);
          this.currentWeatherData.tempLow = Math.round((((minTemp) - 32) * 5) / 9);
          this.currentWeatherData.tempHigh = Math.round((((maxTemp) - 32) * 5) / 9);
        } else {
          console.log("Nonexistent Units Detected");
        }

        if (this.userPreferences.pressurePref === 'hg') {
          //Unit Conversion -> hPa to Hg
          this.currentWeatherData.pressure = Math.round(pressure / 33.864);
        } else if (this.userPreferences.pressurePref === 'mb') {
          //Unit Conversion -> hPa to mg
          this.currentWeatherData.pressure = Math.round(pressure);
        } else {
          console.log("Nonexistent Units Detected");
        }

        if (this.userPreferences.windPref === 'mph') {
          this.currentWeatherData.wind = Math.round(windSpeed);
        } else if (this.userPreferences.windPref === 'kmh') {
          this.currentWeatherData.wind = Math.round(windSpeed * 1.609);
        } else {
          console.log("Nonexistent Units Detected")
        }

        const iconCode = geoLocationData['weather']['0']['icon'];
        const iconUrl = 'https://openweathermap.org/img/wn/'
            + iconCode + ".png";
        this.currentWeatherData.iconUrl = iconUrl;
        this.currentWeatherData.iconDescription = geoLocationData['weather']['0']['description'].split(' ')
            .map((s) => s.charAt(0).toUpperCase() + s.substring(1))
            .join(' ');
        this.currentWeatherData.mainDescription = geoLocationData['weather']['0']['main'].split(' ')
            .map((s) => s.charAt(0).toUpperCase() + s.substring(1))
            .join(' ');
        this.outfitSuggestions();
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

        if (this.userPreferences.tempPref === 'f') {
          //Low Temp
          this.twentyFourHourForecastData.lowTempArr[x] = Math.round(currentData['main']['temp_min']).toString();
          // High Temp
          this.twentyFourHourForecastData.highTempArr[x] = Math.round(currentData['main']['temp_max']).toString();
          //Feels Like
          this.twentyFourHourForecastData.feelsLikeArr[x] = Math.round(currentData['main']['feels_like']).toString();
        } else if (this.userPreferences.tempPref === 'c') {
          //Low Temp
          this.twentyFourHourForecastData.lowTempArr[x] = Math.round((((currentData['main']['temp_min'])-32)*5)/9).toString();
          // High Temp
          this.twentyFourHourForecastData.highTempArr[x] = Math.round(((((currentData['main']['temp_max'])-32)*5)/9)).toString();
          //Feels Like
          this.twentyFourHourForecastData.feelsLikeArr[x] = Math.round(((((currentData['main']['feels_like'])-32)*5)/9)).toString();
        } else {
          console.log("Nonexistent Units Detected");
        }

        const pressure = currentData['main']['pressure'];
        const windSpeed = currentData['wind']['speed'];

        if (this.userPreferences.pressurePref === 'hg') {
          //Unit Conversion -> hPa to Hg
          this.twentyFourHourForecastData.pressureArr[x] = Math.round(pressure / 33.864);
        } else if (this.userPreferences.pressurePref === 'mb') {
          //Unit Conversion -> hPa to mg
          this.twentyFourHourForecastData.pressureArr[x] = Math.round(pressure);
        } else {
          console.log("Nonexistent Units Detected");
        }

        if (this.userPreferences.windPref === 'mph') {
          this.twentyFourHourForecastData.windArr[x] = Math.round(windSpeed);
        } else if (this.userPreferences.windPref === 'kmh') {
          this.twentyFourHourForecastData.windArr[x] = Math.round(windSpeed * 1.609);
        } else {
          console.log("Nonexistent Units Detected")
        }

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
          const currentData = data[i.toString()];
          const pressure = currentData['pressure'];
          const windSpeed = currentData['speed'];
          let feelsLikeData = currentData['feels_like'];
          feelsLikeData = (feelsLikeData['day'] + feelsLikeData['night'] +
              feelsLikeData['eve'] + feelsLikeData['morn']) / 4;

          const lowTemp = Math.round(currentData['temp']['min']);
          const highTemp = Math.round(currentData['temp']['max']);

          if (this.userPreferences.tempPref === 'f') {
            this.eightDayForecastData.feelsLikeArr[i-1] = Math.round(feelsLikeData).toString();
            this.eightDayForecastData.lowTempArr[i-1] = Math.round(lowTemp).toString();
            this.eightDayForecastData.highTempArr[i-1] = Math.round(highTemp).toString();
          } else if (this.userPreferences.tempPref === 'c') {
            this.eightDayForecastData.feelsLikeArr[i-1] = Math.round((((feelsLikeData) - 32) * 5) / 9).toString();
            this.eightDayForecastData.lowTempArr[i-1] = Math.round((((lowTemp) - 32) * 5) / 9).toString();
            this.eightDayForecastData.highTempArr[i-1] = Math.round((((highTemp) - 32) * 5) / 9).toString();
          } else {
            console.log("Nonexistent Units Detected");
          }

          if (this.userPreferences.pressurePref === 'hg') {
            //Unit Conversion -> hPa to Hg
            this.eightDayForecastData.pressureArr[i-1] = Math.round(pressure / 33.864);
          } else if (this.userPreferences.pressurePref === 'mb') {
            //Unit Conversion -> hPa to mg
            this.eightDayForecastData.pressureArr[i-1] = Math.round(pressure);
          } else {
            console.log("Nonexistent Units Detected");
          }

          if (this.userPreferences.windPref === 'mph') {
            this.eightDayForecastData.windArr[i-1] = Math.round(windSpeed);
          } else if (this.userPreferences.windPref === 'kmh') {
            this.eightDayForecastData.windArr[i-1] = Math.round(windSpeed * 1.609);
          } else {
            console.log("Nonexistent Units Detected")
          }
          this.eightDayForecastData.iconDescription[i-1] = currentData['weather']['0']['description'].split(' ')
              .map((s) => s.charAt(0).toUpperCase() + s.substring(1))
              .join(' ');

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
  computed: {
    temperatureClass() {
      const tempMessage = this.temperatureMessage();
      const tempCategory = tempMessage.split(': ')[1];
      return tempCategory;
    },
  },
  components: {
    NavBar,
    MenuBarLoggedIn,
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

.hot {
  color: red;
}
.warm {
  color: orange;
}
.ideal {
  color: lightgreen;
}
.chilly {
  color: blue;
}
.cold {
  color: darkblue;
}
.freezing {
  color: purple;
}

.HomePageNavBar {
  top: -0.85%;
}


#app1 {
  background-image: url(../../../img/background-img.png);
  background-size: cover;
  background-position: bottom;
  overflow-x: hidden;
  background-attachment: scroll;
  font-family: sans-serif;
}

.menu_homepage_logged_in {
  z-index: 1;
  position: absolute;
  height: 7.5vh;
  margin-bottom: -15vh;
  left: 45%;
  top: 58vh;
  border: black solid 6px;
  bottom: 0;
  transform: translate(-50%, 0);
  width: 30vw;
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

#menu-container_2 {
  z-index: 1;
  position: absolute;
  height: 21.3vh;
  margin-bottom: -15vh;
  left: 45%;
  top: 60.1vh;
  border-top: black solid 3.5px;
  border-left: black solid 6px;
  border-right: black solid 6px;
  border-bottom: black solid 6px;
  bottom: 0;
  transform: translate(-50%, 0);
  width: 30vw;
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

.diff_options {
  border: none;
  position: relative;
  height: auto;
  display: block;
  width: 130%;
  top: -15px;
  margin-left: -14%;
  background-color: #14565C;
  color: rgb(255, 255, 255);
  font-weight: 500;
}

#menu_option_1_0, #menu_option_1_1, #menu_option_1_2 {
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

#menu_option_1_0 {
  opacity: 0.3;
}

#menu_option_1_2 {
  border-bottom: none;
}

#weekly-weather_1 {
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

.day-next-1 {
  padding: 1.8vw;
  display: inline-block;
  margin: 0.2em 0.7% 0.2em 0;
}


.next-1 {
  font-size: 4vh;
  padding-bottom: 1.5vh;
}

.weatherState-1 {
  font-size: 2.3vh;
  padding-bottom: 1.5vh;
}


.HighLowTemp_1 {
  font-size: 2.5vh;
  padding-bottom: 1.5vh;
}

.feelslike-1 {
  font-size: 2.5vh;
  padding-bottom: 1.5vh;
}

.windy-1 {
  font-size: 1.8vh;
  padding-bottom: 1.5vh;
}

.pressure-1 {
  font-size: 1.8vh;
  padding-bottom: 1.5vh;
}

.eightDayForecastImg-1 {
  padding-top: 0.5vh;
  padding-bottom: 1vh;
  scale: 2;
  height: auto;
}

#TwentyFourHour-weather_1 {
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

.hour-next-1 {
  padding: 2.3vw;
  display: inline-block;
  margin: 0.4em 1.5% 0.4em 0;
}


.next_hour-1 {
  font-size: 4vh;
  padding-bottom: 1.5vh;
}

.weatherStateHour-1 {
  font-size: 2.3vh;
  padding-bottom: 1.5vh;
}


.HighLowTempHourly_1 {
  font-size: 2.5vh;
  padding-bottom: 1.5vh;
}

.feelslikeHourly-1 {
  font-size: 2.5vh;
  padding-bottom: 1.5vh;
}

.windy-1Hourly {
  font-size: 1.8vh;
  padding-bottom: 1.5vh;
}

.pressure-1Hourly {
  font-size: 1.8vh;
  padding-bottom: 1.5vh;
}

.TwentyFourHourForecastImg-1 {
  padding-top: 0.5vh;
  padding-bottom: 1vh;
  scale: 2;
  height: auto;
}


#outfit-of-the-day_1 {
  visibility: hidden;
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

.outfit-recommendations {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
  padding-top: 20px;
}

.save-to-my-items{
  padding: 2em;
  font-size: large;
  background:#1e7c85
}

.save-to-my-items:hover{
  cursor: pointer;
}

.outfit-box {
  width: 200px;
  height: 250px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  padding: 10px;
  margin: 10px;
  background-color: rgba(255, 255, 255, 0.15);
  border-radius: 5px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.outfit-box h1 {
  font-family: sans-serif;
  font-size: 1.5rem;
  text-decoration: underline black;
  text-decoration-thickness: 5px;
  font-weight: bold;
  color: #fff;
  text-align: center;
  margin-bottom: 10px;
}

.outfit-box img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.outfit-box p {
  font-family: sans-serif;
  font-size: 1.25rem;
  font-weight: bold;
  color: #fff;
  text-align: center;
  margin-top: 10px;
}

.current-unit1 {
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
  overflow-y: scroll;
  overflow-x: hidden;
}

.city-display1 {
  padding-top: 2vh;
  padding-bottom: 0.5vh;
  font-size: 6vh;
  border-bottom: 1vh solid #000
}
.current-day1 {
  padding-top: 1.5vh;
  font-size: 5vh;
}
.weatherDescription1 {
  padding-top: 1.5vh;
  padding-bottom: 1.5vh;
  font-size: 3vh;
}

.high-low-temp1 {
  padding-bottom: 1.5vh;
  font-size: 3vh;
}

.currentWeatherContainer1 {
  width: auto;
  height: auto;
  position: relative;
  overflow: hidden;
  border-radius: 50%;
  scale: 2.0;
  padding-bottom: 0.8vh;
}

.weather-icon-current1 {
  display: inline;
  margin: 0 auto;
  height: 100%;
  width: auto;
}

.feelslike_1_1 {
  font-size: 3vh;
}

.current-conditions-1 {
  padding-top: 1.4vh;
  font-size: 1.8vh;
}

.pressure_1_current {
  padding-top: 1.4vh;
  font-size: 1.8vh;
  padding-bottom: 3vh;
}


.bar-search1 {
  background-color: rgb(255, 255, 255);
  background-size: 100% 100%;
  height: 5vh;
  left: 30%;
  position: absolute;
  top: 11vh;
  width: 40vw;
  border-radius: 5vh;
}

.search-input1 {
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

.container-center-horizontal1 {
  min-height: 100vh;
  position: relative;
}


@media only screen and (min-width: 428px) and (max-width: 900px) {
  .menu_homepage_logged_in {
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

  #menu-container_2 {
    z-index: 1;
    position: absolute;
    height: 21.3vh;
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

  .diff_options {
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

  #weekly-weather_1 {
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


  .day-next-1 {
    padding: 1.8vw;
    display: inline-block;
  }


  .next-1 {
    font-size: 3.5vh;
    padding-bottom: 1.5vh;
  }

  .weatherState-1 {
    font-size: 2.3vh;
    padding-bottom: 1.5vh;
  }


  .HighLowTemp_1 {
    font-size: 2.5vh;
    padding-bottom: 1.5vh;
  }

  .feelslike-1 {
    font-size: 2.5vh;
    padding-bottom: 1.5vh;
  }

  .windy-1 {
    font-size: 1.8vh;
    padding-bottom: 1.5vh;
  }

  .pressure-1 {
    font-size: 1.8vh;
    padding-bottom: 1.5vh;
  }

  .eightDayForecastImg-1 {
    padding-top: 0.5vh;
    padding-bottom: 1vh;
    scale: 2;
    height: auto;
  }

  #TwentyFourHour-weather_1 {
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

  .hour-next-1 {
    padding: 5.0vw;
    display: inline-block;
    margin: 0.4em 1.5% 0.4em 0;
  }


  .next_hour-1 {
    font-size: 3.5vh;
    padding-bottom: 1.5vh;
  }

  .weatherStateHour-1 {
    font-size: 2.3vh;
    padding-bottom: 1.5vh;
  }


  .HighLowTempHourly_1 {
    font-size: 2.5vh;
    padding-bottom: 1.5vh;
  }

  .feelslikeHourly-1 {
    font-size: 2.5vh;
    padding-bottom: 1.5vh;
  }

  .windy-1Hourly {
    font-size: 1.8vh;
    padding-bottom: 1.5vh;
  }

  .pressure-1Hourly {
    font-size: 1.8vh;
    padding-bottom: 1.8vh;
  }

  .TwentyFourHourForecastImg-1 {
    padding-top: 0.5vh;
    padding-bottom: 1vh;
    scale: 2;
    height: auto;
  }

  #outfit-of-the-day_1 {
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


  .current-unit1 {
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
    overflow-y: scroll;
    overflow-x: hidden;
  }

  .city-display1 {
    padding-top: 2vh;
    padding-bottom: 0.5vh;
    font-size: 6vh;
    border-bottom: 1vh solid #000
  }
  .current-day1 {
    padding-top: 1.5vh;
    font-size: 5vh;
  }

  .weatherDescription1 {
    padding-top: 1.5vh;
    padding-bottom: 1.5vh;
    font-size: 3vh;
  }

  .high-low-temp1 {
    padding-bottom: 1.5vh;
    font-size: 3vh;
  }

  .currentWeatherContainer1 {
    width: auto;
    height: auto;
    position: relative;
    overflow: hidden;
    border-radius: 50%;
    scale: 1.5;
    padding-bottom: 0.8vh;
  }


  .weather-icon-current1 {
    display: inline;
    margin: 0 auto;
    height: 100%;
    width: auto;
  }

  .feelslike_1_1 {
    font-size: 3vh;
  }


  .bar-search1 {
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

  .search-input1 {
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
}

@media only screen and (max-width: 427px) {
  .menu_homepage_logged_in {
    z-index: 1;
    position: absolute;
    height: 7.5vh;
    margin-bottom: -15vh;
    left: 40%;
    top: 50vh;
    border: black solid 6px;
    bottom: 0;
    transform: translate(-50%, 0);
    width: 55vw;
    padding: 1.6vh;
    scale: 0.7;
    color: rgb(255, 255, 255);
    font-size: 2.5vh;
    font-weight: 500;
    text-align: center;
    background-color: rgba(102, 102, 102, 0.83);
    overflow-y: hidden;
    overflow-x: hidden;
  }

  #menu-container_2 {
    z-index: 1;
    position: absolute;
    height: 20.7vh;
    left: 40.0%;
    top: 52.1vh;
    border-top: black solid 3.5px;
    border-left: black solid 6px;
    border-right: black solid 6px;
    border-bottom: black solid 6px;
    bottom: 0;
    transform: translate(-50%, 0);
    width: 55vw;
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

  .diff_options {
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

  #weekly-weather_1 {
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


  .day-next-1 {
    padding: 1.8vw;
    display: inline-block;
  }


  .next-1 {
    font-size: 3.5vh;
    padding-bottom: 1.5vh;
  }

  .weatherState-1 {
    font-size: 2.3vh;
    padding-bottom: 1.5vh;
  }


  .HighLowTemp_1 {
    font-size: 2.5vh;
    padding-bottom: 1.5vh;
  }

  .feelslike-1 {
    font-size: 2.5vh;
    padding-bottom: 1.5vh;
  }

  .windy-1 {
    font-size: 1.8vh;
    padding-bottom: 1.5vh;
  }

  .pressure-1 {
    font-size: 1.8vh;
    padding-bottom: 1.8vh;
  }


  .eightDayForecastImg-1 {
    padding-top: 0.5vh;
    padding-bottom: 1vh;
    scale: 2;
    height: auto;
  }

  #TwentyFourHour-weather_1 {
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

  .hour-next-1 {
    padding: 5.0vw;
    display: inline-block;
    margin: 0.4em 1.5% 0.4em 0;
  }


  .next_hour-1 {
    font-size: 3.5vh;
    padding-bottom: 1.5vh;
  }

  .weatherStateHour-1 {
    font-size: 2.3vh;
    padding-bottom: 1.5vh;
  }


  .HighLowTempHourly_1 {
    font-size: 2.5vh;
    padding-bottom: 1.5vh;
  }

  .feelslikeHourly-1 {
    font-size: 2.5vh;
    padding-bottom: 1.5vh;
  }

  .windy-1Hourly {
    font-size: 1.8vh;
    padding-bottom: 1.5vh;
  }

  .pressure-1Hourly {
    font-size: 1.8vh;
    padding-bottom: 1.8vh;
  }


  .TwentyFourHourForecastImg-1 {
    padding-top: 0.5vh;
    padding-bottom: 1vh;
    scale: 2;
    height: auto;
  }

  #outfit-of-the-day_1 {
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

  .current-unit1 {
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
    overflow-y: scroll;
    overflow-x: hidden;
  }

  .city-display1 {
    padding-top: 2vh;
    padding-bottom: 0.5vh;
    font-size: 6vh;
    border-bottom: 1vh solid #000
  }
  .current-day1 {
    padding-top: 1.5vh;
    font-size: 5vh;
  }

  .weatherDescription1 {
    padding-top: 1.5vh;
    padding-bottom: 1.5vh;
    font-size: 3vh;
  }

  .high-low-temp1 {
    padding-bottom: 1.5vh;
    font-size: 3vh;
  }

  .currentWeatherContainer1 {
    width: auto;
    height: auto;
    position: relative;
    overflow: hidden;
    border-radius: 50%;
    scale: 1.5;
    padding-bottom: 0.8vh;
  }

  .currentWeatherContainer1 {
    width: auto;
    height: auto;
    position: relative;
    overflow: hidden;
    border-radius: 50%;
    scale: 2.0;
    padding-bottom: 0.8vh;
  }

  .weather-icon-current1 {
    display: inline;
    margin: 0 auto;
    height: 100%;
    width: auto;
  }

  .feelslike_1_1 {
    font-size: 3vh;
  }


  .bar-search1 {
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

  .search-input1 {
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

}

</style>

<template>
  <div class="container-center-horizontal">
    <div class="website-location-settings screen">
      
      <nav-bar class = "locationNav"></nav-bar>
      
      
      <div class="location-title">
        <h1 class="location-settings-title">{{ title }}</h1>
      </div>

      <div class="location-text-container">

        <div class="text-column1">
          <div class="location-services ui---30-semi2">{{ locationServices }}</div>
          <p class="enable-location-to-g ui---30-medium">{{ enableLocationToG }}</p>
          <div class="location-preferences ui---30-semi2">{{ locationPreferences }}</div>
          <p class="manually-enter-in-a ui---30-medium">{{ manuallyEnterInA }}</p>
        </div>

        <div class="text-column2">
          <div class="toggle-switcho-container">
            <label class="switch">
              <input type="checkbox" v-model="data.toggleValue">
                <span class="slider round"></span>
                </label>
          </div>
          <div class="city-container">
            <input class="city" type="text" name="searching" placeholder="Insert City" v-model="data.cityName"> 
          </div>

        </div>
      </div>
      <div class="save-button-container">
        <button @click="saveLocation()">Save</button>
      </div>
      <settings-component></settings-component>
      </div>
    </div>
  
</template>

<script>
import axios from "axios"; 
import NavBar from "@/NavBar/NavBar.vue";
import SettingsComponent from "@/SettingsComponent/SettingsComponent.vue"


export default {
  name: "WebsiteLocationSettings",
  data(){
    return {
      data: {
        cityName: "",
        userid: null, 
        toggleValue: 0, 
      }
    };
  },
  created() {
    this.getUserId();
  },
  computed: {
    toggleInt(){
      return this.toggleValue ? 1 : 0; 
    }
  },
  methods: {
    async getUserId() {
      try {
        const response = await axios.get("https://www-student.cse.buffalo.edu/CSE442-542/2023-Spring/cse-442a/backend/get_userid.php", { withCredentials: true });
        this.data.userid = response.data.userid;
        console.log("User_id: "+response.data.userid);
        this.loadLocation();
      } catch (error) {
        console.error("Unsuccessful request in getUserId().", error);
      }
    },
    saveLocation() {
      axios.post("https://www-student.cse.buffalo.edu/CSE442-542/2023-Spring/cse-442a/backend/saved_location.php", 
      {
        userid: this.data.userid,
        city: this.data.cityName,
        toggle: this.data.toggleValue, 
      })
      .then(response => {
        console.log(response.data);
        alert("Location Settings saved successfully!");
      })
      .catch(error => {
        console.error("Unsuccessful axios post in saveLocation().", error);
      });
    },
    loadLocation() {
      axios.get("https://www-student.cse.buffalo.edu/CSE442-542/2023-Spring/cse-442a/backend/load_location.php",
      {
        params: {
          userid: this.data.userid,
        }
      })
      .then(response => {
        this.data.cityName = response.data.city;
        this.data.toggleValue = response.data.toggle; 
      })
      .catch(error => {
        console.error("Unsuccessful axios get in loadLocation().", error);
      });
    },
  },
  
  components: {
    NavBar,
    SettingsComponent,
  },
 
  props: [
    "defaultLogo5",
    "title",
    "locationServices",
    "enableLocationToG",
    "locationPreferences",
    "manuallyEnterInA",
    "or",
    "save",
    "ellipse6Props",
  ],
};
</script>

<style scoped>

.locationNav{
  top: -0.85%;
}

.switch {
  position: relative;
  display: inline-block;
  width: 90px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(55px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
.website-location-settings {
  position: absolute;
  width: 100%; 
  height: 100%;
  background: #FFFFFF;
 
}

.location-title{
  position: relative;
  margin: auto;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 10%; 
  left: -10px;
  top: 50px; 
  
}

.location-settings-title{
 color: var(--black);
 font-weight: 600;
 font-size: 2.5em;
 font-family: 'Inter';
 font-style: normal; 

}

.location-text-container {
  align-items: flex-start;
  align-self: flex-start;
  display: flex;
  gap: 23px;
  height: 289px;
  margin-left: 500px;
  margin-top: 200px;
  width: 100%; 
}
.text-column1 {
  align-items: flex-start;
  align-self: flex-end;
  display: flex;
  flex-direction: column;
  min-height: 250px;
  margin-left: -100px; 
  width: 800px;
  
}

.text-column2 {
  align-items: flex-end;
  display: flex;
  flex-direction: column;
  gap: 104px;
  min-height: 266px;
  width: 640px;
  margin-top: -5px; 
  margin-left: -200px; 
  
}
.location-services {
  color: var(--black);
  font-weight: 550;
  font-size: 1.5em; 
  line-height: normal;
  min-height: 41px;
  text-align: center;
  width: 706px;
}
.enable-location-to-g {
  align-self: flex-end;
  color: #808080;
  font-size: 20px; 
  font-weight: 500;
  line-height: normal;
  min-height: 82px;
  text-align: center;
  width: 706px;
}
.location-preferences {
  color: var(--black);
  font-weight: 550;
  font-size: 1.5em; 
  line-height: normal;
  margin-top: 37px;
  min-height: 41px;
  text-align: center;
  width: 706px;
}
.manually-enter-in-a {
  align-self: center;
  color: #808080;
  font-size: 20px; 
  font-weight: 500;
  line-height: normal;
  margin-left: 26px;
  min-height: 82px;
  text-align: center;
  width: 706px;
}

.toggle-switcho-container {
  align-items: flex-start;
  display: flex;
  gap: 111px;
  height: 55px;
  margin-right: -150px;
  margin-top: 20px; 
  min-width: 431px;
  position: relative;
}
.city-container {
  height: 107px;
  position: relative;
  width: 400px;
  left: 200px; 
}
.city{
  height: 50px;
  left: -200px;
  position: absolute;
  top: 0;
  width: 260px;
}

.save-button-container{
  width: 100%; 
  height: 20%; 
  margin-left: 300px; 
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
  margin-left: 528px; 
  transform: scale(1.2); 
  margin-top: 80px; 
}

@media screen and (min-width: 992px) and (max-width: 1240px) {

  .location-text-container{
    margin-left: 200px; 
  }



}

@media screen and (min-width: 576px) and (max-width: 992px) {


  .location-text-container{
    transform: scale(0.8); 
    margin-left: 150px; 
  }

  .text-column2{
    margin-left: -80px; 
  }

  .save-button-container{
  transform: scale(0.95); 
  margin-left: -100px; 
}
}

@media screen and (min-width: 375px) and (max-width: 576px) {


  .location-title{
    margin-left: 20px;
    margin-top: 140px;
    transform: scale(0.7);
  }

  .location-text-container{
    margin-top: 40px; 
    margin-left: -100px; 
    transform: scale(0.56);
  }

  .text-column2{
    margin-left: -190px; 
    transform: scale(0.9);
  }

  .save-button-container{
    margin-top: -80px; 
    margin-left: -340px; 
    transform: scale(0.65); 
  }

}

@media screen and (max-width: 374px) {

.location-title{
  margin-left: 20px; 
  margin-top: 10px; 
  transform: scale(0.5);
}

.text-column1{
  transform: scale(0.7);
}

.text-column2{
  transform: scale(0.7); 
  margin-left: -280px; 
}

.location-text-container{
  margin-top: -5px; 
  margin-left: -120px; 
  transform: scale(0.7);
}

.save-button-container{
  margin-top: -100px; 
  margin-left: -270px; 
  transform: scale(0.5);
}

}

</style>

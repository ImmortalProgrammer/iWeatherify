<template>
  <div class="container-center-horizontal">
      <nav-bar class = "locationNav"></nav-bar>

      <div v-if="data.showErrorModal" class="overlay">
        <error-modal
          :show-modal="data.showErrorModal"
          :title="data.errorTitle"
          :message="data.errorMessage"
          @close-modal="data.showErrorModal = false"
        ></error-modal>
      </div>

      <div class="website-location-settings">
      
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
            <input style = "text-align: center; font-size: x-large" class="city" type="text" name="searching" placeholder="Insert City" v-model="data.cityName">
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
import SettingsComponent from "@/SettingsComponent/SettingsComponent.vue";
import ErrorModal from "@/components/ModalBox/ErrorModal.vue";

export default {
  name: "WebsiteLocationSettings",
  data(){
    return {
      data: {
        cityName: "",
        userid: null, 
        toggleValue: 0,
        errorTitle: "",
        errorMessage: "",
        showErrorModal: false,
      },
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
        const response = await axios.get(process.env.VUE_APP_WEB_DOMAIN + "/backend/get_userid.php", { withCredentials: true });
        this.data.userid = response.data.userid;
        console.log("User_id: "+response.data.userid);
        this.loadLocation();
      } catch (error) {
        console.error("Unsuccessful request in getUserId().", error);
      }
    },
    saveLocation() {
      axios.post(process.env.VUE_APP_WEB_DOMAIN + "/backend/saved_location.php",
      {
        userid: this.data.userid,
        city: this.data.cityName,
        toggle: this.data.toggleValue, 
      })
      .then(response => {
        console.log(response.data);
        this.data.errorTitle = 'Success';
        this.data.errorMessage = 'Location settings saved successfully!';
        this.data.showErrorModal = true;
        // alert("Location Settings saved successfully!"); //Here
      })
      .catch(error => {
        console.error("Unsuccessful axios post in saveLocation().", error);
      });
    },
    loadLocation() {
      axios.get(process.env.VUE_APP_WEB_DOMAIN + "/backend/load_location.php",
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
    ErrorModal,
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

.locationNav{
  top: -0.85%;
  width: 95%;
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

.overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  z-index: 1000;
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
  width: 75%;
  height: 10%; 
  left: 20px;
  top: 50px; 
  
}

.location-settings-title{
    color: var(--black);
    font-weight: 600;
    margin-top: 130px;
    font-size: 3em;
    font-family: 'Inter';
    font-style: normal;
    margin-left: 50px;
}

.location-text-container {
  align-items: flex-start;
  align-self: flex-start;
  display: flex;
  gap: 23px;
  height: 289px;
  margin-left: 500px; /*changed */
  margin-top: 200px;
  width: 60%;
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
  color: #808080;
  font-size: 20px;
    margin-left: 150px;
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
  margin-left: 75px;
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
  width: 0;
  margin-right: 150px;
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
  margin-left: 828px; /* changed */ 
  transform: scale(1.2); 
  margin-top: 80px;
}

@media screen and (min-width: 992px) and (max-width: 1440px) { /* changed */ 

  .location-text-container{
    margin-left: 250px; 
    
  }

  .save-button-container{
  transform: scale(0.95); 
  margin-left: -261px; 
}



}

@media screen and (min-width: 576px) and (max-width: 992px) {


  .location-text-container{
    transform: scale(0.98); 
    margin-left: 30px; 
  }

  .text-column2{
    margin-left: -80px; 
  }

  .save-button-container{
  transform: scale(0.95); 
  margin-left: -261px; 
}
}

@media screen and (min-width: 375px) and (max-width: 576px) {


  .location-title{
    margin-left: -90px;
    margin-top: 50px;
    transform: scale(0.7);
    width: 130%;
      font-size: 85%;
  }

  .location-text-container{
    margin-top: 40px; 
    margin-left: -100px; 
    transform: scale(0.55);
  }

  .city{
      height: 50px;
      left: -10px;
      position: absolute;
      top: -20%;
      width: 260px;
  }

  .toggle-switcho-container {
      align-items: flex-start;
      display: flex;
      gap: 111px;
      height: 55px;
      margin-right: -110px;
      margin-top: 20px;
      min-width: 100px;
      position: relative;
  }

  .text-column2{
    margin-left: -190px; 
    transform: scale(0.9);
  }

  .save-button-container{
    margin-top: -130px;
    margin-left: -550px;
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


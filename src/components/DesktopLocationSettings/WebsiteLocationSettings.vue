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
              <input type="checkbox">
                <span class="slider round"></span>
                </label>
          </div>
          <div class="city-container">
            <input class= "city" type="text" placeholder="Insert City" name="search">
          </div>

        </div>
      </div>
      <div class="save-button">
        <div class="rectangle-272"></div>
        <div class="save ui---30-semi2">{{ save }}</div>
      </div>
    </div>
  </div>
</template>

<script>
import Ellipse6 from "./Ellipse6";
import ToggleSwitchOn from "./ToggleSwitchOn";
import ToggleSwitchOff from "./ToggleSwitchOff";
import NavBar from "@/NavBar/NavBar.vue";
export default {
  name: "WebsiteLocationSettings",
  components: {
    NavBar,
    Ellipse6,
    ToggleSwitchOn,
    ToggleSwitchOff,
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
  margin-top: -10px; 
}

.location-settings-title{
 color: var(--black);
 font-weight: 600;
 font-size: 1.5em;
 font-family: 'Inter';
 font-style: normal; 
}

.location-text-container {
  align-items: flex-start;
  align-self: flex-start;
  display: flex;
  gap: 23px;
  height: 389px;
  margin-left: -123px;
  margin-top: 100px;
  min-width: 1491px;
  
}
.text-column1 {
  align-items: flex-start;
  align-self: flex-end;
  display: flex;
  flex-direction: column;
  min-height: 389px;
  width: 796px;
  
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
.text-column2 {
  align-items: flex-end;
  display: flex;
  flex-direction: column;
  gap: 104px;
  min-height: 266px;
  width: 640px;
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


.locationNav {
  position: relative;
  display: inline-flex;
  align-items: safe center;
  top: -0.2%;
  margin-top: 2%;
  width: 88%;
  z-index: 1;
 
}
.save-button {
  height: 80px;
  margin-top: 320px;
  position: relative;
  width: 706px;
  margin-left: -60px; 

}
.rectangle-272 {
  background-color: var(--black);
  height: 80px;
  left: 600px;
  position: absolute;
  top: -340px;
  width: 335px;
}
.save {
  color: var(--white);
  font-weight: 600;
  left: 410px;
  line-height: normal;
  position: absolute;
  text-align: center;
  top: -320px;
  width: 706px;
}

@media only screen and (min-width: 992px) and (max-width: 1440px) {

  .locationNav{
    position: relative;
    display: inline-flex;
    align-items: safe center;
    margin-top: 2%;
    width: 100%;
    z-index: 1;
  }
 


}

@media only screen and (min-width: 576px) and (max-width: 900px) {

  .locationNav {
    position: relative;
    display: inline-flex;
    align-items: safe center;
    margin-top: 2%;
    width: 110%;
    z-index: 1;
  }

  .location-text-container{
    transform: scale(0.6);
    margin-left: -410px; 
    margin-top: 10px; 
    
  }

  .text-column2{
    margin-left: -230px;
  }

  .save-button{
    transform: scale(0.8);
    margin-left: -350px; 
    margin-top: 160px;
  }
}

@media only screen and (min-width: 375px) and (max-width: 576px) {

  .locationNav{
    position: relative;
    display: inline-flex;
    align-items: safe center;
    margin-top: 3%;
    width: 110%;
    z-index: 1;
    transform: scale(1);
    
  }

  .location-text-container{
    transform: scale(0.55);
    margin-left: -430px; 
    margin-top: -40px; 
  }

  .text-column2{
    margin-left: -410px;
    margin-top: -20px; 
  }

  .save-button{
    transform: scale(0.6);
    margin-left: -380px;
    margin-top: 100px;
  }

 



}

@media only screen and (max-width: 375px) {

  .locationNav{
    position: relative;
    display: inline-flex;
    align-items: safe center;
    margin-top: 3%;
    width: 110%;
    z-index: 1;
    transform: scale(1);
    
  }

  .location-text-container{
    transform: scale(0.4);
    margin-left: -520px; 
    margin-top: -70px; 
  }

  .text-column2{
    margin-left: -410px;
    margin-top: -20px; 
  }

  .save-button{
    transform: scale(0.6);
    margin-left: -430px;
    margin-top: 60px;
  }

}
</style>

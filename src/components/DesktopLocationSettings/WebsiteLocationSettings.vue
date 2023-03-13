<template>
    <div class="website-location-settings screen">
      <div class="nav-bar-container">
        <div class="logo-container">
        <img src="../../../img/Logo.png" alt="Default Logo 5" />
          </div>
          
          <div class="profile-img-container">
            <img src="../../../img/Profile image.png"/>
          </div>
          
          <div class="menu-bar-container">
            <img src="../../../img/Vector.png" alt ="Vector"/>
          </div>
          </div>
        
          <div class="title-container">
        <h1 class="title">{{ title }}</h1>
        </div>

      <div class="flex-row-1">
        <div class="flex-col">
          <div class="location-services">{{ locationServices }}</div>
          <p class="enable-location-to-g">{{ enableLocationToG }}</p>
          <div class="location-preferences">{{ locationPreferences }}</div>
          <p class="manually-enter-in-a">{{ manuallyEnterInA }}</p>
        </div>
        <div class="flex-col-1">
          <div class="toggle-switcho-container">
            <label class="switch">
              <input type="checkbox">
                <span class="slider round"></span>
                </label>
          </div>
          <div class="overlap-group1"> 
           
            <input class= "city" type="text" placeholder="Insert City" name="search">
            <input class= "zip-code" type="text" placeholder="Insert Zip Code" name="search1">
            <div class="or">{{ or }}</div>
          </div>
        </div>
      </div>
      <div class="overlap-group">
        <div class="rectangle-272"></div>
        <div class="save ui---30-semi2">{{ save }}</div>
      </div>
    </div>
</template>

<script>
import Ellipse6 from "./Ellipse6";
import ToggleSwitchOn from "./ToggleSwitchOn";
import ToggleSwitchOff from "./ToggleSwitchOff";
export default {
  name: "WebsiteLocationSettings",
  components: {
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

<style>
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
  height: 100vh;
  background: #FFFFFF;
}
.nav-bar-container{
  position: relative;
  display: inline-flex;
  align-items: safe center;
  margin-top: 2%;
  width: 100%;
}
.logo-container {
  position:relative;
  width: 5%;
  left: 5%;
}
.menu-bar-container {
  position: relative;
  left: 75%;
}
.profile-img-container{
  position: relative;
  top: 5px;
  left: 75%;
}
.title {
  align-self: flex-end;
  color: var(--black);
  font-family: "Inter";
  font-size: 30px; 
  font-weight: 600;
  line-height: normal;
  margin-bottom: 1px;
  margin-left: 300px;
  min-height: 41px;
  text-align: center;
  width: 706px;
  top: 50px;
}
.vector {
  position: absolute;
  width: 41px;
  height: 41px;
  left: 103vw;
  top: 3vh;
  object-fit: cover;
}
.flex-row-1 {
  align-items: flex-start;
  align-self: flex-start;
  display: flex;
  gap: 23px;
  height: 289px;
  margin-left: -123px;
  margin-top: 108px;
  min-width: 1491px;
}
.flex-col {
  align-items: flex-start;
  align-self: flex-end;
  display: flex;
  flex-direction: column;
  min-height: 283px;
  width: 796px;
}
.location-services {
  color: var(--black);
  font-family: "Inter";
  font-weight: 600;
  font-size: 26px;
  line-height: normal;
  min-height: 10px;
  text-align: center;
  width: 706px;
}
.enable-location-to-g {
  align-self: flex-end;
  color: #808080;
  font-weight: 500;
  font-size: 20px;
  line-height: normal;
  min-height: 70px;
  text-align: center;
  width: 706px;
}
.location-preferences {
  color: var(--black);
  font-family: "Inter";
  font-weight: 600;
  font-size:26px;
  line-height: normal;
  margin-top: 37px;
  min-height: 41px;
  text-align: center;
  width: 706px;
}
.manually-enter-in-a {
  align-self: center;
  color: #808080;
  font-weight: 500;
  font-size: 20px;
  line-height: normal;
  margin-left: 26px;
  min-height: 70px;
  text-align: center;
  width: 706px;
}
.flex-col-1 {
  align-items: flex-end;
  display: flex;
  flex-direction: column;
  gap: 104px;
  min-height: 266px;
  width: 672px;
}
/* OFF ONLY */
.toggle-switcho-container {
  align-items: flex-start;
  display: flex;
  gap: 111px;
  height: 55px;
  margin-right: -200px;
  min-width: 431px;
  position: relative;
}
.overlap-group1 {
  height: 107px;
  position: relative;
  width: 672px;
}
.city{
  height: 50px;
  left: -200px;
  position: absolute;
  top: 0;
  width: 260px;
}
.zip-code {
  height: 50px;
  left: 290px;
  position: absolute;
  top: 0;
  width: 188px;
}
.or {
  color: var(--black);
  font-family:"Inter";
  font-size: 26px;
  font-weight: 600;
  left: 50px;
  line-height: normal;
  position: absolute;
  text-align: center;
  top: 10px;
  width: 254px;
}
.overlap-group {
  height: 80px;
  margin-top: 345px;
  position: relative;
  width: 706px;
}
.rectangle-272 {
  background-color: var(--black);
  height: 80px;
  left: 600px;
  position: absolute;
  top: -250px;
  width: 335px;
}
.save {
  color: var(--white);
  font-weight: 300;
  left: 410px;
  line-height: normal;
  position: absolute;
  text-align: center;
  top: -230px;
  width: 706px;
}
@media screen and (min-width: 300px) and (max-width:800px) { /* Mobile */
  .menu-bar-container{
    left: 250%;
  }
  .profile-img-container{
    left:250%;
  }
  .title{
    left:-50%;
    top: 100px;
  }
  .toggle-switcho-container{
    left: -50%;
  }
  .city{
    left: -40%;
  }
  .or{
    left: -40%;
    top: 90px;
  }
  .zip-code{
    left: -34%;
    top: 150px;
  }
  .overlap-group{
    left: -80%;
    top: 50px;
  }
  
}


</style>

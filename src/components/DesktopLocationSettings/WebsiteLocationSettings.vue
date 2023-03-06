<template>
  <div class="container-center-horizontal">
    <div class="website-location-settings screen">
      <div class="flex-row">
        <img class="default-logo-5" :src="defaultLogo5" alt="Default Logo 5" />
        <h1 class="title">{{ title }}</h1>
        <ellipse6 :src="ellipse6Props.src" />
        <img
          class="vector"
          src="https://anima-uploads.s3.amazonaws.com/projects/6402851d6a37db7167320ed4/releases/64028608c9953e08464983be/img/vector-1.svg"
          alt="Vector"
        />
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
            
            <toggle-switch-off />
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
.website-location-settings {
  position: relative;
  width: 100%; 
  height: 100vh;
  background: #FFFFFF;
}

.flex-row {
  align-items: center;
  display: flex;
  margin-right: 4px;
  min-width: 1260px;
  position: relative;
}

.default-logo-5 {
  position: absolute;
  max-width: 100%;
  width: 10vw;
  height: auto;
  left: 5.8333vw;
  top: 3vh;
  object-fit: cover;
}

.title {
  align-self: flex-end;
  color: var(--black);
  font-family: "Inter";
  font-size: 30px; 
  font-weight: 600;
  line-height: normal;
  margin-bottom: 1px;
  margin-left: 250px;
  min-height: 41px;
  text-align: center;
  width: 706px;
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
  left: 520px;
  position: absolute;
  top: -250px;
  width: 335px;
}

.save {
  color: var(--white);
  font-weight: 300;
  left: 340px;
  line-height: normal;
  position: absolute;
  text-align: center;
  top: -230px;
  width: 706px;
}

/* For Mobile Device */
@media screen and (max-width: 400px) {
  
}
/* For Laptops and Desktops */
@media screen and (min-width:880px)  {
  
}
</style>

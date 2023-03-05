<template>
  <div id="app">
  <div class="container-center-horizontal">
    <div class="website-home-page-not-logged-in screen">
      <div class="overlap-group3">
        <weather :text1="weatherProps.text1" :h50L40="weatherProps.h50L40" :place="weatherProps.place" />
        <input-search :inputType="inputSearchProps.inputType" :inputPlaceholder="inputSearchProps.inputPlaceholder" />
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
        <div class="flex-row-4">
          <ellipse64 />
          <img
            class="vector-4"
            src="https://anima-uploads.s3.amazonaws.com/projects/6402851d6a37db7167320ed4/releases/64028608c9953e08464983be/img/vector-1.svg"
            alt="Vector"
          />
        </div>
        <img class="home-logo-2" :src="homeLogo2" alt="Home Logo 2" />
        <div class="frame-7">
          <img
            class="vector-5"
            src="https://anima-uploads.s3.amazonaws.com/projects/6402851d6a37db7167320ed4/releases/64028608c9953e08464983be/img/vector.svg"
            alt="Vector"
          />
          <h1 class="login-to-view-a-pers">{{ loginToViewAPers }}</h1>
        </div>
      </div>
    </div>
  </div>
  </div>
</template>

<script>
import Weather from "./Weather";
import InputSearch from "./InputSearch";
import WeatherThroughoutTheDay from "./WeatherThroughoutTheDay";
import Ellipse64 from "./Ellipse64";
export default {
  name: "WebsiteHomePageNotLoggedIn",
  components: {
    Weather,
    InputSearch,
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

#app {
  background-image: url('../../../img/background-img.png');
  background-size: cover;
  background-position: bottom;
  transition: 0.4s;
}

main {
  min-height: 100vh;
  padding: 25px;

}

.website-home-page-not-logged-in {
  align-items: flex-start;
  display: flex;
  margin-right: 1450px;
  min-height: 100vh;
  position: relative;
}


.weather-for-today {
  align-items: flex-start;
  display: flex;
  height: 104px;
  left: 353px;
  position: absolute;
  top: 600px;
  width: 693px;
}

.flex-row-4 {
  align-items: center;
  display: flex;
  gap: 38px;
  height: 50px;
  left: 1181px;
  min-width: 129px;
  position: absolute;
  top: 58px;
}

.vector-4 {
  height: 41px;
  margin-bottom: 1px;
  width: 41px;
}

.home-logo-2 {
  height: 51px;
  left: 68px;
  object-fit: cover;
  position: absolute;
  top: 57px;
  width: 192px;
}

.frame-7 {
  height: 312px;
  left: 540px;
  position: absolute;
  top: 250px;
}

.vector-5 {
  height: 292px;
  left: 10px;
  position: absolute;
  top: 10px;
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
</style>

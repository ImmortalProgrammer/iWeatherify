<template>
  <div class="container-center-horizontal">
    <div class="website-home-page-not-logged-in screen">
      <div class="overlap-group3" :style="{ 'background-image': 'url(' + overlapGroup3 + ')' }">
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
.website-home-page-not-logged-in {
  align-items: flex-start;
  background-color: var(--white);
  border: 1px none;
  display: flex;
  width: 1440px;
}

.overlap-group3 {
  background-position: 50% 50%;
  background-size: cover;
  height: 1024px;
  position: relative;
  width: 1440px;
}

.weather-for-today {
  align-items: flex-start;
  display: flex;
  height: 104px;
  left: 353px;
  position: absolute;
  top: 663px;
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
  left: 559px;
  position: absolute;
  top: 312px;
  width: 442px;
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

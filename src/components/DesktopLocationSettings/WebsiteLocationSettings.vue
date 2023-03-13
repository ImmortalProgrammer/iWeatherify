<template>
  <div class="container-center-horizontal">
    <div class="website-location-settings screen">
      <div class="flex-row">
        <img class="default-logo-5" :src="defaultLogo5" alt="Default Logo 5" />
        <h1 class="title ui---30-semi2">{{ title }}</h1>
        <ellipse6 :src="ellipse6Props.src" />
        <img
          class="vector"
          src="https://anima-uploads.s3.amazonaws.com/projects/6402851d6a37db7167320ed4/releases/64028608c9953e08464983be/img/vector-1.svg"
          alt="Vector"
        />
      </div>
      <div class="flex-row-1">
        <div class="flex-col">
          <div class="location-services ui---30-semi2">{{ locationServices }}</div>
          <p class="enable-location-to-g ui---30-medium">{{ enableLocationToG }}</p>
          <div class="location-preferences ui---30-semi2">{{ locationPreferences }}</div>
          <p class="manually-enter-in-a ui---30-medium">{{ manuallyEnterInA }}</p>
        </div>
        <div class="flex-col-1">
          <div class="toggle-switcho-container">
            <toggle-switch-on />
            <toggle-switch-off />
          </div>
          <div class="overlap-group1">
            <img
              class="city"
              src="https://anima-uploads.s3.amazonaws.com/projects/6402851d6a37db7167320ed4/releases/64040a504c9ddca04e2b1e35/img/city.svg"
              alt="City"
            />
            <img
              class="zip-code"
              src="https://anima-uploads.s3.amazonaws.com/projects/6402851d6a37db7167320ed4/releases/64040a504c9ddca04e2b1e35/img/zip-code.svg"
              alt="Zip Code"
            />
            <div class="or ui---30-semi2">{{ or }}</div>
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

<style scoped>
.website-location-settings {
  align-items: center;
  background-color: var(--white);
  border: 1px none;
  display: flex;
  flex-direction: column;
  height: 1024px;
  overflow: hidden;
  padding: 43px 0;
  width: 1440px;
}

.flex-row {
  align-items: center;
  display: flex;
  margin-right: 4px;
  min-width: 1260px;
  position: relative;
}

.default-logo-5 {
  height: 71px;
  object-fit: cover;
  width: 212px;
}

.title {
  align-self: flex-end;
  color: var(--black);
  font-weight: 600;
  line-height: normal;
  margin-bottom: 1px;
  margin-left: 31px;
  min-height: 41px;
  text-align: center;
  width: 706px;
}

.vector {
  height: 41px;
  margin-bottom: 10px;
  margin-left: 28px;
  width: 41px;
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
  font-weight: 600;
  line-height: normal;
  min-height: 41px;
  text-align: center;
  width: 706px;
}

.enable-location-to-g {
  align-self: flex-end;
  color: var(--gray03);
  font-weight: 500;
  line-height: normal;
  min-height: 82px;
  text-align: center;
  width: 706px;
}

.location-preferences {
  color: var(--black);
  font-weight: 600;
  line-height: normal;
  margin-top: 37px;
  min-height: 41px;
  text-align: center;
  width: 706px;
}

.manually-enter-in-a {
  align-self: center;
  color: var(--gray03);
  font-weight: 500;
  line-height: normal;
  margin-left: 26px;
  min-height: 82px;
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
  margin-right: 28px;
  min-width: 431px;
  position: relative;
}

.overlap-group1 {
  height: 107px;
  position: relative;
  width: 672px;
}

.city {
  height: 107px;
  left: 0;
  position: absolute;
  top: 0;
  width: 260px;
}

.zip-code {
  height: 107px;
  left: 484px;
  position: absolute;
  top: 0;
  width: 188px;
}

.or {
  color: var(--black);
  font-weight: 600;
  left: 242px;
  line-height: normal;
  position: absolute;
  text-align: center;
  top: 60px;
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
  left: 186px;
  position: absolute;
  top: 0;
  width: 335px;
}

.save {
  color: var(--white);
  font-weight: 600;
  left: 0;
  line-height: normal;
  position: absolute;
  text-align: center;
  top: 18px;
  width: 706px;
}
</style>

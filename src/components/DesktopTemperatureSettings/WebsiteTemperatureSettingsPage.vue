<template>
  <div class="container-center-horizontal">
    <div class="website-temperature-settings-page screen">
      <h1 class="title-3">{{ title }}</h1>
      <div>
          <img class="default-logo-3" :src="defaultLogo3" alt="Default Logo 3" />
          <img class="profile-img" :src="ellipse6Props.src">
          <img
          class="vector-3"
          src="https://anima-uploads.s3.amazonaws.com/projects/6402851d6a37db7167320ed4/releases/64028608c9953e08464983be/img/vector-1.svg"
          alt="Vector" 
          />
      </div>
      <div>
        <div class="entire-temp-scale">
          <div class="green-scale"></div>
          <div class="temp-rows">
            <div class="temperatures-font">100</div>
          </div>
          <div class="temp-rows">
            <div class="temperatures-font">75</div>
          </div>
          <div class="temp-rows">
            <div class="temperatures-font">50</div>
          </div>
          <div class="temp-rows">
            <div class="temperatures-font">25</div>
          </div>
          <div class="temp-rows">
            <div class="temperatures-font">0</div>
          </div>
        </div>
        <div class="hot-to-freezing-container">
            <div class="hot-to-freezing-font">Hot</div>
            <div class="hot-to-freezing-font">Warm</div>
            <div class="hot-to-freezing-font">Just Right</div>
            <div class="hot-to-freezing-font">Chilly</div>
            <div class="hot-to-freezing-font">Cold</div>
            <div class="hot-to-freezing-font">Freezing</div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Ellipse6 from "./Ellipse6";
export default {
  name: "WebsiteTemperatureSettingsPage",
  components: {
    Ellipse6
  },
  props: [
    "defaultLogo3", 
    "title", 
    "text1", 
    "hotWarmJustRight", 
    "ellipse6Props"
  ]
};
</script>

<style>

.website-temperature-settings-page {
  position: relative;
  width: 100%; 
  height: 100vh;
  background: #FFFFFF;
}

.title-3 {
  position: absolute;
  color: var(--black);
  width: 25vw;
  height: 3.125em;
  left: 40vw;
  top: 10vh;
  line-height: 2.5vw;
  text-align: center;
  font-weight: 600;
  font-size: 2vw;
  font-family: 'Inter';
  font-style: normal;
}


.entire-temp-scale {
  position: absolute;
  background-image: url(https://anima-uploads.s3.amazonaws.com/projects/6402851d6a37db7167320ed4/releases/640286bb66ed049392a82543/img/background.svg);
  background-size: 100% 100%;
  width: 6vw;
  height: 55vh;
  left: 45vw;
  top: 17vh;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  align-items: center;
}

.green-scale {
  position: absolute;
  background-image: url(https://anima-uploads.s3.amazonaws.com/projects/6402851d6a37db7167320ed4/releases/640286bb66ed049392a82543/img/background-1.svg);
  background-size: 100% 100%;
  width: 6vw;
  height: 30vh;
  top: 25vh;
}

.temp-rows {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 10%;
}

.temperatures-font {
  position: absolute;
  color: var(--black);
  font-family: 'Inter';
  font-style: normal;
  font-weight: 600;
  font-size: 1.6vw;
}

.hot-to-freezing-container {
  position: absolute;
  width: 9vw;
  height: 55vh;
  left: 51vw;
  top: 17vh;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  line-height: 2.5vw;
  text-align: center;
}

.hot-to-freezing-font {
  color: var(--black);
  font-family: 'Inter';
  font-style: normal;
  font-weight: 400;
  font-size: 1.5vw;
}

.vector-3 {
  position: absolute;
  width: 4vw;
  height: auto;
  left: 93vw;
  top: 3vh;
  object-fit: cover;
}

.default-logo-3 {
  position: absolute;
  max-width: 100%;
  width: 10vw;
  height: auto;
  left: 5.8333vw;
  top: 3vh;
  object-fit: cover;
}

.profile-img {
  position: absolute;
  width: 6vw;
  height: auto;
  left: 87vw; 
  top: 3vh;
  object-fit: cover;
}
</style>

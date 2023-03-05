<template>
  <div class="container-center-horizontal">
    <div class="website-temperature-settings-page screen">
      <h1 class="title-3">{{ title }}</h1>
      <img class="default-logo-3" :src="defaultLogo3" alt="Default Logo 3" />
      <div>
          <img class="profile-img" :src="ellipse6Props.src">
      </div>
      <div>
      <img
      class="vector-3"
      src="https://anima-uploads.s3.amazonaws.com/projects/6402851d6a37db7167320ed4/releases/64028608c9953e08464983be/img/vector-1.svg"
      alt="Vector"
      />
      </div>
      <div>
        <div class="entire-temp-scale">
          <div class="green-scale"></div>
            <div class="temperatures">
            100 75 50 25 0
            </div>
          </div>
          <div class="hot-warm-just-right-1">
          Hot Warm Just right Chilly Cold Freezing
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
  ],
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
  left: 40.2778vw;
  top: 10.1563vh;
  line-height: 2.5vw;
  text-align: center;
  font-weight: 600;
  font-size: 2.083vw;
  font-family: 'Inter';
  font-style: normal;
}


.entire-temp-scale {
  position: absolute;
  background-image: url(https://anima-uploads.s3.amazonaws.com/projects/6402851d6a37db7167320ed4/releases/640286bb66ed049392a82543/img/background.svg);
  background-size: 100% 100%;
  width: 5.9722vw;
  height: 68.3594vh;
  left: 44.0278vw;
  top: 17.0898vh;
}

.green-scale {
  position: absolute;
  background-image: url(https://anima-uploads.s3.amazonaws.com/projects/6402851d6a37db7167320ed4/releases/640286bb66ed049392a82543/img/background-1.svg);
  background-size: 100% 100%;
  width: 5.9722vw;
  height: 42.2852vh;
  top: 26vh;
}

.temperatures {
  position: absolute;
  color: var(--black);
  width: 5.7639vw;
  height: 77.7344vh;
  top: 17.9648vh;
  font-family: 'Inter';
  font-style: normal;
  font-weight: 600;
  font-size: 1.5625vw;
  line-height: 1.875vw;
  text-align: center;
}

.hot-warm-just-right-1 {
  position: absolute;
  color: var(--black);
  width: 9.7222vw;
  height: 74.0234vh;
  left: 51.1111vw;
  top: 18.75vh;
  font-weight: 400;
  line-height: 2.5vw;
  text-align: center;
  font-family: 'Inter';
  font-style: normal;
  font-weight: 400;
  font-size: 2.0833vw; 
  line-height: 2.5vw;
}

.vector-3 {
  position: absolute;
  width: 2.8472vw;
  height: 2.8472vw;
  left: 93.75vw;
  top: 5.1758vh;
}

.default-logo-3 {
  position: absolute;
  width: 5vw;
  height: 5vh;
  left: 5.8333vw;
  top: 2.6367vh;
  object-fit: cover;
}

.profile-img {
  position: absolute;
  width: 3.4722vw; 
  height: 3.4722vw; 
  left: 87.9167vw; 
  top: 4.6875vh;
  object-fit: cover;
}
</style>

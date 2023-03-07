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
  background-image: url(../../../img/background-img.png);
  background-size: cover;
  background-position: bottom;
  overflow-x: auto;
  background-attachment: scroll;

}


main {
  min-height: 100vh;
  padding: 25px;
}



.website-home-page-not-logged-in {
  align-items: flex-start;
  display: flex;
  top: -150px;
  margin-right: 2050px;
  min-height: 100vh;
  position: relative;
}


.weather-for-today {
  align-items: flex-start;
  display: flex;
  height: 104px;
  left: 353px;
  position: absolute;
  top: 630px;
  width: 693px;
  scale: 1.35;
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
  left: 80px;
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

@media only screen and (min-width: 880px) and (max-width: 1300px) {
  .home-logo-2 {
    left: 610px;
    top: 35px;
  }
  .flex-row-4 {
    gap: 720px;
    left: 315px;
    top: 35px;
  }
  .frame-7 {
    left: 500px;
    top: 630px;
  }

  .weather-for-today {
    left: 400px;
    top: 450px;
    scale: 1.35;
  }
}

@media only screen and (min-width: 533px) and (max-width: 879px) {
  #app {
    overflow: hidden;
  }
  .home-logo-2 {
    position: relative;
    left: 630px;
    top: 15px;
  }
  .flex-row-4 {
    gap: 380px;
    left: 490px;
    top: 15px;
  }
  .frame-7 {
    left: 475px;
    top: 780px;
    scale: 1.1;
    position: relative;
    visibility: hidden;
  }

  .weather-for-today {
    scale: 1.35;
    left: 670px;
    top: 410px;
    display: block;

  }
}

@media only screen and (min-width: 532px) and (max-width: 879px) and (max-height: 850px) {
  #app {
    overflow: auto;
  }
}

@media only screen and (min-width: 365px) and (max-width: 532px) {
  #app {
    overflow: hidden;
  }
  .home-logo-2 {
    visibility: hidden;
  }
  .flex-row-4 {
    gap: 215px;
    left: 580px;
    top: 15px;
  }
  .frame-7 {
    left: 475px;
    top: 780px;
    scale: 1.1;
    position: relative;
    visibility: hidden;
  }

  .weather-for-today {
    scale: 0.9;
    left: 575px;
    top: 350px;
    display: block;


  }
}

@media only screen and (min-width: 260px) and (max-width: 365px) {
  #app {
    overflow: hidden;
  }
  .home-logo-2 {
    visibility: hidden;

  }
  .flex-row-4 {
    scale: 0.75;
    gap: 230px;
    left: 565px;
    top: 5px;
  }
  .frame-7 {
    left: 475px;
    top: 780px;
    scale: 1.1;
    position: relative;
    visibility: hidden;
  }

  .weather-for-today {
    scale: 0.9;
    left: 583px;
    top: 320px;
    display: block;


  }
}

@media only screen and (min-width: 100px) and (max-width: 532px) and (max-height: 850px) {
  #app {
    overflow: auto;
  }
}
</style>

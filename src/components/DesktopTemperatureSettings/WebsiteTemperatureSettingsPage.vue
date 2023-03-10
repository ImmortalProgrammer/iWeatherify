<template>
  <div class="website-temperature-settings-page screen">
    <div class="nav-bar-container">
      <div class="logo-container">
        <img src="../../../img/Logo.png" alt="Default Logo 4" />
      </div>
      <div class="profile-img-container">
        <img src="../../../img/Profile image.png" />
      </div>
      <div class="menu-bar-container"> 
        <img src="../../../img/Vector.png" alt="Vector"/>
      </div>
    </div>

    <div class="title-container">
      <h1 class="temp-setting-title">{{ title }}</h1>
    </div>

    <div class="temp-bar-container">
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
        <div class="temp-rows">
          <div class="hot-to-freezing-font">Hot</div>
        </div>
        <div div class="temp-rows">
          <div class="hot-to-freezing-font">Warm</div>
        </div>
        <div div class="temp-rows">
          <div class="hot-to-freezing-font">Just Right</div>
        </div>
        <div div class="temp-rows">
          <div class="hot-to-freezing-font">Chilly</div>
        </div>
        <div div class="temp-rows">
          <div class="hot-to-freezing-font">Cold</div>
        </div>
        <div div class="temp-rows">
          <div class="hot-to-freezing-font">Freezing</div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "WebsiteTemperatureSettingsPage",
  components: {
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
  position: absolute;
  width: 100%; 
  height: 100%;
  background: #FFFFFF;
}

.nav-bar-container {
  position: relative;
  display: inline-flex;
  align-items: safe center;
  margin-top: 2%;
  width: 100%;
}
  
.logo-container {
  position: relative;
  width: 5%;
  left: 5%;
}

.menu-bar-container {
  position: relative;
  left: 85%;
}

.profile-img-container {
  position: relative;
  top: 5px;
  left: 85%;
}

.title-container {
  position: relative;
  margin: auto;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 10%;
}

.temp-setting-title {
  color: var(--black);
  font-weight: 600;
  font-size: 3em;
  font-family: 'Inter';
  font-style: normal;
}

.temp-bar-container {
  position: fixed;
  display: flex;
  justify-content: safe center;
  align-items: center;
  width: 100%;
  height: 60%;
  margin: auto;
}

.entire-temp-scale {
  position: relative;
  background-image: url("../../../img/GrayBar.png");
  background-size: 100% 100%;
  width: 75px;
  height: 100%;
  display: flex;
  margin-right: 100px;
  flex-direction: column;
  justify-content: space-between;
}

.green-scale {
  position: absolute;
  background-image: url("../../../img/GreenBar.png");
  background-size: 100% 100%;
  width: 100%;
  height: 55%;
  top: 45%;
}

.temp-rows {
  position: relative;
  display: flex;
  align-items: center;
  justify-content: center;
  height: 10%;
}

.temperatures-font {
  color: var(--black);
  font-family: 'Inter';
  font-style: normal;
  font-weight: 600;
  font-size: 2.5em;
}

.hot-to-freezing-container {
  position: relative;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  line-height: 100px;
  text-align: center;
  height: 100%;
}

.hot-to-freezing-font {
  color: var(--black);
  font-family: 'Inter';
  font-style: normal;
  font-weight: 400;
  font-size: 1.5em;
}

@media screen and (min-width: 992px) and (max-width: 1440px) {
  .title-container{
    transform: scale(0.7);
  }

  .menu-bar-container {
    left: 80%;
  }

  .profile-img-container {
    left: 80%;
  }

  .entire-temp-scale {
    margin-right: 25px;
  }
}

@media screen and (min-width: 576px) and (max-width: 992px) {
  .title-container{
    transform: scale(0.6);
  }

  .temperatures-font {
    font-size: 1.75em;
  }

  .menu-bar-container {
    left: 70%;
  }

  .profile-img-container {
    left: 70%;
  }

  .entire-temp-scale {
    margin-right: 25px;
  } 
}

@media screen and (min-width: 375px) and (max-width: 576px) {
  .logo-container {
    transform: scale(0.7); 
  }

  .title-container{
    transform: scale(0.6);
  }

  .temp-setting-title {
    font-size: 2em;
  }

  .temperatures-font {
    font-size: 1.5em;
  }

  .menu-bar-container {
    left: 60%;
  }

  .profile-img-container {
    left: 60%;
  }

  .entire-temp-scale {
    margin-right: 25px;
  }
}

@media screen and (max-width: 375px) {
  .title-container{
    transform: scale(0.5);
  }

  .temp-setting-title {
    font-size: 2em;
  }

  .temperatures-font {
    font-size: 1.5em;
  }

  .logo-container {
    transform: scale(0.7); 
  }

  .menu-bar-container {
    left: 55%;
  }

  .profile-img-container {
    left: 55%;
  }

  .entire-temp-scale {
    margin-right: 25px;
  }
}
</style>

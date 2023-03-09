<template>
  <div class="website-units-page screen">
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
      <h1 class="unit-title">{{ title }}</h1>
    </div>
    <div class="row-format-container">
      <div class="row">
        <p class="unit-font">Temperature</p>
        <select class="temp-container" id="dropdown-container-font"> 
          <option selected>°F</option>
          <option value="c">°C</option>
        </select>
      </div>
      <div class="row">
        <p class="unit-font">Wind</p>
        <select class="wind-container" id="dropdown-container-font"> 
          <option selected>mph</option>
          <option value="kmh">km/h</option>
        </select>
      </div>
      <div class="row">
        <p class="unit-font">Pressure</p>
        <select class="pressure-container" id="dropdown-container-font"> 
          <option selected>in</option>
          <option value="mm">mm</option>
        </select>
      </div>
      <div class="row">
        <p class="unit-font">Distance</p>
        <select class="distance-container" id="dropdown-container-font"> 
          <option selected>mi</option>
          <option value="km">km</option>
        </select>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "WebsiteUnitsPage",
  data() {
    
  },
  components: {
  },
  props: [
    "defaultLogo4",
    "title",
    "ellipse6Props",
  ]
};
</script>

<style>
.website-units-page {
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

.title-container {
  position: relative;
  margin: auto;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 10%;
}

.unit-title {
  color: var(--black);
  font-weight: 600;
  font-size: 3em;
  font-family: 'Inter';
  font-style: normal;
}

.unit-container {
  position: relative;
  display: flex;
  align-items: center;
  justify-content: center;
  margin: auto;
  top: 10%;
}

.row-format-container {
  position: fixed;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  align-items: center;
  top: 30%;
  width: 100%;
  height: 300px;
}

.temp-container {
  position: relative;
  width: fit-content;
  border: none;
}

.wind-container {
  position: relative;
  width: fit-content;
  border: none;
}

.pressure-container {
  position: relative;
  width: fit-content;
  border: none;
}

.distance-container {
  position: relative;
  width: fit-content;
  border: none;
}

#dropdown-container-font {
  font-size: 1.5em;
  font-family: 'Inter';
  font-style: normal;
  font-weight: 400;
  opacity: 0.5;
}

.row {
  border-bottom: 1px solid #C6C6C8;
  width: 30%;
  display: flex;
  flex-direction: row;
  align-items: left;
  justify-content: space-between;
}

.unit-font {
  font-size: 1.5em;
  font-family: 'Inter';
  font-style: normal;
  font-weight: 400;
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

@media screen and (min-width: 992px) and (max-width: 1440px) {
  .menu-bar-container {
    position: relative;
    left: 80%;
  }

  .profile-img-container {
    position: relative;
    top: 5px;
    left: 80%;
  }

  .row {
    width: 50%;
  }
}

@media screen and (min-width: 576px) and (max-width: 992px) {
  .row-format-container {
    height: 200px;
  }

  .menu-bar-container {
    left: 70%;
  }

  .profile-img-container {
    left: 70%;
  }

  .row {
    width: 60%;
  }
}

@media screen and (min-width: 375px) and (max-width: 576px) {
  .menu-bar-container {
    left: 65%;
  }

  .profile-img-container {
    left: 65%;
  }

  .row {
    width: 90%;
  }
}

@media screen and (max-width: 375px) {
  .logo-container {
    transform: scale(0.7); 
  }

  .menu-bar-container {
    left: 60%;
  }

  .profile-img-container {
    left: 60%;
  }

  .row {
    width: 90%;
  }
}
</style>

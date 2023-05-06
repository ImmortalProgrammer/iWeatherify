<template>
  <div class= "settings-sidebar">
    <p class = "settingsText">Settings</p>
      <ul class = "settings">
        <li id = "button1" ><a  href="#/unitsSettings">Unit Settings</a></li>
        <li id = "button2" ><a  href="#/locationSettings">Location Settings</a></li>
        <li id = "button3" ><a  href="#/tempSettings">Temperature Settings</a></li>
        <li id = "button4"> <a href="#/accountSettings">Account Settings</a></li>
      </ul>
  </div>

</template>


<script>
export default {
  name: "SettingsComponent",
  data() {
    return {
      disabled: true,
      units: true,
      tempSettings: true,
      locationSettings: true,
      accountSettings: true, 
    }
  }, async created() {
    await this.routeDetection();
    await this.grayOut();
  }, methods: {
      async routeDetection() {
        const route = this.$route.name;
        switch (route) {
          case 'Units':
            this.$data.units = false;
            break;
          case 'LocationSettings':
            this.$data.tempSettings = false;
            break;
          case 'TemperatureSettings':
            this.$data.locationSettings = false;
            break;
          case 'AccountSettings':
            this.$data.accountSettings = false;
            break;
        }
      },
      async grayOut() {
        const links = [
          { id: 'button1', data: 'units'},
          { id: 'button2', data: 'tempSettings'},
          { id: 'button3', data: 'locationSettings'},
          { id: 'button4', data: 'accountSettings'},
        ];

        links.forEach((link) => {
          const element = document.getElementById(link.id);
          if (!this.$data[link.data]) {
            element.style.pointerEvents = 'none';
            element.style.opacity = '0.3';
          } else {
            element.style.pointerEvents = 'auto';
            element.style.opacity = '1';
          }
        });
      }
    }

}


</script>

<style scoped>

.settings-sidebar {
  user-select: none;
  background-color: #1e7c85;
  color: white;
  padding: 20px;

  position: fixed;
  height: 70vh;
  font-size: 100%;
  top: 15%;
  left: 0%;
  width: 20%;
  float: left;
}

#button1, #button2, #button3, #button4 {
  padding-top: 25px;
  border-top: none;
}

.settingsText {
  padding-bottom: 10px;
  text-align: center;
  font-size: 2.6em;
  border-bottom: 11px black solid;
}


.settings {
  font-size: 1.7em;
  text-align: center;
}

.settings-sidebar h2 {
  font-size: 24px;
  margin-bottom: 20px;
  text-align: center;
}

.settings-sidebar ul {
  list-style: none;
  margin: 0;
  padding: 0;
}

.settings-sidebar ul li {
  margin-bottom: 10px;
}

.settings-sidebar ul li a {
  color: white;
  text-decoration: none;
  display: block;
  padding: 10px;
  border-radius: 5px;
}

.settings-sidebar ul li a:hover {
  background-color: gray;
}

@media only screen and (min-width: 900px) and (max-width: 1300px) {
  .settings-sidebar {
    user-select: none;
    background-color: #1e7c85;
    color: white;
    padding: 20px;

    position: fixed;
    height: 75vh;
    font-size: 100%;
    top: 15%;
    left: 0%;
    width: 20%;
    float: left;
  }

  #button1, #button2, #button3, #button4 {
    padding-top: 25px;
    border-top: none;
  }

  .settingsText {
    padding-bottom: 10px;
    text-align: center;
    font-size: 2.6em;
    border-bottom: 11px black solid;
  }


  .settings {
    font-size: 1.7em;
    text-align: center;
  }

  .settings-sidebar h2 {
    font-size: 24px;
    margin-bottom: 20px;
    text-align: center;
  }

  .settings-sidebar ul {
    list-style: none;
    margin: 0;
    padding: 0;
  }

  .settings-sidebar ul li {
    margin-bottom: 10px;
  }

  .settings-sidebar ul li a {
    color: white;
    text-decoration: none;
    display: block;
    padding: 10px;
    border-radius: 5px;
  }

  .settings-sidebar ul li a:hover {
    background-color: gray;
  }

}

@media only screen and (min-width: 390px) and (max-width: 899px) {

  .settings-sidebar {
    user-select: none;
    background-color: #1e7c85;
    color: white;
    padding: 0;
    position: absolute;
    height: 6vh;
    font-size: 85%;
    top: 10%;
    left: -15%;
    width: 130%;
    float: left;
    transform: scale(0.7); 
  }

  #button1, #button2, #button3, #button4 {
    padding-top: 10px;
    padding-right: 10px;
    padding-left: 3px;
    border-top: none;
    float: left;
    display: inline;
  }



  .settingsText {
    padding-bottom: 0px;
    text-align: center;
    font-size: 0em;
    border-bottom: 5px black solid;
    visibility: hidden;
  }


  .settings {
    font-size: 1.0em;
    text-align: center;
    margin-top: -20px;
  }

  .settings-sidebar h2 {
    font-size: 0px;
    margin-bottom: 0px;
    text-align: center;
  }

  .settings-sidebar ul {
    list-style: none;
    margin: 0 0 0 25px;
    padding: 0;
  }

  .settings-sidebar ul li {
    margin-bottom: 10px;
  }

  .settings-sidebar ul li a {
    color: white;
    text-decoration: none;
    display: block;
    padding: 6px;
    border-radius: 5px;
  }

  .settings-sidebar ul li a:hover {
    background-color: gray;
  }

}
</style>

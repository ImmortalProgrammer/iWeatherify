<template>
    <div v-if = "showAlert" class = "weather-alert">
      <div class = "alert-content">
        <div id="title-alert-container">
          <h1> Weather Alert Advisory </h1>
        </div>
        <div id = "text-alert-container">
          <p class = "eventText">{{eventAlert}}</p>
          <p class = "senderText">{{senderName}}</p>
          <p id = "descriptionText">{{description.slice(0, 150)}}...</p>
          <button id = "expandAlert" @click="expandAlert">Expand Alert</button>
        </div>
        <button id = "closeAlert" @click="closeAlert">Close Alert</button>
      </div>
    </div>
</template>

<script>
export default {
  name: "WeatherPopup",
  props: {
    showAlert: {
      type: Boolean,
      required: true,
    },
    senderName: {
      type: String,
      required: true,
    },
    eventAlert: {
      type: String,
      required: true,
    },
    description: {
      type: String,
      required: true,
    },
  },
  methods: {
    closeAlert() {
      this.$emit("close-alert");
    },
    expandAlert() {
      if (document.getElementById("expandAlert").innerHTML === "Expand Alert") {
        document.getElementById("descriptionText").innerHTML = this.description;
        document.getElementById("expandAlert").style.backgroundColor = "rgba(225,61,61,0.82)";
        document.getElementById("expandAlert").innerHTML = "Minimize Alert"
      } else if (document.getElementById("expandAlert").innerHTML === "Minimize Alert") {
        document.getElementById("descriptionText").innerHTML = this.description.slice(0, 150);
        document.getElementById("expandAlert").innerHTML = "Expand Alert"
        document.getElementById("expandAlert").style.backgroundColor = "#28882b";
      }
    }
  },
}
</script>

<style scoped>
.weather-alert {
  z-index: 6;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  overflow: hidden;
  background-color: rgba(0, 0, 0, 0.5);
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
}

.alert-content {
  background-color: #264653;
  color: rgba(255, 255, 255, 0.869);
  width: auto;
  max-width: 85%;
  height: auto;
  max-height: 85%;
  padding: 2rem;
  border-radius: 5px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
}

#title-alert-container {
  display: flex;
  width: 100%;
  justify-content: center;
}



h1 {
  font-size: 2.5em;
  font-weight: bold;
  padding-bottom: 5px;
}

.eventText {
  padding-top: 15px;
  font-size: 2em;
}

.senderText {
  padding-top: 25px;
  padding-bottom: 15px;
  font-size: 1.2em;
  border-bottom: 5px solid rgba(255, 255, 255, 0.869);
}

#descriptionText {
  word-break: break-word;
  word-wrap: break-word;
  white-space: pre;
  font-size: 20px;
  padding: 20px
}

@media only screen and (max-width: 1000px) {
  .alert-content {
    background-color: #264653;
    color: rgba(255, 255, 255, 0.869);
    width: auto;
    max-width: 85%;
    height: auto;
    max-height: 85%;
    padding: 2rem;
    border-radius: 5px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
    overflow: scroll;
    overflow-x: hidden;
  }


  #descriptionText {
    word-break: break-word;
    word-wrap: break-word;
    white-space: normal;
    font-size: 20px;
    padding: 20px
  }

  #expandAlert {
    background-color: #28882b;
    margin-top: 1.7rem;
    cursor: pointer;
    border-radius: 5px;
    font-size: 20px;
    height: 3.0rem;
    width: 15rem;
    color: #ffffff

  }

  #closeAlert{
    margin-top: 1.8rem;
    cursor: pointer;
    border-radius: 5px;
    font-size: 20px;
    height: 4rem;
    width: 15rem;
  }

}

@media only screen and (max-height: 1000px) {
  .alert-content {
    background-color: #264653;
    color: rgba(255, 255, 255, 0.869);
    width: auto;
    max-width: 85%;
    height: auto;
    max-height: 85%;
    padding: 2rem;
    border-radius: 5px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
    overflow: scroll;
    overflow-x: hidden;

  #expandAlert {
    background-color: #28882b;
    margin-top: 1.7rem;
    cursor: pointer;
    border-radius: 5px;
    font-size: 20px;
    height: 3.0rem;
    width: 15rem;
    color: #ffffff

  }

  #closeAlert{
    margin-top: 1.8rem;
    cursor: pointer;
    border-radius: 5px;
    font-size: 20px;
    height: 4rem;
    width: 15rem;
  }

}

  #descriptionText {
    word-break: break-word;
    word-wrap: break-word;
    white-space: normal;
    font-size: 20px;
    padding: 20px
  }
}


#expandAlert {
  background-color: #28882b;
  margin-top: 1.7rem;
  cursor: pointer;
  border-radius: 5px;
  font-size: 20px;
  height: 3.0rem;
  width: 20rem;
  color: #ffffff

}

#closeAlert{
  margin-top: 1.8rem;
  cursor: pointer;
  border-radius: 5px;
  font-size: 20px;
  height: 4rem;
  width: 20rem;
}


</style>
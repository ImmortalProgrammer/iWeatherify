import Vue from "vue";
import App from "./App.vue";
import router from "./router";
import "../styleguide.css"
import "../globals.css"

Vue.config.productionTip = false;

new Vue({
  render: h => h(App),
  router
}).$mount("#app");

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition, positionError);
  } else {
    console.log("iWeatherify is not supported by this browser.");
  }
}

function showPosition(position) {
  console.log("Your position is: " + position);
}

function positionError(error) {
  if (error.PERMISSION_DENIED) {
    console.log("Error: permission denied");
    showError('Location Feature is not enabled. Please enable to use this feature.');
  } else {
    console.log("Other kind of error: " + error);
  }
}

function showError(message) {

}

getLocation();

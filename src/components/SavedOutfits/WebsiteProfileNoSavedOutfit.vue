<template>
  <div class="container-center-horizontal">
    <nav-bar></nav-bar>
    <div class="website-profile-no-saved-outfit screen">
      <div class="overlap-group3">
        <div class="overlap-group4">
          <div class="overlap-group2">
            <h1 class="title ui---30-semi">Saved Outfits</h1>
            <listbox-component />
          </div>
          <img
            class="undraw_weather_app_re_kcb1-1"
            src="https://anima-uploads.s3.amazonaws.com/projects/6405ee9a4548b3806a50e138/releases/6405ef8c246cb8c2cd3b302a/img/undraw-weather-app-re-kcb1-1.svg"
            alt="undraw_weather_app_re_kcb1 1"
          />
          <ellipse6 :src="ellipse6Props.src" />
          <div class="overlap-group1"><img class="plus-math" :src="plusMath" alt="Plus Math" /></div>
          <input-field />
        </div>
      </div>
      <div class="group-41">
        <p class="no-saved-outfits-try-saving-one ui---16-regular">No saved outfits, try saving one!</p>
      </div>
    </div>
  </div>

</template>

<script>
import ListboxComponent from "./ListboxComponent";
import InputField from "./InputField";
import NavBar from "@/NavBar/NavBar.vue";
export default {
  name: "WebsiteProfileNoSavedOutfit",
  components: {
    NavBar,
    ListboxComponent,
    InputField,
  },
  props: ["plusMath", "defaultFrameLogo3", "ellipse6Props"],
};
</script>

<style scoped>
@import url("https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css");
@import url("https://fonts.googleapis.com/css?family=Montserrat:400,500|Inter:400,700,500,600|PT+Mono:400");
/* The following line is used to measure usage of this code in production. For more info see our usage billing page */
@import url("https://px.animaapp.com/6405ee99331c8a40850ac606.6405ee9ad144788be20d5c18.NXDGJzF.vcp.png");
.screen a {
  display: contents;
  text-decoration: none;
}
.container-center-horizontal {
  display: flex;
  flex-direction: row;
  justify-content: center;
  pointer-events: none;
  width: 100%;
}
.container-center-horizontal > * {
  flex-shrink: 0;
  pointer-events: auto;
}
* {
  box-sizing: border-box;
}
:root { 
  --black: #000000;
  --blue-secondary: #2a9d8f;
  --gray01: #f6f6f6;
  --gray04: #666666;
  --white: #ffffff;
 
  --font-size-l: 30px;
  --font-size-m: 16px;
  --font-size-s: 14px;
 
  --font-family-inter: "Inter", Helvetica;
  --font-family-montserrat: "Montserrat", Helvetica;
  --font-family-pt_mono: "PT Mono", Helvetica;
}
.ui---30-semi {
  font-family: var(--font-family-inter);
  font-size: var(--font-size-l);
  font-style: normal;
  font-weight: 600;
  letter-spacing: 0;
}
.ui---16-regular {
  font-family: var(--font-family-inter);
  font-size: var(--font-size-m);
  font-style: normal;
  font-weight: 400;
  letter-spacing: 0;
}
.ui---14-regular {
  font-family: var(--font-family-inter);
  font-size: var(--font-size-s);
  font-style: normal;
  font-weight: 400;
  letter-spacing: 0;
}
/* Small Screen */
@media screen and (min-width: 769px) and (max-width: 1024px) {
  :root { 
    --black: #000000;
    --blue-secondary: #2a9d8f;
    --gray01: #f6f6f6;
    --gray04: #666666;
    --white: #ffffff;
   
    --font-size-l: 55px;
    --font-size-m: 36px;
    --font-size-s: 14px;
   
    --font-family-inter: "Inter", Helvetica;
    --font-family-montserrat: "Montserrat", Helvetica;
    --font-family-pt_mono: "PT Mono", Helvetica;
  }
}
/* Tablet */
@media screen and (min-width: 481px) and (max-width: 768px) {
  :root { 
    --black: #000000;
    --blue-secondary: #2a9d8f;
    --gray01: #f6f6f6;
    --gray04: #666666;
    --white: #ffffff;
   
    --font-size-l: 55px;
    --font-size-m: 36px;
    --font-size-s: 14px;
   
    --font-family-inter: "Inter", Helvetica;
    --font-family-montserrat: "Montserrat", Helvetica;
    --font-family-pt_mono: "PT Mono", Helvetica;
  }
}
/* Smart Phone */
@media screen and (min-width: 200px) and (max-width: 480px) {
  :root { 
    --black: #000000;
    --blue-secondary: #2a9d8f;
    --gray01: #f6f6f6;
    --gray04: #666666;
    --white: #ffffff;
   
    --font-size-l: 70px;
    --font-size-m: 46px;
    --font-size-s: 14px;
   
    --font-family-inter: "Inter", Helvetica;
    --font-family-montserrat: "Montserrat", Helvetica;
    --font-family-pt_mono: "PT Mono", Helvetica;
  }
}
.website-profile-no-saved-outfit {
  align-items: flex-end;
  background-color: var(--white);
  border: 1px none;
  display: flex;
  flex-direction: column;
  gap: 35px;
  height: 1440px;
  padding: 49px 59px;
  width: 1440px;
}
.overlap-group3 {
  height: 596px;
  position: relative;
  width: 1279px;
}
.overlap-group4 {
  height: 596px;
  left: 0;
  position: absolute;
  top: 0;
  width: 1279px;
}
.overlap-group2 {
  height: 319px;
  left: 272px;
  position: absolute;
  top: 44px;
  width: 1007px;
}
.title {
  color: var(--black);
  font-weight: 600;
  left: 0;
  line-height: normal;
  position: absolute;
  text-align: center;
  top: 0;
  width: 706px;
}
.vector {
  cursor: pointer;
  height: 41px;
  left: 1236px;
  position: absolute;
  top: 4px;
  width: 41px;
}
.undraw_weather_app_re_kcb1-1 {
  height: 361px;
  left: 380px;
  position: absolute;
  top: 235px;
  width: 490px;
}
.overlap-group1 {
  align-items: flex-end;
  background-color: var(--gray01);
  display: flex;
  height: 240px;
  justify-content: flex-end;
  left: 0;
  min-width: 343px;
  padding: 69px 121px;
  position: absolute;
  top: 226px;
}
.plus-math {
  cursor: pointer;
  height: 96px;
  width: 96px;
}
.add {
  color: var(--blue-secondary);
  cursor: pointer;
  font-weight: 400;
  left: 230px;
  line-height: normal;
  position: absolute;
  text-align: right;
  top: 430px;
}
.default-frame-logo-3 {
  height: 60px;
  left: 35px;
  object-fit: cover;
  position: absolute;
  top: 6px;
  width: 201px;
}
.group-41 {
  align-items: flex-start;
  align-self: center;
  display: flex;
  height: 61px;
  margin-left: 0.75px;
  min-width: 747px;
}
.no-saved-outfits-try-saving-one {
  color: var(--black);
  font-weight: 400;
  line-height: normal;
  min-height: 61px;
  text-align: center;
  width: 747px;
}
@media screen and (min-width: 769px) and (max-width: 1024px) {
  .title {
  color: var(--black);
  font-weight: 1000;
  left: 0;
  line-height: normal;
  position: absolute;
  text-align: center;
  top: 0;
  width: 706px;
}
.overlap-group2 {
  height: 1000px;
  left: 235px;
  position: absolute;
  top: 100px;
  width: 1000px;
}
.no-saved-outfits-try-saving-one {
  color: var(--black);
  font-size: 1rem;
  font-weight: 400;
  line-height: normal;
  min-height: 61px;
  text-align: center;
  width: 747px;
}
/* Text under Illustration */
.group-41 {
  align-items: flex-start;
  align-self: center;
  display: flex;
  height: 81px;
  margin-top: -45px;
  margin-left: -35px;
  min-width: 747px;
}
/* Hamburger Menu */
.vector {
  cursor: pointer;
  height: 115px;
  left: 351px;
  position: absolute;
  top: 135px;
  width: 115px;
}
/* Illustration */
.undraw_weather_app_re_kcb1-1 {
  height: 440px;
  left: 390px;
  position: absolute;
  top: 155px;
  width: 440px;
}
/* Add Outfits Box  */
.overlap-group1 {
 display: none;
}
/* Add Outfits Entirety */
.plus-math {
  display: none;
}
/* Add text under the Add Outfits Box */
.add {
  display: none;
}
/* Logo */
.default-frame-logo-3 {
  height: 120px;
  left: 700px;
  object-fit: cover;
  position: absolute;
  top: 150px;
  width: 400px;
}  
}
@media screen and (min-width: 481px) and (max-width: 768px) {
.title {
  color: var(--black);
  font-weight: 1000;
  left: 0;
  line-height: normal;
  position: absolute;
  text-align: center;
  top: 0;
  width: 706px;
}
.overlap-group2 {
  height: 1000px;
  left: 235px;
  position: absolute;
  top: 110px;
  width: 1000px;
}
.no-saved-outfits-try-saving-one {
  color: var(--black);
  font-size: 1rem;
  font-weight: 400;
  line-height: normal;
  min-height: 61px;
  text-align: center;
  width: 747px;
}
/* Text under Illustration */
.group-41 {
  align-items: flex-start;
  align-self: center;
  display: flex;
  height: 61px;
  margin-top: -45px;
  margin-left: -25px;
  min-width: 747px;
}
/* Hamburger Menu */
.vector {
  cursor: pointer;
  height: 115px;
  left: 511px;
  position: absolute;
  top: 135px;
  width: 115px;
}
/* Illustration */
.undraw_weather_app_re_kcb1-1 {
  height: 440px;
  left: 385px;
  position: absolute;
  top: 155px;
  width: 440px;
}
/* Add Outfits Box  */
.overlap-group1 {
 display: none;
}
/* Add Outfits Entirety */
.plus-math {
  display: none;
}
/* Add text under the Add Outfits Box */
.add {
  display: none;
}
/* Logo */
.default-frame-logo-3 {
  height: 120px;
  left: 780px;
  object-fit: cover;
  position: absolute;
  top: 150px;
  width: 400px;
}
}
@media screen and (min-width: 200px) and (max-width: 480px) {
.title {
  color: var(--black);
  font-weight: 1000;
  left: 0;
  line-height: normal;
  position: absolute;
  text-align: center;
  top: 0;
  width: 706px;
}
/* Saved Outfits Text */
.overlap-group2 {
  height: 1000px;
  left: 625px;
  position: absolute;
  top: 400px;
  width: 1000px;
}
.no-saved-outfits-try-saving-one {
  color: var(--black);
  font-size: 1rem;
  font-weight: 400;
  line-height: normal;
  min-height: 61px;
  text-align: center;
  width: 747px;
}
/* Text under Illustration */
.group-41 {
  align-items: flex-start;
  align-self: center;
  display: flex;
  height: 61px;
  margin-top: 724px;
  margin-left: 770px;
  min-width: 747px;
}
/* Hamburger Menu */
.vector {
  cursor: pointer;
  height: 115px;
  left: 511px;
  position: absolute;
  top: 135px;
  width: 115px;
}
/* Illustration */
.undraw_weather_app_re_kcb1-1 {
  height: 740px;
  left: 635px;
  position: absolute;
  top: 575px;
  width: 740px;
}
/* Add Outfits Box  */
.overlap-group1 {
 display: none;
}
/* Add Outfits Entirety */
.plus-math {
  display: none;
}
/* Add text under the Add Outfits Box */
.add {
  display: none;
}
/* Logo */
.default-frame-logo-3 {
  height: 150px;
  left: 715px;
  object-fit: cover;
  position: absolute;
  top: 150px;
  width: 540px;
}
}
</style>
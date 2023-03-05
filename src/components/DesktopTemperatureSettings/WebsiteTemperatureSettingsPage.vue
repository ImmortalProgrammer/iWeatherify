<template>
    <div class="container-center-horizontal">
      <div class="website-temperature-settings-page screen">
        <img class="default-logo-3" :src="defaultLogo3" alt="Default Logo 3" />
        <div class="flex-col">
          <h1 class="title-3 ui---30-semi">{{ title }}</h1>
          <div class="flex-row-3">
            <div class="overlap-group-3">
              <img
                class="background"
                src="https://anima-uploads.s3.amazonaws.com/projects/6402851d6a37db7167320ed4/releases/640286bb66ed049392a82543/img/background-1.svg"
                alt="Background"
              />
              <div class="text-2 ui---30-semi" v-html="text1"></div>
            </div>
            <div class="hot-warm-just-right-1 ui---30-regular" v-html="hotWarmJustRight"></div>
          </div>
        </div>
        <ellipse6 :src="ellipse6Props.src" :className="ellipse6Props.className" />
        <img
          class="vector-3"
          src="https://anima-uploads.s3.amazonaws.com/projects/6402851d6a37db7167320ed4/releases/64028608c9953e08464983be/img/vector-1.svg"
          alt="Vector"
        />
      </div>
    </div>
  </template>
  
  <script>
  import Ellipse6 from "./Ellipse6";
  export default {
    name: "WebsiteTemperatureSettingsPage",
    components: {
      Ellipse6,
    },
    props: ["defaultLogo3", "title", "text1", "hotWarmJustRight", "ellipse6Props"],
  };
  </script>
  
  <style>
  .website-temperature-settings-page {
    align-items: flex-start;
    background-color: var(--white);
    border: 1px none;
    display: flex;
    height: 1024px;
    padding: 19px 61px;
    position: relative;
    width: 1440px;
  }
  .default-logo-3 {
    height: 71px;
    margin-left: 76px;
    margin-top: 18px;
    object-fit: cover;
    width: 212px;
  }
  .flex-col {
    align-items: center;
    display: flex;
    flex-direction: column;
    gap: 16px;
    margin-left: 25px;
    margin-top: 74px;
    min-height: 912px;
    width: 706px;
  }
  .title-3 {
    color: var(--black);
    font-weight: 600;
    line-height: normal;
    min-height: 41px;
    text-align: center;
    width: 706px;
  }
  .flex-row-3 {
    align-items: center;
    display: flex;
    gap: 16px;
    margin-right: 14px;
    min-width: 470px;
  }
  .overlap-group-3 {
    background-image: url(https://anima-uploads.s3.amazonaws.com/projects/6402851d6a37db7167320ed4/releases/640286bb66ed049392a82543/img/background.svg);
    background-size: 100% 100%;
    height: 855px;
    position: relative;
    width: 86px;
  }
  .background {
    height: 498px;
    left: 0;
    position: absolute;
    top: 357px;
    width: 86px;
  }
  .text-2 {
    color: var(--black);
    font-weight: 600;
    left: 3px;
    line-height: normal;
    position: absolute;
    text-align: center;
    top: 20px;
    width: 83px;
  }
  .hot-warm-just-right-1 {
    color: var(--black);
    font-weight: 400;
    line-height: normal;
    margin-bottom: 2px;
    min-height: 823px;
    text-align: center;
    width: 368px;
  }
  .vector-3 {
    height: 41px;
    margin-left: 25px;
    margin-top: 34px;
    width: 41px;
  }
  </style>
<template>
  <div class="container-center-horizontal">
    <div class="mobile-temperature screen">
      <ios-status-bar-black
        :leftSide="iosStatusBarBlackProps.leftSide"
        :battery="iosStatusBarBlackProps.battery"
        :className="iosStatusBarBlackProps.className"
      />
      <div class="flex-row">
        <img
          class="vector-1"
          src="https://anima-uploads.s3.amazonaws.com/projects/6402851d6a37db7167320ed4/releases/640285252652d48db0de9030/img/vector.svg"
          alt="Vector"
        />
        <h1 class="title-1 inter-bold-black-30px">{{ title }}</h1>
      </div>
      <p class="set-your-preference">{{ setYourPreference }}</p>
      <div class="flex-row-1 ui---30-regular">
        <div class="overlap-group1-1">
          <div class="rectangle-256"></div>
          <div class="text-1" v-html="text1"></div>
        </div>
        <div class="hot-warm-just-right" v-html="hotWarmJustRight"></div>
      </div>
    </div>
  </div>
</template>

<script>
import IosStatusBarBlack from "./IosStatusBarBlack";
export default {
  name: "MobileTemperature",
  components: {
    IosStatusBarBlack,
  },
  props: ["title", "setYourPreference", "text1", "hotWarmJustRight", "iosStatusBarBlackProps"],
};
</script>

<style>
.mobile-temperature {
  align-items: flex-end;
  background-color: var(--white);
  border: 1px none;
  display: flex;
  flex-direction: column;
  height: 812px;
  overflow: hidden;
  position: relative;
  width: 375px;
}

.flex-row {
  align-items: flex-start;
  align-self: center;
  display: flex;
  gap: 19px;
  height: 36px;
  margin-right: 41px;
  margin-top: 18px;
  min-width: 268px;
}

.vector-1 {
  height: 22px;
  margin-top: 1px;
  width: 22px;
}

.title-1 {
  letter-spacing: 0;
  line-height: normal;
  min-height: 36px;
  text-align: center;
  width: 227px;
}

.set-your-preference {
  color: var(--black);
  font-family: var(--font-family-inter);
  font-size: var(--font-size-l);
  font-weight: 400;
  letter-spacing: 0;
  line-height: normal;
  margin-right: 1px;
  margin-top: 19px;
  min-height: 37px;
  text-align: center;
  width: 375px;
}

.flex-row-1 {
  align-items: center;
  display: flex;
  gap: 12px;
  margin-right: 4px;
  margin-top: 20px;
  min-width: 339px;
}

.overlap-group1-1 {
  height: 606px;
  position: relative;
  width: 92px;
}

.rectangle-256 {
  background-color: var(--alto);
  border-radius: 50px;
  height: 566px;
  left: 6px;
  position: absolute;
  top: 0;
  width: 79px;
}

.text-1 {
  color: var(--black);
  font-weight: 400;
  left: 0;
  line-height: normal;
  position: absolute;
  text-align: center;
  top: 37px;
  width: 92px;
}

.hot-warm-just-right {
  color: var(--black);
  font-weight: 400;
  line-height: normal;
  margin-top: 23px;
  min-height: 555px;
  text-align: center;
  width: 235px;
}
</style>

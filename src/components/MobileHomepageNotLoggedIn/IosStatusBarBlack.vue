<template>
  <div :class="[`i-os-status-bar-black`, className || ``]">
    <img class="left-side" :src="leftSide" alt="Left Side" />
    <div class="overlap-group">
      <img
        class="notch"
        src="https://anima-uploads.s3.amazonaws.com/projects/6402851d6a37db7167320ed4/releases/6402857cc9953e08464983bc/img/notch.svg"
        alt="Notch"
      />
      <div class="right-side">
        <img
          class="icon-bar_chart"
          src="https://anima-uploads.s3.amazonaws.com/projects/6402851d6a37db7167320ed4/releases/640287a2d49a7dd2fb1db11f/img/mobile-signal.svg"
          alt="icon-bar_chart"
        />
        <img
          class="icon-signal"
          src="https://anima-uploads.s3.amazonaws.com/projects/6402851d6a37db7167320ed4/releases/640287a2d49a7dd2fb1db11f/img/wifi.svg"
          alt="icon-signal"
        />
        <img class="battery" :src="battery" alt="Battery" />
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "IosStatusBarBlack",
  props: ["leftSide", "battery", "className"],
};
</script>

<style>
.i-os-status-bar-black {
  align-items: flex-start;
  display: flex;
  gap: 16px;
  height: 44px;
  left: 0;
  padding: 0 14.7px;
  position: absolute;
  top: 0;
  width: 375px;
}

.left-side {
  align-self: center;
  height: 11px;
  margin-left: 19px;
  margin-top: 1.42px;
  width: 28px;
}

.overlap-group {
  height: 29px;
  position: relative;
  width: 282px;
}

.notch {
  height: 28px;
  left: 0;
  position: absolute;
  top: 0;
  width: 219px;
}

.right-side {
  align-items: flex-start;
  display: flex;
  gap: 5px;
  height: 11px;
  justify-content: center;
  left: 216px;
  min-width: 67px;
  position: absolute;
  top: 17px;
}

.icon-bar_chart {
  align-self: center;
  height: 11px;
  margin-top: 0;
  width: 17px;
}

.icon-signal {
  height: 11px;
  margin-top: 0;
  width: 15px;
}

.battery {
  align-self: flex-end;
  height: 11px;
  margin-bottom: 0;
  width: 24px;
}

.i-os-status-bar-black.i-os-status-bar-black-1,
.i-os-status-bar-black.i-os-status-bar-black-2 {
  left: unset;
  position: unset;
  top: unset;
}

.i-os-status-bar-black.i-os-status-bar-black-2 .right-side {
  justify-content: unset;
}
</style>

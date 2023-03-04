<template>
  <div class="container-center-horizontal">
    <div class="mobile-homepage screen">
      <div class="overlap-group3-1">
        <ios-status-bar-black
          :leftSide="iOSStatusBarBlackProps.leftSide"
          :battery="iOSStatusBarBlackProps.battery"
          :className="iOSStatusBarBlackProps.className"
        />
        <div class="flex-row-6">
          <img
            class="vector-6"
            src="https://anima-uploads.s3.amazonaws.com/projects/6402851d6a37db7167320ed4/releases/640285252652d48db0de9030/img/vector.svg"
            alt="Vector"
          />
          <input-search3
            :inputType="inputSearchProps.inputType"
            :inputPlaceholder="inputSearchProps.inputPlaceholder"
          />
        </div>
        <weather3 :place="weatherProps.place" :x45="weatherProps.x45" :h50L40="weatherProps.h50L40" />
        <outfit-of-the-day
          :outfitOfTheDay="outfitOfTheDayProps.outfitOfTheDay"
          :spanText="outfitOfTheDayProps.spanText"
        />
      </div>
    </div>
  </div>
</template>

<script>
import IosStatusBarBlack from "./IosStatusBarBlack";
import InputSearch3 from "./InputSearch3";
import Weather3 from "./Weather3";
import OutfitOfTheDay from "./OutfitOfTheDay";
export default {
  name: "MobileHomepage",
  components: {
    IosStatusBarBlack,
    InputSearch3,
    Weather3,
    OutfitOfTheDay,
  },
  props: ["iOSStatusBarBlackProps", "inputSearchProps", "weatherProps", "outfitOfTheDayProps"],
};
</script>

<style>
.mobile-homepage {
  align-items: flex-start;
  background-color: var(--white);
  border: 1px none;
  display: flex;
  height: 812px;
  width: 375px;
}

.overlap-group3-1 {
  align-items: center;
  background-color: #7fc2ff;
  display: flex;
  flex-direction: column;
  margin-top: 0;
  min-height: 812px;
  padding: 0px 0;
  position: relative;
  width: 375px;
}

.flex-row-6 {
  align-items: center;
  display: flex;
  gap: 35px;
  height: 30px;
  margin-right: 56px;
  margin-top: 5px;
  min-width: 253px;
  position: relative;
}

.vector-6 {
  height: 22px;
  margin-bottom: 0.12px;
  width: 22px;
}
</style>

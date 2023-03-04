<template>
  <div class="container-center-horizontal">
    <div class="mobile-units screen">
      <div class="overlap-group2">
        <div class="overlap-group1">
          <ios-status-bar-black :leftSide="iosStatusBarBlackProps.leftSide" :battery="iosStatusBarBlackProps.battery" />
          <h1 class="title inter-bold-black-30px">{{ title }}</h1>
        </div>
        <img
          class="vector"
          src="https://anima-uploads.s3.amazonaws.com/projects/6402851d6a37db7167320ed4/releases/640285252652d48db0de9030/img/vector.svg"
          alt="Vector"
        />
      </div>
      <table-row />
      <table-row2 />
      <table-row3 />
      <table-row4 />
    </div>
  </div>
</template>

<script>
import IosStatusBarBlack from "./IosStatusBarBlack";
import TableRow from "./TableRow";
import TableRow2 from "./TableRow2";
import TableRow3 from "./TableRow3";
import TableRow4 from "./TableRow4";
export default {
  name: "MobileUnits",
  components: {
    IosStatusBarBlack,
    TableRow,
    TableRow2,
    TableRow3,
    TableRow4,
  },
  props: ["title", "iosStatusBarBlackProps"],
};
</script>

<style>
.mobile-units {
  align-items: center;
  background-color: var(--white);
  border: 1px none;
  display: flex;
  flex-direction: column;
  height: 812px;
  position: relative;
  width: 375px;
}

.overlap-group2 {
  height: 79px;
  position: relative;
  width: 375px;
}

.overlap-group1 {
  height: 79px;
  left: 0;
  position: absolute;
  top: 0;
  width: 375px;
}

.title {
  left: 75px;
  letter-spacing: 0;
  line-height: normal;
  position: absolute;
  text-align: center;
  top: 43px;
  width: 227px;
}

.vector {
  height: 22px;
  left: 33px;
  position: absolute;
  top: 51px;
  width: 22px;
}
</style>

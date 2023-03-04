<template>
  <div class="container-center-horizontal">
    <div class="website-units-page screen">
      <div class="flex-row-2">
        <img class="default-logo-4" :src="defaultLogo4" alt="Default Logo 4" /><ellipse6 :src="ellipse6Props.src" />
        <img
          class="vector-2"
          src="https://anima-uploads.s3.amazonaws.com/projects/6402851d6a37db7167320ed4/releases/64028608c9953e08464983be/img/vector-1.svg"
          alt="Vector"
        />
      </div>
      <h1 class="title-2 inter-bold-black-30px">{{ title }}</h1>
      <table-row :className="tableRow1Props.className" />
      <table-row2 :className="tableRow2Props.className" />
      <table-row3 :className="tableRow3Props.className" />
      <table-row4 :className="tableRow4Props.className" />
    </div>
  </div>
</template>

<script>
import Ellipse6 from "./Ellipse6";
import TableRow from "./TableRow";
import TableRow2 from "./TableRow2";
import TableRow3 from "./TableRow3";
import TableRow4 from "./TableRow4";
export default {
  name: "WebsiteUnitsPage",
  components: {
    Ellipse6,
    TableRow,
    TableRow2,
    TableRow3,
    TableRow4,
  },
  props: [
    "defaultLogo4",
    "title",
    "ellipse6Props",
    "tableRow1Props",
    "tableRow2Props",
    "tableRow3Props",
    "tableRow4Props",
  ],
};
</script>

<style>
.website-units-page {
  align-items: center;
  background-color: var(--white);
  border: 1px none;
  display: flex;
  flex-direction: column;
  height: 1024px;
  padding: 38px 61px;
  position: relative;
  width: 1440px;
}

.flex-row-2 {
  align-items: center;
  align-self: flex-end;
  display: flex;
  min-width: 1303px;
  position: relative;
}

.default-logo-4 {
  height: 71px;
  object-fit: cover;
  width: 212px;
}

.vector-2 {
  height: 41px;
  margin-left: 30px;
  width: 41px;
}

.title-2 {
  letter-spacing: 0;
  line-height: normal;
  margin-left: 3px;
  margin-top: 67px;
  min-height: 104px;
  text-align: center;
  width: 657px;
}
</style>

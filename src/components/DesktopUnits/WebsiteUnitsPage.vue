<template>
  <div class="container-center-horizontal">
    <div class="website-units-page screen">
      <div>
        <img class="default-logo-4" :src="defaultLogo4" alt="Default Logo 4" />
        <img img class="profile-img" :src="ellipse6Props.src" />
        <img
          class="vector-2"
          src="https://anima-uploads.s3.amazonaws.com/projects/6402851d6a37db7167320ed4/releases/64028608c9953e08464983be/img/vector-1.svg"
          alt="Vector"
        />
      </div>
      <div class="unit-container">
        <h1 class="title">{{ title }}</h1>
        <div class="row-format-container">
          <table-row :className="tableRow1Props.className" />
          <table-row2 :className="tableRow2Props.className" />
          <table-row3 :className="tableRow3Props.className" />
          <table-row4 :className="tableRow4Props.className" />
        </div>
      </div>
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
  position: relative;
  width: 100%; 
  height: 100vh;
  background: #FFFFFF;
}

.default-logo-4 {
  position: absolute;
  max-width: 100%;
  width: 10vw;
  height: auto;
  left: 5.8333vw;
  top: 3vh;
  object-fit: cover;
}

.vector-2 {
  position: absolute;
  width: 4vw;
  height: auto;
  left: 93vw;
  top: 3vh;
  object-fit: cover;
}

.profile-img {
  position: absolute;
  width: 6vw;
  height: auto;
  left: 87vw; 
  top: 3vh;
  object-fit: cover;
}

.title {
  position: absolute;
  color: var(--black);
  left: 6vw;
  width: 25vw;
  height: 3em;
  line-height: 2.5vw;
  text-align: center;
  font-weight: 600;
  font-size: 2vw;
  font-family: 'Inter';
  font-style: normal;
}

.unit-container {
  position: absolute;
  left: 35vw;
  top: 10vh;
  height: auto;
}

.row-format-container {
  position: absolute;
  top: 10vh;
}
</style>

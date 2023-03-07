<template>
  <div class="weather">
    <div class="overlap-group-4">
      <div class="text-3 inter-normal-black-96px">45°</div>
      <p class="h-50-l40 ui---16-regular">
        H: 50° L:40°<br />Feels like: 40°
      </p>
    </div>
    <div class ="NewYork" style = "margin-left: 16px; margin-top: 0px;">New York</div>
  </div>
</template>

<script>
export default {
  name: "Weather",
  props: [],
};
</script>

<style>
.NewYork {
  font-family: var(--font-family-inter);
  font-size: 33px;
  font-style: normal;
  font-weight: 400;
}
.weather {
  height: 186px;
  left: 329px;
  position: absolute;
  top: 310px;
  width: 189px;
}

.overlap-group-4 {
  height: 155px;
  left: 9px;
  position: absolute;
  top: 30px;
  width: 180px;
}

.text-3 {
  left: 0;
  letter-spacing: 0;
  line-height: normal;
  position: absolute;
  text-align: center;
  top: 0;
  width: 180px;
}

.h-50-l40 {
  color: var(--black);
  font-weight: 400;
  left: 3px;
  line-height: normal;
  position: absolute;
  text-align: center;
  top: 112px;
  width: 139px;
}

.place {
  color: var(--black);
  font-weight: 400;
  left: 0;
  line-height: normal;
  position: absolute;
  text-align: center;
  top: -1px;
  width: 172px;
}
@media only screen and (min-width: 880px) and (max-width: 1300px) {
  .weather {
    left: 615px;
    top: 220px;
  }
}

@media only screen and (min-width: 533px) and (max-width: 879px) {
  .weather {
    left: 615px;
    top: 180px;
  }
}

@media only screen and (min-width: 300px) and (max-width: 533px) {
  .weather {
    left: 615px;
    top: 150px;
    scale: 0.85;
  }
}

</style>

<template>
  <div class="weather-1">
    <h1 class="place-1 ui---30-regular">{{ place }}</h1>
    <div class="overlap-group1-3">
      <div class="x45 inter-normal-black-96px">{{ x45 }}</div>
      <div class="h-50-l40-1 ui---16-regular">{{ h50L40 }}</div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Weather3",
  props: ["place", "x45", "h50L40"],
};
</script>

<style>
.weather-1 {
  align-items: flex-start;
  display: flex;
  flex-direction: column;
  margin-left: 2px;
  margin-top: 53px;
  min-height: 186px;
  width: 189px;
}

.place-1 {
  color: var(--black);
  font-weight: 400;
  line-height: normal;
  margin-top: -1px;
  min-height: 31px;
  text-align: center;
  width: 172px;
}

.overlap-group1-3 {
  align-self: flex-end;
  height: 155px;
  position: relative;
  width: 180px;
}

.x45 {
  left: 0;
  letter-spacing: 0;
  line-height: normal;
  position: absolute;
  text-align: center;
  top: 0;
  width: 180px;
}

.h-50-l40-1 {
  color: var(--black);
  font-weight: 400;
  left: 3px;
  line-height: normal;
  position: absolute;
  text-align: center;
  top: 112px;
  width: 139px;
}
</style>

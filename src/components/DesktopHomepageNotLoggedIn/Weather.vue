<template>
  <div class="weather">
    <div class="overlap-group-4">
      <div class="text-3 inter-normal-black-96px">{{ text1 }}</div>
      <p class="h-50-l40 ui---16-regular" v-html="h50L40"></p>
    </div>
    <div class="place ui---30-regular">{{ place }}</div>
  </div>
</template>

<script>
export default {
  name: "Weather",
  props: ["text1", "h50L40", "place"],
};
</script>

<style>
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
</style>

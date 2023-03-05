<template>
  <article class="weather-throughout-the-day">
    <div class="flex-row-5">
      <now :now="now1Props.now" :className="now1Props.className" />
      <now :now="now2Props.now" :className="now2Props.className" />
      <now :now="now3Props.now" :className="now3Props.className" />
    </div>
  </article>
</template>

<script>
import Now from "./Now";
export default {
  name: "WeatherThroughoutTheDay",
  components: {
    Now,
  },
  props: ["now1Props", "now2Props", "now3Props"],
};
</script>

<style>

.flex-row-5 {
  align-items: flex-start;
  display: flex;
  height: 104px;
  min-width: 216px;
  position: relative;
}
</style>

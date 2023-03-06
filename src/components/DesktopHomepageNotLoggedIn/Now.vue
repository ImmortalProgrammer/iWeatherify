<template>
  <article :class="[`now`, className || ``]">
    <div class="now-1 inter-medium-black-16px">{{ now }}</div>
    <img
      class="fluentweather-rain-s"
      src="https://anima-uploads.s3.amazonaws.com/projects/6402851d6a37db7167320ed4/releases/64028608c9953e08464983be/img/fluent-weather-rain-showers-day-24-regular.svg"
      alt="fluent:weather-rain-showers-day-24-regular"
    />
    <div class="group-2">
      <div class="overlap-group2-1">
        <div class="overlap-group1-2">
          <div class="number inter-normal-black-12px">20</div>
          <div class="degree"></div>
        </div>
        <div class="text inter-normal-black-12px">/</div>
      </div>
      <div class="overlap-group-5">
        <div class="number inter-normal-black-12px">24</div>
        <div class="degree"></div>
      </div>
    </div>
    <div class="x74-rain inter-normal-black-12px">74% rain</div>
  </article>
</template>

<script>
export default {
  name: "Now",
  props: ["now", "className"],
};
</script>

<style>
.now {
  align-items: center;
  display: flex;
  flex-direction: column;
  height: 104px;
  padding: 7px 0;
  width: 72px;
}

.now-1 {
  letter-spacing: -0.24px;
  line-height: 19.2px;
  margin-right: 1px;
  min-width: 35px;
  white-space: nowrap;
}

.fluentweather-rain-s {
  height: 24px;
  margin-top: 10px;
  width: 24px;
}

.group-2 {
  align-items: flex-start;
  display: flex;
  gap: 1px;
  height: 14px;
  margin-left: 2px;
  margin-top: 4px;
  min-width: 46px;
}

.overlap-group2-1 {
  height: 15px;
  margin-top: -1px;
  position: relative;
  width: 24px;
}

.overlap-group1-2 {
  height: 15px;
  left: 0;
  position: absolute;
  top: 0;
  width: 20px;
}

.number {
  left: 0;
  letter-spacing: -0.24px;
  line-height: 14.4px;
  position: absolute;
  top: 1px;
  white-space: nowrap;
}

.degree {
  border: 1px solid;
  border-color: var(--black);
  border-radius: 3px;
  height: 6px;
  left: 14px;
  position: absolute;
  top: 0;
  width: 6px;
}

.text {
  left: 19px;
  letter-spacing: -0.24px;
  line-height: 14.4px;
  position: absolute;
  top: 1px;
  white-space: nowrap;
}

.overlap-group-5 {
  height: 15px;
  margin-top: -1px;
  position: relative;
  width: 20px;
}

.x74-rain {
  letter-spacing: -0.24px;
  line-height: 14.4px;
  margin-right: 1px;
  margin-top: 3px;
  min-width: 47px;
  white-space: nowrap;
}

.now.now-2,
.now.now-8,
.now.now-10 {
  align-items: flex-end;
  padding: 7px 11px;
}

.now.now-2 .now-1,
.now.now-8 .now-1,
.now.now-10 .now-1 {
  margin-right: unset;
  min-width: 43px;
}

.now.now-2 .fluentweather-rain-s,
.now.now-8 .fluentweather-rain-s,
.now.now-10 .fluentweather-rain-s {
  margin-right: 13px;
}

.now.now-2 .group-2,
.now.now-8 .group-2,
.now.now-10 .group-2 {
  margin-left: unset;
  margin-right: 1px;
}

.now.now-2 .x74-rain,
.now.now-8 .x74-rain,
.now.now-10 .x74-rain {
  align-self: center;
}

.now.now-4 .now-1 {
  margin-left: 4px;
  margin-right: unset;
  min-width: 40px;
}

.now.now-6 .now-1,
.now.now-12 .now-1,
.now.now-14 .now-1 {
  margin-left: 6px;
  margin-right: unset;
  min-width: 42px;
}

.now.now-16 .now-1 {
  margin-left: 5px;
  margin-right: unset;
  min-width: 41px;
}
</style>

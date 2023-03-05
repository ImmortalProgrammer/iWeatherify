<template>
  <div class="outfit-of-the-day ui---16-regular">
    <p class="outfit-of-the-day-1">{{ outfitOfTheDay }}</p>
    <div class="overlap-group2-2">
      <div class="rectangle-242"></div>
      <img
        class="line-81"
        src="https://anima-uploads.s3.amazonaws.com/projects/6402851d6a37db7167320ed4/releases/640285252652d48db0de9030/img/line-81.svg"
        alt="Line 81"
      />
      <img
        class="line-82"
        src="https://anima-uploads.s3.amazonaws.com/projects/6402851d6a37db7167320ed4/releases/640285252652d48db0de9030/img/line-82.svg"
        alt="Line 82"
      />
    </div>
    <p class="consider-wearing">
      <span class="ui---16-regular">{{ spanText }}</span>
    </p>
  </div>
</template>

<script>
export default {
  name: "OutfitOfTheDay",
  props: ["outfitOfTheDay", "spanText"],
};
</script>

<style>
.outfit-of-the-day {
  align-items: flex-start;
  display: flex;
  flex-direction: column;
  margin-left: 3px;
  margin-top: 35px;
  min-height: 401px;
  width: 326px;
}

.outfit-of-the-day-1 {
  color: var(--black);
  font-weight: 400;
  line-height: normal;
  margin-left: 2px;
  margin-top: -1px;
  min-height: 24px;
  width: 324px;
}

.overlap-group2-2 {
  height: 243px;
  margin-top: 1px;
  position: relative;
  width: 323px;
}

.rectangle-242 {
  background-color: var(--alto);
  height: 242px;
  left: 0;
  position: absolute;
  top: 0;
  width: 322px;
}

.line-81 {
  height: 241px;
  left: 0;
  object-fit: cover;
  position: absolute;
  top: 1px;
  width: 323px;
}

.line-82 {
  height: 243px;
  left: 0;
  object-fit: cover;
  position: absolute;
  top: 0;
  width: 322px;
}

.consider-wearing {
  color: var(--black);
  font-weight: 400;
  line-height: normal;
  margin-left: 1px;
  margin-top: 9px;
  min-height: 95px;
  width: 320px;
}
</style>

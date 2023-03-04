<template>
  <div class="right-content">
    <div class="label-2 inter-normal-ship-gray-17px">°F</div>
    <img
      class="right-content-1"
      src="https://anima-uploads.s3.amazonaws.com/projects/6402851d6a37db7167320ed4/releases/640286bb66ed049392a82543/img/right-content.svg"
      alt="Right Content"
    />
  </div>
</template>

<script>
export default {
  name: "RightContent",
};
</script>

<style>
.right-content,
.right-content-2 {
  align-items: center;
  align-self: stretch;
  display: flex;
  gap: 12px;
  position: relative;
  width: fit-content;
}

.label-2,
.label-3 {
  letter-spacing: -0.41px;
  line-height: 22px;
  position: relative;
  white-space: nowrap;
  width: fit-content;
}

.right-content-1,
.right-content-3 {
  align-self: stretch;
  height: 44px;
  min-width: 8.12px;
  position: relative;
}
</style>

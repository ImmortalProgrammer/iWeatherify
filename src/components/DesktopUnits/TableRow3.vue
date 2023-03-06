<template>
  <div :class="[`table-row-4`, className || ``]">
    <div class="content-4">
      <div class="left-content-4"><div class="label-8 inter-normal-black-17px">Pressure</div></div>
      <right-content3 />
    </div>
    <img
      class="separator-2"
      src="https://anima-uploads.s3.amazonaws.com/projects/6402851d6a37db7167320ed4/releases/640287c04c9ddca04e2b1958/img/separator.svg"
      alt="Separator"
    />
  </div>
</template>

<script>
import RightContent3 from "./RightContent3";
export default {
  name: "TableRow3",
  components: {
    RightContent3,
  },
  props: ["className"],
};
</script>

<style>
.table-row-4 {
  position: relative;
  align-items: flex-start;
  background-color: var(--white);
  display: flex;
  flex-direction: column;
  margin-left: 1px;
  padding: 0px 0px 0px 16px;
  width: 338px;
}

.content-4 {
  align-items: flex-start;
  align-self: stretch;
  display: flex;
  gap: 8px;
  padding: 0px 16px 0px 0px;
  position: relative;
}

.left-content-4 {
  align-items: flex-start;
  display: flex;
  flex: 1;
  gap: 10px;
  padding: 11px 0px;
  position: relative;
}

.label-8 {
  flex: 1;
  letter-spacing: -0.41px;
  line-height: 22px;
  margin-top: -1px;
  position: relative;
  white-space: nowrap;
}

.separator-2 {
  align-self: stretch;
  height: 1px;
  margin-bottom: -0.5px;
  min-width: 322px;
  position: relative;
}

.table-row-4.table-row-5 {
  height: 128px;
  margin-left: unset;
  width: 978px;
}

.table-row-4.table-row-5 .separator-2 {
  margin-bottom: unset;
  min-width: 962px;
}
</style>

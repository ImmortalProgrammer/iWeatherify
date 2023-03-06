<template>
  <div :class="[`table-row-6`, className || ``]">
    <div class="content-6">
      <div class="left-content-6">
        <div class="label-12 inter-normal-black-17px">Distance</div>
      </div>
      <right-content4 />
    </div>
    <img
      class="separator-3"
      src="https://anima-uploads.s3.amazonaws.com/projects/6402851d6a37db7167320ed4/releases/640287c04c9ddca04e2b1958/img/separator.svg"
      alt="Separator"
    />
  </div>
</template>

<script>
import RightContent4 from "./RightContent4";
export default {
  name: "TableRow4",
  components: {
    RightContent4,
  },
  props: ["className"],
};
</script>

<style>
.table-row-6 {
  align-items: flex-start;
  background-color: var(--white);
  display: flex;
  flex-direction: column;
  /* margin-left: 1px;
  padding: 0px 0px 0px 16px;
  position: relative;
  width: 338px; */
}

.content-6 {
  align-items: flex-start;
  align-self: stretch;
  display: flex;
  gap: 8px;
  padding: 0px 16px 0px 0px;
  position: relative;
}

.left-content-6 {
  align-items: flex-start;
  display: flex;
  flex: 1;
  gap: 10px;
  padding: 11px 0px;
  position: relative;
}

.label-12 {
  flex: 1;
  letter-spacing: -0.41px;
  line-height: 22px;
  margin-top: -1px;
  position: relative;
  white-space: nowrap;
}

.separator-3 {
  align-self: stretch;
  height: 1px;
  margin-bottom: -0.5px;
  min-width: 322px;
  position: relative;
}

.table-row-6.table-row-7 {
  height: 127px;
  margin-left: unset;
  width: 978px;
}

.table-row-6.table-row-7 .separator-3 {
  margin-bottom: unset;
  min-width: 962px;
}
</style>

<template>
  <div :class="[`table-row-2`, className || ``]">
    <div class="content-2">
      <div class="left-content-2"><div class="label-4 inter-normal-black-17px">Wind</div></div>
      <right-content2 />
    </div>
    <img
      class="separator-1"
      src="https://anima-uploads.s3.amazonaws.com/projects/6402851d6a37db7167320ed4/releases/640287c04c9ddca04e2b1958/img/separator.svg"
      alt="Separator"
    />
  </div>
</template>

<script>
import RightContent2 from "./RightContent2";
export default {
  name: "TableRow2",
  components: {
    RightContent2,
  },
  props: ["className"],
};
</script>

<style>
.table-row-2 {
  align-items: flex-start;
  background-color: var(--white);
  display: flex;
  flex-direction: column;
  margin-left: 1px;
  padding: 0px 0px 0px 16px;
  position: relative;
  width: 338px;
}

.content-2 {
  align-items: flex-start;
  align-self: stretch;
  display: flex;
  gap: 8px;
  padding: 0px 16px 0px 0px;
  position: relative;
}

.left-content-2 {
  align-items: flex-start;
  display: flex;
  flex: 1;
  gap: 10px;
  padding: 11px 0px;
  position: relative;
}

.label-4 {
  flex: 1;
  letter-spacing: -0.41px;
  line-height: 22px;
  margin-top: -1px;
  position: relative;
  white-space: nowrap;
}

.separator-1 {
  align-self: stretch;
  height: 1px;
  margin-bottom: -0.5px;
  min-width: 322px;
  position: relative;
}

.table-row-2.table-row-3 {
  height: 127px;
  margin-left: unset;
  width: 978px;
}

.table-row-2.table-row-3 .separator-1 {
  margin-bottom: unset;
  min-width: 962px;
}
</style>

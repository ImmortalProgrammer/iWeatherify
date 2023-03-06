<template>
  <div :class="[`table-row`, className || ``]">
    <div class="content">
      <div class="left-content"><div class="label inter-normal-black-17px">Temperature</div></div>
      <right-content />
    </div>
    <img
      class="separator"
      src="https://anima-uploads.s3.amazonaws.com/projects/6402851d6a37db7167320ed4/releases/640287c04c9ddca04e2b1958/img/separator.svg"
      alt="Separator"
    />
  </div>
</template>

<script>
import RightContent from "./RightContent";
export default {
  name: "TableRow",
  components: {
    RightContent,
  },
  props: ["className"],
};
</script>

<style>
.table-row {
  align-items: flex-start;
  background-color: var(--white);
  display: flex;
  flex-direction: column;
  margin-left: 1px;
  margin-top: 21px;
  padding: 0px 0px 0px 16px;
  position: relative;
  width: 338px;
}

.content {
  align-items: flex-start;
  align-self: stretch;
  display: flex;
  gap: 8px;
  padding: 0px 16px 0px 0px;
  position: relative;
}

.left-content {
  align-items: flex-start;
  display: flex;
  flex: 1;
  gap: 10px;
  padding: 11px 0px;
  position: relative;
}

.label {
  flex: 1;
  letter-spacing: -0.41px;
  line-height: 22px;
  margin-top: -1px;
  position: relative;
  white-space: nowrap;
}

.separator {
  align-self: stretch;
  height: 1px;
  margin-bottom: -0.5px;
  min-width: 322px;
  position: relative;
}

.table-row.table-row-1 {
  height: 127px;
  margin-left: unset;
  margin-top: 59px;
  width: 978px;
}

.table-row.table-row-1.separator {
  margin-bottom: unset;
  min-width: 962px;
}
</style>

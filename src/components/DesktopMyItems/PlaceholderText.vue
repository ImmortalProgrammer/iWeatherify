<template>
  <div class="placeholder-text">
    <div class="select-outfit">{{ selectOutfit }}</div>
  </div>
</template>

<script>
export default {
  name: "PlaceholderText",
  props: ["selectOutfit"],
};
</script>

<style>
.placeholder-text {
  align-items: flex-start;
  display: flex;
  height: 20px;
  min-width: 184px;
}

.select-outfit {
  color: var(--gray04);
  font-family: var(--font-family-montserrat);
  font-size: var(--font-size-m);
  font-weight: 400;
  letter-spacing: 0;
  line-height: normal;
  margin-top: -1px;
  min-height: 20px;
}
</style>

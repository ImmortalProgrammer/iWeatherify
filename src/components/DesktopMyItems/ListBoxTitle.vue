<template>
  <div class="list-box-title">
    <div class="type-of-outfit">{{ typeOfOutfit }}</div>
  </div>
</template>

<script>
export default {
  name: "ListBoxTitle",
  props: ["typeOfOutfit"],
};
</script>

<style scoped>
.list-box-title {
  align-items: flex-start;
  display: flex;
  height: 20px;
  min-width: 280px;
}

.type-of-outfit {
  color: #333333;
  font-family: var(--font-family-montserrat);
  font-size: var(--font-size-m);
  font-weight: 500;
  letter-spacing: 0;
  line-height: normal;
  margin-top: -1px;
  min-height: 20px;
}
</style>

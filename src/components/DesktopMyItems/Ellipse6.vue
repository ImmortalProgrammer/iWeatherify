<template>
  <div class="ellipse-8"><img class="ellipse-6" :src="src" alt="Ellipse 6" /></div>
</template>

<script>
export default {
  name: "Ellipse6",
  props: ["src"],
};
</script>

<style>
.ellipse-8 {
  align-items: flex-start;
  display: flex;
  height: 50px;
  justify-content: center;
  margin-bottom: 1px;
  margin-left: 956px;
  min-width: 50px;
}

.ellipse-6 {
  height: 90px;
  margin-top: -16px;
  object-fit: cover;
  width: 90px;
}
</style>

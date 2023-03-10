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
  left: 1156px;
  min-width: 50px;
  position: absolute;
  top: 0;
}

.ellipse-6 {
  height: 90px;
  margin-top: -16px;
  object-fit: cover;
  width: 90px;
}

@media only screen and (max-width: 420px) {
/* Profile Picture Position */
.ellipse-8 {
  align-items: flex-start;
  display: flex;
  height: 5px;
  justify-content: center;
  left: 1150px;
  min-width: 50px;
  position: absolute;
  top: 70px;
}

/* Profile Picture Size */
.ellipse-6 {
  height: 300px;
  margin-top: -16px;
  object-fit: cover;
  width: 300px;
}
}
</style>

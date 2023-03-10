<template>
  <div class="input-search">
    <input class="search ui---16-medium" name="search" :placeholder="inputPlaceholder" :type="inputType" required />
  </div>
</template>

<script>
export default {
  name: "InputSearch",
  props: ["inputType", "inputPlaceholder"],
};
</script>

<style>
.input-search {
  background-image: url(https://anima-uploads.s3.amazonaws.com/projects/6402851d6a37db7167320ed4/releases/64028608c9953e08464983be/img/bg.svg);
  background-size: 100% 100%;
  height: 50px;
  left: 305px;
  position: absolute;
  top: 57px;
  width: 838px;
}

.search {
  background-color: transparent;
  border: 0;
  color: var(--black);
  font-weight: 500;
  height: 19px;
  left: 16px;
  line-height: normal;
  padding: 0;
  position: relative;
  top: 15px;
  width: 800px;
}

.search::placeholder {
  color: rgba(189, 189, 189, 0.65);
}
</style>

<template>
  <div class="input-search-1">
    <input class="search-1" name="search" :placeholder="inputPlaceholder" :type="inputType" required />
  </div>
</template>

<script>
export default {
  name: "InputSearch3",
  props: ["inputType", "inputPlaceholder"],
};
</script>

<style>
.input-search-1 {
  align-items: flex-start;
  background-image: url(https://anima-uploads.s3.amazonaws.com/projects/6402851d6a37db7167320ed4/releases/640285252652d48db0de9030/img/bg.svg);
  background-size: 100% 100%;
  display: flex;
  height: 30px;
  min-width: 196px;
  padding: 5px 16px;
}

.search-1 {
  background-color: transparent;
  border: 0;
  color: var(--gray03);
  font-family: var(--font-family-inter-light);
  font-size: var(--font-size-m);
  font-weight: 300;
  height: 15px;
  letter-spacing: 0;
  line-height: normal;
  padding: 0;
  width: 160px;
  top: 50px;
}

.search-1::placeholder {
  color: rgba(57, 59, 192, 0.27);
}
</style>

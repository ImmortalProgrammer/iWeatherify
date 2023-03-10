<template>
  <div class="input-field"><div class="key-field">Outfit Name</div></div>
</template>

<script>
export default {
  name: "InputField",
};
</script>

<style>
.input-field {
  align-items: center;
  display: flex;
  height: 44px;
  left: 94px;
  min-width: 327px;
  padding: 0 16px;
  position: absolute;
  top: 182px;
}

.key-field {
  color: var(--black);
  font-family: var(--font-family-pt_mono);
  font-size: var(--font-size-m);
  font-weight: 400;
  letter-spacing: 0;
  line-height: normal;
  min-height: 18px;
  min-width: 106px;
  opacity: 0.8;
}

@media only screen and (max-width: 420px) {
.input-field {
  display: none;
}
  }
</style>

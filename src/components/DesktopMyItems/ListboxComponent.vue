<template>
  <div class="listbox-component">
    <list-box-title :typeOfOutfit="listBoxTitleProps.typeOfOutfit" />
    <div class="list-container">
      <div class="list-box-main">
        <placeholder-text :selectOutfit="placeholderTextProps.selectOutfit" />
        <img
          class="chevron"
          src="https://anima-uploads.s3.amazonaws.com/projects/6402851d6a37db7167320ed4/releases/6403ff00aa8af8606e71b64d/img/chevron.svg"
          alt="Chevron"
        />
      </div>
      <div class="clip-list"></div>
    </div>
  </div>
</template>

<script scoped>
import ListBoxTitle from "./ListBoxTitle";
import PlaceholderText from "./PlaceholderText";
export default {
  name: "ListboxComponent",
  components: {
    ListBoxTitle,
    PlaceholderText,
  },
  props: ["listBoxTitleProps", "placeholderTextProps"],
};
</script>

<style>
.listbox-component {
  align-items: center;
  display: flex;
  flex-direction: column;
  gap: 8px;
  left: 195px;
  min-height: 289px;
  position: absolute;
  top: 0;
  width: 308px;
}

.list-container {
  height: 261px;
  position: relative;
  width: 308px;
}

.list-box-main {
  align-items: center;
  background-color: var(--white);
  border-radius: 8px;
  box-shadow: 0px 4px 14px #0000001a;
  display: flex;
  gap: 47px;
  height: 60px;
  left: 14px;
  min-width: 280px;
  padding: 0 16px;
  position: absolute;
  top: 0;
}

.chevron {
  height: 6px;
  margin-top: 1px;
  width: 11px;
}

.clip-list {
  height: 261px;
  left: 0;
  position: absolute;
  top: 0;
  width: 308px;
}
</style>

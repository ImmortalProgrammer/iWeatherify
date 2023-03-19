<template>
  <div class="listbox-component">
    <list-box-title />
    <div class="list-container">
      <div class="list-box-main">
        <placeholder-text />
        <img
          class="chevron"
          src="https://anima-uploads.s3.amazonaws.com/projects/6405ee9a4548b3806a50e138/releases/6405ef8c246cb8c2cd3b302a/img/chevron.svg"
          alt="Chevron"
        />
      </div>
      <div class="clip-list"></div>
    </div>
  </div>
</template>

<script>
import ListBoxTitle from "./ListBoxTitle";
import PlaceholderText from "./PlaceholderText";
export default {
  name: "ListboxComponent",
  components: {
    ListBoxTitle,
    PlaceholderText,
  },
};
</script>

<style>
.listbox-component {
  align-items: center;
  display: flex;
  flex-direction: column;
  gap: 8px;
  left: 699px;
  min-height: 289px;
  position: absolute;
  top: 30px;
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

@media screen and (min-width: 700px) and (max-width: 1100px) {
  .listbox-component {
  display: none;
}

.list-container {
  display: none;
}

.list-box-main {
  display: none;
}

.chevron {
  display: none;
}

.clip-list {
  display: none;
} 
}

@media screen and (min-width: 200px) and (max-width: 699px) {
.listbox-component {
  display: none;
}

.list-container {
  display: none;
}

.list-box-main {
  display: none;
}

.chevron {
  display: none;
}

.clip-list {
  display: none;
}
}
</style>

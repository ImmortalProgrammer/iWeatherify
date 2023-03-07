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

@media only screen and (max-width: 595px) {
  .input-search {
  }
  .search {

  }
}

/* Small screen devices (600px and above) */
@media only screen and (min-width: 600px) {

}

/* Medium screen devices (768px and above) */
@media only screen and (min-width: 768px) {
}

/* Big screen devices (889px and above) */
@media only screen and (min-width: 889px) {
  .input-search {

  }
}


.input-search {
  background-image: url(../../../img/bg.svg);
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
  color: rgba(0, 0, 0);
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
  color: rgba(98, 69, 69, 0.51);
}

@media only screen and (min-width: 880px) and (max-width: 1300px) {
  .input-search {
    top: 120px;
  }
}

@media only screen and (min-width: 533px) and (max-width: 879px) {
  .input-search {
    height: 50px;
    left: 480px;
    position: absolute;
    top: 95px;
    width: 500px;
  }
  .search {
    background-color: transparent;
    border: 0;
    color: rgba(0, 0, 0);
    font-weight: 500;
    height: 16px;
    left: 16px;
    line-height: normal;
    padding: 0;
    position: relative;
    top: 15px;
    width: 450px;
  }
}

@media only screen and (min-width: 300px) and (max-width: 533px) {
  .input-search {
    height: 50px;
    left: 530px;
    position: absolute;
    top: 75px;
    width: 400px;
    scale: 0.85;
  }
  .search {
    background-color: transparent;
    border: 0;
    color: var(--black);
    font-weight: 500;
    height: 16px;
    left: 16px;
    line-height: normal;
    padding: 0;
    position: relative;
    top: 15px;
    width: 175px;
  }
}


</style>

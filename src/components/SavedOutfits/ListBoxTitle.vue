<template>
  <div class="list-box-title"><div class="type-of-outfit">Type of Outfit</div></div>
</template>

<script>
export default {
  name: "ListBoxTitle",
};
</script>

<style scoped>

* {
  box-sizing: border-box;
}


:root { 
  --black: #000000;
  --blue-secondary: #2a9d8f;
  --gray01: #f6f6f6;
  --gray04: #666666;
  --white: #ffffff;
 
  --font-size-l: 30px;
  --font-size-m: 16px;
  --font-size-s: 14px;
 
  --font-family-inter: "Inter", Helvetica;
  --font-family-montserrat: "Montserrat", Helvetica;
  --font-family-pt_mono: "PT Mono", Helvetica;
}
.ui---30-semi {
  font-family: var(--font-family-inter);
  font-size: var(--font-size-l);
  font-style: normal;
  font-weight: 600;
  letter-spacing: 0;
}

.ui---16-regular {
  font-family: var(--font-family-inter);
  font-size: var(--font-size-m);
  font-style: normal;
  font-weight: 400;
  letter-spacing: 0;
}

.ui---14-regular {
  font-family: var(--font-family-inter);
  font-size: var(--font-size-s);
  font-style: normal;
  font-weight: 400;
  letter-spacing: 0;
}

/* Small Screen */
@media screen and (min-width: 769px) and (max-width: 1024px) {
  :root { 
    --black: #000000;
    --blue-secondary: #2a9d8f;
    --gray01: #f6f6f6;
    --gray04: #666666;
    --white: #ffffff;
   
    --font-size-l: 55px;
    --font-size-m: 36px;
    --font-size-s: 14px;
   
    --font-family-inter: "Inter", Helvetica;
    --font-family-montserrat: "Montserrat", Helvetica;
    --font-family-pt_mono: "PT Mono", Helvetica;
  }
}

/* Tablet */
@media screen and (min-width: 481px) and (max-width: 768px) {
  :root { 
    --black: #000000;
    --blue-secondary: #2a9d8f;
    --gray01: #f6f6f6;
    --gray04: #666666;
    --white: #ffffff;
   
    --font-size-l: 55px;
    --font-size-m: 36px;
    --font-size-s: 14px;
   
    --font-family-inter: "Inter", Helvetica;
    --font-family-montserrat: "Montserrat", Helvetica;
    --font-family-pt_mono: "PT Mono", Helvetica;
  }
}

/* Smart Phone */
@media screen and (min-width: 200px) and (max-width: 480px) {
  :root { 
    --black: #000000;
    --blue-secondary: #2a9d8f;
    --gray01: #f6f6f6;
    --gray04: #666666;
    --white: #ffffff;
   
    --font-size-l: 70px;
    --font-size-m: 46px;
    --font-size-s: 14px;
   
    --font-family-inter: "Inter", Helvetica;
    --font-family-montserrat: "Montserrat", Helvetica;
    --font-family-pt_mono: "PT Mono", Helvetica;
  }
}


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

@media screen and (min-width: 700px) and (max-width: 1100px) {
.list-box-title {
  display: none;
}

.type-of-outfit {
  display: none;
}
}

@media only screen and (max-width: 420px) {
.list-box-title {
  display: none;
}

.type-of-outfit {
  display: none;
}
}

</style>

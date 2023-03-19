<template>
  <div class="input-field"><div class="key-field">Outfit Name</div></div>
</template>

<script>
export default {
  name: "InputField",
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

@media screen and (min-width: 700px) and (max-width: 1100px) {
  .input-field {
  display: none;
}
}

@media screen and (min-width: 200px) and (max-width: 699px) {
.input-field {
  display: none;
}
  }
</style>

<template>
    <div :class="[`ellipse-8`, className || ``]"><img class="ellipse-6" :src="src" alt="Ellipse 6" /></div>
  </template>
  
  <script>
  export default {
    name: "Ellipse6",
    props: ["src", "className"],
  };
  </script>
  
  <style>
  .ellipse-8 {
    align-items: flex-start;
    display: flex;
    height: 50px;
    justify-content: center;
    margin-left: 970px;
    margin-top: 1px;
    min-width: 50px;
  }
  .ellipse-6 {
    height: 90px;
    margin-top: -16px;
    object-fit: cover;
    width: 90px;
  }
  .ellipse-8.profile-image {
    margin-left: 183px;
    margin-top: 29px;
  }
  </style>
<template>
    <div class="add-clothing screen">
      <nav-bar class="navbar"></nav-bar>
  
      <div class="title-container">
        <h1 class="title">{{ title }}</h1>
      </div>

      <div class="selection">
        <div class="back-button">
          <img src="../../../img/back-button.svg">
        </div>
    
        <div class="row-format-container">
          <div class="row">
            <p class="clothing-label">Outer wear</p>
            <select id="outer-container" class="dropdown-container-font" v-model="outer_wear">
              <option value="Puffer jacket">Puffer jacket</option>
              <option value="Jean jacket">Jean jacket</option>
              <option value="Leather jacket">Leather jacket</option>
              <option value="Parka">Parka</option>
              <option value="Raincoat">Raincoat</option>
              <option value="Windbreaker">Windbreaker</option>
              <option value="Trench coat">Trench coat</option>
              <option value="">N/A</option>
            </select>
          </div>
    
          <div class="row">
            <p class="clothing-label">Middle wear</p>
            <select id="middle-container" class="dropdown-container-font" v-model="middle_wear">
              <option value="Fleece sweater">Fleece sweater</option>
              <option value="Crewneck">Crewneck</option>
              <option value="Hoodie">Hoodie</option>
              <option value="Blazer">Blazer</option>
              <option value="Sweatshirt">Sweatshirt</option>
              <option value="">N/A</option>
            </select>
          </div>
    
          <div class="row">
            <p class="clothing-label">Inner wear</p>
            <select id="inner-container" class="dropdown-container-font" v-model="inner_wear">
              <option value="Summer dress">Summer dress</option>
              <option value="T-shirt">T-shirt</option>
              <option value="Tank top">Tank top</option>
              <option value="Long sleeve">Long sleeve</option>
              <option value="Turtleneck">Turtleneck</option>
              <option value="Crop top">Crop top</option>
              <option value="">N/A</option>
            </select>
          </div>
    
          <div class="row">
            <p class="clothing-label">Pants</p>
            <select id="pants-container" class="dropdown-container-font" v-model="pants">
              <option value="Jeans">Jeans</option>
              <option value="Sweatpants">Sweatpants</option>
              <option value="Trousers">Trousers</option>
              <option value="Shorts">Shorts</option>
              <option value="Leggings">Leggings</option>
              <option value="Long johns">Long johns</option>
              <option value="Skirt">Skirt</option>
              <option value="Cargos">Cargos</option>
              <option value="Culottes">Culottes</option>
              <option value="">N/A</option>
            </select>
          </div>
  
          <div class="row">
            <p class="clothing-label">Shoes</p>
            <select id="shoes-container" class="dropdown-container-font" v-model="shoes">
              <option value="Rain boots">Rain boots</option>
              <option value="Sneakers">Sneakers</option>
              <option value="Sandals">Sandals</option>
              <option value="Heels">Heels</option>
              <option value="Flats">Flats</option>
              <option value="Dress shoes">Dress shoes</option>
              <option value="Flip flops">Flip flops</option>
              <option value="Snow boots">Snow boots</option>
              <option value="Loafers">Loafers</option>
              <option value="Slides">Slides</option>
              <option value="">N/A</option>
            </select>
          </div>
  
          <div class="row">
            <p class="clothing-label">Hats</p>
            <select id="hats-container" class="dropdown-container-font" v-model="hats">
              <option value="Baseball cap">Baseball cap</option>
              <option value="Sun hat">Sun hat</option>
              <option value="Beanie">Beanie</option>
              <option value="Dad hat">Dad hat</option>
              <option value="Trucker hat">Trucker hat</option>
              <option value="Bucket hat">Bucket hat</option>
              <option value="">N/A</option>
            </select>
          </div>
  
          <div class="row">
            <p class="clothing-label">Accessories</p>
            <select id="accessories-container" class="dropdown-container-font" v-model="accessories">
              <option value="Scarf">Scarf</option>
              <option value="Sunglasses">Sunglasses</option>
              <option value="Scarf">Scarf</option>
              <option value="Gloves">Gloves</option>
              <option value="Mittens">Mittens</option>
              <option value="Belt">Belt</option>
              <option value="Umbrella">Umbrella</option>
              <option value="">N/A</option>
            </select>
          </div>
    
          <div>
            <button @click="saveOutfit()">Save</button>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import axios from "axios";
  import NavBar from "@/NavBar/NavBar.vue";
  export default {
    name: "AddClothing",
    components: {NavBar},
    data() {
      return {
        outer_wear: "",
        middle_wear: "",
        inner_wear: "",
        pants: "",
        shoes: "",
        hats: "",
        accessories: ""
      };
    },
    methods: {
      saveOutfit() {
        axios.post("", {
          userid: 1,
          outer_wear: this.outer_wear,
          middle_wear: this.middle_wear,
          inner_wear: this.inner_wear,
          pants: this.pants,
          shoes: this.shoes,
          hats: this.hats,
          accessories: this.accessories
        })
        .then(response => {
          console.log(response.data);
          alert("Saved outfit");
        })
        .catch(error => {
          console.error("Unsuccessful axios post in saveUnits().", error);
        });
      },
    },
    props: [
      "defaultLogo4",
      "title",
      "ellipse6Props",
    ]
  };
  </script>
  
  <style scoped>
  .add-clothing {
    position: absolute;
    width: 100%;
    height: 100%;
    background: #FFFFFF;
  }
  
  .navbar {
    top: -0.85%;
  }
  
  .title-container {
    position: relative;
    top: 75px;
    margin: auto;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 45%;
    height: 10%;
  }
  
  .title {
    color: var(--black);
    font-weight: 600;
    font-size: 3em;
    font-family: 'Inter';
    font-style: normal;
  }
  
  .row-format-container {
    position: fixed;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
    top: 30%;
    width: 100%;
    /* height: 300px; */
  }
  
  .row {
    border-bottom: 1px solid #C6C6C8;
    width: 30%;
    display: flex;
    flex-direction: row;
    align-items: left;
    justify-content: space-between;
  }
  
  .clothing-label {
    font-size: 1.5em;
    font-family: 'Inter';
    font-style: normal;
    font-weight: 400;
  }
  
  .dropdown-container-font {
    position: relative;
    width: fit-content;
    border: none;
    font-size: 1.5em;
    font-family: 'Inter';
    font-style: normal;
    font-weight: 400;
    opacity: 0.5;
    cursor: pointer;
  }
  
  button {
    font-family: 'Inter';
    font-style: normal;
    font-size: large;
    font-weight: bold;
    padding: 0.7em 10em;
    color: white;
    background-color: black;
    cursor: pointer;
  }
  
  @media screen and (min-width: 992px) and (max-width: 1440px) {
    .row {
      width: 50%;
    }
  }
  
  @media screen and (min-width: 576px) and (max-width: 992px) {
    .row-format-container {
      height: 200px;
    }
  
    .row {
      width: 60%;
    }
  
    button {
      transform: scale(0.8);
    }
  }
  
  @media screen and (min-width: 375px) and (max-width: 576px) {
  
    .row {
      width: 90%;
    }
  
    button {
      transform: scale(0.8);
    }
  }
  
  @media screen and (max-width: 375px) {
    .row {
      width: 90%;
    }
  
    button {
      transform: scale(0.7);
    }
  }
  </style>
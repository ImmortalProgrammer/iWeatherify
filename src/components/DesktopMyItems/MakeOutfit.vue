<template>
    <div class="container-center-horizontal">
        <!-- Nav bar -->
        <div class="flex-row">
            <nav-bar></nav-bar>
        </div>

        <!-- Hidden modal -->
        <modal v-show="isModalVisible" @close="closeModal"></modal>

        <h1 class="title">{{ title }}</h1> <!-- Title would be of the following options: [Hot, warm, just right, chilly, cold, freezing] -->

        <div class="clothing-container" id="outerwear" @click.self = "showModal">
            <p>This is for outerwear container</p>
        </div>

        <div class="clothing-container" id="middlewear" @click.self = "showModal">
            <p>This is for middle wear container</p>
        </div>

        <div class="clothing-container" id="innerwear" @click.self = "showModal">
            <p>This is for inner wear container</p>
        </div>

        <div class="clothing-container" id="pants" @click.self = "showModal">
            <p>This is for pants container</p>
        </div>
        
        <div class="clothing-container" id="headwear" @click.self = "showModal">
            <p>This is for headwear container</p>
        </div>

        <div class="clothing-container" id="shoes" @click.self = "showModal">
            <p>This is for shoes container</p>
        </div>

    </div>
  </template>
  
  <script>
  import NavBar from "@/NavBar/NavBar.vue";
  import Modal from "../Modal/Modal.vue";
  
  export default {
    name: "MakeOutfitPage",
    components: {
        NavBar,
        Modal
    },
    props: [
        "title"
    ],
    data(){
      return {
        isModalVisible: false
      }
    },
    methods: {
      showModal(){
        this.isModalVisible = true
        console.log("The state of showModal is: " + this.isModalVisible)
      },
      closeModal(){
        this.isModalVisible = false
        console.log("Closing the modal")
      }
    },
  };
  </script>
  
  <style scoped>  
  .title {
    color: var(--black);
    font-family: var(--font-family-inter);
    font-size: var(--font-size-l);
    font-weight: 700;
    letter-spacing: 0;
    line-height: normal;
    position: absolute;
    text-align: center;
}

.clothing-container {
    background: grey;
    height: 252px;
    width: 200px;
    left: 0;
    position: absolute;
    top: 170px;
}

#outerwear {
    left: 25%
}

#middlewear {
    left: 50%
}

#innerwear {
    left: 75%
}

#pants{
    top: 50%;
    left: 25%
}

#headwear {
    top: 50%;
    left: 50%
}

#shoes {
    top: 50%;
    left: 75%
}
  </style>  
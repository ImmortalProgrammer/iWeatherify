<template>
    <div class="container-center-horizontal">
        <!-- Nav bar -->
        <div class="flex-row">
            <nav-bar></nav-bar>
        </div>

        <!-- Hidden modal -->
        <modal v-show="isModalVisible" @close="closeModal"></modal>

        <div v-if="checkChildRouteNames()">
            <!-- For child routes -->
            <router-view></router-view>
        </div>

        <div class="main-content" v-else>
            <h1 class="title">{{ this.$route.name }}</h1> <!--Name would be literally the name assigned in router.js-->
    
            <div class="clothing-container" id="outerwear" @click.self = "showModal">
                <p>Outerwear</p>
                <img
                  src="../../../img/make_outfit_icons/outerwear.svg"
                  alt="Coat image"
                  style="width:200px; margin-top: 20px;"
                  @click.self = "showModal"
                />
            </div>
    
            <div class="clothing-container" id="middlewear" @click.self = "showModal">
                <p>Middlewear</p>
                <img
                  src="../../../img/make_outfit_icons/middlewear.svg"
                  alt="Sweater image"
                  style="width:200px; margin-top: 20px;"
                  @click.self = "showModal"
                />
            </div>
    
            <div class="clothing-container" id="innerwear" @click.self = "showModal">
                <p>Innerwear</p>
                <img
                  src="../../../img/make_outfit_icons/innerwear.svg"
                  alt="T-shirt image"
                  style="width:200px; margin-top: 20px;"
                  @click.self = "showModal"
                />
            </div>
    
            <div class="clothing-container" id="pants" @click.self = "showModal">
                <p>Pants</p>
                <img
                  src="../../../img/make_outfit_icons/pants.svg"
                  alt="Pants image"
                  style="width:200px; margin-top: 20px;"
                  @click.self = "showModal"
                />
            </div>
            
            <div class="clothing-container" id="headwear" @click.self = "showModal">
                <p>Headwear</p>
                <img
                  src="../../../img/make_outfit_icons/headwear.svg"
                  alt="Hat image"
                  style="width:200px; margin-top: 20px;"
                  @click.self = "showModal"
                />
            </div>
    
            <div class="clothing-container" id="shoes" @click.self = "showModal">
                <p>Shoes</p>
                <img
                  src="../../../img/make_outfit_icons/shoes.svg"
                  alt="Shoes image"
                  style="width:200px; margin-top: 20px;"
                  @click.self = "showModal"
                />
            </div>
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

    ],
    data(){
      return {
        isModalVisible: false,
        isValidRouteName: true, //Conditionally render either this parent component, or child routes
        isChildRoute: false
      }
    },
    methods: {
      showModal(){
        this.isModalVisible = true
      },
      closeModal(){
        this.isModalVisible = false
      },
      checkRouteName(){
        console.log(this.$route.name)
        const validRouteNames = ["Hot Items", "Warm Items", "Just Right Items", "Chilly Items", "Cold Items", "Freezing Items"]
        return validRouteNames.includes(this.$route.name)
      },
      checkChildRouteNames(){
        const validRouteNames = ["Outerwear Items", "Middlewear Items", "Innerwear Items", "Pant Items", "Headwear Items", "Shoe Items"]
        return validRouteNames.includes(this.$route.name)
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
    top: 7vh; /*TODO Would need to fix title to dynamically be after the navBar*/
}

.clothing-container {
    background: grey;
    height: 252px;
    width: 200px;
    left: 0;
    position: absolute;
    top: 170px;
}

.clothing-container:hover{
    cursor:pointer
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
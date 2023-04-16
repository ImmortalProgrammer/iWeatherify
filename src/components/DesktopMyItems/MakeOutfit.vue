<template>
    <div class="container-center-horizontal">
        <!-- Nav bar -->
        <div class="flex-row">
            <nav-bar></nav-bar>
        </div>

        <div v-if="checkChildRouteNames()">
            <!-- For child routes -->
            <router-view></router-view>
        </div>

        <div class="main-content" v-else>
            <h1 class="title">{{ this.$route.name }}</h1> <!--Name would be literally the name assigned in router.js-->

            <div class="clothing-choices">
              <div class="top-row">
                <div class="clothing-container" id="outerwear">
                    <p>Outerwear</p>
                    <img
                      src="../../../img/make_outfit_icons/outerwear.svg"
                      alt="Coat image"

                      @click.self = "goToTempItem('outerwear')"
                    />
                </div>
        
                <div class="clothing-container" id="middlewear" >
                    <p>Middlewear</p>
                    <img
                      src="../../../img/make_outfit_icons/middlewear.svg"
                      alt="Sweater image"
                      @click.self = "goToTempItem('middlewear')"
                    />
                </div>
        
                <div class="clothing-container" id="innerwear" >
                    <p>Innerwear</p>
                    <img
                      src="../../../img/make_outfit_icons/innerwear.svg"
                      alt="T-shirt image"
                      @click.self = "goToTempItem('innerwear')"
                    />
                </div>
              </div>

              <div class="bottom-row">
                <div class="clothing-container" id="pants" >
                    <p>Pants</p>
                    <img
                      src="../../../img/make_outfit_icons/pants.svg"
                      alt="Pants image"

                      @click.self = "goToTempItem('pants')"
                    />
                </div>
                
                <div class="clothing-container" id="headwear" >
                    <p>Headwear</p>
                    <img
                      src="../../../img/make_outfit_icons/headwear.svg"
                      alt="Hat image"

                      @click.self = "goToTempItem('headwear')"
                    />
                </div>
        
                <div class="clothing-container" id="shoes">
                    <p>Shoes</p>
                    <img
                      src="../../../img/make_outfit_icons/shoes.svg"
                      alt="Shoes image"

                      @click.self = "goToTempItem('shoes')"
                    />
                </div>
              </div>
            </div>    
        </div>

    </div>
  </template>
  
  <script>
  import NavBar from "@/NavBar/NavBar.vue";
  
  export default {
    name: "MakeOutfitPage",
    components: {
        NavBar
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
        goToTempItem(itemCategory){
            this.$router.push(this.$route.path + `/${itemCategory}`)
        },
      checkChildRouteNames(){
        const validRouteNames = [
          "Warm Outerwear Items",
          "Warm Middlewear Items", 
          "Warm Innerwear Items", 
          "Warm Pants Items", 
          "Warm Headwear Items", 
          "Warm Shoes Items",

          "Hot Outerwear Items",
          "Hot Middlewear Items", 
          "Hot Innerwear Items", 
          "Hot Pants Items", 
          "Hot Headwear Items", 
          "Hot Shoes Items",

          "Just Right Outerwear Items",
          "Just Right Middlewear Items", 
          "Just Right Innerwear Items", 
          "Just Right Pants Items", 
          "Just Right Headwear Items", 
          "Just Right Shoes Items",

          "Chilly Outerwear Items",
          "Chilly Middlewear Items", 
          "Chilly Innerwear Items", 
          "Chilly Pants Items", 
          "Chilly Headwear Items", 
          "Chilly Shoes Items",

          "Cold Outerwear Items",
          "Cold Middlewear Items", 
          "Cold Innerwear Items", 
          "Cold Pants Items", 
          "Cold Headwear Items", 
          "Cold Shoes Items",

          "Freezing Outerwear Items",
          "Freezing Middlewear Items", 
          "Freezing Innerwear Items", 
          "Freezing Pants Items", 
          "Freezing Headwear Items", 
          "Freezing Shoes Items",
      ]
        return validRouteNames.includes(this.$route.name)
      }
    },
  };
  </script>
  
  <style scoped>  

  .main-content{
    margin-top: 10vh;
  }

  .clothing-choices{
    width: 75vw;
    height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: space-evenly;
  }

  .title {
    color: var(--black);
    font-family: var(--font-family-inter);
    font-size: var(--font-size-l);
    font-weight: 700;
    text-align: center;
}

.top-row, .bottom-row{
  display: flex;
  flex-direction: row;
  justify-content: space-between;
}

.clothing-container {
    height: 30vh;
    width: 20vw;
    text-align: center;
}

.clothing-container img{
  width: 90%;
  height: 90%
}

.clothing-container:hover{
    cursor:pointer
}

  </style>  
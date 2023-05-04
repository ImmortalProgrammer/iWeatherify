<template>
  <div>
      <!-- Nav bar -->
      <div class="nav-bar">
          <nav-bar class="my-items-nav-bar"></nav-bar>
      </div>

      <!-- Actual content of the page -->
      <div class="website-my-items-page" v-if="this.$route.name==='myItems'">
          <!-- Title -->
          <div class="title-container">
              <h1 class="title">{{ title }}</h1>
          </div>
  
          <!-- The top row -->
          <div class="top-row">
              <div class="temp-container" @click.self = "goToMakeOutfit('Hot Items', 'hot')">
                  <div class="container-title">{{ hot }}</div>
                  <img
                      src="../../../img/my_items_icons/hot.svg"
                      alt="Image of a sun with heat waves"
                      style="width:200px; margin-top: 20px;"
                      @click.self="goToMakeOutfit('Hot Items', 'hot')"
                  />
              </div>
  
              <div class="temp-container" @click.self = "goToMakeOutfit('Warm Items', 'warm')">
                  <div class="container-title">{{ warm }}</div>
                  <img
                      src="../../../img/my_items_icons/warm.svg"
                      alt="image of a sun"
                      style="width:200px; margin-top: 20px;"
                      @click.self="goToMakeOutfit('Warm Items', 'warm')"
                  />
              </div>
  
              <div class="temp-container" @click.self = "goToMakeOutfit('Just Right Items', 'justRight')">
                  <div class="container-title">{{ justRight }}</div>
                  <img
                      src="../../../img/my_items_icons/just_right.svg"
                      alt="image of a sun behind clouds"
                      style="width:200px; margin-top: 20px;"
                      @click.self="goToMakeOutfit('Just Right Items', 'justRight')"
                  />
              </div>
          </div>

          <!-- The bottom row -->
          <div class="bottom-row">
              <div class="temp-container" @click.self = "goToMakeOutfit('Chilly Items', 'chilly')">
                  <div class="container-title">{{ chilly }}</div>
                  <img
                      src="../../../img/my_items_icons/chilly.svg"
                      alt="Image of a cloud"
                      style="width:200px;"
                      @click.self="goToMakeOutfit('Chilly Items', 'chilly')"
                  />
              </div>

              <div class="temp-container" @click.self = "goToMakeOutfit('Cold Items', 'cold')">
                  <div class="container-title">{{ cold }}</div>
                  <img
                      src="../../../img/my_items_icons/cold.svg"
                      alt="Image of a cloud with wind gusts"
                      style="width:200px;"
                      @click.self="goToMakeOutfit('Cold Items', 'cold')"
                  />
              </div>

              <div class="temp-container" @click.self = "goToMakeOutfit('Freezing Items', 'freezing')">
                  <div class="container-title">{{ freezing }}</div>
                  <img
                      src="../../../img/my_items_icons/freezing.svg"
                      alt="Image of a snowflake"
                      style="width:200px;"
                      @click.self="goToMakeOutfit('Freezing Items', 'freezing')"
                  />
              </div>
          </div>
      </div>
    
      <!-- Allows child views [/warm, /hot, /just right, /chilly, /cold, /freezing] -->
      <router-view></router-view>

  </div>
</template>

<script>
import menuBar from "@/components/menuBars/menuBarLoggedIn.vue";
import NavBar from "@/NavBar/NavBar.vue";
import Modal from "../Modal/Modal.vue";

export default {
  name: "WebsiteMyItemsPage",
  components: {
    NavBar,
    menuBar,
    Modal
  },
  props: [
    "hot",
    "warm",
    "justRight",
    "title",
    "chilly",
    "cold",
    "freezing",
  ],
  data(){
    return {
      isModalVisible: false
    }
  },
  methods: {
    goToMakeOutfit(routeName, temperature){
      this.$router.push({ name: `${routeName}`, params: {temperature: `${temperature}`} })
    },
  },
};
</script>

<style scoped>

@keyframes fadeInAnimation {
    0% {
        opacity: 0;
    }
    100% {
        opacity: 1;
     }
}

* {
  animation: fadeInAnimation ease .5s;
  animation-iteration-count: 1;
  animation-fill-mode: forwards;
}

.my-items-nav-bar{
  z-index: 1;
}

.website-my-items-page {
  padding-top: 5%; /*TODO - Ideally want to look back at the navbar so that we dont need to hardcode applying padding of content of page*/
  display: flex;
  flex-direction: column;
  width: 100%;
  height: 100%;
  position: fixed;
  z-index: -1; /* Have to make xindex negative because of navbar*/
}

.title-container{
  padding: 5% 0%;
}

.container-title{
  text-align: center;
  font-family: var(--font-family-inter);
}

.top-row, .bottom-row{
  justify-content: center;
  align-items: center;
  display: flex;
  flex-direction: row;
}

.temp-container:hover{
  cursor:pointer;
}
  
.title {
  color: var(--black);
  font-family: var(--font-family-inter);
  font-size: var(--font-size-l);
  font-weight: 700;
  text-align: center;
}

/* For mobile screens */
@media screen and (max-width: 615px) {
  .top-row, .bottom-row{
    flex-direction: column;
  }
}

</style>
 
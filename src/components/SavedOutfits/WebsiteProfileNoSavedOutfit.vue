<template>
  <div>
    <nav-bar class="saved-outfits-nav-bar"></nav-bar>
    
    <!-- <div>
      <h1 class="title ui---30-semi">Saved Outfits</h1>
    </div> -->

    <div class="all-saved-outfits">
      <saved-outfit class="savedOutfit"
        v-for="outfit in savedOutfits"
        :key = "outfit.id"
        :location = "outfit.location"
        :temp = "outfit.temp"
        :temp_unit = "outfit.temp_unit"
        :temp_category="outfit.temp_category"

        :outerwear_name = "outfit.outerwear_name"
        :middlewear_name = "outfit.middlewear_name"
        :innerwear_name = "outfit.innerwear_name"
        :pants_name = "outfit.pants_name"
        :headwear_name = "outfit.headwear_name"
        :shoes_name = "outfit.shoes_name"

        :outerwear_img = "outfit.outerwear_img"
        :middlewear_img = "outfit.middlewear_img"
        :innerwear_img = "outfit.innerwear_img"
        :pants_img = "outfit.pants_img"
        :headwear_img = "outfit.headwear_img"
        :shoes_img = "outfit.shoes_img"

        :time_stamp = "outfit.time_stamp"
      >
      </saved-outfit>
    </div>
  </div>

</template>

<script>
import axios from "axios";
import ListboxComponent from "./ListboxComponent";
import InputField from "./InputField";
import SavedOutfit from "./SavedOutfit.vue";
import NavBar from "@/NavBar/NavBar.vue";
export default {
  name: "WebsiteProfileNoSavedOutfit",
  components: {
    NavBar,
    ListboxComponent,
    InputField,
    SavedOutfit
  },
  data(){
    return {
      userid: null,
      savedOutfits: []
    }
  },
  created() {
    this.getUserId().then(() => {this.getAllItems()});
  },
  props: ["plusMath", "defaultFrameLogo3", "ellipse6Props"],
  methods: {
    async getUserId() {
      try {
        const response = await axios.get("https://www-student.cse.buffalo.edu/CSE442-542/2023-Spring/cse-442a/backend/get_userid.php", { withCredentials: true });
        this.userid = response.data.userid;
        console.log("The user id is: " + this.userid)
      } catch (error) {
        console.error("Unsuccessful request in getUserId().", error);
      }
    },
    getAllItems(){
      axios.post("https://www-student.cse.buffalo.edu/CSE442-542/2023-Spring/cse-442a/backend/get_saved_outfits.php", 
      {
        user_id: this.userid,
      })
      .then(res => {
        if(res != null){
          let allMySavedOutfits = JSON.parse(JSON.stringify(res.data.message))
          this.savedOutfits = allMySavedOutfits
        } else {
          console.log("There was no data in the response")
        }
      }).catch((err) => {
        console.log(err)
      })
    }
  }
};
</script>

<style scoped>
.saved-outfits-nav-bar{
  top: -0.85%;
}

.all-saved-outfits{
  display:flex;
  flex-direction: column-reverse; /*Will show most recently saved outfit first*/
  margin-top: 10vh;
}

.screen a {
  display: contents;
  text-decoration: none;
}
.container-center-horizontal {
  display: flex;
  flex-direction: row;
  justify-content: center;
  pointer-events: none;
  width: 100%;
}
.container-center-horizontal > * {
  flex-shrink: 0;
  pointer-events: auto;
}
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
</style>
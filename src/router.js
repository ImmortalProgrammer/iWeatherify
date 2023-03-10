import Vue from "vue";
import Router from "vue-router";
import WebsiteProfileNoSavedOutfit from "./components/WebsiteProfileNoSavedOutfit";
import { websiteProfileNoSavedOutfitData } from "./data";

Vue.use(Router);

export default new Router({
  mode: "history",
  routes: [
    {
      path: "*",
      component: WebsiteProfileNoSavedOutfit,
      props: {
        title: "Saved Outfits",
        plusMath:
          "https://anima-uploads.s3.amazonaws.com/projects/6405ee9a4548b3806a50e138/releases/6405ef8c246cb8c2cd3b302a/img/plus-math@2x.png",
        add: "Add",
        defaultFrameLogo3:
          "https://anima-uploads.s3.amazonaws.com/projects/6405ee9a4548b3806a50e138/releases/6405ef8c246cb8c2cd3b302a/img/default-frame-logo-2@2x.png",
        noSavedOutfitsTrySavingOne: "No saved outfits, try saving one!",
        ellipse6Props: websiteProfileNoSavedOutfitData.ellipse6Props,
      },
    },
  ],
});

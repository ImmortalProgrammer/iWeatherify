import Vue from "vue";
import Router from "vue-router";
import WebsiteUnitsPage from "./components/DesktopUnits/WebsiteUnitsPage";
import WebsiteTemperatureSettingsPage from "./components/DesktopTemperatureSettings/WebsiteTemperatureSettingsPage";
import WebsiteHomePageNotLoggedIn from "./components/DesktopHomepageNotLoggedIn/WebsiteHomePageNotLoggedIn";
import WebsiteHomePageLoggedIn from "./components/DesktopHomepageLoggedIn/WebsiteHomePageLoggedIn";
import WebsiteMyItemsPage from "./components/DesktopMyItems/WebsiteMyItemsPage";
import WebsiteLocationSettings from "./components/DesktopLocationSettings/WebsiteLocationSettings";
import RegisterPage from "./components/RegistrationPage/RegisterPage";
import WebsiteLoginPage from "./components/LoginPage/WebsiteLoginPage";
import WebsiteProfileNoSavedOutfit from "./components/SavedOutfits/WebsiteProfileNoSavedOutfit";
import AddClothing from "./components/SavedOutfits/AddClothing";
import AddClothingModal from "./components/SavedOutfits/AddClothingModal";

import {
  websiteUnitsPageData,
  websiteTemperatureSettingsPageData,
  websiteHomePageNotLoggedInData,
  websiteMyItemsPageData,
  websiteLocationSettingsData,
  websiteHomePageLoggedInData,
  websiteProfileNoSavedOutfitData,
} from "./data";

Vue.use(Router);

function getCookie(name) {
  const value = `; ${document.cookie}`;
  const parts = value.split(`; ${name}=`);
  if (parts.length === 2) return parts.pop().split(';').shift();
}

const isUserLoggedIn = () => {
  const authToken = getCookie('auth_token');
  if (authToken) return true;
  return false;
};

const routes = [
  {
    name: "AddClothingModal",
    path: "/addClothingModal",
    component: AddClothingModal
  },
  {
    name: "SavedOutfits",
    path: "/savedOutfits",
    component: WebsiteProfileNoSavedOutfit,
    props: {
      plusMath:
          "https://anima-uploads.s3.amazonaws.com/projects/6405ee9a4548b3806a50e138/releases/6405ef8c246cb8c2cd3b302a/img/plus-math@2x.png",
      defaultFrameLogo3:
          "https://anima-uploads.s3.amazonaws.com/projects/6405ee9a4548b3806a50e138/releases/6405ef8c246cb8c2cd3b302a/img/default-frame-logo-2@2x.png",
      noSavedOutfitsTrySavingOne: "No saved outfits, try saving one!",
      ellipse6Props: websiteProfileNoSavedOutfitData.ellipse6Props,
    },
    meta: {
      needsAuth: true
    },
  },
  {
    name: "OutfitModal",
    path: "/addClothing",
    component: AddClothing,
    props: {
      defaultLogo4:
          "https://anima-uploads.s3.amazonaws.com/projects/6402851d6a37db7167320ed4/releases/640286bb66ed049392a82543/img/default-logo-4@2x.png",
      title: "Add a new outfit",
      ellipse6Props: websiteUnitsPageData.ellipse6Props
    }
  },
  {
    name: "NHomepage",
    path: "/",
    component: WebsiteHomePageNotLoggedIn,
    props: { ...websiteHomePageNotLoggedInData },
    meta: {
      needsLogout: true
    }
  },
  {
    name: "Register",
    path: "/register",
    component: RegisterPage,
    meta: {
      needsLogout: true
    }
  },
  {
    name: "Login",
    path: "/login",
    component: WebsiteLoginPage,
    meta: {
      needsLogout: true
    }
  },
  {
    name: "Homepage",
    path: "/homepage",
    component: WebsiteHomePageLoggedIn,
    props: { ...websiteHomePageLoggedInData },
    meta: {
      needsAuth: true
    },
  },
  {
    name: "LocationSettings",
    path: "/locationSettings",
    component: WebsiteLocationSettings,
    props: { ...websiteLocationSettingsData },
    meta: {
      needsAuth: true
    },
  },
  {
    name: "myItems",
    path: "/myItems",
    component: WebsiteMyItemsPage,
    props: { ...websiteMyItemsPageData },
    meta: {
      needsAuth: true
    },
  },
  {
    name: "Units",
    path: "/unitsSettings",
    component: WebsiteUnitsPage,
    props: {
      defaultLogo4:
          "https://anima-uploads.s3.amazonaws.com/projects/6402851d6a37db7167320ed4/releases/640286bb66ed049392a82543/img/default-logo-4@2x.png",
      title: "Units",
      ellipse6Props: websiteUnitsPageData.ellipse6Props
    },
    meta: {
      needsAuth: true
    },
  },
  {
    name: "TemperatureSettings",
    path: "/tempSettings",
    component: WebsiteTemperatureSettingsPage,
    props: {
      defaultLogo3:
          "https://anima-uploads.s3.amazonaws.com/projects/6402851d6a37db7167320ed4/releases/640286bb66ed049392a82543/img/default-logo-3@2x.png",
      title: "Temperature Settings",
      ellipse6Props: websiteTemperatureSettingsPageData.ellipse6Props,
    },
    meta: {
      needsAuth: true
    },
  }
];

const router = new Router({
  mode: "hash",
  routes,
});

router.beforeEach((to, from, next) => {
  if (to.meta.needsAuth) {
    if (isUserLoggedIn()) {
      next();
    } else {
      next('/login');
    }
  } else {
    if (to.meta.needsLogout) {
      if (!isUserLoggedIn()) {
        next();
      } else {
        next('/homepage')
      }
    }
    next();
  }
});

export default router;
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
import MakeOutfit from "./components/DesktopMyItems/MakeOutfit";
import TempItem from "./components/DesktopMyItems/TempItem";

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

const hotMyItemsClothings = [
  {
    name: "Hot Outerwear Items",
    path: "outerwear",
    component: TempItem,
    meta: {
      temp_category: "hot",
      clothing_category: "outerwear"
    }
  },
  {
    name: "Hot Middlewear Items",
    path: "middlewear",
    component: TempItem,
    meta: {
      temp_category: "hot",
      clothing_category: "middlwear"
    }
  },
  {
    name: "Hot Innerwear Items",
    path: "innerwear",
    component: TempItem,
    meta: {
      temp_category: "hot",
      clothing_category: "innerwear"
    }
  },
  {
    name: "Hot Pants Items",
    path: "pants",
    component: TempItem,
    meta: {
      temp_category: "hot",
      clothing_category: "pants"
    }
  },
  {
    name: "Hot Headwear Items",
    path: "headwear",
    component: TempItem,
    meta: {
      temp_category: "hot",
      clothing_category: "headwear"
    }
  },
  {
    name: "Hot Shoes Items",
    path: "shoes",
    component: TempItem,
    meta: {
      temp_category: "hot",
      clothing_category: "shoes"
    }
  }
]

const warmMyItemsClothings = [
  {
    name: "Warm Outerwear Items",
    path: "outerwear",
    component: TempItem,
    meta: {
      temp_category: "warm",
      clothing_category: "outerwear"
    }
  },
  {
    name: "Warm Middlewear Items",
    path: "middlewear",
    component: TempItem,
    meta: {
      temp_category: "warm",
      clothing_category: "middlewear",
    }
  },
  {
    name: "Warm Innerwear Items",
    path: "innerwear",
    component: TempItem,
    meta: {
      temp_category: "warm",
      clothing_category: "innerwear"
    }
  },
  {
    name: "Warm Pants Items",
    path: "pants",
    component: TempItem,
    meta: {
      temp_category: "warm",
      clothing_category: "pants"
    }
  },
  {
    name: "Warm Headwear Items",
    path: "headwear",
    component: TempItem,
    meta: {
      temp_category: "warm",
      clothing_category: "headwear"
    }
  },
  {
    name: "Warm Shoes Items",
    path: "shoes",
    component: TempItem,
    meta: {
      temp_category: "warm",
      clothing_category: "shoes"
    }
  }
]

const justRightMyItemsClothings = [
  {
    name: "Just Right Outerwear Items",
    path: "outerwear",
    component: TempItem,
    meta: {
      temp_category: "just right",
      clothing_category: "outerwear"
    }
  },
  {
    name: "Just Right Middlewear Items",
    path: "middlewear",
    component: TempItem,
    meta: {
      temp_category: "just right",
      clothing_category: "middlwear"
    }
  },
  {
    name: "Just Right Innerwear Items",
    path: "innerwear",
    component: TempItem,
    meta: {
      temp_category: "just right",
      clothing_category: "innerwear"
    }
  },
  {
    name: "Just Right Pants Items",
    path: "pants",
    component: TempItem,
    meta: {
      temp_category: "just right",
      clothing_category: "pants"
    }
  },
  {
    name: "Just Right Headwear Items",
    path: "headwear",
    component: TempItem,
    meta: {
      temp_category: "just right",
      clothing_category: "headwear"
    }
  },
  {
    name: "Just Right Shoes Items",
    path: "shoes",
    component: TempItem,
    meta: {
      temp_category: "just right",
      clothing_category: "shoes"
    }
  }
]

const chillyMyItemsClothings = [
  {
    name: "Chilly Outerwear Items",
    path: "outerwear",
    component: TempItem,
    meta: {
      temp_category: "chilly",
      clothing_category: "outerwear"
    }
  },
  {
    name: "Chilly Middlewear Items",
    path: "middlewear",
    component: TempItem,
    meta: {
      temp_category: "chilly",
      clothing_category: "middlwear"
    }
  },
  {
    name: "Chilly Innerwear Items",
    path: "innerwear",
    component: TempItem,
    meta: {
      temp_category: "chilly",
      clothing_category: "innerwear"
    }
  },
  {
    name: "Chilly Pants Items",
    path: "pants",
    component: TempItem,
    meta: {
      temp_category: "chilly",
      clothing_category: "pants"
    }
  },
  {
    name: "Chilly Headwear Items",
    path: "headwear",
    component: TempItem,
    meta: {
      temp_category: "chilly",
      clothing_category: "headwear"
    }
  },
  {
    name: "Chilly Shoes Items",
    path: "shoes",
    component: TempItem,
    meta: {
      temp_category: "chilly",
      clothing_category: "shoes"
    }
  }
]

const coldMyItemsClothings = [
  {
    name: "Cold Outerwear Items",
    path: "outerwear",
    component: TempItem,
    meta: {
      temp_category: "cold",
      clothing_category: "outerwear"
    }
  },
  {
    name: "Cold Middlewear Items",
    path: "middlewear",
    component: TempItem,
    meta: {
      temp_category: "cold",
      clothing_category: "middlwear"
    }
  },
  {
    name: "Cold Innerwear Items",
    path: "innerwear",
    component: TempItem,
    meta: {
      temp_category: "cold",
      clothing_category: "innerwear"
    }
  },
  {
    name: "Cold Pants Items",
    path: "pants",
    component: TempItem,
    meta: {
      temp_category: "cold",
      clothing_category: "pants"
    }
  },
  {
    name: "Cold Headwear Items",
    path: "headwear",
    component: TempItem,
    meta: {
      temp_category: "cold",
      clothing_category: "headwear"
    }
  },
  {
    name: "Cold Shoes Items",
    path: "shoes",
    component: TempItem,
    meta: {
      temp_category: "cold",
      clothing_category: "shoes"
    }
  }
]

const freezingMyItemsClothings = [
  {
    name: "Freezing Outerwear Items",
    path: "outerwear",
    component: TempItem,
    meta: {
      temp_category: "freezing",
      clothing_category: "outerwear"
    }
  },
  {
    name: "Freezing Middlewear Items",
    path: "middlewear",
    component: TempItem,
    meta: {
      temp_category: "freezing",
      clothing_category: "middlwear"
    }
  },
  {
    name: "Freezing Innerwear Items",
    path: "innerwear",
    component: TempItem,
    meta: {
      temp_category: "freezing",
      clothing_category: "innerwear"
    }
  },
  {
    name: "Freezing Pants Items",
    path: "pants",
    component: TempItem,
    meta: {
      temp_category: "freezing",
      clothing_category: "pants"
    }
  },
  {
    name: "Freezing Headwear Items",
    path: "headwear",
    component: TempItem,
    meta: {
      temp_category: "freezing",
      clothing_category: "headwear"
    }
  },
  {
    name: "Freezing Shoes Items",
    path: "shoes",
    component: TempItem,
    meta: {
      temp_category: "freezing",
      clothing_category: "shoes"
    }
  }
]

const routes = [
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
    children: [
      {
        name: "Warm Items",
        path: "warm",
        component: MakeOutfit,
        children: warmMyItemsClothings
      },
      {
        name: "Hot Items",
        path: "hot",
        component: MakeOutfit,
        children: hotMyItemsClothings
      },
      {
        name: "Just Right Items",
        path: "justRight",
        component: MakeOutfit,
        children: justRightMyItemsClothings
      },
      {
        name: "Chilly Items",
        path: "chilly",
        component: MakeOutfit,
        children: chillyMyItemsClothings
      },
      {
        name: "Cold Items",
        path: "cold",
        component: MakeOutfit,
        children: coldMyItemsClothings
      },
      {
        name: "Freezing Items",
        path: "freezing",
        component: MakeOutfit,
        children: freezingMyItemsClothings
      },
    ]
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
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
import {
  websiteUnitsPageData,
  websiteTemperatureSettingsPageData,
  websiteHomePageNotLoggedInData,
  websiteMyItemsPageData,
  websiteLocationSettingsData,
  websiteHomePageLoggedInData,
} from "./data";

Vue.use(Router);

const isUserLoggedIn = () => {
  const token = localStorage.getItem('token');
  if (token) return true;
  return false;
};

const routes = [
  {
    name: "NHomepage",
    path: "/",
    component: WebsiteHomePageNotLoggedIn,
    props: { ...websiteHomePageNotLoggedInData },
    meta: {
      needsLogOut: true
    },
  },
  {
    name: "Register",
    path: "/register",
    component: RegisterPage,
    meta: {
      needsLogOut: true
    },
  },
  {
    name: "Login",
    path: "/login",
    component: WebsiteLoginPage,
    meta: {
      needsLogOut: true
    },
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
    if (to.meta.needsLogOut) {
      if (!isUserLoggedIn()) {
        next();
      } else {
        next('/homepage');
      }
    } else {
      next('/');
    }
  }
});

export default router;
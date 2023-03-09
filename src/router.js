import Vue from "vue";
import Router from "vue-router";
import MobileUnits from "./components//MobileUnits/MobileUnits";
import MobileTemperature from "./components//MobileTemperatureSettings/MobileTemperature";
import WebsiteUnitsPage from "./components/DesktopUnits/WebsiteUnitsPage";
import WebsiteTemperatureSettingsPage from "./components/DesktopTemperatureSettings/WebsiteTemperatureSettingsPage";
import WebsiteHomePageNotLoggedIn from "./components/DesktopHomepageNotLoggedIn/WebsiteHomePageNotLoggedIn";
import WebsiteHomePageLoggedIn from "./components/DesktopHomepageLoggedIn/WebsiteHomePageLoggedIn";
import MobileHomepage from "./components/MobileHomepageNotLoggedIn/MobileHomepage";
import WebsiteMyItemsPage from "./components/DesktopMyItems/WebsiteMyItemsPage";
import WebsiteLocationSettings from "./components/DesktopLocationSettings/WebsiteLocationSettings";

import RegisterPage from "./components/RegistrationPage/RegisterPage";
import WebsiteLoginPage from "./components/LoginPage/WebsiteLoginPage";
import {
  mobileUnitsData,
  mobileTemperatureData,
  websiteUnitsPageData,
  websiteTemperatureSettingsPageData,
  websiteHomePageNotLoggedInData,
  mobileHomepageData,
  websiteMyItemsPageData,
  websiteLocationSettingsData,
  websiteHomePageLoggedInData,
} from "./data";

Vue.use(Router);

export default new Router({
  mode: "hash",
  routes: [
    {
      path: "/register",
      component: RegisterPage
    }, 
    {
      path: "/login",
      component: WebsiteLoginPage
    },
    {
      path: "/homepage-logged-in",
      component: WebsiteHomePageLoggedIn,
      props: { ...websiteHomePageLoggedInData },
    },
    {
      path: "/website-location-settings",
      component: WebsiteLocationSettings,
      props: { ...websiteLocationSettingsData },
    },
    {
      path: "/website-my-items",
      component: WebsiteMyItemsPage,
      props: { ...websiteMyItemsPageData },
    },
    {
      path: "/mobile-units",
      component: MobileUnits,
      props: { title: "Units", iosStatusBarBlackProps: mobileUnitsData.iosStatusBarBlackProps },
    },
    {
      path: "/mobile-temperature",
      component: MobileTemperature,
      props: {
        title: "Temperature",
        setYourPreference: "Set your preference for each temperature range",
        text1: "100<br /><br /><br />75<br /><br /><br />50<br /><br /><br />25<br /><br /><br />0",
        hotWarmJustRight:
          "Hot<br /><br /><br />Warm<br /><br /><br />Just right<br /><br /><br />Chilly<br /><br />Cold<br /><br />Freezing",
        iosStatusBarBlackProps: mobileTemperatureData.iosStatusBarBlackProps,
      },
    },
    {
      path: "/website-units-page",
      component: WebsiteUnitsPage,
      props: {
        defaultLogo4:
          "https://anima-uploads.s3.amazonaws.com/projects/6402851d6a37db7167320ed4/releases/640286bb66ed049392a82543/img/default-logo-4@2x.png",
        title: "Units",
        ellipse6Props: websiteUnitsPageData.ellipse6Props,
        tableRow1Props: websiteUnitsPageData.tableRow1Props,
        tableRow2Props: websiteUnitsPageData.tableRow2Props,
        tableRow3Props: websiteUnitsPageData.tableRow3Props,
        tableRow4Props: websiteUnitsPageData.tableRow4Props,
      },
    },
    {
      path: "/website-temperature-settings-page",
      component: WebsiteTemperatureSettingsPage,
      props: {
        defaultLogo3:
          "https://anima-uploads.s3.amazonaws.com/projects/6402851d6a37db7167320ed4/releases/640286bb66ed049392a82543/img/default-logo-3@2x.png",
        title: "Temperature Settings",
        text1:
          "100<br /><br /><br /><br /><br />75<br /><br /><br /><br /><br />50<br /><br /><br /><br /><br /><br />25<br /><br /><br /><br /><br /><br />0",
        hotWarmJustRight:
          "Hot<br /><br /><br /><br /><br />Warm<br /><br /><br />Just right<br /><br /><br /><br />Chilly<br /><br /><br /><br /><br />Cold<br /><br /><br /><br />Freezing",
        ellipse6Props: websiteTemperatureSettingsPageData.ellipse6Props,
      },
    },
    {
      path: "/mobile-homepage-not-logged-in",
      component: MobileHomepage,
      props: {
        iOSStatusBarBlackProps: mobileHomepageData.iOSStatusBarBlackProps,
        inputSearchProps: mobileHomepageData.inputSearchProps,
        weatherProps: mobileHomepageData.weatherProps,
        outfitOfTheDayProps: mobileHomepageData.outfitOfTheDayProps,
      },
    },
    {
      path: "*",
      component: WebsiteHomePageNotLoggedIn,
      props: { ...websiteHomePageNotLoggedInData },
    },
  ],
});

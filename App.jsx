import "./App.css";
import React from "react";
import { Switch, BrowserRouter as Router, Route } from "react-router-dom";
import WebsiteHomePageNotLoggedIn from "./components/WebsiteHomePageNotLoggedIn";

class App extends React.Component {
  render() {
    return (
      <Router>
        <Switch>
          <Route path="/:path(|website-home-page-not-logged-in)">
            <WebsiteHomePageNotLoggedIn {...websiteHomePageNotLoggedInData} />
          </Route>
        </Switch>
      </Router>
    );
  }
}

export default App;
const inputSearchData = {
    inputSearch: "/img/bg.png",
    inputType: "text",
    inputPlaceholder: "Search city or zip",
};

const weatherData = {
    place: "New York",
    text1: "45°",
    h50L40: <React.Fragment>H: 50 L:40<br />Feels like: 40</React.Fragment>,
};

const outfitOfTheDayData = {
    outfitOfTheDay: "Outfit of the day!",
    line81: "/img/line-81.png",
    line82: "/img/line-82.png",
    spanText: <React.Fragment>Consider wearing...<br />T-shirt<br />Sweater<br />Jeans<br />Sneakers</React.Fragment>,
};

const now1Data = {
    now: "Now",
    className: "",
};

const now2Data = {
    now: "10:00",
    className: "now-2",
};

const now3Data = {
    now: "11:00",
    className: "now-4",
};

const weatherThroughoutTheDay1Data = {
    now1Props: now1Data,
    now2Props: now2Data,
    now3Props: now3Data,
};

const now4Data = {
    now: "12:00",
    className: "now-6",
};

const now5Data = {
    now: "13:00",
    className: "now-8",
};

const now6Data = {
    now: "14:00",
    className: "now-10",
};

const weatherThroughoutTheDay2Data = {
    now1Props: now4Data,
    now2Props: now5Data,
    now3Props: now6Data,
};

const now7Data = {
    now: "15:00",
    className: "now-12",
};

const now8Data = {
    now: "16:00",
    className: "now-14",
};

const now9Data = {
    now: "17:00",
    className: "now-16",
};

const weatherThroughoutTheDay3Data = {
    now1Props: now7Data,
    now2Props: now8Data,
    now3Props: now9Data,
};

const websiteHomePageNotLoggedInData = {
    overlapGroup3: "/img/background-img.png",
    homeLogo2: "/img/home-logo-2@2x.png",
    loginToViewAPers: "Login to view a personalized outfit of the day!",
    inputSearchProps: inputSearchData,
    weatherProps: weatherData,
    outfitOfTheDayProps: outfitOfTheDayData,
    weatherThroughoutTheDay1Props: weatherThroughoutTheDay1Data,
    weatherThroughoutTheDay2Props: weatherThroughoutTheDay2Data,
    weatherThroughoutTheDay3Props: weatherThroughoutTheDay3Data,
};


import React from "react";
import InputSearch from "../InputSearch";
import Weather from "../Weather";
import OutfitOfTheDay from "../OutfitOfTheDay";
import WeatherThroughoutTheDay from "../WeatherThroughoutTheDay";
import Ellipse6 from "../Ellipse6";
import "./WebsiteHomePageNotLoggedIn.css";

class WebsiteHomePageNotLoggedIn extends React.Component {
  render() {
    const {
      overlapGroup3,
      homeLogo2,
      loginToViewAPers,
      inputSearchProps,
      weatherProps,
      outfitOfTheDayProps,
      weatherThroughoutTheDay1Props,
      weatherThroughoutTheDay2Props,
      weatherThroughoutTheDay3Props,
    } = this.props;

    return (
      <div className="container-center-horizontal">
        <div className="website-home-page-not-logged-in screen">
          <div className="overlap-group3" style={{ backgroundImage: `url(${overlapGroup3})` }}>
            <img className="home-logo-2" src={homeLogo2} alt="Home Logo 2" />
            <div className="flex-col">
              <InputSearch
                inputSearch={inputSearchProps.inputSearch}
                inputType={inputSearchProps.inputType}
                inputPlaceholder={inputSearchProps.inputPlaceholder}
              />
              <div className="flex-row">
                <Weather place={weatherProps.place} text1={weatherProps.text1} h50L40={weatherProps.h50L40} />
                <div className="overlap-group4">
                  <OutfitOfTheDay
                    outfitOfTheDay={outfitOfTheDayProps.outfitOfTheDay}
                    line81={outfitOfTheDayProps.line81}
                    line82={outfitOfTheDayProps.line82}
                    spanText={outfitOfTheDayProps.spanText}
                  />
                  <div className="rectangle-263"></div>
                  <h1 className="login-to-view-a-pers">{loginToViewAPers}</h1>
                </div>
              </div>
              <div className="weather-for-today">
                <WeatherThroughoutTheDay
                  now1Props={weatherThroughoutTheDay1Props.now1Props}
                  now2Props={weatherThroughoutTheDay1Props.now2Props}
                  now3Props={weatherThroughoutTheDay1Props.now3Props}
                />
                <WeatherThroughoutTheDay
                  now1Props={weatherThroughoutTheDay2Props.now1Props}
                  now2Props={weatherThroughoutTheDay2Props.now2Props}
                  now3Props={weatherThroughoutTheDay2Props.now3Props}
                />
                <WeatherThroughoutTheDay
                  now1Props={weatherThroughoutTheDay3Props.now1Props}
                  now2Props={weatherThroughoutTheDay3Props.now2Props}
                  now3Props={weatherThroughoutTheDay3Props.now3Props}
                />
              </div>
            </div>
            <Ellipse6 />
            <img className="vector" src="/img/vector@2x.png" alt="Vector" />
          </div>
        </div>
      </div>
    );
  }
}

export default WebsiteHomePageNotLoggedIn;

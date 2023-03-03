import React from "react";
import Now from "../Now";
import "./WeatherThroughoutTheDay.css";

class WeatherThroughoutTheDay extends React.Component {
  render() {
    const { now1Props, now2Props, now3Props } = this.props;

    return (
      <article className="weather-throughout-the-day">
        <Now now={now1Props.now} className={now1Props.className} />
        <Now now={now2Props.now} className={now2Props.className} />
        <Now now={now3Props.now} className={now3Props.className} />
      </article>
    );
  }
}

export default WeatherThroughoutTheDay;

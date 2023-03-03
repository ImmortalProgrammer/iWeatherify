import React from "react";
import "./Now.css";

class Now extends React.Component {
  render() {
    const { now, className } = this.props;

    return (
      <div className={`now ${className || ""}`}>
        <div className="now-1 inter-medium-black-16px">{now}</div>
        <img
          className="fluentweather-rain-s"
          src="/img/fluent-weather-rain-showers-day-24-regular@2x.png"
          alt="fluent:weather-rain-showers-day-24-regular"
        />
        <div className="group-2">
          <div className="overlap-group2">
            <div className="overlap-group1-1">
              <div className="number inter-normal-black-12px">20</div>
              <div className="degree"></div>
            </div>
            <div className="text inter-normal-black-12px">/</div>
          </div>
          <div className="overlap-group-1">
            <div className="number inter-normal-black-12px">24</div>
            <div className="degree"></div>
          </div>
        </div>
        <div className="x74-rain inter-normal-black-12px">74% rain</div>
      </div>
    );
  }
}

export default Now;

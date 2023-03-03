import React from "react";
import "./Weather.css";

class Weather extends React.Component {
  render() {
    const { place, text1, h50L40 } = this.props;

    return (
      <div className="weather">
        <div className="place ui---30-regular">{place}</div>
        <div className="overlap-group">
          <div className="text-1">{text1}</div>
          <p className="h-50-l40 ui---16-regular">{h50L40}</p>
        </div>
      </div>
    );
  }
}

export default Weather;

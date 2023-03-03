import React from "react";
import "./OutfitOfTheDay.css";

class OutfitOfTheDay extends React.Component {
  render() {
    const { outfitOfTheDay, line81, line82, spanText } = this.props;

    return (
      <div className="outfit-of-the-day ui---16-regular">
        <div className="outfit-of-the-day-1">{outfitOfTheDay}</div>
        <div className="overlap-group1">
          <div className="rectangle-242"></div>
          <img className="line-81" src={line81} alt="Line 81" />
          <img className="line-82" src={line82} alt="Line 82" />
        </div>
        <div className="consider-wearing">
          <span className="ui---16-regular">{spanText}</span>
        </div>
      </div>
    );
  }
}

export default OutfitOfTheDay;

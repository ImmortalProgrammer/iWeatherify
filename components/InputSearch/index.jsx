import React from "react";
import "./InputSearch.css";

class InputSearch extends React.Component {
  render() {
    const { inputSearch, inputType, inputPlaceholder } = this.props;

    return (
      <div className="input-search" style={{ backgroundImage: `url(${inputSearch})` }}>
        <input className="search" name="search" placeholder={inputPlaceholder} type={inputType} required />
      </div>
    );
  }
}

export default InputSearch;

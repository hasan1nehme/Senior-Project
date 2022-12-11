
import React, { useState } from "react";
import ReactDOM from "react-dom";

import "./css/Signup.css";

function Offerride() {
  
  const [errorMessages, setErrorMessages] = useState({});
  const [isSubmitted, setIsSubmitted] = useState(false);

  
  

  

  const handleSubmit = (event) => {
    
    event.preventDefault();

    var { loc, seat, fee } = document.forms[0];

    
    

    
    
  };

  
  const renderErrorMessage = (name) =>
    name === errorMessages.name && (
      <div className="error">{errorMessages.message}</div>
    );

  
  const renderForm = (
    <div className="form">
      <form onSubmit={handleSubmit}>
      <div className="input-container">
          <label>Location </label>
          <input type="text" name="loc" required />
          {renderErrorMessage("loc")}
        </div>
        <div className="input-container">
          <label>Available Seats </label>
          <input type="text" name="seat" required />
          {renderErrorMessage("seat")}
        </div>
        <div className="input-container">
          <label>Fee </label>
          <input type="text" name="fee" required />
          {renderErrorMessage("fee")}
        </div>
        <div className="button-container">
          <input type="submit" />
        </div>
      </form>
    </div>
  );

  return (
    <div className="app">
      <div className="signup-form">
        <div className="title">Offer Ride</div>
        {isSubmitted ? <div>User is has signed up</div> : renderForm}
      </div>
    </div>
  );
}

export default Offerride;
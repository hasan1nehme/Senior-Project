

import React, { useState } from "react";
import ReactDOM from "react-dom";

import "./css/Signup.css";

function Signup() {
  
  const [errorMessages, setErrorMessages] = useState({});
  const [isSubmitted, setIsSubmitted] = useState(false);

  
  

  

  const handleSubmit = (event) => {
    
    event.preventDefault();

    var { uname, pass, fname, lname, email, number } = document.forms[0];

    
    

    
    
  };

  
  const renderErrorMessage = (name) =>
    name === errorMessages.name && (
      <div className="error">{errorMessages.message}</div>
    );

  
  const renderForm = (
    <div className="form">
      <form onSubmit={handleSubmit}>
      <div className="input-container">
          <label>First Name </label>
          <input type="text" name="fname" required />
          {renderErrorMessage("fname")}
        </div>
        <div className="input-container">
          <label>Last Name </label>
          <input type="text" name="lname" required />
          {renderErrorMessage("lname")}
        </div>
        <div className="input-container">
          <label>Username </label>
          <input type="text" name="uname" required />
          {renderErrorMessage("uname")}
        </div>
        <div className="input-container">
          <label>Email </label>
          <input type="text" name="email" required />
          {renderErrorMessage("email")}
        </div>
        <div className="input-container">
          <label>Password </label>
          <input type="text" name="pass" required />
          {renderErrorMessage("pass")}
        </div>
        <div className="input-container">
          <label>Phone number </label>
          <input type="text" name="number" required />
          {renderErrorMessage("number")}
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
        <div className="title">Sign Up</div>
        {isSubmitted ? <div>User is has signed up</div> : renderForm}
      </div>
    </div>
  );
}

export default Signup;
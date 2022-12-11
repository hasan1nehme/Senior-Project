
import React, { useState } from "react";
import ReactDOM from "react-dom";

import "./css/Profile.css";

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
          <h3 className="pr1">Name</h3>
          <label className="ed" name="aname" required >Your name</label>
          {renderErrorMessage("aname")}
        </div>
        <div className="input-container">
        <h3 className="pr1">UserName</h3>
          <label className="ed" name="uname" required >Your UserName</label>
          {renderErrorMessage("uname")}
        </div>
        <div className="input-container">
        <h3 className="pr1">Email</h3>
          <label className="ed" name="email" required >Your Email</label>
          {renderErrorMessage("email")}
        </div>
        <div className="input-container">
          <h3 className="pr1">Phone Number</h3>
          <label className="ed" name="number" required >Your Phone Number</label>
          {renderErrorMessage("number")}
        </div>
        
      </form>
    </div>
  );

  return (
    <div className="app">
      <div className="signup-form">
        <div className="title">Profile</div>
        {isSubmitted ? <div>User is has signed up</div> : renderForm}
      </div>
    </div>
  );
}

export default Signup;
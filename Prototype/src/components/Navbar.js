import React, { Component } from 'react'
import {Link, NavLink} from 'react-router-dom'
import {BrowserRouter as Router, Route, Routes} from 'react-router-dom'
import './css/Navbar.css'
import Logo from './images/logo.png'

export class Navbar extends Component {
  render() {
    return (
    

<div>
        
        <nav className="navbar">
        <img id="img1" src={Logo} alt="Carpooling Logo" />
            <h2 className='hello'>PU Carpool</h2>
        <div className="name">
  
          <Routes>
  
          
              <Route path="/" exact >Home</Route>
              <Route path ="/FindRide">Find Ride</Route>
              <Route path="/OfferRide">Offer Ride</Route>
              <Route path="/Profile">Profile</Route>
              <Route path="/SignUp">Sign Up</Route>
              <Route path="/SignIn">Sign In</Route>
  
          </Routes>
  
        </div>

        <ul className="nav-links">
            
            <div  className="menu">

                <li className='listt'><NavLink end to="/" className='navv' activeStyle={{borderBottom: "2px solid rgba(211,15,228,1)", transition: "0.2s",color: "rgba(211,15,228,1)" ,textDecoration:"none"}}>Home</NavLink></li>
                <li className='listt'><NavLink to="FindRide" className='navv' activeStyle={{borderBottom: "2px solid rgba(211,15,228,1)", transition: "0.2s",color: "rgba(211,15,228,1)" ,textDecoration:"none"}}>Find Ride</NavLink></li>
                <li className='listt'><NavLink to="OfferRide" className='navv' activeStyle={{borderBottom: "2px solid rgba(211,15,228,1)", transition: "0.2s",color: "rgba(211,15,228,1)" ,textDecoration:"none"}}>Offer Ride</NavLink></li>
                <li className='listt'><NavLink to="Profile" className='navv' activeStyle={{borderBottom: "2px solid rgba(211,15,228,1)", transition: "0.2s",color: "rgba(211,15,228,1)" ,textDecoration:"none"}}>Profile</NavLink></li>
                <li className='listt'><NavLink to="Signup" className='navv' activeStyle={{borderBottom: "2px solid rgba(211,15,228,1)", transition: "0.2s",color: "rgba(211,15,228,1)" ,textDecoration:"none"}}>Sign Up</NavLink></li>
                <li className='listt'><NavLink to="Signin" className='navv' activeStyle={{borderBottom: "2px solid rgba(211,15,228,1)", transition: "0.2s",color: "rgba(211,15,228,1)" ,textDecoration:"none"}}>Sign In</NavLink></li>

            </div>

        </ul>
        </nav>

      </div>
    )
  }
}

export default Navbar
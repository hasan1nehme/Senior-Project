import './App.css';
import Navbar from './components/Navbar';
import Findride from './components/Findride';
import Home from './components/Home';
import Offerride from './components/Offerride';
import Profile from './components/Profile';
import Signin from './components/Signin';
import Signup from './components/Signup';
import {BrowserRouter as Router, Route, Routes} from 'react-router-dom'
import React, { Component }  from 'react';

function App() {
  return (
    <Router>
    <div className="App">
      <Navbar></Navbar>

      <div className='bas'>

          
<Routes>

<Route path='/' exact element={<Home/>} />
<Route path='/FindRide' element={<Findride/>} />
<Route path='/OfferRide' element={<Offerride/>} />
<Route path='/Profile' element={<Profile/>} />
<Route path='/SignUp' element={<Signup/>} />
<Route path='/SignIn' element={<Signin/>} />


</Routes>

</div>
    </div>
    </Router>
  );
}

export default App;

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

<Route className='rou' path='/' exact element={<Home/>} />
<Route className='rou' path='/FindRide' element={<Findride/>} />
<Route className='rou' path='/OfferRide' element={<Offerride/>} />
<Route className='rou' path='/Profile' element={<Profile/>} />
<Route className='rou' path='/SignUp' element={<Signup/>} />
<Route className='rou' path='/SignIn' element={<Signin/>} />


</Routes>

</div>
    </div>
    </Router>
  );
}

export default App;

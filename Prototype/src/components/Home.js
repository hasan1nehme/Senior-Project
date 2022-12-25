import React, { Component } from 'react'
import './css/Home.css'
import Img1 from './images/pulogo.png'

export class Home extends Component {
  render() {
    return (
      <div>

        <h1 className='intr'>Welcome to PU Carpool!</h1>
        <img id="img2" src={Img1} alt="Phoenicia University" />

        <h1 className='heading'>What is PU Carpool?</h1>
        <h3 className='tex'>PU Carpool is a website developed to help Phoenicia University students 
        find rides to and from the university with other students.
        </h3>

        <hr class="hr1" ></hr>

        <h1 className='heading1'>How do i find a ride?</h1>
        <h3 className='tex'>On PU Carpool, finding a ride is really simple, you dont even need to sign 
        in! Just click on the 'Find Ride' item in the navigation bar and you will be able to find all
        all the available rides with the location, name, and phone number of the driver. Plus how many
        seats are available.
        </h3>

        <hr class="hr1" ></hr>

        <h1 className='heading1'>How do i offer a ride?</h1>
        <h3 className='tex1'>To offer A ride, first you will have to sign up, then sign in, then press
        the 'Offer Ride' item in the navigation bar. there, you will be asked to fill in some information.

        </h3>

      </div>
    )
  }
}

export default Home
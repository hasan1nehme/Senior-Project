import React, { Component } from 'react'
import './css/Findride.css'

const arrayOfObjects = [
  { name: "hasan nehme", location: "saida", seats:"2", phone:"03/567890", email:"xyz@gmail.com", fee:"0 L.L"},
  { name: "ali darwish", location: "sour", seats:"1", phone:"01/464950", email:"qwe@gmail.com", fee:"100,000 L.L"},
  { name: "ali jawad", location: "beirut", seats:"3", phone:"07/364923", email:"rty@gmail.com", fee:"0 L.L"},
  { name: "mousa wazne", location: "sarafand", seats:"2", phone:"09/937398", email:"uio@gmail.com", fee:"300,000 L.L"},
  { name: "mohamad mahdi", location: "nabatieh", seats:"3", phone:"08/128403", email:"sdg@gmail.com", fee:"0 L.L"}
];

export class Findride extends Component {
  render() {
    return (
      <div>

        {arrayOfObjects.map(({ name, location, seats, phone, email, fee }) => (

          <div className='box1'>

            <h3 className='fi'>Name:   </h3>
            <p className='pp' key={name}>{name}</p>
            <br></br>

            <h3 className='fi'>Location:   </h3>
            <p className='pp' key={location}>{location}</p>
            <br></br>

            <h3 className='fi'>Available Seats:   </h3>
            <p className='pp' key={seats}>{seats}</p>
            <br></br>

            <h3 className='fi'>Fee:   </h3>
            <p className='pp' key={fee}>{fee}</p>
            <br></br>

            <h3 className='fi'>Phone Number:    </h3>
            <p className='pp' key={phone}>{phone}</p>
            <br></br>

            <h3 className='fi'>Email:   </h3>
            <p className='pp'key={email}>{email}</p>

          </div>
        
      ))}

      </div>
    )
  }
}

export default Findride
import React, { Component } from 'react'

import './About.scss'

export default class extends Component {
    render = () => (
      <section className="about-page">
        <div className="about-message">
          made with <span className="grey">passion</span> by
        </div>
        <div className="about-box">
          <div className="about-information-box">
            <img className="about-image" />
            <h3>Laure Issa</h3>
            <h4>PROJECT JEFFE</h4>
            <h5>/</h5>
          </div>
          <div className="about-information-box">
            <img className="about-image" />
            <h3>Valentin Dufois</h3>
            <h4>FRONTEND MANAGER</h4>
            <h5>/</h5>
          </div>
          <div className="about-information-box">
            <img className="about-image" />
            <h3>Marie-Lou Barbier</h3>
            <h4>FRONTEND DEVELOPPER</h4>
            <h5>/</h5>
          </div>
          <div className="about-information-box">
            <img className="about-image" />
            <h3>Guillaume Lollier</h3>
            <h4>BACKEND MANAGER</h4>
            <h5>/</h5>
          </div>
          <div className="about-information-box plus">
            <img className="about-image" />
            <h3>Audrey Combe, Nina De Castro, Stella Poulain</h3>
            <h4>BACKEND DEVELOPPERS</h4>
            <h5>/</h5>
          </div>
        </div>
      </section>
    )
}

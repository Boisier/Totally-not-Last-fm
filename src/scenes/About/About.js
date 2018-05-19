import React, { Component } from 'react'

import aboutInformation from 'assets/json/about.json'

export default class extends Component {
    render = () => (
      <section className="about-page">
        <div className="about-message">
          made with <span>rythm</span> by
        </div>
        <div className="about-box">
          {
            aboutInformation.map((info) =>
              <div className="about-information-box" key={info.name}>
                <img className="about-image" alt={info.urlImg} src={require('assets/images/' + info.urlImg)} />
                <h3>{info.name}</h3>
                <h4>{info.role}</h4>
                <h5><span>♪ </span>{info.music[Math.floor(Math.random() * Math.floor(info.music.length))]}</h5>
              </div>
            )
          }
          <div className="about-information-box">
            Ecole d'ingénieur IMAC
          </div>
        </div>
      </section>
    )
}

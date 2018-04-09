import React, { Component } from 'react'

import './Landing.scss'

export default class extends Component {
  render = () => {
    return (
      <section id="landing-page">
        <div className="top-part" />
        <div className="bottom-part">
          <h5 className="caption">What does your music says about you ?</h5>
          <h1 className="title line-1">Totally not</h1>
          <h1 className="title line-2">Last fm</h1>
          <div className="access-form">
            <input type="text" id="access-input-form" placeholder="Enter your e-mail address" />
            <input type="button" value="Find out now" />
          </div>
        </div>
      </section>
    )
  }
}

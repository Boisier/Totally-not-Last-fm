import React, { Component } from 'react'

import './StatsPeriodesNavBar.scss'

export default class extends Component {
  render = () => (
    <nav className="stats-period-nav">
      <div className="stats-bar">
      </div>
      <ul className="side-nav">
        <li>d<span>aily</span></li>
        <li>w<span>eekly</span></li>
        <li>m<span>onthly</span></li>
        <li>y<span>early</span></li>
      </ul>
    </nav>
  )
}

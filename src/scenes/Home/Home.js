import React, { Component } from 'react'
import { Link } from 'react-router-dom'

import StatsPeriodesNavBar from './scenes/StatsPeriodesNavBar/StatsPeriodesNavBar'

export default class extends Component {
  render = () => (
    <section className="home-page">
      <StatsPeriodesNavBar />
      <Link to="/about">ABOUT</Link>
    </section>
  )
}

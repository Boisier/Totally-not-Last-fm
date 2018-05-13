import React, { Component } from 'react'

import StatsPeriodesNavBar from './scenes/StatsPeriodesNavBar/StatsPeriodesNavBar'
import StatsSection from './scenes/StatsSection/StatsSection'

export default class extends Component {
  render = () => (
    <section className="home-page">
      <StatsPeriodesNavBar />
      <section className="home-stats">
        <StatsSection period="0" />
        <StatsSection period="1" />
        <StatsSection period="2" />
        <StatsSection period="3" />
      </section>
    </section>
  )
}

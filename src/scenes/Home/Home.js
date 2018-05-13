import React, { Component } from 'react'

import StatsPeriodesNavBar from './scenes/StatsPeriodesNavBar/StatsPeriodesNavBar'
import StatsSection from './scenes/StatsSection/StatsSection'

export default class extends Component {
  render = () => (
    <section className="home-page">
      <StatsPeriodesNavBar />
      <StatsSection period="0" />
    </section>
  )
}

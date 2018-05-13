import React, { Component } from 'react'

import StatsPeriodesNavBar from './scenes/StatsPeriodesNavBar/StatsPeriodesNavBar'
import StatsSection from './scenes/StatsSection/StatsSection'

import stats from 'library/stats'

export default class extends Component {
  render = () => (
    <section className="home-page">
      <StatsPeriodesNavBar />
      <StatsSection period={ stats.periods[0].key }/>
    </section>
  )
}

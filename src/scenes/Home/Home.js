import React, { Component } from 'react'

import StatsPeriodesNavBar from './scenes/StatsPeriodesNavBar/StatsPeriodesNavBar'
import StatsSection from './scenes/StatsSection/StatsSection'

export default class extends Component {
  constructor (props) {
    super(props)
    this.state = {period: 0}
  }
  showPeriodStats = (period) => {
    this.setState({period: period})
  }
  
  render = () => (
    <section className="home-page">
      <StatsPeriodesNavBar showPeriodStats={this.showPeriodStats}/>
      <section className="home-stats">
        <StatsSection period={this.state.period} />
      </section>
    </section>
  )
}

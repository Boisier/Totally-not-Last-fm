// React
import React, { Component } from 'react'

import './MultipleStatsPeriodes.scss'

import StatsPeriodesNavBar from '../StatsPeriodesNavBar/StatsPeriodesNavBar'
import MultipleStatsSection from '../StatsSection/StatsSection'

export default class extends Component {
  render = () => (
    <section className="multiple-stats-periods">
      <StatsPeriodesNavBar />
      <section className="multiple-stats-periods-container">
        <MultipleStatsSection period="day"/>
        <MultipleStatsSection period="week"/>
        <MultipleStatsSection period="month"/>
        <MultipleStatsSection period="year"/>
      </section>
    </section>
  )
}

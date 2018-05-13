import React, { Component } from 'react'

import stats from 'library/stats'

import StatBlock from '../StatBlock/StatBlock'
import PeriodSections from '../PeriodSections/PeriodSections'

export default class extends Component {
  constructor (props) {
    super(props)

    this.state = {
      period: this.props.period,
      periodName: stats.periods[this.props.period].name,
      currentSection: 0
    }
  }

  onSectionChange = (newSection) => {
    console.log(this.state.periodName + ' ' + newSection)
    this.setState({
      currentSection: newSection
    })
  }

  render () {
    return (
      <div className="stats-section">
        <PeriodSections
          period={this.props.period}
          section={this.state.currentSection}
          onSectionChange={this.onSectionChange} />
        <StatBlock size="wide" />
        <StatBlock />
        <StatBlock />
      </div>
    )
  }
}

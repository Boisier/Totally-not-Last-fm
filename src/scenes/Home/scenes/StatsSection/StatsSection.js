import React, { Component } from 'react'
import ReactCSSTransitionGroup from 'react-addons-css-transition-group'

import stats from 'library/stats'

import StatBlock from '../StatBlock/StatBlock'
import PeriodSections from '../PeriodSections/PeriodSections'

export default class extends Component {
  constructor (props) {
    super(props)

    this.state = {
      period: this.props.period,
      periodName: stats.periods[this.props.period].name,
      currentSection: 0,
      oldSection: 0
    }
  }

  onSectionChange = (newSection) => {
    console.log(this.state.periodName + ' ' + newSection)
    this.setState({
      currentSection: newSection,
      oldSection: this.state.currentSection
    })
  }

  render () {
    const statBlocks = (
      <div className="stats-wrapper" key={this.state.periodName + '-' + this.state.currentSection}>
        <StatBlock size="wide" />
        <StatBlock />
        <StatBlock />
      </div>
    )

    return (
      <div className="stats-section">
        <PeriodSections
          period={this.props.period}
          section={this.state.currentSection}
          onSectionChange={this.onSectionChange} />
        <ReactCSSTransitionGroup
          transitionName={
            this.state.currentSection > this.state.oldSection
              ? 'stats-wrapper-left' : 'stats-wrapper-right'
          }
          transitionEnterTimeout={150}
          transitionLeaveTimeout={150}
          transitionEnter={true}
          transitionLeave={true}
          component="div"
          className="stats-wrapper-animation">
          {statBlocks}
        </ReactCSSTransitionGroup>
      </div>
    )
  }
}

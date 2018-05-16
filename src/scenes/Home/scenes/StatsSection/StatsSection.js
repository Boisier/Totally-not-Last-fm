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
      currentSection: 0,
      oldSection: 0
    }
  }

  onSectionChange = (newSection) => {
    this.setState({
      currentSection: newSection,
      oldSection: this.state.currentSection
    })
  }

  render () {
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
          <div className="stats-wrapper" key={this.state.period + '-' + this.state.currentSection}>
            {
              stats.periods[this.state.period].graphs.map(graph => (
                <StatBlock
                  {...graph}
                  period={stats.periods[this.props.period]}
                  section={this.state.currentSection}
                  key={this.state.period + '-' + this.state.currentSection + '-' + graph.route}
                />
              ))
            }
          </div>
        </ReactCSSTransitionGroup>
      </div>
    )
  }
}

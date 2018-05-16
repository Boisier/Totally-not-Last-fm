import React, { Component } from 'react'
import PropTypes from 'prop-types'

import Graph from 'containers/Graph/Graph'
import moment from 'moment/moment'

export default class StatBlock extends Component {
  static propTypes = {
    type: PropTypes.string.isRequired,
    size: PropTypes.oneOf(['small', 'wide']),
    route: PropTypes.string.isRequired,
    post: PropTypes.arrayOf(PropTypes.object),
    period: PropTypes.string,
    section: PropTypes.number.isRequired
  }

  static defaultProps = {
    type: 'list',
    size: 'small',
    route: '/',
    post: [],
    name: 'Graph'
  }

  genLabels (period) {
    const labels = []

    // Generate the labels for the current period
    // If the period isn't over, determine up to wich to generate

    switch (period) {
      case 'DAILY':
        let numOfHours = 24
        if (this.props.section === 0) {
          numOfHours = moment().hour()
        }

        for (let i = 0; i < numOfHours; ++i) {
          labels[i] = moment().hour(i).format('h A')
        }

        if (this.props.section === 0) {
          labels[labels.length] = 'Now'
        }

        break
      case 'WEEKLY':
        let numOfDays = 7
        if (this.props.section === 0) {
          numOfDays = moment().weekday()
        }

        for (let i = 0; i < numOfDays; ++i) {
          labels[i] = moment().weekday(i + 1).format('dddd')
        }

        if (this.props.section === 0) {
          labels[labels.length - 1] = 'Today'
        }

        break
      case 'MONTHLY':
        let numOfDaysInMonth

        if (this.props.section === 0) {
          numOfDaysInMonth = moment().date()
        } else {
          numOfDaysInMonth = moment().month(moment().month() - this.props.section + 1).date(0).date()
        }

        for (let i = 0; i < numOfDaysInMonth; ++i) {
          labels[i] = moment().date(i + 1).format('Do')
        }

        if (this.props.section === 0) labels[labels.length - 1] = 'today'
        break
      case 'YEARLY':
        let numOfMonths = 12
        if (this.props.section === 0) {
          numOfMonths = moment().month()
        }

        for (let i = 0; i <= numOfMonths; ++i) {
          labels[i] = moment().month(i).format('MMMM')
        }
        break
      default:
    }

    return labels
  }

  render () {
    const baseClass = 'stat-block'
    let fullClass

    switch (this.props.size) {
      case 'wide':
        fullClass = baseClass + ' wide'
        break
      default:
        fullClass = baseClass
    }

    const data = Array.from({length: 40}, () => Math.floor(Math.random() * 40))

    return (
      <div className={fullClass} key={ this.props.route }>
        <h4 key={ this.props.route + '-h4' }>
          { this.props.name }
        </h4>
        <Graph
          key={ this.props.route + '-graph' }
          type={ this.props.type }
          data={data}
          labels={this.genLabels(this.props.period)}
        />
      </div>
    )
  }
}

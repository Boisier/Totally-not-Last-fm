import React, { Component } from 'react'
import PropTypes from 'prop-types'

import Graph from 'containers/Graph/Graph'
import labelGenerator from 'library/labelGenerator'

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
    // Generate the labels for the current period
    // If the period isn't over, determine up to when to generate
    return labelGenerator[period.name](this.props.section)
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
          toColor={this.props.colors.to}
          fromColor={this.props.colors.from}
          size={this.props.size}
        />
      </div>
    )
  }
}
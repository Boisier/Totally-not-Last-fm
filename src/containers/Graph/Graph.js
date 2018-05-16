import React, { Component } from 'react'
import PropTypes from 'prop-types'

import GraphManager from './GraphManager'

import BarGraph from './BarGraph'
import LineGraph from './LineGraph'
import DoughnutGraph from './DoughnutGraph'

export default class extends Component {
  constructor (props) {
    super(props)
    this.state = {
      manager: GraphManager.getInstance()
    }
  }

  static propTypes = {
    type: PropTypes.string.isRequired
  }

  static defaultProps = {
    type: 'list',
    data: []
  }

  graphs = {
    'bar': BarGraph,
    'line': LineGraph,
    'doughnut': DoughnutGraph
  }

  render () {
    const Graph = this.graphs[this.props.type]
    return <Graph
      data={this.props.data}
      labels={this.props.labels}
      graphID={this.state.manager.addGraph()}
      toColor={this.props.toColor}
      fromColor={this.props.fromColor}
      size={this.props.size}
    />
  }
}

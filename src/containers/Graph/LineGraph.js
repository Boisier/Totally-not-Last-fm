import React from 'react'
import GraphEntity from './GraphEntity'

import {Line} from 'react-chartjs-2'
import lineStyle from './styles/line.json'
import { lineTooltip } from './tooltips'

export default class extends GraphEntity {
  constructor (props) {
    super(props)
    this.state = {
      graphData: {}
    }

    this.ctx = null // Stored outside the state to prevent unwanted re-render
  }

  componentDidMount () {
    this.genData() // Generate data only when graph has been mounted
  }

  genData () {
    // Create gradient
    const gradient = this.getGradient(this.props.topColor, this.props.bottomColor, this.ctx.canvas.offsetHeight)

    this.setState({graphData: {
      labels: this.props.labels,
      datasets: [{
        data: this.props.data,
        backgroundColor: gradient,
        pointBackgroundColor: 'transparent',
        borderColor: 'transparent'
      }]
    }})

    document.getElementById('tooltip-' + this.props.graphID).style.backgroundColor = this.props.topColor
  }

  dataSelector = (canvas) => {
    // Store the graph ctx for the later use.
    this.ctx = canvas.getContext('2d')
    return this.state.graphData
  }

  getGraphOption () {
    let graphOptions = lineStyle
    graphOptions.tooltips.custom = lineTooltip

    return graphOptions
  }

  render () {
    return <div
      className='graph-item line-graph'
      onMouseOut={this.onMouseOut}>
      <Line
        data={this.dataSelector}
        width={100}
        height={50}
        options={this.getGraphOption()}
      />
      <div
        className="chartjs-tooltip"
        id={'tooltip-' + this.props.graphID}>
      </div>
    </div>
  }
}

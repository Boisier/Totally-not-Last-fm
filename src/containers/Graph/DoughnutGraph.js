import React from 'react'
import GraphEntity from 'Containers/Graph/GraphEntity'

import {Doughnut} from 'react-chartjs-2'
import doughnutStyle from './styles/doughnut.json'
import { interpolateRgb } from 'd3-interpolate'
import { doughnutTooltip } from './tooltips'

export default class extends GraphEntity {
  genData = () => {
    const getColor = interpolateRgb(this.props.toColor, this.props.fromColor)
    const gradientStops = this.props.data.map((val, index, { length }) => {
      return getColor(index / length)
    })

    // Create gradient
    this.setState({ graphData: {
      labels: this.props.labels,
      datasets: [{
        data: this.props.data,
        backgroundColor: gradientStops,
        pointBackgroundColor: 'transparent',
        borderColor: '#FFF',
        borderWidth: 2,
        hoverBorderColor: '#FFF',
        hoverBorderWidth: 2
      }]
    }})

    document.getElementById('tooltip-' + this.props.graphID).style.backgroundColor = this.props.toColor
  }

  getGraphOption () {
    let graphOptions = doughnutStyle
    graphOptions.tooltips.custom = doughnutTooltip

    return graphOptions
  }

  render = () => {
    return super.render(Doughnut, 'doughnut')
  }
}

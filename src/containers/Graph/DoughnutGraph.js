import React from 'react'
import GraphEntity from './GraphEntity'

import {Doughnut} from 'react-chartjs-2'
import doughnutStyle from './styles/doughnut.json'
import { interpolateRgb } from 'd3-interpolate'

export default class extends GraphEntity {
  genData () {
    const getColor = interpolateRgb()
    const gradientStops = this.props.data.map((val, index, { length }) => {
      return getColor(index / length)
    })
    // Create gradient
    this.setState({
      labels: this.props.labels,
      datasets: [{
        data: this.props.data,
        backgroundColor: gradientStops,
        pointBackgroundColor: 'transparent',
        borderColor: 'transparent'
      }]
    })
  }

  getGraphOption () {
    let graphOptions = doughnutStyle
    return graphOptions
  }

  render = () => {
    return super.render(Doughnut)
  }
}

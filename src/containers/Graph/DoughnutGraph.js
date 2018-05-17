import React from 'react'
import GraphEntity from 'Containers/Graph/GraphEntity'
import _ from 'lodash'

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

    /* const data = this.props.data.map((val, i) => {
      return {
        value: val,
        label: this.props.labels[i] ? this.props.labels[i] : ''
      }
    })

    console.log(data) */

    // Create gradient
    this.setState({ graphData: {
      labels: this.props.labels,
      datasets: [{
        type: 'doughnut',
        data: _.take(this.props.data, this.props.labels.length),
        backgroundColor: gradientStops,
        pointBackgroundColor: 'transparent',
        borderColor: '#FFF',
        borderWidth: 2,
        hoverBorderColor: '#FFF',
        hoverBorderWidth: 2
      }]
    }})

    // document.getElementById('tooltip-' + this.props.graphID).style.backgroundColor = this.props.toColor
  }

  getGraphOption () {
    let graphOptions = doughnutStyle
    graphOptions.tooltips.custom = doughnutTooltip

    return graphOptions
  }

  render = () => {
    return <Doughnut
      data={[1, 8, 3, 7, 12]}
      width={100}
      height={50}
      options={{
        maintainAspectRatio: true
      }}/>
  }
}

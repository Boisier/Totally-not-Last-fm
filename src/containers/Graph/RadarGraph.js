import React from 'react'
import GraphEntity from './GraphEntity'
import _ from 'lodash'

import { Radar } from 'react-chartjs-2'
import { radarTooltip } from './tooltips'
import radarStyle from './styles/radar.json'

export default class extends GraphEntity {
  genData () {
    // Create gradient
    const gradient = this.getRadialGradient(this.props.toColor, this.props.fromColor, this.ctx.canvas.offsetWidth / 2, this.ctx.canvas.offsetHeight / 2)

    this.setState({ graphData: {
      labels: this.props.labels,
      datasets: [{
        data: _.take(this.props.data, this.props.labels.length),
        backgroundColor: gradient,
        pointBackgroundColor: 'transparent',
        pointBorderColor: 'transparent',
        borderColor: 'transparent',
        pointHitRadius: 10
      }]
    }})

    document.getElementById('tooltip-' + this.props.graphID).style.backgroundColor = this.props.toColor
  }

  getGraphOption () {
    let graphOptions = radarStyle
    graphOptions.tooltips.custom = radarTooltip

    return graphOptions
  }

  render () {
    return super.render(Radar, 'radar')
  }
}

import React from 'react'
import GraphEntity from './GraphEntity'

import {Line} from 'react-chartjs-2'
import lineStyle from './styles/line.json'
import { graphTooltip } from './tooltips'

export default class extends GraphEntity {
  genData () {
    // Create gradient
    const gradient = this.getGradient(this.props.toColor, this.props.fromColor, this.ctx.canvas.offsetHeight)

    this.setState({ graphData: {
      labels: this.props.labels,
      datasets: [{
        data: this.props.data,
        backgroundColor: gradient,
        pointBackgroundColor: 'transparent',
        borderColor: 'transparent'
      }]
    }})

    document.getElementById('tooltip-' + this.props.graphID).style.backgroundColor = this.props.toColor
  }

  getGraphOption () {
    let graphOptions = lineStyle
    graphOptions.tooltips.custom = graphTooltip

    return graphOptions
  }

  render () {
    return super.render(Line)
  }
}

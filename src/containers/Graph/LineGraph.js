import React from 'react'
import GraphEntity from './GraphEntity'

import {Line} from 'react-chartjs-2'
import lineStyle from './styles/line.json'
import { graphTooltip } from './tooltips'

export default class extends GraphEntity {
  genData (props) {
    // Create gradient
    const gradient = this.getLinearGradient(props.toColor, props.fromColor, this.ctx.canvas.offsetHeight)

    this.setState({ graphData: {
      labels: props.labels,
      datasets: [{
        data: props.data,
        backgroundColor: gradient,
        pointBackgroundColor: 'transparent',
        borderColor: 'transparent'
      }]
    }})

    document.getElementById('tooltip-' + props.graphID).style.backgroundColor = props.toColor
  }

  getGraphOption () {
    let graphOptions = lineStyle
    graphOptions.tooltips.custom = graphTooltip

    return graphOptions
  }

  render () {
    return super.render(Line, 'line')
  }
}

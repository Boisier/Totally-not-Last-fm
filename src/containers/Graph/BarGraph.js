import React from 'react'
import GraphEntity from './GraphEntity'

import {Bar} from 'react-chartjs-2'
import barStyle from './styles/bar.json'
import { graphTooltip } from './tooltips'

export default class extends GraphEntity {
  genData () {
    // Create gradient
    const gradient = this.getLinearGradient(this.props.toColor, this.props.fromColor, this.ctx.canvas.offsetHeight)

    this.setState({ graphData: {
      labels: this.props.labels,
      datasets: [{
        data: this.props.data,
        backgroundColor: gradient,
        borderColor: 'transparent',
        hoverBackgroundColor: this.props.toColor
      }]
    }})

    document.getElementById('tooltip-' + this.props.graphID).style.backgroundColor = this.props.toColor
  }

  getGraphOption () {
    let graphOptions = barStyle
    graphOptions.tooltips.custom = graphTooltip

    return graphOptions
  }

  render = () => {
    return super.render(Bar, 'bar')
  }
}

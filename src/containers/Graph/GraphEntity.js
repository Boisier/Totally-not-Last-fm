import React, { Component } from 'react'

// Regroup all methods and inforamtions needed
// by all the different graphs
export default class GraphEntity extends Component {
  static defaultProps = {
    topColor: 'red',
    bottomColor: '#F2DDDE',
    graphID: 0
  }

  onMouseOut = () => {
    // Hide tooltip on mouse out
    const tooltip = document.getElementById('tooltip-' + this.props.graphID)
    tooltip.style.opacity = 0
  }

  getGradient (topColor, bottomColor, height) {
    const gradient = this.ctx.createLinearGradient(0, 0, 0, height)
    gradient.addColorStop(0, topColor)
    gradient.addColorStop(1, bottomColor)

    return gradient
  }
}

import React, { Component } from 'react'

// Regroup all methods and inforamtions needed
// by all the different graphs
export default class GraphEntity extends Component {
  static defaultProps = {
    topColor: 'red',
    bottomColor: '#F2DDDE',
    graphID: 0
  }

  constructor (props) {
    super(props)
    this.state = {
      graphData: {}
    }

    this.ctx = null
  }

  genData () {
    throw new Error('You need to implement genData in child class')
  }

  dataSelector = (canvas) => {
    // Store the graph ctx for the later use.
    this.ctx = canvas.getContext('2d')
    return this.state.graphData
  }

  componentDidMount () {
    this.genData() // Generate data only when graph has been mounted
  }

  onMouseOut = () => {
    // Hide tooltip on mouse out
    const tooltip = document.getElementById('tooltip-' + this.props.graphID)
    if (!tooltip) return

    tooltip.style.opacity = 0
  }

  getGradient (topColor, bottomColor, height) {
    const gradient = this.ctx.createLinearGradient(0, 0, 0, height)
    gradient.addColorStop(0, topColor)
    gradient.addColorStop(1, bottomColor)

    return gradient
  }
}

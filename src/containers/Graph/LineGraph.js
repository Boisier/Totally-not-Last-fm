import React, {Component} from 'react'
import _ from 'lodash'

import {Line} from 'react-chartjs-2'
import lineStyle from './styles/line.json'

export default class extends Component {
  constructor (props) {
    super(props)

    this.ctx = null
    this.canvasHolder = React.createRef()

    this.state = {
      mounted: false
    }
  }

  componentDidMount () {
    // Stylize graph
    this.setState({
      mounted: true
    })
  }

  dataSelector = (canvas) => {
    this.ctx = canvas.getContext('2d')

    if (!this.state.mounted) return {}

    return this.genData()
  }

  genData () {
    const gradient = this.ctx.createLinearGradient(0, 0, 0, this.canvasHolder.current.offsetHeight)
    gradient.addColorStop(0, 'red')
    gradient.addColorStop(1, '#F2DDDE')

    return {
      labels: this.props.labels,
      datasets: [{
        data: this.props.data,
        backgroundColor: gradient,
        pointBackgroundColor: 'transparent',
        borderColor: [
          'rgba(255,99,132,0)'
        ],
        borderWidth: 0,
        pointBorderWidth: 0,
        pointHoverRadius: 0
      }]
    }
  }

  onMouseOut = () => {
    const tooltip = document.getElementById('tooltip-' + this.props.graphID)
    tooltip.style.opacity = 0
  }

  render = () => {
    let graphOptions = {}

    if (this.state.mounted) {
      graphOptions = Object.assign(lineStyle,
        { elements: { point: {
          hitRadius: this.ctx.canvas.offsetWidth / (this.props.labels.length * 2)
        }}}
      )
    } else graphOptions = lineStyle

    graphOptions.tooltips.custom = customTooltip

    return <div
      ref={this.canvasHolder}
      className='graph-item line-graph'
      onMouseOut={this.onMouseOut}>
      <Line
        data={this.dataSelector}
        width={100}
        height={50}
        options={graphOptions}
      />
      <div
        className="chartjs-tooltip"
        id={'tooltip-' + this.props.graphID}>
        { this.props.graphID }
      </div>
    </div>
  }
}

function customTooltip (tooltipModel) {
  const tooltip = document.getElementById('tooltip-' + this._chart.id)

  if (!tooltipModel || !tooltipModel.opacity) return
  if (!tooltipModel.dataPoints.length) return

  tooltipModel.dataPoints.forEach(datapoint => {
    const content = `<span class="label">` + datapoint.xLabel + `</span>
                     <span class="value">` + datapoint.yLabel + `</span>`
    tooltip.innerHTML = content

    const posX = _.clamp(datapoint.x, 60, this._chart.canvas.offsetWidth - 60)

    tooltip.style.left = posX + 'px'
    tooltip.style.opacity = 1
  })
}

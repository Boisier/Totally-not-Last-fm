import _ from 'lodash'

// Used to generate and place the tooltip
// Cannot be in the class due to the use of `this` by graph-js
export function graphTooltip (tooltipModel) {
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

export function doughnutTooltip (tooltipModel) {
  const tooltip = document.getElementById('tooltip-' + this._chart.id)

  if (!tooltipModel || !tooltipModel.opacity) return
  if (!tooltipModel.dataPoints.length) return

  console.log(this, tooltipModel)

  tooltipModel.dataPoints.forEach(datapoint => {
    const [ label, value ] = tooltipModel.body[0].lines[0].split(':')
    const content = `<span class="label">` + label + `</span>
                     <span class="value">` + value + `</span>`
    tooltip.innerHTML = content

    const posX = _.clamp(datapoint.x, 60, this._chart.canvas.offsetWidth - 60)

    tooltip.style.left = posX + 'px'
    tooltip.style.top = (this._chart.canvas.offsetHeight / 2 + 4) + 'px'
    tooltip.style.opacity = 1
  })
}

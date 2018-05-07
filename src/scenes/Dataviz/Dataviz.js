import React, {Component} from 'react'

import './Dataviz.scss'
import LineGraph from './LineGraph'
import BarGraph from './BarGraph'
import DoughnutGraph from './DoughnutGraph'

export default class extends Component {
  render = () => {
    return <div className='graph-wrapper'>
      <LineGraph/>
      <BarGraph/>
      <DoughnutGraph/>
    </div>
  }
}

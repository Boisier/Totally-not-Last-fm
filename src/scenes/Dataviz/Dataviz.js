import React, {Component} from 'react'

import './Dataviz.scss'
import LineGraph from './LineGraph'

export default class extends Component {
  render = () => {
    return <div className='graph-wrapper'>
      <LineGraph></LineGraph>
    </div>
  }
}

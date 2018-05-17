import React, {Component} from 'react'

import {Doughnut} from 'react-chartjs-2'
import barStyle from './styles/doughnut.json'

export default class extends Component {
  render = () => {
    const data = {
      labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
      datasets: [{
        data: [19, 12, 9, 6, 2],
        backgroundColor: [
          'rgba(255, 222, 122, 1)',
          'rgba(255, 212, 83, 1)',
          'rgba(250, 199, 45, 1)',
          'rgba(217, 165, 9, 1)',
          'rgba(169, 127, 0, 1)'
        ],
        borderWidth: 0
      }
      ]
    }
    return <div className='graph-item donut-graph'>
      <Doughnut
        data={data}
        width={100}
        height={50}
        options={}
      />
    </div>
  }
}

import React, {Component} from 'react'

import './Dataviz.scss'
import {Doughnut} from 'react-chartjs-2'

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
        height={100}
        options={{
          tooltips: {
            enabled: false
          },
          maintainAspectRatio: false,
          title: {
            display: false,
            text: 'Plays per day',
            fontSize: 20
          },
          legend: {
            display: false,
            labels: {
              hidden: true
            }
          },
          scales: {
            yAxes: [{
              display: false,
              gridLines: {
                display: true,
                drawTicks: false
              },
              ticks: {
                beginAtZero: true,
                display: false
              }
            }],
            xAxes: [{
              display: false,
              gridLines: {
                display: true,
                drawOnChartArea: true,
                drawTicks: false
              },
              ticks: {
                display: false,
                fontSize: 15,
                fontColor: '#1e1e1e',
                fontStyle: 'bold',
                fontFamily: 'Arial'
              }
            }]
          },
          elements: {
            point: {
              radius: 0,
              hitRadius: 25,
              hoverRadius: 3
            }
          }
        }}
      />
    </div>
  }
}

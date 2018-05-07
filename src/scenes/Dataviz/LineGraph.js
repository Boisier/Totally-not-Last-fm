import React, {Component} from 'react'

import './Dataviz.scss'
import {Line} from 'react-chartjs-2'

export default class extends Component {
  render = () => {
    const data = {
      labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
      datasets: [{
        data: [12, 19, 3, 5, 2, 13, 18],
        backgroundColor: [
          'rgba(255, 150, 150, 1)'
        ],
        borderColor: [
          'rgba(255,99,132,0)'
        ],
        borderWidth: 0
      }
        /* {
          data: [7, 16, 9, 13, 7, 3, 11],
          backgroundColor: [
            'rgba(150, 150, 255, 1)'
          ],
          borderColor: [
            'rgba(255,99,132,0)'
          ],
          borderWidth: 0
        } */
      ]
    }
    return <div className='graph-item line-graph'>
      <Line
        data={data}
        width={50}
        height={10}
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
              display: true,
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

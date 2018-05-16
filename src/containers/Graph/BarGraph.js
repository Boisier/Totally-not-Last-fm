import React, {Component} from 'react'

import {Bar} from 'react-chartjs-2'

export default class extends Component {
  render = () => {
    const data = {
      labels: ['00', '01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23'],
      datasets: [{
        data: [12, 19, 3, 5, 2, 13, 18, 12, 19, 3, 5, 2, 13, 18, 12, 19, 3, 5, 2, 13, 18, 11, 4, 1],
        backgroundColor: 'rgba(150, 150, 255, 1)',
        borderColor: [
          'rgba(255,99,132,0)'
        ],
        borderWidth: 0
      }]
    }
    return <div className='graph-item bar-graph'>
      <Bar
        data={data}
        width={100}
        height={50}
        options={{
          tooltips: {
            enabled: false
          },
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
              display: true,
              gridLines: {
                display: false,
                drawOnChartArea: false,
                drawTicks: false,
                zeroLineColor: 'transparent'
              },
              ticks: {
                padding: 5,
                display: true,
                fontSize: 15,
                fontColor: '#1e1e1e',
                fontFamily: 'sans-serif'
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

// React
import React, { Component } from 'react'

import api from 'Library/api'

export default class extends Component {
  constructor (props) {
    super(props)

    this.state = {
      IP: '',
      status: ''
    }
  }

  refreshData = () => {
    api.get('https://httpbin.org/get').then(response => {
      if (response.state === 'error') {
        return this.setState(() => ({
          IP: 'error',
          status: 'KO'
        }))
      }

      this.setState(() => ({
        IP: response.body.origin,
        status: response.status
      }))
    })
  }

  render = () => {
    return (
      <section>
        <div>
          <button onClick={this.refreshData}>refresh</button>
        </div>
        <pre>
          HTTP { this.state.status + ' : ' + this.state.IP}
        </pre>
      </section>
    )
  }
}

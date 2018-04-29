import React, { Component } from 'react'

import './StatsSection.scss'

export default class extends Component {
  render = () => (
    <div className="stats-section">
      StateSection - {this.props.period}
    </div>
  )
}

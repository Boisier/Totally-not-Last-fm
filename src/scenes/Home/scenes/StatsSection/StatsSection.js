import React, { Component } from 'react'

import stats from 'library/stats'

export default class extends Component {
  constructor (props) {
    super(props)
    this.state = {
      periodName: stats.periods[this.props.period].name
    }
  }

  render () {
    return (
      <div>{ this.state.periodName }</div>
    )
  }
}

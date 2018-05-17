import React, { Component } from 'react'

import stats from 'library/stats'

export default class extends Component {
  render = () => (
    <nav className="stats-period-nav">
      <div className="stats-bar">
      </div>
      <ul className="side-nav">
        {
          stats.periods.map((p, i) => (
            <li key={p.key} onClick={this.props.showPeriodStats.bind(this, i)}>
              { p.name.charAt(0) }
              <span>{ p.name.substr(1) }</span>
            </li>
          ))
        }
      </ul>
    </nav>
  )
}

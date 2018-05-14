import React, { Component } from 'react'

export default class extends Component {
  render () {
    const baseClass = 'stat-block'
    let fullClass

    switch (this.props.size) {
      case 'wide':
        fullClass = baseClass + ' wide'
        break
      default:
        fullClass = baseClass
    }

    return (
      <div className={fullClass}>
        { /* GRAPH */ }
        STAT BLOCK
      </div>
    )
  }
}

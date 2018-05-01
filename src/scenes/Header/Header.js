// React
import React, { Component } from 'react'

// Scene dependencies
import 'style/scenes/Header.scss'

export default class extends Component {
  render () {
    return (
      <header>
        <h3>Totally not <span className = "red">Last fm</span></h3>
      </header>
    )
  }
}

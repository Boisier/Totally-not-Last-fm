// React
import React, { Component } from 'react'

import './Structure.scss'

export default class extends Component {
  render = () => (
    <section id="page-structure">
      {this.props.children}
    </section>
  )
}

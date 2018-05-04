// React
import React, { Component } from 'react'

import './Structure.scss'

import Header from 'scenes/Header/Header'
import Footer from 'scenes/Footer/Footer'

export default class extends Component {
  render = () => (
    <section className='App'>
      <Header />
      <section id="page-structure">
        {this.props.children}
      </section>
      <Footer />
    </section>
  )
}

// React
import React, { Component } from 'react'

// Scene dependencies
import './App.css'

// Scene componentts
import Header from './scenes/Header/Header'
import REST from './scenes/RESTTest'

export default class extends Component {
  render = () => (
    <section className="App">
      <Header/>
      <REST/>
    </section>
  )
}

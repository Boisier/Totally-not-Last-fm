// React
import React, { Component } from 'react'
// Scene dependencies
import './App.css'
// Scene componentts
import Header from './scenes/Header/Header'

export default class extends Component {
  render = () => (
    <section className="App">
      <Header/>
    </section>
  )
}

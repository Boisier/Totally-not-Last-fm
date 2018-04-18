// React
import React, { Component } from 'react'
import { Switch, Route } from 'react-router-dom'

// Scene dependencies
import './App.scss'

// Scene componentts
import Header from './scenes/Header/Header'
import Structure from './scenes/Structure/Structure'
import Footer from './scenes/Footer/Footer'

import Home from './scenes/Home/Home'

export default class extends Component {
  constructor (props) {
    super(props)
    document.title = 'Totally not Last fm'
  }
  render = () => (
    <section className='App'>
      <Header/>
      <Structure>
        <Switch>
          <Route path='/' component={Home}/>
        </Switch>
      </Structure>
      <Footer />
    </section>
  )
}

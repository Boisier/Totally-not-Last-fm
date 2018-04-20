// React
import React, { Component } from 'react'
import { Route, Switch } from 'react-router-dom'

// Scene dependencies
import './App.scss'

// Scene components
import Landing from './scenes/Landing/Landing'

import Header from './scenes/Header/Header'
import Footer from './scenes/Footer/Footer'
import Home from './scenes/Home/Home'

export default class extends Component {
  constructor (props) {
    super(props)
    document.title = 'Totally not Last fm'

    // Set state as not logged in
    this.state = {
      isUser: this.props.isConnected
    }
  }

  render = () => {
    if (!this.state.isUser) {
      return <Landing />
    }

    return <main>
      <Header/>
      <Switch>
        <Route path='/' component={Home}/>
      </Switch>
      <Footer/>
    </main>
  }
}

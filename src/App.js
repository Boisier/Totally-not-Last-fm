// React
import React, { Component } from 'react'
import { Route, Switch } from 'react-router-dom'

// Scene dependencies
import './App.scss'
import auth from 'library/auth'

// Scene scenes
import Dataviz from './scenes/Dataviz/Dataviz'

import Header from './scenes/Header/Header'
import Footer from './scenes/Footer/Footer'
import Home from './scenes/Home/Home'

export default class extends Component {
  constructor (props) {
    super(props)
    document.title = 'Totally not Last fm'

    // Set state as not logged in
    this.state = {
      isUser: false,
      token: ''
    }
  }

  componentWillMount () {
    // Allow for automated connection for tests
    // TODO: DO SOMETHING BETTER BECAUSE THIS IS BAD
    if (this.props.forceLogin) {
      return this.setState({
        isUser: true,
        token: 'testtoken'
      })
    }

    this.checkLogin()
  }

  checkLogin = () => {
    if (auth.isUser()) {
      this.setState({
        isUser: true,
        token: auth.getToken()
      })
    }
  }

  render = () => {
    if (!this.state.isUser) {
      return <Dataviz checkLogin={this.checkLogin}/>
    }

    return (
      <section className='App'>
        <Header/>
        <Switch>
          <Route path='/' component={Home}/>
        </Switch>
        <Footer/>
      </section>
    )
  }
}

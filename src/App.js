// React
import React, { Component } from 'react'
import { Route, Switch } from 'react-router-dom'

// Scene dependencies
import './App.scss'
import auth from 'library/auth'

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
      return <Landing checkLogin={this.checkLogin}/>
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

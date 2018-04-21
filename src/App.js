// React
import React, { Component } from 'react'
import { Route, Switch } from 'react-router-dom'
import cookies from 'browser-cookies'

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
    const token = cookies.get('token')

    if (!token) { // missing token
      return this.setState({isUser: false})
    }

    // Token found, let's check it against the server
    // if the token is OK, let's store it in the app state
    // The token will be send with every request to prove identity
    // Also, refresh the token

    cookies.set('token', token, {
      expires: 14 // days
    })

    this.setState({
      isUser: true,
      token: token
    })
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

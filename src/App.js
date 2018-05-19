// React
import React, { Component } from 'react'
import { Route, Switch, withRouter } from 'react-router-dom'

// Scene dependencies
import './style/App.scss'
import auth from 'library/auth'

// Scene scenes
import Landing from './scenes/Landing/Landing'
import Structure from './containers/Structure/Structure'

import Home from './scenes/Home/Home'
import About from './scenes/About/About'
import Settings from './scenes/Settings/Settings'

class App extends Component {
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
      auth.setToken('testtoken')
    }

    this.checkLogin(false)
  }

  checkLogin = (refresh = true) => {
    if (auth.isUser() && !this.state.isUser) {
      this.setState({
        isUser: true,
        token: auth.getToken()
      })
    } else if (refresh) {
      window.location.reload()
    }
  }

  render = () => {
    if (!this.state.isUser) {
      return <Landing checkLogin={this.checkLogin}/>
    }

    return (
      <Structure>
        <Switch >
          <Route path={'/about'} component={About} />
          <Route path={'/settings'} component={Settings} />
          <Route path={'/'} component={Home} />
        </Switch>
      </Structure>
    )
  }
}

export default withRouter(App)

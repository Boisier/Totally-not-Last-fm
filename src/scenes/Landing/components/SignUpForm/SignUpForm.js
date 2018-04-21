// React
import React, { Component } from 'react'

import './SignUpForm.scss'

export default class extends Component {
  constructor (props) {
    super(props)
    this.state = {
      email: this.props.email,
      password: '',
      confirmation: ''
    }
  }

  componentWillReceiveProps (nextProps) {
    this.setState({
      email: nextProps.email
    })
  }

  onInputUpdate = (field, event) => {
    if (field !== 'email' && field !== 'password' && field !== 'confirmation') {
      return
    }

    this.setState({ [field]: event.target.value })

    if (event.key === 'Enter') {
      this.signUp(event)
    }
  }

  signUp = (e) => {
    e.preventDefault()
    // Check validity of credentials against the server
    // if ok, a token will be retrived from the server
    this.props.onLogin('testtoken')
  }

  render = () => {
    const displayClass = this.props.display ? 'show' : 'hide'

    return (
      <section id="signup-form" className={displayClass}>
        <div className="access-form">
          <input type="button" value="Sign up with Spotify"/>
          <h5 className="caption">Or sign up with e-mail</h5>
          <form method="post" action="" onSubmit={this.signUp}>
            <input
              type="text"
              id="input-signin-email"
              placeholder="Enter your e-mail address"
              value={this.state.email}
              onChange={this.onInputUpdate.bind(this, 'email')}/>
            <input
              type="password"
              id="input-signin-password"
              placeholder="Enter your password"
              value={this.state.password}
              onChange={this.onInputUpdate.bind(this, 'password')} />
            <input
              type="password"
              id="input-signin-password"
              placeholder="Confirm your password"
              value={this.state.confirmation}
              onChange={this.onInputUpdate.bind(this, 'confirmation')} />
            <input
              type="submit"
              value="Sign up"/>
            <h6 onClick={this.props.showSignIn}>Click here to sign in</h6>
          </form>
        </div>
      </section>
    )
  }
}

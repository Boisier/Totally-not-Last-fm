// React
import React, { Component } from 'react'

import './SignInForm.scss'

export default class extends Component {
  constructor (props) {
    super(props)
    this.state = {
      email: this.props.email,
      password: ''
    }
  }

  componentWillReceiveProps (nextProps) {
    this.setState({
      email: nextProps.email
    })
  }

  onInputUpdate = (field, event) => {
    if (field !== 'email' && field !== 'password') {
      return
    }

    this.setState({ [field]: event.target.value })
  }

  signIn = () => {
    // Check validity of credentials against the server
    // if ok, a token will be retrived from the server
    this.props.onLogin('testtoken')
  }

  render = () => {
    const displayClass = this.props.display ? 'show' : 'hide'

    return (
      <section id="signin-form" className={displayClass}>
        <div className="access-form">
          <h5 className="caption">Sign in</h5>
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
            onChange={this.onInputUpdate(this, 'password')} />
          <input
            type="button"
            value="Sign in"
            onClick={this.signIn}/>
          <h6 onClick={this.props.showSignUp}>Click here to sign up</h6>
        </div>
      </section>
    )
  }
}

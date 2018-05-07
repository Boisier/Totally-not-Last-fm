// React
import React, { Component } from 'react'
import auth from 'library/auth'

import FieldInput from 'containers/FieldInput/FieldInput'

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
    // if ok, a token will be retrieved from the server
    if (auth.signUp(this.state.email, this.state.password, this.state.confirmation)) {
      auth.setToken('testtoken')
      this.props.onLogin()
    }
  }

  render = () => {
    const displayClass = this.props.display ? 'show' : 'hide'

    return (
      <section id="signup-form" className={displayClass}>
        <div className="access-form">
          <h5 className="caption">Join us</h5>
          <form method="post" action="" onSubmit={this.signUp}>
            <FieldInput
              type="text"
              className="input-signup-email"
              label="Enter your e-mail address"
              value={this.state.email}
              onChange={this.onInputUpdate.bind(this, 'email')}/>
            <FieldInput
              type="password"
              className="input-signup-password"
              label="Enter your password"
              value={this.state.password}
              onChange={this.onInputUpdate.bind(this, 'password')} />
            <FieldInput
              type="password"
              className="input-signup-confirmation"
              label="Confirm your password"
              value={this.state.confirmation}
              onChange={this.onInputUpdate.bind(this, 'confirmation')} />
            <input
              type="submit"
              value="Sign up"
              onClick={this.signUp}/>
            <h6 onClick={this.props.showSignIn} className="clickable">Click here to sign in</h6>
          </form>
        </div>
      </section>
    )
  }
}

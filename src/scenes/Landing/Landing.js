import React, { Component } from 'react'
import validator from 'validator'
import cookies from 'browser-cookies'

import WelcomeScreen from './components/WelcomeScreen/WelcomeScreen'
import SignUpForm from './components/SignUpForm/SignUpForm'
import SignInForm from './components/SignInForm/SignInForm'

import './Landing.scss'

export default class extends Component {
  constructor (props) {
    super(props)
    this.state = {
      showWelcomeScreen: true,
      showSignInForm: false,
      showSignUpForm: false,

      email: ''
    }
  }

  showLanding = () => {
    this.setState({
      showWelcomeScreen: true,
      showSignInForm: false,
      showSignUpForm: false
    })
  }

  showSignUp = () => {
    this.setState({
      showWelcomeScreen: false,
      showSignInForm: false,
      showSignUpForm: true
    })
  }

  showSignIn = () => {
    this.setState({
      showWelcomeScreen: false,
      showSignInForm: true,
      showSignUpForm: false
    })
  }

  verifyEmail = (rawEmail) => {
    // Checking email format
    if (!validator.isEmail(rawEmail)) {
      return // ignore bad emails
    }

    // Sanitize email
    const email = validator.normalizeEmail(rawEmail)

    // TODO:Check email status with server

    // Email unknown, display signUp form
    this.setState({
      email: email
    })
    this.showSignUp()
  }

  onLogin = (token) => {
    // Set a token cookie valid for 2 weeks
    cookies.set('token', token, {
      expires: 14 // days
    })

    this.props.checkLogin()
  }

  render = () => {
    const topPartClass = this.state.showSignUpForm || this.state.showSignInForm ? 'expand' : ''
    return (
      <main id="landing-page">
        <section className={'top-part ' + topPartClass}>
          <SignUpForm
            email={this.state.email}
            display={this.state.showSignUpForm}
            showLanding={this.showLanding}
            showSignUp={this.showSignUp}
            showSignIn={this.showSignIn}
            onLogin={this.onLogin} />
          <SignInForm
            email={this.state.email}
            display={this.state.showSignInForm}
            showLanding={this.showLanding}
            showSignUp={this.showSignUp}
            showSignIn={this.showSignIn}
            onLogin={this.onLogin} />
        </section>
        <WelcomeScreen
          verifyEmail={this.verifyEmail}
          display={this.state.showWelcomeScreen}/>
      </main>
    )
  }
}

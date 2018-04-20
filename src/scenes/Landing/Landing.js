import React, { Component } from 'react'

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

  verifyEmail = (email) => {
    console.log('checking ' + email + ' ...')

    // TODO:Check email status with server

    // Email unknown, display signUp form
    this.setState({
      email: email
    })
    this.showSignUp()
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
            showSignIn={this.showSignIn} />
          <SignInForm
            email={this.state.email}
            display={this.state.showSignInForm}
            showLanding={this.showLanding}
            showSignUp={this.showSignUp}
            showSignIn={this.showSignIn} />
        </section>
        <WelcomeScreen
          verifyEmail={this.verifyEmail}
          display={this.state.showWelcomeScreen}/>
      </main>
    )
  }
}

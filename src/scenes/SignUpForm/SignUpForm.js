// React
import React, { Component } from 'react'

import './SignUpForm.scss'

export default class extends Component {
  render = () => (
    <section id="signup-form">
      <div className="access-form">
        <input type="button" value="Sign up with Spotify" />
        <h5 className="caption">Or sign up with e-mail</h5>
        <input type="text" id="input-signin-email" placeholder="Enter your e-mail address" />
        <input type="password" id="input-signin-password" placeholder="Enter your password" />
        <input type="password" id="input-signin-password" placeholder="Confirm your password" />
        <input type="button" value="Sign up" />
        <h6>Click here to sign in</h6>
      </div>
    </section>
  )
}
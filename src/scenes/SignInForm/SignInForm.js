// React
import React, { Component } from 'react'

import './SignInForm.scss'

export default class extends Component {
  render = () => (
    <section id="signin-form">
      <div className="access-form">
        <h5 className="caption">Sign in</h5>
        <input type="text" id="input-signin-email" placeholder="Enter your e-mail address" />
        <input type="password" id="input-signin-password" placeholder="Enter your password" />
        <input type="button" value="Sign in" />
        <h6>Click here to sign up</h6>
      </div>
    </section>
  )
}

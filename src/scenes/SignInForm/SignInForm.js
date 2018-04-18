// React
import React, { Component } from 'react'

import './SignInForm.scss'

export default class extends Component {
  render = () => (
    <section id="signin-form">
      <h5 className="caption">Sign in</h5>
      <div className="access-form">
        <input type="text" id="input-signin-email" placeholder="Enter your e-mail address" />
        <input type="password" id="input-signin-password" placeholder="Enter your password" />
        <input type="button" value="Sign in" />
      </div>
    </section>
  )
}

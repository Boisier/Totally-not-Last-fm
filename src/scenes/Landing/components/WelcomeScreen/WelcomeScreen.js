import React, { Component } from 'react'

import validator from 'validator'

export default class extends Component {
  constructor (props) {
    super(props)
    this.state = { email: '' }
  }

  onInputChange = (event) => {
    // Update state with current input value
    this.setState({email: event.target.value})
  }

  onEmailUpdated = (event) => {
    // If enter, check and sanitize email
    if (event.key === 'Enter') {
      if (!validator.isEmail(this.state.email)) {
        return
      }

      return this.props.verifyEmail(validator.normalizeEmail(this.state.email))
    }

    // Otherwise udpate state
    this.onInputChange(event)
  }

  render = () => {
    const displayClass = this.props.display ? 'show' : 'hide'

    return (
      <section id="welcome-screen" className={displayClass}>
        <h5 className="caption">What does your music says about you ?</h5>
        <h1 className="title line-1">Totally not</h1>
        <h1 className="title line-2">Last fm</h1>
        <div className="access-form">
          <input
            type="text"
            id="access-input-form"
            placeholder="Enter your e-mail address"
            value={this.state.email}
            onKeyPress={this.onEmailUpdated}
            onChange={this.onInputChange}/>
          <input
            type="button"
            value="Find out now"
            onClick={this.props.verifyEmail.bind(this, this.state.email)} />
        </div>
      </section>
    )
  }
}

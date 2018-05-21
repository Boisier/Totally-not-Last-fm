import React, { Component } from 'react'

import EditableFieldInput from 'containers/EditableFieldInput/EditableFieldInput'
import LinkToSpotify from './scenes/LinkToSpotify/LinkToSpotify'
import LinkedSpotify from './scenes/LinkedSpotify/LinkedSpotify'

export default class extends Component {
  constructor (props) {
    super(props)
    /*
    Retrieve user infos from server
     */
    this.state = {
      user: {
        email: 'test@test.fr',
        spotify: null
      }
    }
  }
  updateEmail = (newEmail) => {
    console.log(newEmail)
    return newEmail
  }

  updatePassword = (newPassword) => {
    console.log(newPassword)
    return newPassword
  }

  render = () => {
    return (
      <section className="settings-page">
        <h2>Profile</h2>
        <div className="settings-section">
          <h3>E-mail</h3>
          <EditableFieldInput
            type="email"
            label="Email address"
            value={this.state.user.email}
            onConfirm={this.updateEmail} />
          <h3>Password</h3>
          <EditableFieldInput
            type="password"
            label="New password"
            value={''}
            confirm
            onConfirm={this.updatePassword} />
          <p className="settings-disclaimer">
            Your profile information are used to log on <i>Totally not Last.fm</i>.<br />
            We do not share these information with anyone.
          </p>
        </div>
        <h2>Spotify</h2>
        { this.state.user.spotify ? <LinkedSpotify /> : <LinkToSpotify /> }
        <h2 className="text-danger">Danger zone</h2>
        <div className="settings-section">
          <div className="form-btn remove-account-btn">Remove my account</div>
          <p className="settings-disclaimer">
            This will erase all your data from our database.<br />
            If you want to disconnect your spotify account, please use the button above.<br />
            Removing your account cannot be undone. You'll need to register again, and you will lost your stats history.
          </p>
        </div>
      </section>
    )
  }
}

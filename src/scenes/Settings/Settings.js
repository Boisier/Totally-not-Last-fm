import React, { Component } from 'react'

import EditableFieldInput from 'containers/EditableFieldInput/EditableFieldInput'

export default class extends Component {
  constructor (props) {
    super(props)
    /*
    Retrieve user infos from server
     */
    this.setState({
      user: {
        email: "test@test.fr",
        spotifyLink: false
      }
    })
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
        <h3>E-mail</h3>
        <EditableFieldInput
          type="text"
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
        <h2>Spotify</h2>
        <h2 className="text-danger">Danger zone</h2>
      </section>
    )
  }
}

import React, { Component } from 'react'

import EditableFieldInput from 'containers/EditableFieldInput/EditableFieldInput'

export default class extends Component {
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
          value={'valentin@dufois.fr'}
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

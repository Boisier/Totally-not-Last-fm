import React, { Component } from 'react'

export default class extends Component {
  render = () => {
    return (
      <section className="settings-page">
        <h2>Profile</h2>
        <h3>E-mail</h3>
        <h3>Password</h3>
        <h2>Spotify</h2>
        <h2 className="text-danger">Danger zone</h2>
      </section>
    )
  }
}

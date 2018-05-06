import React, { Component } from 'react'

import CurrentlyListening from './scenes/CurrentlyListening/CurrentlyListening'
import MultipleStatsPeriodes from './scenes/MultipleStatsPeriodes/MultipleStatsPeriodes'

export default class extends Component {
  render = () => (
    <section className="home-page">
      <CurrentlyListening />
      <MultipleStatsPeriodes />
    </section>
  )
}

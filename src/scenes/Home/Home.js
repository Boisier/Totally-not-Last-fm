import React, { Component } from 'react'

import MultipleStatsPeriodes from './scenes/MultipleStatsPeriodes/MultipleStatsPeriodes'
import User from './scenes/User/User'

export default class extends Component {
  render = () => (
    <section className='home-page'>
      <User />
      <MultipleStatsPeriodes />
    </section>
  )
}

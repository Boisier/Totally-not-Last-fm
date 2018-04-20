// React
import React, { Component } from 'react'

// Scene dependencies
import './App.scss'

// Scene components
import Header from './scenes/Header/Header'
import Footer from './scenes/Footer/Footer'
import SignInForm from './scenes/SignInForm/SignInForm'
import SignUpForm from './scenes/SignUpForm/SignUpForm'

export default class extends Component {
  constructor (props) {
    super(props)
    document.title = 'Totally not Last fm'
  }
  render = () => (
    <section className='App'>
      <Header/>
      <SignInForm />
      <SignUpForm />
      <Footer />
    </section>
  )
}

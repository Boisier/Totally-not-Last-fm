// React
import React, { Component } from 'react'
import { Route } from 'react-router-dom'

// Scene dependencies
import './App.scss'

// Scene componentts
// import Header from './scenes/Header/Header'
// import Structure from './scenes/Structure/Structure'
// import Footer from './scenes/Footer/Footer'

// import Home from './scenes/Home/Home'
import Landing from './scenes/Landing/Landing'

export default class extends Component {
  constructor (props) {
    super(props)
    document.title = 'Totally not Last fm'
  }
  render = () => (
    <main className="App">
      {/* <Header/>
      <Structure>
        <Switch>
          <Route path='/' component={Home}/>
        </Switch>
      </Structure>
      <Footer /> */}
      <Route path='/' component={Landing}/>
    </main>
  )
}

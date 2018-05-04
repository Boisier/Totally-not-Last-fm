// React
import React, { Component } from 'react'
import { Route } from 'react-router-dom'

// Scene dependencies
import './Header.scss'
<<<<<<< HEAD
import pages from 'assets/json/pagesList'
import Menu from './scenes/Menu/Menu'
=======
>>>>>>> feature/front/about

export default class extends Component {
  constructor (props) {
    super(props)
    this.state = {
      menuIsOpen: false
    }
  }

  mapUrlToPageName = (routeProps) => {
    const { params } = routeProps.match

    console.log(routeProps)

    if (!params.pageName) {
      return null
    }

    if (!pages[params.pageName]) {
      return null
    }

    if (!pages[params.pageName].displayInHeader) {
      return null
    }

    return <span className="page-title" >{ '_' + pages[params.pageName].name }</span>
  }

  toggleMenu = () => {
    this.setState({
      menuIsOpen: !this.state.menuIsOpen
    })
  }

  closeMenu = () => {
    this.setState({
      menuIsOpen: false
    })
  }

  render () {
    const toggleActive = this.state.menuIsOpen ? 'is-active' : ''
    return (
      <header className={this.state.menuIsOpen ? 'menu-opened' : ''}>
        <h3>
          Totally not <span className="red">Last fm</span>
          <Route path="/:pageName" render={this.mapUrlToPageName} />
        </h3>
        <h5 className="menu-button">
          <button
            className={'hamburger hamburger--squeeze ' + toggleActive}
            type="button"
            aria-label="Menu"
            aria-controls="navigation"
            onClick={this.toggleMenu}>
            <span className="hamburger-box">
              <span className="hamburger-inner"></span>
            </span>
            <span className="hamburger-label">Menu</span>
          </button>
        </h5>
        <Menu isOpen={this.state.menuIsOpen} closeMenu={this.closeMenu} />
      </header>
    )
  }
}

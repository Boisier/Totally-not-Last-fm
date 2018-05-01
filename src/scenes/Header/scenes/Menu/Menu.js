import React, { Component } from 'react'
import { Link } from 'react-router-dom'

import './Menu.scss'

import pages from 'assets/json/pagesList'

export default class extends Component {
  render = () => {
    return (
      <menu id="main-menu">
        <ul className="pages-list">
          {
            Object.keys(pages).map((key) => (
              <li key={ pages[key].name }>
                <Link
                  to={'/' + key}
                  onClick={this.props.closeMenu} >
                  { '_' + pages[key].name }
                </Link>
              </li>
            ))
          }
        </ul>
      </menu>
    )
  }
}

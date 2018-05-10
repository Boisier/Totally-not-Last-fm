import React, { Component } from 'react'
import { Link } from 'react-router-dom'

import pages from 'library/pagesList'

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
                  onClick={this.props.closeMenu.bind(this, '/' + key)} >
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

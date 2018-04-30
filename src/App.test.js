import React from 'react'
import { mount } from 'enzyme'
import { MemoryRouter } from 'react-router-dom'

import App from './App'
import Landing from './scenes/Landing/Landing'
import Home from './scenes/Home/Home'

const setup = propOverrides => {
  const props = Object.assign({
    url: '/',
    forceLogin: true
  }, propOverrides)

  const wrapper = mount(
    <MemoryRouter initialEntries={[props.url]}>
      <App forceLogin={props.forceLogin}/>
    </MemoryRouter>
  )

  return {
    wrapper,
    landing: wrapper.find(Landing),
    home: wrapper.find(Home)
  }
}

describe('App display the correct page', () => {
  describe('When not connected', () => {
    it('/ => Landing page', () => {
      const { landing } = setup({forceLogin: false})
      expect(landing.length).toBe(1)
    })
  })
  describe('When connected', () => {
    it('/ => Home page', () => {
      const { home } = setup({url: '/'})
      expect(home.length).toBe(1)
    })
  })
})

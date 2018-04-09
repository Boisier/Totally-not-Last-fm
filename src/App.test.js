import React from 'react'
import renderer from 'react-test-renderer'
import { MemoryRouter } from 'react-router-dom'

import App from './App'

it('Renders correct page based on URL', () => {
  const component = renderer.create(
    <MemoryRouter initialEntries={['/']}>
      <App/>
    </MemoryRouter>
  ).toJSON()
  expect(component).toMatchSnapshot()
})

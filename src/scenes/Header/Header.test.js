import React from 'react'
import renderer from 'react-test-renderer'
import { MemoryRouter } from 'react-router-dom'

import Header from './Header'

it('renders LinkBlock correctly', () => {
  const component = renderer.create(
    <MemoryRouter>
      <Header />
    </MemoryRouter>
  ).toJSON()
  expect(component).toMatchSnapshot()
})

import React from 'react'
import renderer from 'react-test-renderer'
import { MemoryRouter } from 'react-router-dom'

import Structure from './Structure'

it('Conserve children prop', () => {
  const component = renderer.create(
    <MemoryRouter>
      <Structure>Content</Structure>
    </MemoryRouter>
  ).toJSON()
  expect(component).toMatchSnapshot()
})

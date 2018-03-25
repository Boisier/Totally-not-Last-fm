import React from 'react'
import ReactDOM from 'react-dom'
import api from './index'

it('Response has correct format on success', () => {
  return api.get('https://httpbin.org/get').then(response => {
    expect(response).toEqual({
      success: true,
      status: expect.any(Number),
      headers: expect.anything(),
      body: expect.anything()
    })
  })
})

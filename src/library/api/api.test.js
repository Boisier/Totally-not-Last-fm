import React from 'react'
import ReactDOM from 'react-dom'
import api from './index'

it('Token is handled correctly', () => {
  const token = makeid()

  // Token setting
  api.setAuthToken(token)
  expect(api.authToken).toBe(token)

  // Token removal
  api.removeAuthToken()
  expect(api.authToken).toBeNull()
})

it('Failed queries have correct return value', () => {
  expect(api.queryFailed("error")).toEqual({
    success: false
  })

})

it('Response has correct format on GET success', () => {
  return api.get('https://httpbin.org/get').then(response => {
    expect(response).toEqual({
      success: true,
      status: expect.any(Number),
      headers: expect.anything(),
      body: expect.anything()
    })
  })
})

it('Response has correct format on POST success', () => {
  const testID = makeid()
  return api.post('https://httpbin.org/post', { testID: testID }).then(response => {
    expect(response).toEqual({
      success: true,
      status: expect.any(Number),
      headers: expect.anything(),
      body: expect.anything()
    })
  })
})

it('Response has correct format on PUT success', () => {
  const testID = makeid()
  return api.put('https://httpbin.org/put', { testID: testID }).then(response => {
    expect(response).toEqual({
      success: true,
      status: expect.any(Number),
      headers: expect.anything(),
      body: expect.anything()
    })
  })
})

it('Response has correct format on DELETE success', () => {
  const testID = makeid()
  return api.delete('https://httpbin.org/delete', { testID: testID }).then(response => {
    expect(response).toEqual({
      success: true,
      status: expect.any(Number),
      headers: expect.anything(),
      body: expect.anything()
    })
  })
})

function makeid() {
  var text = ""
  var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789"

  for (var i = 0; i < 5; i++) {
    text += possible.charAt(Math.floor(Math.random() * possible.length))
  }

  return text
}

import axios from 'axios'
import qs from 'querystring'

import settings from '../settings.json'

export default class API {
  static authToken = null

  /**
   * Instanciate the client and register predefined routes if needed
   */
  static init () {
    axios.default.baseURL = settings.baseURL
    axios.defaults.headers.common['auth-token'] = this.authToken
  }

  /**
   * Set the authentication token to be sent wgiith every request
   * @param token
   */
  static setAuthToken (token) {
    this.authToken = token
    this.init()
  }

  /**
   * Remove the authentication token
   */
  static removeAuthToken () {
    this.authToken = null
    this.init()
  }

  //
  // API request handling

  /**
   * Send the request with the given option
   * Add options that aren't supposed to change between requests.
   * Set-up handlers for response handling
   * @param options
   */
  static sendRequest (options) {
    return axios(options)
  }

  /**
   * Prepare options to send a request
   * @param url String
   * @param data Object (key/value)
   * @param multipart boolean
   * @param method String GET|POST|PUT|DELETE
   * @return Promise
   */
  static sendComplex (url, data, multipart, method) {
    const headers = multipart ? {'content-type': 'application/x-www-form-urlencoded'} : {}
    return this.sendRequest({
      url: url,
      method: method,
      data: qs.stringify(data),
      headers: headers
    })
  }

  //
  // Base request methods

  /**
   * Send an HTTP get query to the api
   * @param url
   * @return Promise
   */
  static get (url) {
    return this.sendRequest({
      url: url,
      method: 'get'
    })
  }

  /**
   * Send an HTTP POST|PUT|DELETE query to the api
   * - For standard post, data must take the form of a simple key/value object
   * - TODO: POST for multipart form
   * @param url
   */
  static post (url, data, multipart = false) {
    return this.sendComplex(url, data, multipart, 'post')
  }

  static put (url, data, multipart = false) {
    return this.sendComplex(url, data, multipart, 'put')
  }

  static delete (url, data, multipart = false) {
    return this.sendComplex(url, data, multipart, 'delete')
  }
}

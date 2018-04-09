import Request from 'request-promise-native'

export default class API {
  static authToken = null

  /**
   * Instanciate the client and register predefined routes if nedded
   */
  /* static init () {
    if (this.client !== null) {
      return
    }

    // register routes
  } */

  /**
   * Set the authentication token to be sent with every request
   * @param token
   */
  static setAuthToken (token) {
    this.authToken = token
  }

  /**
   * Remove the authentication token
   */
  static removeAuthToken () {
    this.authToken = null
  }

  //
  // API response handling

  static _include_headers (body, response) {
    return {headers: response, body: JSON.parse(body)}
  };

  /**
   * Called when the resquest has been correctly received
   * @param response
   * @return {{success: boolean, status: * | statusCode, header, body}}
   */
  static querySucceeded (response) {
    return {
      success: true,
      status: response.headers.statusCode, // Easy access to response HTTP code
      headers: response.headers,
      body: response.body
    }
  }

  /**
   * Called when the query hasn't been properly received
   * @param response
   * @return {{success: boolean}}
   */
  static queryFailed () {
    return {
      success: false
    }
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
    return Request({
      headers: {
        'auth-token': this.authToken
      },
      simple: false,
      transform: this._include_headers,
      ...options
    }).then(this.querySucceeded)
      .catch(this.queryFailed)
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
    const dataHolder = multipart ? {formData: data} : {form: data}

    return this.sendRequest({
      url: url,
      method: method,
      ...dataHolder
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
      method: 'GET'
    })
  }

  /**
   * Send an HTTP POST|PUT|DELETE query to the api
   * - For standard post, data must take the form of a simple key/value object
   * - TODO: POST for multipart form
   * @param url
   */
  static post (url, data, multipart = false) {
    return this.sendComplex(url, data, multipart, 'POST')
  }

  static put (url, data, multipart = false) {
    return this.sendComplex(url, data, multipart, 'PUT')
  }

  static delete (url, data, multipart = false) {
    return this.sendComplex(url, data, multipart, 'DELETE')
  }
}

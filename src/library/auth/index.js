/**
 Function collection handling auth
 */

import cookies from 'browser-cookies'
import settings from '../settings'

/**
 * Tell if we are facing a user (true) or a visitor (false)
 * @return {boolean}
 */
export default class {
  static isUser () {
    const token = this.getToken()

    if (!token) { // missing token
      return false
    }

    // Token found, let's validate it
    if (!this.tokenIsValid()) {
      cookies.erase('token')
      return false
    }
    // if the token is OK, let's store it in the app state
    // The token will be send with every request to prove identity
    // Refresh the token
    this.setToken(token)

    return true
  }

  /**
   * Tell if we are facing a visitor (true) or a user (false)
   * @return {boolean}
   */
  static isVisitor () {
    return !this.isUser()
  }

  /**
   * Check the current token against the server
   * @return {boolean}
   */
  static tokenIsValid () {
    return true
  }

  /**
   * Return the current token
   * May be an empty String if the user is a visitor
   * @return {String}
   */
  static getToken () {
    return cookies.get('token')
  }

  /**
   * Set the token with the given string
   * @param token
   */
  static setToken (token) {
    cookies.set('token', token, {
      expires: settings.user.cookieDuration // days
    })
  }

  static signUp (/* email, password, confirmation */) {
    return true
  }

  static signIn (/* email, password */) {
    return true
  }
}

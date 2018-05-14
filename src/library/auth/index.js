/**
 Function collection handling auth
 */

import cookies from 'browser-cookies'
import settings from '../settings'
import api from '../api'

/**
 * Tell if we are facing a user (true) or a visitor (false)
 * @return {boolean}
 */
class Auth {
  constructor () {
    if (!this.isUser()) {
      return
    }

    api.setToken(this.getToken())
  }

  isUser () {
    const token = this.getToken()

    if (!token) { // missing token
      return false
    }

    // Token found, let's validate it
    /* if (!this.tokenIsValid()) {
      cookies.erase('token')
      return false
    } */

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
  isVisitor () {
    return !this.isUser()
  }

  /**
   * Check the current token against the server
   * @return {boolean}
   */
  tokenIsValid () {
    return true
  }

  /**
   * Return the current token
   * May be an empty String if the user is a visitor
   * @return {String}
   */
  getToken () {
    return cookies.get('token')
  }

  /**
   * Set the token with the given string
   * @param token
   */
  setToken (token) {
    cookies.set('token', token, {
      expires: settings.user.cookieDuration // days
    })
  }

  signUp (/* email, password, confirmation */) {
    this.onLogin()
    return true
  }

  signIn (/* email, password */) {
    this.onLogin()
    return true
  }

  onLogin () {
    api.setToken(this.getToken())
  }

  onLogout () {
    api.retToken('')
    cookies.erase('token')
  }
}

const auth = new Auth()
export default auth

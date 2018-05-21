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
    /*
    TODO: Uncomment and replace with correct route once available
    if (password === confirmation) return false

    api.post('/auth', {
      email: email,
      password: password
    }).then(response => {
      if(reponse.success === true) {
        this.setToken(reponse.token)
        this.onLogin()
        return true
      }

      return false
    })
    */

    this.onLogin()
    return true
  }

  signIn (/* email, password */) {
    /*
    TODO: Uncomment and replace with correct route once available
    api.get('/auth').then(response => {
      if(response.success === true) {
        this.setToken(response.token)
        this.onLogin()

        return true
      }

      return false
    })
     */
    return true
  }

  onLogin () {
    api.setToken(this.getToken())
  }

  onLogout () {
    /*
    TODO: Uncomment and replace with correct route once available
    api.get('/auth/logout').then(() => {
      api.setToken('')
      cookies.erase('token')
    })
    */

    api.setToken('')
    cookies.erase('token')
  }
}

const auth = new Auth()
export default auth

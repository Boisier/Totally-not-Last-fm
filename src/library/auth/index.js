/**
 Function collection handling auth
 */

import cookies from 'browser-cookies'
import api from '../api'

/**
 * Tell if we are facing a user (true) or a visitor (false)
 * @return {boolean}
 */
class Auth {
  userInfos = {}

  constructor () {
    if (!this.isUser()) {
      return
    }

    api.setToken(this.getToken())

    this.userInfos = {
      id: -1,
      email: '',
      username: ''
    }
  }

  setUserInfos (infos) {
    this.userInfos = infos
  }

  removeUserInfos () {
    this.userInfos = {
      id: -1,
      email: '',
      username: ''
    }
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

    if (this.getID() !== -1) return true

    return api.get('/auth/me').then(response => {
      this.setUserInfos(response.data)
      return true
    })
  }

  /**
   * Tell if we are facing a visitor (true) or a user (false)
   * @return {boolean}
   */
  isVisitor () {
    return !this.isUser()
  }

  getID () {
    return this.userInfos.id
  }

  getEmail () {
    return this.userInfos.email
  }

  getName () {
    return this.userInfos.username
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
   * @param expires Cookie duration
   */
  setToken (token, expires = 0) {
    cookies.set('token', token, {
      expires: expires // days
    })
  }

  signUp (pseudo, email, password, confirmation) {
    if (password === confirmation) return false

    api.post('/auth', {
      username: pseudo,
      email: email,
      password: password,
      birthday: 0
    }).then(response => {
      console.log(response)
      /*
      if (response.success === true) {
        this.setToken(reponse.token)
        this.onLogin()
        return true
      }

      return false */
      return true
    })

    this.onLogin()
    return true
  }

  signIn (email, password) {
    return api.post('/auth/login', {
      email: email,
      password: password
    }).then(response => {
      if (response.status === 200) {
        this.setToken(response.data.access_token, response.data.expires_in)
        this.onLogin()

        return true
      }

      return false
    })
  }

  onLogin () {
    api.setToken(this.getToken())

    return api.get('/auth/me').then(response => {
      this.setUserInfos(response.data)
    })
  }

  onLogout () {
    return api.post('/auth/logout', {}).then(() => {
      api.setToken('')
      cookies.erase('token')
      this.removeUserInfos()
      window.location.reload()
    })
  }
}

const auth = new Auth()
export default auth

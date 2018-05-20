/**
 Function collection handling auth
 */

import cookies from 'browser-cookies'
import api from '../api'

export default class Auth {
  static _instance = null

  static instance () {
    if (Auth._instance == null) {
      Auth._instance = new Auth()
    }

    return this._instance
  }

  static i = () => Auth.instance()

  constructor () {
    // Check if we already have a token
    const token = this.getToken()
    if (!token) return

    api.setToken(token)

    // Token found, let's validate it
    this.tokenIsValid().then(valid => {
      if (!valid) return cookies.erase('token')
      api.setToken(token)
    })
  }

  userInfos () {
    return api.get('/auth/me').then(reponse => reponse.data)
  }

  /**
   * Check the current token against the server
   * @return {boolean}
   */
  tokenIsValid () {
    return this.userInfos().then(infos => {
      return !!infos.id
    })
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
    return this.userInfos()
  }

  onLogout () {
    return api.post('/auth/logout', {}).then(() => {
      api.setToken('')
      cookies.erase('token')
      window.location.reload()
    })
  }
}

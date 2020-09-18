import axios from 'axios'
import Cookies from 'js-cookie'
import * as types from '../mutation-types'

// state
export const state = {
  ip: null,
}

// getters
export const getters = {
  currentIP: state => state.currentIP,
  ip: state => state.ip,
}

// mutations
export const mutations = {

  [types.SAVE_CURRENT_IP] (state, { currentIP, remember }) {
    state.currentIP = currentIP
    Cookies.set('current_ip', current, { expires: remember ? 1 : null })
  },

  [types.FETCH_IP_SUCCESS] (state, { ip }) {
    state.ip = ip
  },

  [types.FETCH_IP_FAILURE] (state) {
    state.ip = null
  },
}

// actions
export const actions = {
  saveCurrentIP ({ commit, dispatch }, payload) {
    commit(types.SAVE_CURRENT_IP, payload)
  },

  async fetchIP ({ commit }) {
    try {
      const { data } = await axios.get('/api/ip')

      commit(types.FETCH_IP_SUCCESS, { ip: data })
    } catch (e) {
      commit(types.FETCH_IP_FAILURE)
    }
  },
}

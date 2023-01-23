import axios from "axios"

export default {
    namespaced: true,
    state: {
        token: null,
        user: null
    },
    getters: {
        authenticated(state) {
            return state.token && state.user
        },
        user(state) {
            return state.user
        }
    },
    mutations: {
        SET_TOKEN(state, token) {
            state.token = token
        },
        SET_USER(state, data) {
            state.user = data
        }
    },
    actions: {
        async singIn({dispatch}, credentials) {
            let response = await axios.post("login", credentials)
            return response
        },
        async attempt({commit, state}) {
            if (token) {
                commit('SET_TOKEN', token)
            }
            if (!state.token) {
                return
            }
            try {
                let response = await axios.get('me')
            } catch (e) {
                commit('SET_TOKEN', null)
                commit('SET_USER', null)
            }
        },
        signOut({commit}) {
            return axios.post('logout').then(()=>{
                commit('SET_USER', null)
                commit('SET_TOKEN', null)
            })
        }
    }
}
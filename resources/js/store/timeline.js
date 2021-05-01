import axios from 'axios'

export default {
    namespaced: true,

    state: {
        tweets: []
    },

    getters: {
        tweets (state) {
            return state.tweets
        }
    },

    mutations: {
        PUSH_TWEET (state, data) {

            state.tweets.push(...data)
        }
    },

    actions: {
        async getTweets ({ commit }, url) {
            let response = await axios.get(url)

            commit('PUSH_TWEET', response.data.data)

            return response
        }
    }
}

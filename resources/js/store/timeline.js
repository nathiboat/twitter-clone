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

            console.log(data)
            state.tweets.push(...data)
        }
    },

    actions: {
        async getTweets ({ commit }) {
            let response = await axios.get('/api/timeline')

            commit('PUSH_TWEET', response.data.data)
        }
    }
}

<template>
    <div>
        <app-tweet v-for="tweet in tweets"
            :key="tweet.id"
            :tweet="tweet"


        >

        </app-tweet>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                tweets: []
            }
        },

        methods: {
            async getTWeets () {
                let response = await axios.get('/api/timeline')

                this.tweets = response.data.data
            }
        },

        mounted () {
            this.getTWeets()
        }
    }
</script>

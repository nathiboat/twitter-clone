<template>
    <div>
        <div class="border-b-8 border-gray-800 p-4 w-full">
            <app-tweet-compose/>
        </div>
        <app-tweet 
            v-for="tweet in tweets"
            :key="tweet.id"
            :tweet="tweet"
        >
        </app-tweet>

        <div
            v-if="tweets.length"
            v-observe-visibility="{
                callback: handleScrolledToBottomOfTimeline
            }"
        >

        </div>
    </div>
</template>

<script>
    import {mapGetters, mapActions, mapMutations } from 'vuex'
    
    export default {
        data () {
            return {
                page: 1,
                lastPage: 1
            }
        },
        computed: {
          ...mapGetters({
              tweets: 'timeline/tweets'
          }),
          urlWithPage () {
              return `/api/timeline?page=${this.page}`
          }
        },
        methods: {
            ...mapActions({
                getTweets: 'timeline/getTweets'
            }),

            ...mapMutations({
                PUSH_TWEET: 'timeline/PUSH_TWEET'                
            }),
            
            loadTweets () {
                this.getTweets(this.urlWithPage).then((response) => {
                
                    this.lastPage = response.data.meta.last_page
                })
            },
            handleScrolledToBottomOfTimeline (isVisible) {
               
               if(!isVisible){
                    return
                }

                if (this.lastPage === this.page) {
                    return
                }

                this.page++

                this.loadTweets()
               
            }
        },

        mounted() {
            this.loadTweets()

            Echo.private(`timeline.${this.$user.id}`)
            .listen('.TweetWasCreated', (e) => {
                this.PUSH_TWEET([e])
            })
        }
    }
</script>

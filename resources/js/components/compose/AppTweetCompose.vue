<template>
    <form class="flex" @submit.prevent="submit" enctype="multipart/form-data">
        <div class="mr-3">
             <img :src="$user.avatar"  class="w-12 rounded-full" alt="">
        </div>
        <div class="flex-grow">
            {{ form }}
            <textarea 
                class="bg-gray-900 w-full outline-none text-gray-300 text-lg resize-none mb-2"
                placeholder="What's happening?"
                autofocus
                v-model="form.body"
            ></textarea>

            <div class="flex justify-between">
                <div>
                    action
                </div>

                <div>
                    <button 
                        class="bg-blue-500 rounded-full text-gray-300 text-center px-4 py-3 font-bold leading-none" 
                        type="submit">
                            Tweet
                    </button>
                </div>
            </div>
        </div>
    </form>
</template>

<script>
    import axios from 'axios'

    export default {
        data () {
            return {
                form: { body: ''},
                page: 1,
                lastPage: 1
            }
        },
        methods: {
            async submit () {
                await axios({
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                        "Access-Control-Allow-Origin": "*"
                    },
                    url: '/api/tweets', 
                    data: this.form
                })
            }
        }
    }
</script>

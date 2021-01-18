<template>
    <span class="text-gray-300 font-bold">{{ user.name }} <span class="text-blue-400">@{{ user.username }}</span></span>
</template>

<script>
    export default {
        props: {
            user: {
                require: true,
                type: Object
            }
        }
    }
</script>

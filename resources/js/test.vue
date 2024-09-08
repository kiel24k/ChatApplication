<template>
    <h1>test</h1>
    <button @click="test">click me</button>
</template>


<script setup>
import axios from 'axios';
import { onMounted } from 'vue';

const test = () => {
    axios({
        method: 'GET',
        url: 'api/test-event'
    }).then(response => {
        console.log(response);
        // testRoute()
    })
}

// const testRoute = () => {
//     Echo.private(`private-channel.1`)
//     .listen('ChatEvent', (event) => {
//         console.log('Event Data:', event);
//     });
// }

// onMounted(() => {
//     testRoute()
// })
</script>
<script setup>

import { onMounted, ref } from 'vue';
const emit = defineEmits(['id'])
const userData = ref({})
const user = async () => {
    await axios({
        method: 'GET',
        url: 'api/user'
    }).then(response => {
        userData.value = response.data
        emit('id', userData.value.id)
    })
}

onMounted(() => {
  user()
})

</script>

<template>
    <header>
        <div class="content1">
            <b>ChatApp</b>
        </div>
        <div class="content2">
            Home
        </div>
        <div class="content3">
            {{ userData.name }}
        </div>
    </header>
</template>


<style scoped>
header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
    position: fixed;
    top: 0;
    background-color: rgba(129, 129, 129, 0.5);
    backdrop-filter: blur(10px);
    color: white;
    padding: 10px;
    z-index: 999;
}
</style>
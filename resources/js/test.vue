<template>
    <h1>test</h1>
    <button @click="test">click me</button>

    <div class="box" ref="scrollable">
        <div class="content">
            <h1>dasd</h1>
        </div>
        <div class="content">
            <h1>dasd</h1>
        </div>
        <div class="content">
            <h1>dasd</h1>
        </div>
        <div class="content">
            <h1>dasd</h1>
        </div>
        <div class="content">
            <h1>dasd</h1>
        </div>
        <div class="content">
            <h1>dasdasdasdsadsadasdsadasdsadasddasdsadsad</h1>
        </div>
        <div class="content">
            <h1>dasd</h1>
        </div>
        <div class="content">
            <h1>dasd</h1>
        </div>
        <div class="content">
            <h1>dasd</h1>
        </div>
        <div class="content">
            <h1>dasd</h1>
        </div>
        <div class="content">
            <h1>dasd</h1>
        </div>
        <div class="content">
            <h1>dasd</h1>
        </div>
        <div class="content">
            <h1>dasd</h1>
        </div>
        <div class="content">
            <h1>dasd</h1>
        </div>
        <div class="content">
            <h1>dasd</h1>
        </div>
        <div class="content">
            <h1>dasd</h1>
        </div>
        <div class="content">
            <h1>dasd</h1>
        </div>
        <div class="content">
            <h1>dasd</h1>
        </div>
        <div class="content">
            <h1>dasd</h1>
        </div>
        <div class="content">
            <h1>dasd</h1>
        </div>


        <div class="content">
            <h1>dasd</h1>
        </div>
        <div class="content">
            <h1>dasd</h1>
        </div>
        <div class="content">
            <h1>dasd</h1>
        </div>
        <div class="content">
            <h1>dasd</h1>
        </div>

        <div class="content">
            <h1>dasd</h1>
        </div>

        <div class="content">
            <h1>dasd</h1>
        </div>
        <div class="content">
            <h1>dasd</h1>
        </div>
        <div class="content">
            <h1>dasd</h1>
        </div>
    </div>
</template>


<script setup>
import axios from 'axios';
import { onBeforeUnmount, onMounted, ref, watch } from 'vue';

const scrollable = ref('')
const scrollPosition = ref(0);


const test = () => {
    axios({
        method: 'GET',
        url: 'api/test-event'
    }).then(response => {
        console.log(response);
        // testRoute()
    })
}


const handleScroll = () => {
    if (scrollable.value) {
        scrollable.value.scrollTop = scrollable.value.scrollHeight;
    }
};



watch(scrollPosition, (newValue) => {
    console.log(scrollable.value.scrolltTop);
});


onMounted(() => {
    //   if (scrollable.value) {
    //     scrollable.value.addEventListener('scroll', handleScroll);
    //   }
    handleScroll()
});

onBeforeUnmount(() => {
    if (scrollable.value) {
        scrollable.value.removeEventListener('scroll', handleScroll);
    }
});

</script>

<style scoped>
.box {
    width: 15rem;
    background: gray;
    overflow: auto;
    height: 100%;
    position: absolute;
    top: 0;

}

.content {
    width: 20rem;
    background: red;
}
</style>
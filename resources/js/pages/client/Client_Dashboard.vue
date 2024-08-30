<script setup>
import sidebar from '@/components/client/Client_Sidebar.vue'
</script>

<template>
    <main>
        <sidebar />
        <section>
            <div class="sender-message">
                <div class="content">
                    <h1>lorem</h1>
                </div>
                <div class="content">
                    <h1>lorem</h1>
                </div>
                <div class="content">
                    <h1>lorem</h1>
                </div>
                <div class="content">
                    <h1>lorem</h1>
                </div>
                <div class="content">
                    <h1>lorem</h1>
                </div>
            </div>
            <div class="receiver-message">
                <div class="content">
                    <h1>Hellow</h1>
                </div>
            </div>
            <div class="receiver-message">
                <div class="content">
                    <h1>Hellow</h1>
                </div>
            </div>
            <div class="receiver-message">
                <div class="content">
                    <h1>Hellow</h1>
                </div>
            </div>
            <div class="enter-message">
                <div class="enter-message-content">
                    <input type="text" class="form-control">
                    <button class="btn btn-dark">Send</button>
                </div>
            </div>
        </section>

    </main>

</template>

<style setup>
main {
    display: flex;

}

section {
    background-color: gray;
    width: 100%;
    overflow: scroll;
    overflow-x: hidden;
}

section::-webkit-scrollbar {
    width: 1px;
    height: 50px;
}

section::-webkit-scrollbar-thumb {
    background-color: #d3d3d3;
    border-radius: 10px;
}

section::-webkit-scrollbar-track {
    background-color: #f4f9fa;
}

.sender-message {
    width: 100%;
    display: grid;
    justify-content: end;

}

.receiver-message {
    width: 100%;
    display: grid;
    justify-content: start;
}

.content {
    max-width: 30rem;
    background: pink;
    padding: 10px;
    border-radius: 50px;
    margin: 40px;
}

.enter-message {
    position: fixed;
    bottom: 0;
    width: 88.5%;
}

.enter-message-content {
    display: flex;
    background: red;
}
</style>
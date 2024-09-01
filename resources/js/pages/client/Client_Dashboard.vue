<script setup>
import sidebar from '@/components/client/Client_Sidebar.vue'
import Header from '@/components/client/Client_Header.vue'
</script>

<template>
   <Header />
    <main>
        <sidebar />
        <section>
            <div class="sender-message">
                <div class="content">
                    <span>lorem</span>
                </div>
                <div class="content">
                    <span>lorem</span>
                </div>
                <div class="content">
                    <span>lorem</span>
                </div>
                <div class="content">
                    <span>lorem</span>
                </div>
                <div class="content">
                    <span>lorem</span>
                </div>
            </div>
            <div class="receiver-message">
                <div class="content">
                    <span>Hellow</span>
                </div>
            </div>
            <div class="receiver-message">
                <div class="content">
                    <span>Hellow</span>
                </div>
            </div>
            <div class="receiver-message">
                <div class="content">
                    <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius explicabo reprehenderit quod adipisci natus tenetur ipsam delectus architecto asperiores, modi eum? Vel laborum culpa quis blanditiis veniam at perspiciatis voluptatum.</span>
                </div>
            </div>
            <div class="enter-message">
                <div class="enter-message-content">
                    <input type="text" placeholder="Type Message...">
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
    background-color: rgb(10, 10, 10);
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
    background: rgb(15, 104, 187);
    padding: 10px;
    min-height: 23px;
    border-radius: 25px;
    margin: 40px;
    color:white;
    font-size: 15px;
    display: grid;
    align-items: center;
}

.enter-message {
    position: fixed;
    bottom: 0;
    width: 88%;
}

.enter-message-content {
    display: flex;
}
.enter-message-content input{
    color:rgb(253, 248, 248);
    background-color: rgb(87, 86, 86);
    border-radius: 50px;
    padding:8px;
    border:0;
    margin-top:20px;
    width:100%;
   
}
.enter-message-content input::placeholder{
    color:white;
}
.enter-message-content input:focus{
    background-color: rgb(87, 86, 86);
    outline: none;
    color:white;
}
</style>
<script setup>
import sidebar from '@/components/client/Client_Sidebar.vue'
import Header from '@/components/client/Client_Header.vue'
import { ref, watch } from 'vue';

const userIdValue = ref()
const handleMessage = ref()
const sender_id = ref()
const message = ref('')


const senderID = (id) => {
    axios({
        method: 'GET',
        url: `/api/display-message/${id}/${userIdValue.value}`
    }).then(response => {
        sender_id.value = id
        handleMessage.value = response.data
        console.log(handleMessage.value);
    })
}

const userID = (id) => {
    userIdValue.value = id
}

const submitMessage = () => {
    axios({
        method: 'POST',
        url: 'api/submit-messsage',
        data: {
            sender_id: userIdValue.value,
            receiver_id: sender_id.value,
            message_content: message.value
        }
    }).then(response => {
        console.log(response);
        senderID(sender_id.value)
        
    })
}




</script>

<template>
    <Header @id=userID />
    <main>
        <sidebar @id=senderID />
        <section>
            <div class="message-content" v-for="(data, index) in handleMessage" :key="index">
                <div class="sender-message" v-if="sender_id == data.sender_id">
                    <div class="content">
                        <span>
                            {{ sender_id }} {{ data.message_content }}
                        </span>
                    </div>
                </div>
                <div class="receiver-message" v-else="userIdValue == data.receiver_id">
                    <div class="content">
                        <span> {{ userIdValue }} {{ data.message_content }}</span>
                    </div>
                </div>
            </div>
            <div class="enter-message">
                <div class="enter-message-content">
                    <input type="text" placeholder="Type Message..." v-model="message" @keyup.enter="submitMessage">
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
    overflow-anchor: none;
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
.message-content{
    overflow-anchor: none;
    
}

.sender-message {
    width: 100%;
    display: grid;
    justify-content: start;

}

.receiver-message {
    width: 100%;
    display: grid;
    justify-content: end;

}

.content {
    max-width: 30rem;
    background: rgb(15, 104, 187);
    padding: 10px;
    min-height: 23px;
    border-radius: 25px;
    margin: 40px;
    color: white;
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

.enter-message-content input {
    color: rgb(253, 248, 248);
    background-color: rgb(87, 86, 86);
    border-radius: 50px;
    padding: 8px;
    border: 0;
    margin-top: 20px;
    width: 100%;

}

.enter-message-content input::placeholder {
    color: white;
}

.enter-message-content input:focus {
    background-color: rgb(87, 86, 86);
    outline: none;
    color: white;
}
</style>
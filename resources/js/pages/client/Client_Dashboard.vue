<script setup>
import sidebar from '@/components/client/Client_Sidebar.vue'
import Header from '@/components/client/Client_Header.vue'
import { ref,nextTick, watch, onMounted } from 'vue';

const userIdValue = ref()
const handleMessage = ref()
const sender_id = ref()
const message = ref('')
const scrollContainer = ref(null)
const status = ref({})

const scrollBottom = () => {
    if (scrollContainer.value) {
        scrollContainer.value.scrollTop = scrollContainer.value.scrollHeight;
    }
   
}

const senderID = (id) => {
    axios({
        method: 'GET',
        url: `/api/display-message/${id}/${userIdValue.value}`
    }).then(response => {
        sender_id.value = id
        handleMessage.value = response.data
        status.value = response.status  
        scrollBottom()
    })
}

const userID = (id) => {
    userIdValue.value = id
}



const RealtimeMessage = () => {
    Echo.private(`private-channel.${sender_id.value}`)
    .listen('ChatEvent', (event) => {
      senderID(sender_id.value)
      scrollBottom()
    })
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
        senderID(sender_id.value)
        message.value = ''
       
        
    })
}

watch(handleMessage,(newHandleMessage, OldHandleMEssage) => {
    scrollBottom()
    RealtimeMessage()
}, { immediate: true }); 




// watch(scrollContainer, (oldVal, newVal) => {
//     console.log(scrollContainer.value.scrollTop);
// })

onMounted(() => {
    scrollBottom()
    RealtimeMessage()

})


</script>

<template>
    <Header @id=userID />
    <main>
        <sidebar @id=senderID />
        <section ref="scrollContainer">
            <div class="message-content" v-for="(data, index) in handleMessage" :key="index">
                <div class="sender-message" v-if="sender_id == data.sender_id">
                    <div class="content-1">
                        <span>
                            {{ sender_id }} {{ data.message_content }}
                        </span>
                    </div>
                </div>
                <div class="receiver-message " v-else="userIdValue == data.receiver_id">
                    <div class="content-2">
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
    height: 80rem; /* Set a fixed height for the container */
    width: 100%;
    overflow-y: scroll; /* Enable vertical scrolling */
    border: 1px solid #ccc;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    overflow-anchor: none;
    scroll-snap-align: end;
    
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
    display: flex;
    flex-direction: column-reverse;
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

.content-1 {
    max-width: 30rem;
    background: rgb(129, 134, 138);
    padding: 10px;
    min-height: 23px;
    border-radius: 25px;
    margin: 40px;
    color: white;
    font-size: 15px;
    display: grid;
    align-items: center;
    overflow-wrap:anywhere;
}
.content-2 {
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
    overflow-wrap:anywhere;
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
    border-radius: 10px;
    padding: 8px;
    border: 0;
    margin-top: 20px;
    width: 90rem;

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
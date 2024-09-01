<script setup>

import { onMounted, ref } from 'vue';


const userList = ref({})
const users = () => {
  axios({
    method:'GET',
    url: 'api/users'
  }).then(response => {
    userList.value = response.data
    
  })
}

onMounted(() => {
  users()
})

</script>

<template>
    <aside>
      <div id="sidebar">
        <div class="title">
          <h1>TItle here</h1>
          <img
            src="/public/image/burder-menu1.png"
            alt=""
            width="40px"
            height="40px"
          />
        </div>
        <div class="menu1">
          <ul class="navbar nav mt-1">
            <small class="p-4">Favorites</small>
            <div class="item1" v-for="(data,index) in userList" :key="index">
              <li class="nav-link ">
                <img src="/public/image/dot.png" width="20px" alt="" />
              {{ data.name }}
              </li>
            </div>
          </ul>
        </div>
      </div>
    </aside>
</template>

<style scoped>
aside{
    position: relative;
    width: 17rem;
    background-color: rgb(31, 29, 29);
    color:white;
}
    #sidebar {
      width: 15rem;
      box-shadow: 0px 0px 5px 0px gray;
      border-width: 0px 2px 0px 0px;
     position: fixed;
      height: 100%;
      overflow-y: scroll;
      color:white;  
      
    }
    /* #sidebar::-webkit-scrollbar {
      width: 2px;
      height: 50px;
    }

    #sidebar::-webkit-scrollbar-thumb {
      background-color: #d3d3d3;
      border-radius: 10px;
    }

    #sidebar::-webkit-scrollbar-track {
      background-color: #f4f9fa;
    } */

    .title {
      display: flex;
      justify-content: space-between;
      align-items: center;
     
    }

    .item1 {
      width: 100%;
      padding: 15px;
      transition: all linear 0.2s;
     
    }
    .item1:hover {
      background: rgb(82, 80, 80);
      color: rgb(253, 248, 248);
    }
    .nav-link {
      display: flex;
      align-items: center;
      gap: 10px;
      color: red;
      color:white;
    }
  </style>
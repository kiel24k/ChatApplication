// import { defineStore } from "pinia";
// import axios from "axios";
// import { ref } from "vue";

// export const useAuthStore = defineStore('auth', {
//   state: () => ({
//     userName: '',
//   }),
//   actions: {
//     async fetchUserName() {
//       try {
//         const response = await axios.get('/api/user');
//         this.userName = response.data.name; // Adjust based on actual API response
//       } catch (error) {
//         console.error('Failed to fetch user name:', error);
//       }
//     },
//   },
//   getters: {
//     headers(state) {
//       console.log(state.userName);
      
//     },
//   },
// });

// notifications.js
import { defineStore } from 'pinia';
import axios from 'axios';

export const useNotificationsStore = defineStore({
  id: 'notifications', // ID for the store
  state: () => ({
    notifications: []
  }),
  getters: {
    getNotifications: (state) => state.notifications
  },
  actions: {
    async fetchNotifications() {
      try {
        const response = await axios.get('/api/notifications'); // Change the API endpoint as needed
        this.notifications = response.data;
      } catch (error) {
        console.log(error);
      }
    }
  }
});

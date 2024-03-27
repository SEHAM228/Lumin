<template>
    <div>
      <h2>Notifications</h2>
      <ul>
       
      <li v-for="notification in notifications" :key="notification.id">
        <a>{{ notification.body }}</a>
        <span>{{ notification.created_at }}</span>
      </li>
   
      </ul>
    </div>
  </template>
  
  <script>
 import {useNotificationsStore} from '@/stores/usenotificationsStore';
  
  export default {
    setup() {
      const notificationsStore = useNotificationsStore();
  
      return {
        notifications: notificationsStore.getNotifications
      };
    },
    // ...
  };
  </script>
  
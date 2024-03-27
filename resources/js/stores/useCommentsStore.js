import { defineStore } from 'pinia';
import axios from 'axios';

export const useCommentsStore = defineStore({
  id: 'comments', // ID for the store
  state: () => ({
    comments: []
  }),
  getters: {
    getComments: (state) => state.comments
  },
  actions: {
    async fetchComments(post_id) {
      try {
        const response = await axios.get(`/api/comments/${post_id}`);
        this.comments = response.data;
      } catch (error) {
        console.log(error);
      }
    },
    async storeComment(user_id, post_id, body) {
      try {
        const response = await axios.post('/api/add/comment', {
          user_id,
          post_id,
          body
        });
        // Assuming you want to update the comments after posting a new comment
        this.comments = response.data; // Add the new comment to the store
      } catch (error) {
        console.log(error);
      }
    }
  }
});

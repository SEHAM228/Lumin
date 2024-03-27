<template>
    <div class="container">
        <p id="success">{{ successMessage }}</p>
        <a href="#"><i @click.prevent="likePost" class="fa fa-thumbs-up" aria-hidden="true"></i> ({{ totallike }})</a>
    </div>
</template>
<script>
import axios from 'axios'; // Make sure you import axios

export default {
    props: ['post'],
    data() {
        return {
            totallike: 0,
            successMessage: '',
        }
    },
    methods: {
        likePost() {
            axios.post('/like/' + this.post, { post: this.post })
                .then(response => {
                    this.getlike();
                    this.successMessage = response.data.message; // Update the success message
                })
                .catch(error => {
                    console.error(error);
                });
        },
        getlike() {
            axios.post('/like', { post: this.post })
                .then(response => {
                    console.log(response.data.post.like);
                    this.totallike = response.data.post.like;
                })
                .catch(error => {
                    console.error(error);
                });
        }
    },
    mounted() {
        this.getlike();
    }
}
</script>

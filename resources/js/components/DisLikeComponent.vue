<template>
    <div class="container">
        <p id="success">{{ successMessage }}</p>
        <a href="#"><i @click.prevent="disLikePost" class="fa fa-thumbs-down" aria-hidden="true"></i> ({{ totalDislike }})</a>
    </div>
</template>
<script>
import axios from 'axios'; // Make sure you import axios

export default {
    props: ['post'],
    data() {
        return {
            totalDislike: 0,
            successMessage: '',
        }
    },
    methods: {
        disLikePost() {
            axios.post('/dislike/' + this.post, { post: this.post })
                .then(response => {
                    this.getDislike();
                    this.successMessage = response.data.message; // Update the success message
                })
                .catch(error => {
                    console.error(error);
                });
        },
        getDislike() {
            axios.post('/dislike', { post: this.post })
                .then(response => {
                    console.log(response.data.post.dislike);
                    this.totalDislike = response.data.post.dislike;
                })
                .catch(error => {
                    console.error(error);
                });
        }
    },
    mounted() {
        this.getDislike();
    }
}
</script>

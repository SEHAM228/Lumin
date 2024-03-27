<template>
<div class="d-flex flex-column">
    <div class="flex" v-for="comment in store.getComments.slice(0,data.commentToShow)" :key="comment.id">
        <div class="flex-shrink-0">
            <span class="fw-bold">
                <a :href="'/user/' + comment.user.id">
            {{ comment.user.name }}
          </a>
            </span>
        </div>
        <div class="flex-grow-1 ms-">
            <span class="text-muted">
                <i>{{ comment.created_at }}</i>
            </span>
            <p>
                {{ comment.body }}
            </p>
        </div>
    </div>
    <button v-if="data.commentToShow < store.getComments.length" 
    @click="loadMoreComments" class="btn btnsn btn-link">
        load more
    </button>
</div>
</template>
<script setup>
import {useCommentsStore} from '@/stores/useCommentsStore';
import { onMounted } from 'vue';
import { reactive } from 'vue';

const store = useCommentsStore();

const data = reactive({
    commentToShow: 3

});
const props = defineProps({
    post_id: {
        type: Number,
        required: true
    }
});

const loadMoreComments = () => {
    if(data.commentToShow >= store.getComments.length){
        return;
    }else{
       data.commentToShow = data.commentToShow + 3;
    }
}

onMounted(() => store.fetchComments(props.post_id));


</script>
<style>
</style>
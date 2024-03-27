import './bootstrap';
import {createApp} from 'vue/dist/vue.esm-bundler.js';

import {createPinia} from 'pinia' ;

import AddComment from './components/AddComment.vue';
import Comments from './components/Comments.vue';
import CommentsCount from './components/CommentsCount.vue';

import Search from './components/Search.vue';
import SearchCanvas from './components/SearchCanvas.vue';
import LikeComponent from './components/LikeComponent.vue';
import DisLikeComponent from './components/DisLikeComponent.vue';
import NotificationComponent from './components/notifications.vue';

const app = createApp({});
const pinia = createPinia();

app.component('notification-component', NotificationComponent );

app.component('comments-component', Comments);


app.component('add-comment', AddComment);

app.component('comments-count',CommentsCount);
app.component('search-component', Search);
app.component('search-canvas', SearchCanvas);
app.use(pinia);



app.component('like-component', LikeComponent);
app.component('dis-like-component', DisLikeComponent);


app.mount("#app");


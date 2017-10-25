import './bootstrap.js'
import Vue from 'vue'

import VueResource from 'vue-resource'

import CommentComponent from "./components/CommentComponent.vue"
import TopicCommentComponent from "./components/TopicCommentComponent.vue"
import TopicBallComponent from "./components/TopicBallComponent.vue"

Vue.use(VueResource);

Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('content');

Vue.component("comment-post", CommentComponent)
Vue.component("topic-comment", TopicCommentComponent)
Vue.component("topic-balls", TopicBallComponent)


const app = new Vue({
    el: '#app'
});



import VueRouter from 'vue-router';
import HeaderComponent from "./components/HeaderComponent";
import TaskListComponent from "./components/TaskListComponent";

require('./bootstrap');

window.Vue = require('vue').default;

Vue.use(VueRouter);
 
const router = new VueRouter({
mode: 'history',    
    routes: [
        {
            path: '/tasks',
            name: 'task.list',
            component: TaskListComponent
        },
    ]
});

Vue.component('header-component', HeaderComponent);

const app = new Vue({
    el: '#app',
    router
});

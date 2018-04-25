import Vue from 'vue';
import VueRouter from 'vue-router';

import dashboard from './components/dashboard/dashboard'
import flatCreate from './components/flat/flatCreate'
import userEdit from './components/user/userEdit'

Vue.use(VueRouter);

const routes = [
    {
        path: '/admin',
        component: dashboard,
        name: 'dashboard'
    },
    {
        path: '/admin/flats/create',
        component: flatCreate,
        name: 'flatCreate'
    },
    {
        path: '/admin/user',
        component: userEdit,
        name: 'userEdit'
    },
]

const router = new VueRouter({
    routes,
    mode: 'history'
});

export default router;
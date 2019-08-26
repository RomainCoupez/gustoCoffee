import Vue from 'vue';
import VueRouter from 'vue-router';
import store from '../store';
import Home from '../views/Home';
import WhoAreWe from '../views/WhoAreWe'
import Concept from '../views/Concept'
import Newss from '../views/Newss'
import Login from '../views/Login';
import Rooms from '../views/Rooms';
import Room from '../views/Room';
import Bookings from '../views/Bookings';
import Dashboard from '../views/Dashboard';
import DashboardNewss from '../views/DashboardNewss';

Vue.use(VueRouter);

let router = new VueRouter({
    mode: 'history',
    routes: [
        { path: '/home', component: Home },
        { path: '/login', component: Login },
        { path: '/who-are-we', component: WhoAreWe, meta: { requiresAuth: false } },
        { path: '/concept', component: Concept, meta: { requiresAuth: false } },
        { path: '/news', component: Newss, meta: { requiresAuth: false } },
        { path: '/rooms', component: Rooms, meta: { requiresAuth: true } },
        { path: '/rooms/:name', component: Room, meta: { requiresAuth: true } },
        { path: '/dashboard', component: Dashboard, meta: {requiresAuth: true},children: [
            { path: 'bookings', component: Dashboard},
            { path: 'products', component: Dashboard},
            { path: 'news', component: DashboardNewss},
        ]},
        { path: '*', redirect: '/home' }
    ],
});

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
        if (store.getters['security/isAuthenticated']) {
            next();
        } else {
            next({
                path: '/login',
                query: { redirect: to.fullPath }
            });
        }
    } else {
        next(); 
    }
});

export default router;
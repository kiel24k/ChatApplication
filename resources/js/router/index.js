import { createWebHistory, createRouter } from "vue-router";

const routes = [
    {
        path: '/login',
        component: () => import('../auth/Login.vue')
    },
    {
        path: '/signup',
        component: () => import('../auth/Signup.vue')
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

export default router;
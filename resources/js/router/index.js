import { createWebHistory, createRouter } from "vue-router";

const routes = [
    {
        path: "/",
        component: () => import("../auth/Login.vue"),
    },
    {
        path: "/signup",
        name: 'signup',
        component: () => import("../auth/Signup.vue"),
    },
    {
        path: "/client-dashboard",
        component: () => import("../pages/client/Client_Dashboard.vue"),
    },
    {
        path: "/admin-dashboard",
        component: () => import("../pages/admin/Admin_Dashboard.vue"),
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;

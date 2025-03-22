import {createRouter, createWebHistory, type RouteRecordRaw} from "vue-router";
import DefaultLayout from "./components/DefaultLayout.vue";
import Home from "./pages/Home.vue";
import MyImages from "./pages/MyImages.vue";
import Login from "./pages/Login.vue";
import Signup from "./pages/Signup.vue";
import NotFound from "./pages/NotFound.vue";
import useUserStore from "./store/user.ts";

const routes:RouteRecordRaw[] =[
    {
        path:'/',
        component:DefaultLayout,
        children:[
            {
                path:'/',
                name:'Home',
                component:Home
            },
            {
                path:'/images',
                name:'MyImages',
                component:MyImages
            }
        ],
        beforeEnter: async (_to, _from, next) => {
            try {
                const userStore = useUserStore();
                await userStore.fetchUser();
                next();
            } catch (error) {
                next(false); // Cancel navigation if data fetching fails
            }
        },
    },
    {
        path:'/login',
        name:'Login',
        component:Login
    },
    {
        path:'/signup',
        name:'Signup',
        component:Signup
    },
    {
        path:'/:pathMatch(.*)*',
        name: 'not-found',
        component: NotFound
    }
];

const router = createRouter({
    history:createWebHistory(),
    routes,
});

export default router;
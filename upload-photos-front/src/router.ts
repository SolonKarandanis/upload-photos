import {createRouter, createWebHistory, type RouteRecordRaw} from "vue-router";
import DefaultLayout from "./components/DefaultLayout.vue";
import Login from "./pages/Login.vue";
import Signup from "./pages/Signup.vue";
import NotFound from "./pages/NotFound.vue";
import useAuthStore from "./store/auth.store.ts";


const Home = () => import('./pages/Home.vue');
const MyImages = () => import('./pages/MyImages.vue');
const SaveCategory = () => import('./pages/SaveCategory.vue');
const Categories = () => import('./pages/Categories.vue');

const PostList = () => import('./pages/PostList.vue');
const SavePost = () => import('./pages/SavePost.vue');

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
            },
            {
                path:'/categories',
                name:'Categories',
                component:Categories
            },
            {
                path:'/categories/create',
                name:'CreateCategory',
                component:SaveCategory
            },
            {
                path:'/categories/:id',
                name:'UpdateCategory',
                component:SaveCategory
            },
            {
                path:'/posts',
                name:'posts',
                component:PostList
            },
            {
                path:'/posts/create',
                name:'CreatePost',
                component:SavePost
            },
        ],
        beforeEnter: async (_to, _from, next) => {
            try {
                const authStore = useAuthStore();
                await authStore.fetchLoggedInUser();
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
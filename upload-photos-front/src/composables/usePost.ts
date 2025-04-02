import {useToast} from "vue-toast-notification";
import {ref} from "vue";
import type {CreatePostRequest, Post, PostDetails} from "../models/post.model.ts";
import axiosClient from "../axios.ts";
import router from "../router.ts";
import type {AxiosResponse} from "axios";

export function usePost(){
    const toast = useToast();
    const iLoading = ref(false);
    const errorMessage = ref('');
    const posts = ref<Post[]>([]);
    const selectedPost = ref<PostDetails| null>(null);

    const createPost=(request:CreatePostRequest) =>{
        iLoading.value=true;
        axiosClient.get('/sanctum/csrf-cookie').then(()=>{
            axiosClient.post("/api/posts",request)
                .then((_)=>{
                    iLoading.value=false;
                    toast.success('Post created');
                    router.push({name: 'Posts'})
                })
                .catch(error => {
                    iLoading.value=false;
                    console.log(error.response)
                    errorMessage.value = error.response.data.message;
                    toast.error(error.response.data.message)
                })
        });
    }

    const fetchPosts = ()=>{
        iLoading.value=true;
        axiosClient.get('/api/posts')
            .then((response:AxiosResponse<Post[]>) => {
                iLoading.value=false;
                posts.value = response.data;
            }).catch(error => {
                iLoading.value=false;
                console.log(error.response)
                toast.error(error.response.data.message)
            })
    }

    const fetchPost= (postId:number)=>{
        iLoading.value=true;
        axiosClient.get(`/api/posts/${postId}`)
            .then((response:AxiosResponse<PostDetails>)=>{
                iLoading.value=false;
                selectedPost.value = response.data;
            }).catch(error => {
                iLoading.value=false;
                console.log(error.response)
                toast.error(error.response.data.message)
            })
    }

    return {
        iLoading,
        posts,
        errorMessage,
        createPost,
        fetchPosts,
        fetchPost
    }
}
import {ref} from "vue";
import type {Category} from "../models/category.model.ts";
import axiosClient from "../axios.ts";
import router from "../router.ts";
import type {AxiosResponse} from "axios";

export function useCategory(){
    const iLoading = ref(false);
    const errorMessage = ref('');
    const categories = ref<Category[]>([]);
    const selectedCategory = ref<Category|null>(null);

    const createCategory=(values:{name: string})=>{
        iLoading.value=true;
        axiosClient.get('/sanctum/csrf-cookie').then(()=>{
            axiosClient.post("/api/categories",values)
                .then(() => {
                    iLoading.value=false;
                    router.push({name: 'Categories'})
                })
                .catch(error => {
                    iLoading.value=false;
                    console.log(error.response)
                    errorMessage.value = error.response.data.message;
                })
        });
    }

    const fetchCategories=()=>{
        iLoading.value=true;
        axiosClient.get('/api/categories')
            .then((response:AxiosResponse<Category[]>) => {
                iLoading.value=false;
                categories.value = response.data;
            }).catch(error => {
                iLoading.value=false;
                console.log(error.response)
            })
    }

    const fetchCategory= (categoryId:number) =>{
        iLoading.value=true;
        axiosClient.get(`/api/categories/${categoryId}`)
            .then((response:AxiosResponse<Category>)=>{
                iLoading.value=false;
                selectedCategory.value = response.data;
            }).catch(error => {
                iLoading.value=false;
                console.log(error.response)
            })
    }

    const deleteCategory = (categoryId:number)=>{
        iLoading.value=true;
        axiosClient.delete(`/api/categories/${categoryId}`)
            .then(() => {
                iLoading.value=false;
                categories.value = categories.value.filter(category => category.id !== categoryId)
            }).catch(error => {
                iLoading.value=false;
                console.log(error.response)
            })
    }

    return {
        iLoading,
        categories,
        selectedCategory,
        errorMessage,
        createCategory,
        fetchCategories,
        deleteCategory,
        fetchCategory
    }
}
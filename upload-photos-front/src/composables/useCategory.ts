import {ref} from "vue";
import type {Category} from "../models/category.model.ts";
import axiosClient from "../axios.ts";
import router from "../router.ts";
import type {AxiosResponse} from "axios";
import {useToast} from 'vue-toast-notification';

export function useCategory(){
    const toast = useToast();
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
                    toast.success('Category created');
                    router.push({name: 'Categories'})
                })
                .catch(error => {
                    iLoading.value=false;
                    console.log(error.response)
                    errorMessage.value = error.response.data.message;
                    toast.error(error.response.data.message)
                })
        });
    }

    const updateCategory=(values:{name: string},categoryId:number)=>{
        iLoading.value=true;
        axiosClient.get('/sanctum/csrf-cookie').then(()=>{
            axiosClient.put(`/api/categories/${categoryId}`,values)
                .then(() => {
                    iLoading.value=false;
                    toast.success('Category updated');
                    router.push({name: 'Categories'})
                })
                .catch(error => {
                    iLoading.value=false;
                    console.log(error.response)
                    errorMessage.value = error.response.data.message;
                    toast.error(error.response.data.message)
                })
        });
    }

    const saveCategory=(values:{name: string},categoryId:number | null)=>{
        if(categoryId){
            updateCategory(values,categoryId);
        }
        else{
            createCategory(values);
        }
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
                toast.error(error.response.data.message)
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
                toast.error(error.response.data.message)
            })
    }

    const deleteCategory = (categoryId:number)=>{
        iLoading.value=true;
        axiosClient.delete(`/api/categories/${categoryId}`)
            .then(() => {
                iLoading.value=false;
                toast.success('Category deleted');
                categories.value = categories.value.filter(category => category.id !== categoryId)
            }).catch(error => {
                iLoading.value=false;
                console.log(error.response)
                toast.error(error.response.data.message)
            })
    }

    return {
        iLoading,
        categories,
        selectedCategory,
        errorMessage,
        saveCategory,
        fetchCategories,
        deleteCategory,
        fetchCategory
    }
}
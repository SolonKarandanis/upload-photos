import {ref} from "vue";
import axiosClient from "../axios.ts";
import router from "../router.ts";
import type {AxiosResponse} from "axios";
import type {Response} from "../models/response.model.ts";
import type {LoginResponse} from "../models/auth.response.ts";

export function useAuth(){
    const iLoading = ref(false);
    const errorMessage = ref('')

    const login=(values:{email: string,password: string})=>{
        iLoading.value=true;
        axiosClient.post("/api/auth/login",values)
            .then((response:AxiosResponse<Response<LoginResponse>>) => {
                console.log(response)
                const token =response.data.result.token;
                localStorage.setItem('token',token);
                iLoading.value=false;
                router.push({name: 'Home'})
            })
            .catch(error => {
                iLoading.value=false;
                console.log(error.response)
                errorMessage.value = error.response.data.message;
            });
    }

    const register=(values: {
        name: string
        email: string
        password: string
        password_confirmation: string
    })=>{
        iLoading.value=true;
        axiosClient.post("/api/auth/register", values)
            .then(() => {
                iLoading.value=false;
                router.push({name: 'Home'})
            })
            .catch(error => {
                iLoading.value=false;
                console.log(error.response.data)
            });
    }

    return {
        iLoading,
        errorMessage,
        login,
        register
    }
}
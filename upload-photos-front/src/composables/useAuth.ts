import {ref} from "vue";
import axiosClient from "../axios.ts";
import router from "../router.ts";

export function useAuth(){
    const iLoading = ref(false);
    const errorMessage = ref('')

    const login=(values:{email: string,password: string})=>{
        iLoading.value=true;
        axiosClient.get('/sanctum/csrf-cookie').then(() => {
            axiosClient.post("/login",values)
                .then(() => {
                    iLoading.value=false;
                    router.push({name: 'Home'})
                })
                .catch(error => {
                    iLoading.value=false;
                    console.log(error.response)
                    errorMessage.value = error.response.data.message;
                })
        });
    }

    const register=(values: {
        name: string
        email: string
        password: string
        password_confirmation: string
    })=>{
        iLoading.value=true;
        axiosClient.get('/sanctum/csrf-cookie').then(() => {
            axiosClient.post("/register", values)
                .then(() => {
                    iLoading.value=false;
                    router.push({name: 'Home'})
                })
                .catch(error => {
                    iLoading.value=false;
                    console.log(error.response.data)
                })
        });
    }

    return {
        iLoading,
        errorMessage,
        login,
        register
    }
}
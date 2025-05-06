import axios from "axios";
import router from "./router.ts";

const axiosClient = axios.create({
    baseURL: import.meta.env.VITE_API_BASE_URL,
});

axios.interceptors.request.use(
    (config) => {
        const token = localStorage.getItem('token');
        console.log('ssss')

        if (token) {
            config.headers['Authorization'] = `Bearer ${token}`;
        }
        return config;
    },
    (error) => {
        Promise.reject(error);
    }
);

axiosClient.interceptors.response.use((response) => {
    return response;
}, error => {
    if (error.response && error.response.status === 401) {
        router.push({name: 'Login'});
    }

    throw error;
})

export default axiosClient
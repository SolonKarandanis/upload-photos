import axiosClient from "../axios.ts";
import {ref} from "vue";
import router from "../router.ts";

export function useImage(){
    const iLoading = ref(false);

    const uploadImage = (values: {
        label: string
        image: File | null
    }) =>{
        const {label,image} = values;
        if(image){
            iLoading.value=true;
            const formData = new FormData()
            formData.append('image', image)
            formData.append('label', label)
            axiosClient.post('/api/image', formData)
                .then(() => {
                    iLoading.value=true;
                    router.push({name: 'MyImages'})
                }).catch(error => {
                    iLoading.value=false;
                    console.log(error.response)
                })
        }
    }

    return {
        iLoading,
        uploadImage
    }
}
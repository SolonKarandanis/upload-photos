import axiosClient from "../axios.ts";
import {ref} from "vue";
import router from "../router.ts";
import type {Image} from "../models/image.model.ts";
import type {AxiosResponse} from "axios";

export function useImage(){
    const iLoading = ref(false);
    const images = ref<Image[]>([]);

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

    const fetchImages = () =>{
        iLoading.value=true;
        axiosClient.get('/api/image')
            .then((response:AxiosResponse<Image[]>) => {
                iLoading.value=false;
                images.value = response.data;
            }).catch(error => {
                iLoading.value=false;
                console.log(error.response)
            })
    }

    const deleteImage = (imageId:number)=>{
        iLoading.value=true;
        axiosClient.delete(`/api/image/${imageId}`)
            .then(() => {
                iLoading.value=false;
                images.value = images.value.filter(image => image.id !== imageId)
            }).catch(error => {
                iLoading.value=false;
                console.log(error.response)
            })
    }

    return {
        iLoading,
        images,
        uploadImage,
        fetchImages,
        deleteImage
    }
}
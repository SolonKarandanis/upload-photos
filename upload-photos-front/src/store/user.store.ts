import {defineStore} from "pinia";
import axiosClient from "../axios.ts";
import type {User} from "../models/user.model.ts";

interface State{
    user:User |null
}

const useUserStore = defineStore('user', {
    state: ():State => ({
        user: null
    }),
    actions: {
        fetchLoggedInUser() {
            return axiosClient.get('/api/user')
                .then(({data}) => {
                    console.log(data)
                    this.user = data
                })
        }
    }
})

export default useUserStore;
import {defineStore} from "pinia";
import axiosClient from "../axios.ts";
import type {User} from "../models/user.model.ts";

interface State{
    loggedInUser:User |null
}

const useAuthStore = defineStore('user', {
    state: ():State => ({
        loggedInUser: null
    }),
    actions: {
        fetchLoggedInUser() {
            return axiosClient.get('/api/user')
                .then(({data}) => {
                    console.log(data)
                    this.loggedInUser = data
                })
        }
    }
})

export default useAuthStore;
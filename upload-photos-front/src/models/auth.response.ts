import type {User} from "./user.model.ts";

export type LoginResponse ={
    token:string;
    user:User;
}
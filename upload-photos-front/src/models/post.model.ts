import type {Category} from "./category.model.ts";

export interface Post{
    id:number;
    title:string;
    slug:string;
    image:string;
}

export interface PostDetails extends Post{
    postContent:string;
    categories:Category[];
    updatedAt:string;
    createdAt:string;
}

export interface CreatePostRequest extends Post{
    postContent:string;
    categories:number[];
}
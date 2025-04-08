import type {Category} from "./category.model.ts";


export interface BasePost{
    title:string;
}
export interface Post extends BasePost{
    id:number;
    slug:string;
    image:string;
    postContent:string;
    categories:Category[];
}

export interface PostDetails extends Post{
    updatedAt:string;
    createdAt:string;
}

export interface CreatePostRequest extends BasePost{
    postContent:string;
    image:File | null;
    categories:number[];
}

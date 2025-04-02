import type {Category} from "./category.model.ts";


export interface BasePost{
    title:string;
}
export interface Post extends BasePost{
    id:number;
    slug:string;
    image:string;
}

export interface PostDetails extends Post{
    postContent:string;
    categories:Category[];
    updatedAt:string;
    createdAt:string;
}

export interface CreatePostRequest extends BasePost{
    postContent:string;
    image:File | null;
    categories:number[];
}

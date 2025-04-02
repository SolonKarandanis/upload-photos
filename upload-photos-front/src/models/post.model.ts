import type {Category} from "./category.model.ts";

export interface BasePost{
    id:number;
    title:string;
    slug:string;
    image:string;
}

export interface Post extends BasePost{
    postContent:string;
    categories:Category[];
    updatedAt:string;
    createdAt:string;
}
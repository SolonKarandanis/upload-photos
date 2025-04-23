export type Response<T>={
    success: boolean,
    message: string;
    result:T;
}
import { toTypedSchema } from '@vee-validate/zod';
import * as zod from 'zod';
import {imageSchema} from "./image.schemas.ts";

export const createPostSchema= toTypedSchema(
    zod.object({
        title:zod.string(),
        postContent:zod.string(),
        image:imageSchema,
        categories: zod.array(zod.number())
    })
);
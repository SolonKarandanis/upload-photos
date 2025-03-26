import { toTypedSchema } from '@vee-validate/zod';
import * as zod from 'zod';

export const createCategorySchema= toTypedSchema(
    zod.object({
        name:zod.string(),
    })
);
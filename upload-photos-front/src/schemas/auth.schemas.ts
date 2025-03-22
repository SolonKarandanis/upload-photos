import { toTypedSchema } from '@vee-validate/zod';
import * as zod from 'zod';

export const loginSchema= toTypedSchema(
    zod.object({
        email: zod.string()
            .min(1, { message: 'This is required' })
            .email({ message: 'Must be a valid email' }),
        password: zod.string()
            .min(1, { message: 'This is required' })
            .min(8, { message: 'Too short' }),
    })
);

export const registerSchema= toTypedSchema(
    zod.object({
        email: zod.string()
            .min(1, { message: 'This is required' })
            .email({ message: 'Must be a valid email' }),
        name:zod.string(),
        password: zod.string()
            .min(1, { message: 'This is required' })
            .min(8, { message: 'Too short' }),
        password_confirmation: zod.string()
            .min(1, { message: 'This is required' })
            .min(8, { message: 'Too short' }),
    }).refine((data) => data.password === data.password_confirmation, {
        message: "Passwords don't match",
        path: ["password_confirmation"], // path of error
    })
);
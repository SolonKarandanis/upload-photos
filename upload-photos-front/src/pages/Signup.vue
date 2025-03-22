<script setup lang="ts">
import GuestLayout from "../components/GuestLayout.vue";
import {useField, useForm} from "vee-validate";
import {registerSchema} from "../schemas/auth.schemas.ts";
import Error from "../components/Error.vue";
import PrimaryButton from "../components/PrimaryButton.vue";
import {useAuth} from "../composables/useAuth.ts";


const {iLoading,register} = useAuth();

const {  handleSubmit, errors } = useForm({
  validationSchema: registerSchema,
});

const { value: email } = useField('email');
const { value: name } = useField('name');
const { value: password } = useField('password');
const { value: password_confirmation } = useField('password_confirmation');

const onSubmit = handleSubmit(values =>{
  register(values);
});
</script>

<template>
  <GuestLayout>
    <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Create new Account</h2>
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
      <form @submit="onSubmit" class="space-y-4">
        <div>
          <label for="name" class="block text-sm/6 font-medium text-gray-900">Full Name</label>
          <div class="mt-2">
            <input name="name"
                   id="name"
                   v-model="name"
                   class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline -outline-offset-1 outline-gray-300
                    placeholder:text-gray-400 focus:outline  focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
          </div>
          <Error :error="errors.name " />
        </div>
        <div>
          <label for="email" class="block text-sm/6 font-medium text-gray-900">Email address</label>
          <div class="mt-2">
            <input type="email"
                   name="email"
                   id="email"
                   autocomplete="email"
                   v-model="email"
                   class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline -outline-offset-1 outline-gray-300
                    placeholder:text-gray-400 focus:outline focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
          </div>
          <Error :error="errors.email " />
        </div>
        <div>
          <div class="flex items-center justify-between">
            <label for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>
          </div>
          <div class="mt-2">
            <input type="password"
                   name="password"
                   id="password"
                   v-model="password"
                   class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline -outline-offset-1 outline-gray-300
                   placeholder:text-gray-400 focus:outline focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
          </div>
          <Error :error="errors.password " />
        </div>
        <div>
          <div class="flex items-center justify-between">
            <label for="passwordConfirmation" class="block text-sm/6 font-medium text-gray-900">Repeat Password</label>
          </div>
          <div class="mt-2">
            <input type="password"
                   name="password"
                   id="passwordConfirmation"
                   v-model="password_confirmation"
                   class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline -outline-offset-1 outline-gray-300
                    placeholder:text-gray-400 focus:outline  focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
          </div>
          <Error :error="errors.password_confirmation " />
        </div>
        <div>
          <PrimaryButton label="" :loading="iLoading" >
            Create an Account
          </PrimaryButton>
        </div>
      </form>
      <p class="mt-10 text-center text-sm/6 text-gray-500">
        Already have an account?
        {{ ' ' }}
        <RouterLink :to="{name: 'Login'}" class="font-semibold text-indigo-600 hover:text-indigo-500">
          Login from here
        </RouterLink>
      </p>
    </div>
  </GuestLayout>
</template>

<style scoped>

</style>
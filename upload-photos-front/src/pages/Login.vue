<script setup lang="ts">
import GuestLayout from "../components/GuestLayout.vue";
import {useField, useForm} from 'vee-validate';
import {loginSchema} from "../schemas/auth.schemas.ts";
import Error from "../components/Error.vue";
import PrimaryButton from "../components/PrimaryButton.vue";
import {useAuth} from "../composables/useAuth.ts";


const {  handleSubmit, errors } = useForm({
  validationSchema: loginSchema,
});

const {iLoading,errorMessage,login} = useAuth();


const { value: email } = useField('email');
const { value: password } = useField('password');

const onSubmit = handleSubmit(values => {
  login(values);
});

</script>

<template>
  <GuestLayout>
    <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Sign in to your account</h2>
    <div v-if="errorMessage" class="mt-4 py-2 px-3 rounded text-white bg-red-400">
      {{errorMessage}}
    </div>
    <div class="mt-4 sm:mx-auto sm:w-full sm:max-w-sm">
      <form @submit="onSubmit" class="space-y-6">
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
            <label for="  password" class="block text-sm/6 font-medium text-gray-900">Password</label>
          </div>
          <div class="mt-2">
            <input type="password"
                   name="password"
                   id="password"
                   autocomplete="current-password"
                   v-model="password"
                   class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline -outline-offset-1 outline-gray-300
                    placeholder:text-gray-400 focus:outline  focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
          </div>
          <Error :error="errors.password " />
        </div>
        <div>
          <PrimaryButton :loading="iLoading" >
            Sign in
          </PrimaryButton>
        </div>
      </form>
      <p class="mt-10 text-center text-sm/6 text-gray-500">
        Not a member?
        {{ ' ' }}
        <RouterLink :to="{name: 'Signup'}" class="font-semibold text-indigo-600 hover:text-indigo-500">
          Create an account
        </RouterLink>
      </p>
    </div>
  </GuestLayout>
</template>

<style scoped>

</style>
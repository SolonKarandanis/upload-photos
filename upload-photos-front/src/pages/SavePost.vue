<script setup lang="ts">
import InputText from 'primevue/inputtext';
import Editor from 'primevue/editor';
import MultiSelect from 'primevue/multiselect';
import Button from 'primevue/button';
import {onMounted, ref} from "vue";
import {useCategory} from "../composables/useCategory.ts";
import {useForm} from "vee-validate";
import {createPostSchema} from "../schemas/post.schemas.ts";
import {usePost} from "../composables/usePost.ts";
import type {CreatePostRequest} from "../models/post.model.ts";
import Header from "../components/Header.vue";
import Error from "../components/Error.vue";
import {PhotoIcon} from "@heroicons/vue/24/solid";

const {fetchCategories,categories:categoryList,iLoading} = useCategory();
const {createPost,errorMessage,iLoading:postLoading} = usePost();

onMounted(() => {
  fetchCategories();
})

const {  handleSubmit ,defineField,setFieldValue,errors} = useForm({
  validationSchema: createPostSchema,
});

const [title] = defineField('title');
const [postContent] = defineField('postContent');
const [categories] = defineField('categories');

const src = ref<string | null>(null);

const handleUploadImage = (event:Event) =>{
  const target = event.target as HTMLInputElement;
  if(target && target.files){
    const file = target.files[0];
    setFieldValue('image', file);
    src.value = URL.createObjectURL(file);
  }
}

const onSubmit = handleSubmit(({title,postContent,categories,image})=>{
  const createPostRequest:CreatePostRequest={
    title,
    postContent,
    categories,
    image
  }
  createPost(createPostRequest);
});
</script>

<template>
  <Header>
    Save Post
  </Header>
  <div class="mt-4 sm:mx-auto sm:w-full sm:max-w-sm">
    <form @submit="onSubmit">
      <div class="flex flex-col gap-1 mb-3">
        <InputText
            v-model="title"
            type="text"
            name="title"
            placeholder="Title" />
        <Error :error="errors.title " />
      </div>
      <div class="flex flex-col gap-1 mb-3">
        <Editor v-model="postContent"  editorStyle="height: 320px" />
      </div>
      <div class="flex flex-col gap-1 mb-3">
        <MultiSelect
            v-model="categories"
            showClear
            :options="categoryList"
            optionLabel="name"
            optionValue="id"
            filter
            placeholder="Select Categories"
            :maxSelectedLabels="3"
            :loading="iLoading"
            class="w-full md:w-80" />
        <Error :error="errors.categories " />
      </div>
      <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
        <div class="text-center">
          <PhotoIcon class="mx-auto size-12 text-gray-300" aria-hidden="true"/>
          <div class="mt-4 flex text-sm/6 text-gray-600 flex-col gap-4">
            <label for="file-upload"
                   class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600
                       focus-within:ring-offset-2 hover:text-indigo-500">
              <span>Upload a file</span>
              <input id="file-upload"
                     name="file-upload"
                     type="file"
                     @change="handleUploadImage($event)"
                     class="sr-only"/>
            </label>
            <div v-if="!src">
              <p class="pl-1">or drag and drop</p>
              <p class="text-xs/5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
            </div>
            <img v-if="src" :src="src" alt="Image" class="shadow-md rounded-xl w-full sm:w-64" style="filter: grayscale(100%)" />
            <Error :error="errors.image " />
          </div>
        </div>
      </div>
      <div class="mt-3">
        <Button type="submit" label="Submit" severity="secondary" class="w-full"/>
      </div>
    </form>
  </div>

</template>

<style scoped>

</style>
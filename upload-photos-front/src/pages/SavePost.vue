<script setup lang="ts">
import InputText from 'primevue/inputtext';
import Editor from 'primevue/editor';
import MultiSelect from 'primevue/multiselect';
import Button from 'primevue/button';
import FileUpload, {type FileUploadSelectEvent} from 'primevue/fileupload';
import {onMounted} from "vue";
import {useCategory} from "../composables/useCategory.ts";
import {useForm} from "vee-validate";
import {createPostSchema} from "../schemas/post.schemas.ts";
import {usePost} from "../composables/usePost.ts";
import type {CreatePostRequest} from "../models/post.model.ts";
import Header from "../components/Header.vue";
import Error from "../components/Error.vue";

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
const [image] = defineField('image');

const onFileSelect = (event:FileUploadSelectEvent) =>{


  const file = event.files[0];
  setFieldValue('image', file);
};

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
      <div class="flex flex-col gap-1 mb-3">
        <FileUpload v-model="image"
                    name="image"
                    mode="basic"
                    @select="onFileSelect"
                    accept="image/*"
                    :maxFileSize="1000000">
          <template #empty>
            <span>Drag and drop files to here to upload.</span>
          </template>
        </FileUpload>
        <Error :error="errors.image " />
      </div>
      <div class="mt-3">
        <Button type="submit" label="Submit" severity="secondary"/>
      </div>
    </form>
  </div>

</template>

<style scoped>

</style>
<script setup lang="ts">
import InputText from 'primevue/inputtext';
import Editor from 'primevue/editor';
import MultiSelect from 'primevue/multiselect';
import Button from 'primevue/button';
import FileUpload from 'primevue/fileupload';
import {onMounted, ref} from "vue";
import {useCategory} from "../composables/useCategory.ts";
import {useField, useForm} from "vee-validate";
import {createPostSchema} from "../schemas/post.schemas.ts";
import {usePost} from "../composables/usePost.ts";
import type {CreatePostRequest} from "../models/post.model.ts";

const {fetchCategories,categories:categoryList,iLoading} = useCategory();
const {createPost,errorMessage,iLoading:postLoading} = usePost();

onMounted(() => {
  fetchCategories();
})

const {  handleSubmit ,setFieldValue,errors} = useForm({
  validationSchema: createPostSchema,
});

const { value: title } = useField('title');
const { value: postContent } = useField('postContent');
const { value: categories } = useField('categories');

const onSubmit = handleSubmit(({title,postContent,categories,image})=>{
  const createPostRequest:CreatePostRequest={
    title,
    postContent,
    categories,
    image
  }
  createPost(createPostRequest);
});


const selectedCategory = ref();
const onAdvancedUpload = () => {

};
</script>

<template>
  <div class="mt-4 sm:mx-auto sm:w-full sm:max-w-sm">
    <form @submit="onSubmit">
      <div class="flex flex-col gap-1 mb-3">
        <InputText type="text" name="title" placeholder="Title" />
      </div>
      <div class="flex flex-col gap-1 mb-3">
        <Editor  editorStyle="height: 320px" />
      </div>
      <div class="flex flex-col gap-1 mb-3">
        <MultiSelect
            v-model="selectedCategory"
            showClear
            :options="categoryList"
            optionLabel="name"
            optionValue="id"
            filter
            placeholder="Select Categories"
            :maxSelectedLabels="3"
            :loading="iLoading"
            class="w-full md:w-80" />
      </div>
      <div class="flex flex-col gap-1 mb-3">
        <FileUpload name="demo[]"
                    mode="basic"
                    @upload="onAdvancedUpload()"
                    accept="image/*"
                    :maxFileSize="1000000">
          <template #empty>
            <span>Drag and drop files to here to upload.</span>
          </template>
        </FileUpload>
      </div>
      <div class="mt-3">
        <Button label="Submit" severity="secondary"/>
      </div>
    </form>
  </div>

</template>

<style scoped>

</style>
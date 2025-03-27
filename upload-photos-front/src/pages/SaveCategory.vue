<script setup lang="ts">
import Header from "../components/Header.vue";
import {useField, useForm} from "vee-validate";
import {createCategorySchema} from "../schemas/category.schemas.ts";
import Error from "../components/Error.vue";
import PrimaryButton from "../components/PrimaryButton.vue";
import {useCategory} from "../composables/useCategory.ts";
import {onMounted, ref, watch} from "vue";
import {useRoute} from "vue-router";

const {
  iLoading,
  selectedCategory,
  createCategory,
  fetchCategory
} = useCategory();

const route = useRoute();
const categoryId = route.params.id[0];
const title = ref<string>('Create Category');

onMounted(() => {
  if(categoryId){
    title.value= 'Update Category'
    fetchCategory(Number(categoryId));
  }
})

const {  handleSubmit ,errors} = useForm({
  validationSchema: createCategorySchema,
});

const { value: name ,setValue} = useField('name');

const onSubmit = handleSubmit(values=>{
  createCategory(values);
});

watch(selectedCategory, (category)=>{
  setValue(category?.name);
});

</script>

<template>
  <Header>
    {{title}}
  </Header>
  <main>
    <div class="mt-4 sm:mx-auto sm:w-full sm:max-w-sm">
      <form @submit="onSubmit">
        <div>
          <label for="email" class="block text-sm/6 font-medium text-gray-900">Category Name</label>
          <div class="mt-2">
            <input type="text"
                   name="name"
                   id="name"
                   autocomplete="category-name"
                   v-model="name"
                   class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline -outline-offset-1 outline-gray-300
                    placeholder:text-gray-400 focus:outline focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
          </div>
          <Error :error="errors.name " />
        </div>
        <div class="mt-3">
          <PrimaryButton :loading="iLoading">
            Create Category
          </PrimaryButton>
        </div>
      </form>
    </div>
  </main>
</template>

<style scoped>

</style>
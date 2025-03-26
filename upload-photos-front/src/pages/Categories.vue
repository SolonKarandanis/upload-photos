<script setup lang="ts">

import Header from "../components/Header.vue";
import {useCategory} from "../composables/useCategory.ts";
import {onMounted} from "vue";

const {fetchCategories,deleteCategory,categories,iLoading} = useCategory();

function onDelete(id:number){
  if (!confirm("Are you sure you want to delete this Category?")) {
    return;
  }
  deleteCategory(id);
}

onMounted(() => {
  fetchCategories();
})
</script>

<template>
  <Header>
    Categories
  </Header>
  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
          <thead class="text-xs text-gray-700  bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
              <th scope="col" class="px-6 py-3">
                Category Name
              </th>
              <th scope="col" class="px-6 py-3">
                <span class="sr-only">Actions</span>
              </th>
            </tr>
          </thead>
          <tbody>
            <tr  v-for="category in categories" :key="category.id"
                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
              <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{category.name}}
              </th>
              <td class="px-6 py-4 text-right flex justify-end gap-4">
                <button type="submit"
                        class="rounded-md bg-indigo-600 px-3 py-1 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline  focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                  Edit
                </button>
                <button type="submit"
                        :disabled="iLoading"
                        @click="onDelete(category.id)"
                        class="rounded-md bg-red-600 px-3 py-1 text-sm/6 font-semibold text-white shadow-sm hover:bg-red-700 focus-visible:outline focus-visible:outline-offset-2 focus-visible:outline-red-700">
                  Delete
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </main>
</template>

<style scoped>

</style>
<script setup lang="ts">
import {onMounted} from "vue";
import {useImage} from "../composables/useImage.ts";
import Header from "../components/Header.vue";


const {fetchImages,deleteImage,iLoading,images} = useImage();
async function copyImageUrl(url:string) {
  await navigator.clipboard.writeText(url);
}

function onDelete(id:number){
  if (!confirm("Are you sure you want to delete this image?")) {
    return;
  }
  deleteImage(id);
}

onMounted(() => {
  fetchImages();
})
</script>

<template>
  <Header>
    My Images
  </Header>
  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
        <div v-for="image in images" :key="image.id" class="bg-white overflow-hidden shadow rounded-lg">
          <img :src="image.url" alt="Image" class="w-full h-48 object-contain">
          <div class="px-4 py-4">
<!--            <h3 class="text-lg font-semibold text-gray-900">{{ image.name }}</h3>-->
            <p class="text-sm text-grays-500 mb-4">{{ image.label }}</p>
            <div class="flex justify-between ">
              <button type="submit"
                      @click="copyImageUrl(image.url)"
                      class="rounded-md bg-indigo-600 px-3 py-1 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline  focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Copy Image Url
              </button>
              <button type="submit"
                      :disabled="iLoading"
                      @click="onDelete(image.id)"
                      class="rounded-md bg-red-600 px-3 py-1 text-sm/6 font-semibold text-white shadow-sm hover:bg-red-700 focus-visible:outline focus-visible:outline-offset-2 focus-visible:outline-red-700">
                Delete
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</template>

<style scoped>

</style>
<script setup lang="ts">
const props = defineProps<{
  loading: boolean
}>()
</script>

<template>
  <button
      type="submit"
      class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500
            focus-visible:outline focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
      :disabled="props.loading">
    <span v-if="!props.loading">
      <slot></slot>
    </span>
    <span v-if="props.loading" class="d-flex justify-content-center">
      <span :class="`spinner-border`" role="status">
        <span class="visually-hidden">Loading... </span>
      </span>
    </span>
  </button>
</template>

<style scoped>

</style>
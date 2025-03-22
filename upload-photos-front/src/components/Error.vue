<script setup lang="ts">
defineProps<{
  error: string |undefined
}>()
</script>

<template>
  <p v-if="error" class="mt-2 text-sm text-red-600 dark:text-red-500">
    <span class="font-medium">{{error}}</span>
  </p>
</template>

<style scoped>

</style>
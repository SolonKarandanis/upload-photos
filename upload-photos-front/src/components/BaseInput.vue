<script setup lang="ts">
defineProps<{
  modelValue:[string,number]
}>()
</script>

<template>
  <label><slot></slot></label>
  <input
      v-bind="$attrs"
      class="field"
      :value="modelValue"
      @input="$emit('update:modelValue', $event.target?.value)"
  />
</template>

<style scoped>

</style>
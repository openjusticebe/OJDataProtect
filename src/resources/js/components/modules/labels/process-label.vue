<template>
  <span>
    <span class="icon-label">
      <process-icon class="w-6 h-6" />
    </span>
    <span class="text-label">
      <slot></slot>
    </span>
  </span>
</template>

<style scoped>
.icon-label,
.text-label {
  display: inline-block;
  vertical-align: middle;
}
</style>
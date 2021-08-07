<template>
  <span>
    <span class="icon">
      <process-icon />
    </span>
    <span class="text">
      <slot></slot>
    </span>
  </span>
</template>

<style scoped>
.icon,
.text {
  vertical-align: middle;
  display: inline-block;
}
</style>
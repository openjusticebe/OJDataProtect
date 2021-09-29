<template>
  <button
    class="
      hover:bg-blue-200
      hover:text-blue-800
      group
      flex
      items-center
      rounded-md
      bg-blue-100
      text-blue-600 text-sm
      font-medium
      px-4
      py-2
    "
  >
    <edit-icon class="text-blue-800" />
    {{ $t("edit") }} <slot />
  </button>
</template>


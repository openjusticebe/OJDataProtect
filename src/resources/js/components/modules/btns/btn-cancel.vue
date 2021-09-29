<template>
  <button
    class="
      hover:bg-gray-200
      hover:text-gray-800
      group
      flex
      items-center
      rounded-md
      bg-gray-100
      text-gray-900 text-sm
      font-bold
      px-4
      py-2
      border-2 border-green-500
    "
  >
    <close-icon class="text-green-600" />
    {{ $t("cancel") }}
  </button>
</template>


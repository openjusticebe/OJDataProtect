<template>
  <div class="p-2">
    <div
      class="
        inline-flex
        items-center
        bg-white
        leading-none
        text-pink-600
        rounded-full
        p-2
        shadow
        text-teal text-sm
      "
    >
      <span
        class="
          inline-flex
          bg-pink-600
          text-white
          rounded-full
          h-6
          px-3
          justify-center
          items-center
        "
        >{{ tag.name }}</span
      >
      <span class="inline-flex px-2">{{ tag.description }} </span>
      <span class="inline-flex px-2 text-green-500">{{ tag.category }} </span>
      <span class="inline-flex px-2 text-blue-500">{{ tag.tag_type }} </span>
      <span
        class="inline-flex px-2 bg-blue-200 text-yellow-200"
        v-if="tag.specific_organisation"
      >
        {{ tag.specific_organisation }}
      </span>
    </div>
  </div>
</template>

<script>
export default {
  props: ["tag"],
};
</script>
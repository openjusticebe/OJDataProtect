<template>
  <div class="-m-2 text-center">
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
          >Pink</span
        >
        <span class="inline-flex px-2">
          {{ tag }} Donec sit amet neque risus. Pellentesque leo mauris, dictum
          et ligula in.</span
        >
      </div>
    </div>

    <div class="p-2">
      <div
        class="
          inline-flex
          items-center
          bg-white
          leading-none
          text-purple-600
          rounded-full
          p-2
          shadow
          text-sm
        "
      >
        <span
          class="
            inline-flex
            bg-purple-600
            text-white
            rounded-full
            h-6
            px-3
            justify-center
            items-center
            text-
          "
          >Purple</span
        >
        <span class="inline-flex px-2"
          >Aliquam condimentum, odio ac finibus fermentum neque risus.</span
        >
      </div>
    </div>

    <div class="p-2">
      <div
        class="
          inline-flex
          items-center
          bg-white
          leading-none
          text-purple-600
          rounded-full
          p-2
          shadow
          text-teal text-sm
        "
      >
        <span
          class="
            inline-flex
            bg-indigo-600
            text-white
            rounded-full
            h-6
            px-3
            justify-center
            items-center
          "
          >Indigo</span
        >
        <span class="inline-flex px-2"
          >Praesent ex nibh, laoreet id luctus vitae, porttitor at turpis.
        </span>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["tag"],
};
</script>
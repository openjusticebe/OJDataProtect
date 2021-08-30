<template>
  <li class="p-4 flex space-x-4">
    <div class="min-w-0 relative flex-auto sm:pr-20 lg:pr-0 xl:pr-20">
      <h2 class="text-lg font-semibold text-black mb-0.5">
        <a :href="process.links.self">
          <process-label>{{ process.short_name }}</process-label>
        </a>
      </h2>
      <div>
        <h2 class="sr-only">Description</h2>
        <p>{{ process.description }}</p>
      </div>

      <div class="flex-none w-full mt-0.5 font-normal">
        <p class="inline text-gray-700">
          {{ __("app.updated_by") }}
          <span class="font-semibold">{{ process.updated_by }}</span>
        </p>
      </div>
    </div>
  </li>
</template>

<script>
export default {
  props: ["process"],
};
</script>
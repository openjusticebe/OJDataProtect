<template>
  <article class="p-4 flex space-x-4">
    <img
      :src="process.image"
      alt=""
      class="flex-none w-18 h-18 rounded-lg object-cover"
      width="144"
      height="144"
    />
    <div class="min-w-0 relative flex-auto sm:pr-20 lg:pr-0 xl:pr-20">
      <h2 class="text-lg font-semibold text-black mb-0.5">
        <a :href="process.links.self">{{ process.name }}</a>
      </h2>
      <dl class="flex flex-wrap text-sm font-medium whitespace-pre">
        <div>
          <dt class="sr-only">Time</dt>
          <dd>
            <!-- <abbr :title="`${process.time} minutes`">{{ process.time }}m</abbr> -->
          </dd>
        </div>
        <div>
          <dt class="sr-only">Description</dt>
          <dd>{{ process.description }}</dd>
        </div>
        <div>
          <dt class="sr-only">Tags</dt>
          <dd>tags</dd>
          <dd>
            <pre>{{ process.tags }}</pre>
          </dd>
        </div>
        <div class="flex-none w-full mt-0.5 font-normal">
          <dt class="inline">Editer by</dt>
          <!-- <dd class="inline text-black">{{ process.author }}</dd> -->
        </div>
      </dl>
    </div>
  </article>
</template>

<script>
export default {
  props: ["process"],
};
</script>
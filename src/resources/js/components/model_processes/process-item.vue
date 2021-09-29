<template>
  <li class="p-4 flex space-x-4">
    <div class="min-w-0 relative flex-auto sm:pr-20 lg:pr-0 xl:pr-20">
      <h2 class="text-lg font-semibold text-black mb-0.5">
        <a :href="process.links.self">
          <process-label>{{ process.short_name }}</process-label>
        </a>
        <span class="text-xs text-gray-500">{{ process.status }}</span>
      </h2>
      <div>
        <h2 class="sr-only">{{ $t("description") }}</h2>
        <p>
          {{ process.description }}
        </p>
        <process-timetable :process="process" />
      </div>

      <div class="mt-0.5 font-normal text-right" v-if="process.updated_by">
        <p class="inline text-gray-700">
          {{ $t("app.updated_by") }}
          <span class="font-semibold">{{ process.updated_by }}</span>
        </p>
      </div>
    </div>
    <div class="rounded bg-yellow-200">
      <div class="relative pt-1">
        <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-pink-200">
          <div
            :style="'width:' + Math.floor(Math.random() * 100) + '%'"
            class="
              shadow-none
              flex flex-col
              text-center
              whitespace-nowrap
              text-white
              justify-center
              bg-pink-500
            "
          ></div>
        </div>
      </div>

      <div class="text-5xl">{{ Math.floor(Math.random() * 100) }}</div>
    </div>
    <div v-if="!confirm_delete">
      <button class="btn-xs">
        <edit-label @click.native="confirm_delete = !confirm_delete" />
      </button>
    </div>
    <div v-if="confirm_delete">
      <div>
        <p class="font-bold font-uppercase">{{ $t("confirmation") }}</p>
        <p>{{ $t("are_you_sure") }}</p>
        <button class="btn-xs" @click="confirm_delete = false">
          {{ $t("cancel") }}
        </button>

        <button class="btn-xs-danger">
          <trash-icon /> {{ $t("confirm") }}
        </button>
      </div>
    </div>
  </li>
</template>

<script>
export default {
  props: ["process"],
  data() {
    return {
      confirm_delete: false,
    };
  },
};
</script>
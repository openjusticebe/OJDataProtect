<template>
  <div
    class="
      p-4
      bg-gray-100
      shadow
      text-teal text-sm
      rounded-xl
      grid grid-cols-5
      gap-4
    "
  >
    <div class="col-span-3">
      <span class="font-bold">{{ organisation.name }}</span> <br />
      <ul class="text-gray-500">
        <li class="whitespace-pre">{{ organisation.address }}</li>
        <li>{{ organisation.city }}, {{ organisation.postcode }}</li>
        <li>
          {{ organisation.country }}
        </li>
        <li>
          <a
            :href="
              'https://www.openstreetmap.org/search?query=' +
              organisation.full_address
            "
            class="text-blue-600"
            >map</a
          >
        </li>
      </ul>
      <span class="font-medium whitespace-pre">{{
        organisation.vat_number
      }}</span>
    </div>
    <div class="col-span-2">
      <img
        :src="organisation.logo_url"
        :alt="organisation.name"
        class="rounded-2xl place-items-center"
      />
    </div>
  </div>
</template>

<script>
export default {
  props: ["organisation"],
  data() {
    return {};
  },
};
</script>

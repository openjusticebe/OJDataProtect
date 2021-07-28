<template>
  <div
    class="
      p-4
      md:text-left
      space-y-4
      absolute
      right-0
      inline-flex
      items-center
      bg-gray-100
      rounded-full
      shadow
      text-teal text-sm
    "
  >
    <span class="font-medium">{{ organisation.name }}</span> <br />
    <div class="text-gray-500">
      <a
        :href="
          'https://www.openstreetmap.org/search?query=' +
          organisation.full_address
        "
      >
        {{ organisation.address }}<br />
        {{ organisation.city }}, {{ organisation.postcode }} <br />
        {{ organisation.country }}
      </a>
    </div>
    <span class="font-medium">{{ organisation.vat_number }}</span>
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

<template>
  <div class="bg-gray-200 p-4 md:text-left space-y-4 absolute right-0">
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
        {{ organisation.country }}</a
      >
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

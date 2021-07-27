<template>
  <div>
    {{ organisation.address }}

    {{ organisation.city }}

    {{ organisation.postcode }}

    {{ organisation.country }}
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

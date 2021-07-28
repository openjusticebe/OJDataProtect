<template>
  <div class="bg-gray-200">
    {{ unit.name }} {{ unit.member_type }} {{ unit.is_auth }}
  </div>
</template>

<script>
export default {
  props: ["unit"],
};
</script>
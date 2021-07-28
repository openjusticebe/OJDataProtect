<template>
  <div class="bg-gray-200">
    {{ user.name }} {{ user.member_type }} {{ user.is_auth }}
  </div>
</template>

<script>
export default {
  props: ["user"],
};
</script>
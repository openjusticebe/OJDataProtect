<template>
  <li class="">
    <user-label :class="{ 'font-bold': user.is_auth }">
      {{ user.name }}
      <span class="text-gray-500">{{ user.member_type }}</span>
    </user-label>
  </li>
</template>

<script>
export default {
  props: ["user"],
};
</script>
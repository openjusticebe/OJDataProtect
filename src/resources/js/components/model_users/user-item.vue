<template>
  <li class="">
    <user-icon /> {{ user.name }} {{ user.member_type }} {{ user.is_auth }}
  </li>
</template>

<script>
export default {
  props: ["user"],
};
</script>
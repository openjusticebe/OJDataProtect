<template>
  <li class="">
    <user-label> {{ user.name }}</user-label>
    <pre>{{ user.member_type }} {{ user.is_auth }}</pre>
  </li>
</template>

<script>
export default {
  props: ["user"],
};
</script>
<template>
  <li class="">{{ unit.name }} {{ unit.member_type }} {{ unit.is_auth }}</li>
</template>

<script>
export default {
  props: ["unit"],
};
</script>
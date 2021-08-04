<template>
  <li class="">
    <a
      class="text-white rounded-full px-2"
      :href="tag.links.self"
      :style="'background-color:' + tag.color"
    >
      {{ tag.name }}</a
    >
    <span class="bg-gray-200 text-green-500">{{ tag.category }}</span>
    <span class="bg-gray-200 text-blue-500">{{ tag.type }}</span>
    <span class="bg-yellow-200 text-purple-500" :alt="tag.description">{{
      tag.description
    }}</span>
    <span
      class="bg-gray-200"
      v-if="tag.specific_description"
      :alt="tag.specific_description"
      >{{ tag.specific_description }}
    </span>
  </li>
</template>

<script>
export default {
  props: ["tag"],
  data() {
    return {
      search: "",
      new_tag: false,
    };
  },
  methods: {},
};
</script>
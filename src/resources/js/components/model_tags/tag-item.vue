<template>
  <div class="">
    <a
      class="text-white rounded-full px-2"
      :class="classColor(tag.category)"
      :href="tag.links.self"
      >{{ tag.name }}</a
    >
    <span class="bg-white text-green-500">{{ tag.category }}</span>
    <span class="bg-white text-blue-500">{{ tag.type }}</span>
    <span class="" :alt="tag.description">{{
      tag.description.slice(0, 10)
    }}</span>
    <span
      class=""
      v-if="tag.specific_description"
      :alt="tag.specific_description"
      >{{ tag.specific_description.slice(0, 10) }}
    </span>
  </div>
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
  methods: {
    classColor(category) {
      if (category === "data_object") return "bg-pink-600";
      if (category === "data_subject") return "bg-yellow-600";
      if (category === "data_recipient") return "bg-blue-600";
      if (category === "purpose") return "bg-green-600";
      if (category === "data_processor") return "bg-red-600";
      if (category === "data_controller") return "bg-pink-600";
      if (category === "data_operator") return "bg-indigo-600";
      return "bg-gray-600";
    },
  },
};
</script>
<template>
  <div class="p-2">
    <div
      class="
        inline-flex
        items-center
        bg-white
        leading-none
        text-pink-600
        rounded-full
        p-2
        shadow
        text-teal text-sm
      "
    >
      <a
        class="
          inline-flex
          text-white
          rounded-full
          h-6
          px-3
          justify-center
          items-center
        "
        :class="classColor(tag.category)"
        :href="tag.links.self"
        >{{ tag.name }}</a
      >
      <span class="inline-flex px-2">{{ tag.description }} </span>
      <span class="inline-flex px-2 text-green-500">{{ tag.category }} </span>
      <span class="inline-flex px-2 text-blue-500">{{ tag.tag_type }} </span>
      <span
        class="inline-flex px-2 bg-blue-400 text-yellow-200"
        v-if="tag.specific_organisation"
      >
        {{ tag.specific_organisation }}
      </span>
    </div>
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
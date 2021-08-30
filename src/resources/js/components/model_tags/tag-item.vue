<template>
  <tr class="">
    <td>
      <span class="tag-category sr-only">{{ tag.category }}</span>
      <a
        class="text-white rounded-full px-2"
        :href="tag.links.self"
        :style="'background-color:' + tag.color"
      >
        {{ tag.name }}</a
      >
    </td>

    <td>
      <span class="tag-type">{{ tag.type }}</span>
    </td>

    <td>
      <span class="tag-description" :alt="tag.description">{{
        tag.description
      }}</span>
      <span
        class="tag-specific-description"
        v-if="tag.specific_description"
        :alt="tag.specific_description"
        >{{ tag.specific_description }}
      </span>
    </td>
  </tr>
</template>

<script>
export default {
  props: ["tag"],
};
</script>
<template>
  <tr class="border">
    <th class="text-right">
      {{ data_type.name }}
    </th>
    <td class="text-left">
      <div
        v-for="category in data_type.categories"
        v-if="data_type.categories && !add_new"
      >
        <tag-list v-if="process.tagsGrouped[category]">
          <tag-item
            v-for="tag in process.tagsGrouped[category]"
            :key="tag.id"
            :tag="tag"
          />
        </tag-list>
      </div>

      <button @click="edit = !edit" class="btn-xs">edit</button>

      <tag-select
        :process="process"
        :categories="data_type.categories.toString()"
        v-if="data_type.categories && add_new"
      />

      <button @click="add_new = !add_new" class="btn-xs" v-if="!add_new">
        add new
      </button>
      <button @click="add_new = !add_new" class="btn-xs-cancel" v-else>
        <close-icon />
        close
      </button>
    </td>
  </tr>
</template>

<script>
export default {
  props: ["data_type", "process"],
  data() {
    return {
      add_new: false,
      edit: false,
    };
  },
};
</script>
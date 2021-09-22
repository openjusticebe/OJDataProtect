<template>
  <tr class="border" :id="data_type.key">
    <th class="bg-gray-400">
      <div class="transform -rotate-90 text-white uppercase">
        {{ data_type.key }}
      </div>
    </th>
    <th class="text-right">{{ data_type.name }}</th>
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

      <div v-if="['duration'].includes(data_type.key)">
        <process-timetable-edit :process="process" v-if="timetable_edit" />

        <process-timetable :process="process" v-else />

        <button @click="timetable_edit = !timetable_edit" class="btn-xs">
          edit
        </button>
      </div>
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
import processTimetable from "./process-timetable.vue";
export default {
  components: { processTimetable },
  props: ["data_type", "process"],
  data() {
    return {
      add_new: false,
      timetable_edit: false,
    };
  },
};
</script>
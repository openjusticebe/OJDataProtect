<template>
  <div>
    <table class="table-auto">
      <tbody class="divide-y divide-gray-200">
        <tr class="border">
          <th class="text-right">Subject-matter of the processing</th>

          <td>
            {{ process.description }}
            <button @click="edit = !edit" class="btn-xs">edit</button>
          </td>
        </tr>

        <process-tags
          v-for="data_type in data_types"
          :key="data_type.key"
          :data_type="data_type"
          :process="process"
        />
      </tbody>
    </table>
  </div>
</template>

<style scoped>
</style>

<script>
import data_types from "../../data/process.js";

export default {
  props: ["process"],
  data() {
    return {
      data_types: data_types,
      add_new: false,
    };
  },
};
</script>

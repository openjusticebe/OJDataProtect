<template>
  <div>
    <table class="table-fixed">
      <tbody class="divide-y divide-gray-200">
        <tr>
          <td class="bg-blue-100 w-1/8"></td>
          <th class="bg-blue-100 text-left">
            Subject-matter of the processing
          </th>
        </tr>
        <tr class="border">
          <th class="bg-gray-400 w-20">
            <div class="transform -rotate-90 text-white uppercase">
              Subject matter
            </div>
          </th>

          <td>
            {{ process.description }}
            <button @click="edit = !edit" class="btn-xs">edit</button>
          </td>
        </tr>
      </tbody>
    </table>

    <process-tags
      v-for="data_type in data_types"
      :key="data_type.key"
      :data_type="data_type"
      :process="process"
    />
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

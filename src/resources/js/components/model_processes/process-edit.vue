<template>
  <div>
    <table class="table-fixed w-full">
      <tr>
        <td class="bg-blue-100 w-20"></td>
        <th class="bg-blue-100 text-left">Subject-matter of the processing</th>
      </tr>
      <tr class="border">
        <th class="bg-gray-400 w-20 h-48">
          <div class="transform -rotate-90 text-white uppercase">
            Subject matter
          </div>
        </th>

        <td>
          <div v-if="edit">
            <FormulateForm v-model="fields" @submit="submitted" method="post">
              <h2 class="text-2xl mb-2">Add new process</h2>

              <div class="flex flex-wrap gap-x-8 gap-y-4">
                <div class="flex-1">
                  <FormulateInput
                    type="text"
                    label="Name of your process"
                    help="Note: you will be able to edit it afterward"
                    name="name"
                    validation="required|max:200|min:5"
                  />
                </div>
              </div>
              <div class="flex flex-wrap gap-x-8 gap-y-4">
                <div class="flex-1">
                  <FormulateInput
                    name="status"
                    :options="[
                      { value: 'ongoing', label: 'Ongoing process' },
                      { value: 'draft', label: 'Draft process' },
                      { value: 'pending', label: 'Pending process' },
                      { value: 'archived', label: 'Process archived' },
                    ]"
                    type="select"
                    label="Status of your process"
                    help="Note: you will be able to edit it afterward"
                  />
                </div>
                <div class="flex-1">
                  <FormulateInput
                    type="date"
                    name="start_date"
                    label="Start date of the process"
                    placeholder="Start date of the process"
                    help="Please insert the start date of the process"
                    validation="required"
                    error-behavior="live"
                  />
                </div>
              </div>

              <div class="flex flex-wrap gap-x-8 gap-y-4">
                <div class="flex-grow">
                  <FormulateInput
                    type="textarea"
                    name="description"
                    validation="required"
                    label="Describe your process"
                    help="Note: you will be able to edit it afterward"
                  />
                </div>
              </div>
              <btn-cancel @click.native="edit = !edit"></btn-cancel>

              <FormulateInput type="submit" />
            </FormulateForm>
          </div>
          <div v-else class="flex">
            {{ process.description }}
            <button @click="edit = !edit" class="btn-xs">edit</button>
          </div>
        </td>
      </tr>
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
      fields: {},
      data_types: data_types,
      edit: false,
    };
  },
  created() {
    this.fields = this.process;
  },
  methods: {
    submitted(data) {
      this.$emit("submitted", data);
    },
  },
};
</script>

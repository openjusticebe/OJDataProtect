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
            <btn-cancel @click.native="edit = !edit" />

            <FormulateForm @submit="submitted" method="post">
              <h2 class="text-2xl mb-2">Add new process</h2>

              <div class="flex flex-wrap gap-x-8 gap-y-4">
                <div class="flex-1">
                  <FormulateInput
                    type="text"
                    v-model="values.name"
                    label="Name of your process"
                    help="Note: you will be able to edit it afterward"
                    name="name"
                    validation="required|max:200|min:5"
                  />
                </div>
                <div class="flex-1">
                  <FormulateInput
                    name="status"
                    :options="status"
                    v-model="values.status"
                    type="select"
                    label="Status of your process"
                    help="Note: you will be able to edit it afterward"
                  />
                </div>
              </div>
              <div class="flex flex-wrap gap-x-8 gap-y-4">
                <div class="flex-1">
                  <FormulateInput
                    type="date"
                    v-model="values.start_date"
                    name="start_date"
                    label="Start date of the process"
                    placeholder="Start date of the process"
                    help="Please insert the start date of the process"
                    validation="required"
                    error-behavior="live"
                  />
                </div>
              </div>

              <div class="flex gap-x-8 gap-y-4">
                <div class="flex-grow">
                  <FormulateInput
                    rows="10"
                    cols="200"
                    v-model="values.description"
                    type="textarea"
                    name="description"
                    validation="required"
                    label="Describe your process"
                    help="Note: you will be able to edit it afterward"
                  />
                </div>
              </div>

              <div class="flex gap-x-8 gap-y-4">
                <FormulateInput type="submit" />
              </div>
            </FormulateForm>
          </div>

          <div v-else>
            <div>
              <btn-edit @click.native="edit = !edit">
                {{ $t("process") }}
              </btn-edit>
            </div>
            <div>
              <p>{{ process.description }}</p>
            </div>
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
import FormMixin from "../../mixins/FormMixin";
import data_types from "../../data/process-data-types.js";
import status from "../../data/process-status.js";

export default {
  props: ["process"],
  mixins: [FormMixin],

  data() {
    return {
      fields: {},
      values: {},
      data_types: data_types,
      status: status,
      edit: false,
    };
  },
  mounted() {
    this.values = this.process;
  },
  methods: {
    submitted() {
      this.postProcess();
    },
    postProcess() {
      this.action = this.process.links.api_update;
      this.fields = this.values;
      this.submitPost();
      window.location.href = this.links.self;
    },
  },
};
</script>

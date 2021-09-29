<template>
  <div
    class="hover:shadow-lg group rounded-lg p-4 border-4 border-blue-300"
    id="form-organisation-new"
  >
    <FormulateForm v-model="values" @submit="submitted" method="post">
      <h2 class="text-2xl mb-2">Add new process</h2>

      <div class="flex flex-wra gap-x-8 gap-y-4">
        <div>
          <FormulateInput
            type="text"
            label="Name of your process"
            help="Note: you will be able to edit it afterward"
            name="name"
            validation="required|max:200|min:5"
          />

          <FormulateInput
            type="textarea"
            name="description"
            validation="required"
            label="Describe your process"
            help="Note: you will be able to edit it afterward"
          />
        </div>
        <div>
          <FormulateInput
            name="status"
            :options="status"
            type="select"
            label="Status of your process"
            help="Note: you will be able to edit it afterward"
            validation="required"
          />

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

        <div>
          <FormulateInput
            label="reminder_every in days"
            type="range"
            name="reminder_every"
            min="0"
            max="70"
            step="1"
            value="14"
            validation="required|min:0|max:70"
            error-behavior="live"
            show-value="true"
          />

          <FormulateInput
            label="safe_keeping_duration in days"
            type="range"
            name="safe_keeping_duration"
            min="0"
            max="3650"
            step="15"
            value="365"
            validation="required|min:0|max:3650"
            error-behavior="live"
            show-value="true"
          />
        </div>
      </div>

      <div>
        <FormulateInput type="submit" />
      </div>
    </FormulateForm>
  </div>
</template>

<script>
import FormMixin from "../../mixins/FormMixin";
import status from "../../data/process-status.js";

export default {
  props: ["links"],
  mixins: [FormMixin],
  data() {
    return {
      values: {},
      status: status,
    };
  },
  mounted() {},
  methods: {
    submitted() {
      this.postProcess();
    },
    postProcess() {
      this.action = this.links.api_update + "/process";
      this.fields = this.values;
      this.submitPost();
      window.location.href = this.links.self;
    },
  },
};
</script>


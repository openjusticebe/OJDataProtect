<template>
  <div
    class="hover:shadow-lg group rounded-lg p-4 border border-blue-300"
    id="form-organisation-new"
  >
    <FormulateForm v-model="values" @submit="submitted" method="post">
      <div>
        <h2 class="text-2xl mb-2">Add new process</h2>
        <FormulateInput
          type="text"
          label="Name of your process"
          help="Note: you will be able to edit it afterward"
          name="name"
          validation="required|max:200|min:5"
        />

        <h2 class="text-2xl mb-2">Describe your process</h2>

        <FormulateInput
          type="textarea"
          name="description"
          validation="required"
        />
      </div>

      <div>
        <FormulateInput type="submit" />
      </div>
    </FormulateForm>
  </div>
</template>

<script>
import FormMixin from "../../mixins/FormMixin";

export default {
  props: ["links"],
  mixins: [FormMixin],
  data() {
    return {
      values: {},
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


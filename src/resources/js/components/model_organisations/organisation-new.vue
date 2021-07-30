<template>
  <div
    class="hover:shadow-lg group block rounded-lg p-4 border border-blue-300"
    id="form-organisation-new"
  >
    {{ values }}

    <!-- :action="'/api/v1/organisation' + '?api_token=' + apiToken" -->

    <FormulateForm v-model="values" @submit="submitted" method="post">
      <h2 class="text-2xl mb-2">Add new organisation</h2>
      <FormulateInput
        type="text"
        label="Name of your organisation"
        help="Note: you will be able to edit it afterward"
        name="name"
        validation="required|max:200|min:2"
      />
      <h2 class="text-2xl mb-2">Describe your organisation</h2>
      <FormulateInput type="textarea" name="description" validation="" />

      <div>
        <FormulateInput type="submit" />
      </div>
    </FormulateForm>
  </div>
</template>

 
 <script>
import FormMixin from "../../mixins/FormMixin";

export default {
  mixins: [FormMixin],
  data() {
    return {
      values: {},
      csrfToken: "",
      apiToken: "",
    };
  },
  mounted() {
    this.csrfToken = document.querySelector('meta[name="csrf-token"]').content;
    this.apiToken = document.querySelector('meta[name="api-token"]').content;
  },
  methods: {
    submitted() {
      console.log(this.values);
      this.postOrganisation();
    },
    postOrganisation() {
      this.action = "/api/v1/organisation";
      this.fields = this.values;
      this.submitPost();
      window.location.href = "/dashboard";
    },
  },
};
</script>


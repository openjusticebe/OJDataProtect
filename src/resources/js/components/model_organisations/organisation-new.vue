<template>
  <div
    class="hover:shadow-lg group rounded-lg p-4 border border-blue-300"
    id="form-organisation-new"
  >
    {{ values }}

    <FormulateForm v-model="values" @submit="submitted" method="post">
      <h2 class="text-2xl mb-2">Add new organisation</h2>
      <div class="grid grid-cols-2 gap-4">
        <FormulateInput
          type="text"
          label="Name of your organisation"
          help="Note: you will be able to edit it afterward"
          name="name"
          validation="required|max:200|min:2"
        />
        <h2 class="text-2xl mb-2">Describe your organisation</h2>
        <FormulateInput type="textarea" name="description" validation="" />

        'logo_url' => $this->faker->imageUrl($width = 150, $height = 150, $word
        = $company_name),

        <h2 class="text-2xl mb-2">Address</h2>

        <FormulateInput
          type="text"
          name="address"
          label="Address"
          placeholder="Abbey road, 21"
          help="Insert your street and number"
          validation=""
        />

        <div class="double-wide">
          <FormulateInput
            type="text"
            name="Postcode"
            label="1234"
            placeholder="1234"
            help="Insert you postcode"
            validation=""
          />

          <FormulateInput
            type="text"
            name="city"
            label="City"
            placeholder="Houte-Si-Plou"
            help="Insert your city"
            validation=""
          />
        </div>

        <div class="double-wide">
          <FormulateInput
            type="text"
            name="country"
            label="Country"
            placeholder="Honolulu"
            help="Insert your country"
            validation=""
          />
        </div>

        <FormulateInput
          type="url"
          name="log_url"
          label="Logo URL"
          placeholder="Sample url of your logo"
          help="Sample url of your logo"
          validation=""
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


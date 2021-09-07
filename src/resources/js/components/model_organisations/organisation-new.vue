<template>
  <div
    class="hover:shadow-lg group rounded-lg p-4 border border-blue-300"
    id="form-organisation-new"
  >
    <FormulateForm v-model="values" @submit="submitted" method="post">
      <div>
        <h2 class="text-2xl mb-2">Add new organisation</h2>
        <FormulateInput
          type="text"
          label="Name of your organisation"
          placeholder="Acme"
          help="Note: you will be able to edit it afterward"
          name="name"
          validation="required|max:200|min:3"
        />
        <FormulateInput
          type="textarea"
          name="description"
          placeholder="The Acme Corporation is a fictional corporation"
          validation=""
          help="Describe your organisation or don't"
          label="Describe your organisation"
        />
        <FormulateInput
          type="text"
          name="vat_number"
          label="VAT number"
          placeholder="VAT number"
          help="Insert your VAT number"
        />

        <h2 class="text-2xl mb-2">Address</h2>
        <div class="flex flex-wrap">
          <div>
            <FormulateInput
              type="text"
              name="address"
              label="Address"
              placeholder="Abbey Road, 21"
              help="Insert your street and number"
              validation=""
            />

            <FormulateInput
              type="text"
              name="Postcode"
              label="Postcode"
              placeholder="1000"
              help="Insert your postcode"
              validation="number"
            />
          </div>
          <div>
            <FormulateInput
              type="text"
              name="city"
              label="City"
              placeholder="Houte-Si-Plou"
              help="Insert your city"
              validation=""
            />
            <FormulateInput
              type="text"
              name="country"
              label="Country"
              placeholder="Honolulu"
              help="Insert your country"
              validation=""
            />
          </div>
        </div>

        <div class="flex flex-wrap">
          <div>
            <FormulateInput
              type="url"
              name="logo_url"
              label="Logo URL"
              placeholder="Sample url of your logo"
              help="Sample url of your logo"
              validation=""
            />
          </div>
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

export default {
  mixins: [FormMixin],
  data() {
    return {
      values: {},
    };
  },
  mounted() {},
  methods: {
    submitted() {
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


<template>
  <div
    class="hover:shadow-lg group block rounded-lg p-4 border border-blue-300"
  >
    {{ values }}

    <FormulateForm v-model="values" @submit="submitted">
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
// import GetDataMixin from "../../mixins/GetDataMixin";

export default {
  //   mixins: [GetDataMixin],
  //   props: ["page_url"],
  data() {
    return {
      values: {},
    };
  },
  methods: {
    submitted() {
      console.log(this.values);
      //   this.$emit("submit", this.values);
    },
  },
};
</script>

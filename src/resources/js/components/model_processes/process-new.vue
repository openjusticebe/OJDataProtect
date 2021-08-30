<template>
  <div class="panel">
    <FormulateForm v-model="values" @submit="submitted">
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

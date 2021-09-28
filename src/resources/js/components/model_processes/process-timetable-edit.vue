<template>
  <div id="timetable-edit">
    <FormulateForm v-model="fields" @submit="submitted">
      <h2 class="text-2xl mb-2">Dates</h2>

      <FormulateInput
        type="date"
        name="start_date"
        label="start_date"
        placeholder="Sample date placeholder"
        help="Sample date help text"
        validation="required|after:2019-01-01"
        min="2018-12-01"
        max="2022-01-01"
        error-behavior="live"
      />

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

      <div>
        <button class="btn-xs-cancel">Cancel</button>
        <FormulateInput type="submit" />
      </div>
    </FormulateForm>
  </div>
</template>

<script>
export default {
  props: ["process"],
  data() {
    return {
      fields: {},
    };
  },
  methods: {
    submitted(fields) {
      this.$emit("submitted", fields);
    },
  },
  created() {
    this.fields = this.process;
  },
};
</script>
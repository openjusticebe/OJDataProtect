<template>
  <div id="timetable-edit">
    <FormulateForm v-model="values" @submit="submitted">
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
        type="number"
        name="reminder_every"
        label="reminder_every"
        placeholder="reminder_every placeholder"
        help="reminder_every help text"
        validation="required|number|between:10,20"
        min="0"
        max="100"
        error-behavior="live"
      />

      <FormulateInput
        type="number"
        name="safe_keeping_duration"
        label="safe_keeping_duration"
        placeholder="safe_keeping_duration placeholder"
        help="safe_keeping_duration help text"
        validation="required|number|between:10,20"
        min="0"
        max="100"
        error-behavior="live"
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
    return {};
  },
};
</script>
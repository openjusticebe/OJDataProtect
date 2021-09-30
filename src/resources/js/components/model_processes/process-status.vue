<template>
  <span
    class="rounded-full text-white px-4 py-1 font-bold"
    :style="'background-color:' + getStatusColor(process_status)"
    >{{ process_status }}
  </span>
</template>

<script>
import status from "../../data/process-status.js";

export default {
  props: ["process_status"],
  data() {
    return {
      status: status,
    };
  },
  methods: {
    getStatusColor: function (process_status) {
      return this.status.find((x) => x.value === process_status).color;
    },
  },
};
</script>
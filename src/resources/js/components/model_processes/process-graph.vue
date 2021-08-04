<template>
  <div>
    <div v-if="!data_fetched">
      <loading-animation></loading-animation>
      {{ page_url }}
    </div>
    <div v-else>{{ fields }}</div>
  </div>
</template>

 
 <script>
import GetDataMixin from "../../mixins/GetDataMixin";

export default {
  mixins: [GetDataMixin],
  props: ["page_url"],
  data() {
    return {};
  },
  methods: {},
  computed: {},
};
</script>

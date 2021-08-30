<template>
  <div>
    <div v-if="!data_fetched" class="grid justify-items-center">
      <loading-animation></loading-animation>
    </div>
    <div v-else>
      <h2 class="text-xl">Graph</h2>

      <network ref="network" id="network" :nodes="fields.nodes" :edges="fields.edges" :options="fields.options" 
      class="panel h-96" />
         
      </network>
    </div>
  </div>
</template>

<style scoped>
#network {
  /* width: 800px; */
  /* height: 400px; */
}
</style>

  
 <script>
import GetDataMixin from "../../mixins/GetDataMixin";

export default {
  mixins: [GetDataMixin],
  props: ["page_url"],
  data() {
    return {};
  },
  mounted() {},
  created() {},
  methods: {
    reloadData() {
      this.fetchData(this.page_url);
    },
  },
};
</script>

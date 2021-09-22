<template>
  <div>
    <div v-if="!data_fetched" class="grid justify-items-center">
      <loading-animation></loading-animation>
    </div>
    <div v-else>
      <section
        class="
          px-4
          sm:px-6
          lg:px-4
          xl:px-6
          pt-4
          pb-4
          sm:pb-6
          lg:pb-4
          xl:pb-6
          space-y-4
        "
      >
        <h1 class="sr-only">
          {{ fields.name }}
        </h1>

        <div class="flex">
          <div class="text-medium">
            <h2>Description</h2>
            {{ fields.description }}
          </div>

          <div>
            <h2>Risk assessment</h2>
            <process-risk-impact />
          </div>
        </div>

        <process-edit :process="fields" />

        <process-graph :page_url="fields.links.api_graph" />
      </section>
    </div>
  </div>
</template>

 
<script>
import GetDataMixin from "../../mixins/GetDataMixin";

export default {
  mixins: [GetDataMixin],
  props: ["page_url"],
  data() {
    return {
      search: "",
      new_tag: false,
    };
  },

  methods: {
    showAlert() {
      alert("test");
    },
  },
  computed: {
    filteredList() {
      return this.fields.filter((item) => {
        return item.name.toLowerCase().includes(this.search.toLowerCase());
      });
    },
  },
};
</script>

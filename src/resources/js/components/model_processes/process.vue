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
        <h2 class="sr-only">
          {{ fields.name }}
        </h2>

        <div class="text-medium">
          {{ fields.description }}
        </div>

        <process-risk-impact />

        <button class="btn-xs">btn xs</button>
        <button class="btn">btn</button>
        <button class="btn-submit">btn-submit</button>
        <button class="btn-cancel">btn-cancel</button>

        <process-edit :process="fields" />

        <process-graph :page_url="fields.links.api_graph" />

        <tag-new />
        <tag-select />
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

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
        <header class="flex items-center justify-between">
          <h2 class="text-lg leading-6 font-medium text-black">
            {{ fields.name }}
          </h2>
        </header>

        <div class="text-medium">
          {{ fields.description }}
        </div>

        <process-risk-impact />

        <process-graph :page_url="fields.links.api_graph" />

        <tag-list>
          <tag-item v-for="tag in fields.tags" :key="tag.id" :tag="tag" />
        </tag-list>

        <process-edit />
        <tag-new />
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

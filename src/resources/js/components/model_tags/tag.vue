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
          <h1 class="text-lg leading-6 font-2xl text-black">
            <tag-label>{{ fields.name }}</tag-label>

            <span class="tag-type">{{ fields.type }}</span>
            <span class="tag-category">{{ fields.category }}</span>
          </h1>
        </header>

        <div class="text-medium">
          {{ fields.description }}
        </div>

        <h2 class="text-lg font-bold">Processes</h2>
        <process-list>
          <process-item
            v-for="process in fields.processes"
            :key="process.id"
            :process="process"
          />
        </process-list>
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

  methods: {},
  computed: {
    filteredList() {
      return this.fields.filter((item) => {
        return item.name.toLowerCase().includes(this.search.toLowerCase());
      });
    },
  },
};
</script>

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
        {{ fields }}
        <header class="flex items-center justify-between">
          <h2 class="text-lg leading-6 font-medium text-black">
            <!-- Process <small>{{ filteredList.length }}</small> -->
          </h2>
        </header>
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
      new_process: false,
    };
  },

  methods: {
    isAdmin: function (role) {
      if (role === "admin") {
        return "border-dark";
      } else {
        return "border-light";
      }
    },
  },
  computed: {
    // filteredList() {
    //   return this.fields.filter((item) => {
    //     return item.name.toLowerCase().includes(this.search.toLowerCase());
    //   });
    // },
  },
};
</script>

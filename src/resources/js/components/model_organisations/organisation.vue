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

          <!-- Processes <small>{{ filteredList.length }}</small> -->
        </header>
        <organisation-address :organisation="fields" />
        <div class="absolute right-0">
          <img :src="fields.logo_url" :alt="fields.name" />
        </div>
        <div class="text-medium">
          {{ fields.description }}
        </div>

        <process-new />

        <process-list>
          <process-item
            v-for="process in fields.relationships.processes"
            :key="process.id"
            :process="process"
          />
        </process-list>

        <tag-list>
          <tag-item
            v-for="tag in fields.relationships.tags"
            :key="tag.id"
            :tag="tag"
          />
        </tag-list>

        <user-list>
          <user-item
            v-for="user in fields.relationships.members"
            :key="user.id"
            :user="user"
          />
        </user-list>
        <user-list>
          <user-item
            v-for="user in fields.relationships.dpos"
            :key="user.id"
            :user="user"
          />
        </user-list>
        <div v-for="unit in fields.relationships.units">
          <h2>
            <a :href="unit.links.self">{{ unit.name }}</a>
          </h2>
        </div>
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
    filteredList() {
      return this.fields.filter((item) => {
        return item.name.toLowerCase().includes(this.search.toLowerCase());
      });
    },
  },
};
</script>

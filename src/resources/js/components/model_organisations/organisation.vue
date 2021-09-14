<template>
  <div>
    <div v-if="!data_fetched" class="grid justify-items-center">
      <loading-animation></loading-animation>
    </div>
    <div v-else class="container mx-auto">
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
          <h2 class="text-lg leading-6 text-black font-extrabold">
            {{ fields.name }}
          </h2>

          <!-- Processes <small>{{ filteredList.length }}</small> -->
        </header>

        <div id="organisation-card" class="grid grid-cols-5 gap-4">
          <div class="font-medium col-span-3">
            {{ fields.description }}
          </div>

          <div class="col-span-2">
            <organisation-address :organisation="fields" />

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
            <div v-for="unit in fields.relationships.units" :key="unit.id">
              <h2>
                <a :href="unit.links.self">{{ unit.name }}</a>
              </h2>
            </div>
          </div>
        </div>

        <div id="new_process" class="flex items-center justify-between">
          <btn-new
            v-if="!new_process"
            @click.native="new_process = !new_process"
            >process
          </btn-new>
          <btn-cancel
            v-else
            @click.native="new_process = !new_process"
          ></btn-cancel>
        </div>
        <div class="">
          <process-new v-if="new_process" :links="fields.links" />
        </div>
        <div id="relationships-entities" v-if="!new_process">
          <form class="relative" v-if="!new_process">
            <search-icon />

            <input
              class="
                focus:border-blue-500
                focus:ring-1 focus:ring-blue-500
                focus:outline-none
                w-full
                text-sm text-black
                placeholder-gray-500
                border border-gray-200
                rounded-md
                py-2
                pl-10
              "
              v-model="search"
              type="text"
              aria-label="Filter processes"
              placeholder="Filter processes"
            />
          </form>
          <div class="text-right text-sm" v-if="search">
            {{ __("Filter_for") }}
            <em>{{ search }}</em>
          </div>

          <div>
            <process-list>
              <process-item
                v-for="process in filteredList"
                :key="process.id"
                :process="process"
              />
            </process-list>
            <!-- 
          <tag-list>
            <tag-item
              v-for="tag in fields.relationships.tags"
              :key="tag.id"
              :tag="tag"
            />
          </tag-list> -->
          </div>
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

  methods: {},
  computed: {
    filteredList() {
      return this.fields.relationships.processes.filter((item) => {
        return item.name.toLowerCase().includes(this.search.toLowerCase());
      });
    },
  },
};
</script>

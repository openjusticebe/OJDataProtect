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
          <h2 class="text-lg leading-6 font-medium text-black">
            {{ fields.name }}
          </h2>

          <!-- Processes <small>{{ filteredList.length }}</small> -->
        </header>

        <div id="organisation-card" class="flex flex-row">
          <div class="float-right">
            <organisation-address :organisation="fields" />
          </div>
          <div class="float-left">
            <img :src="fields.logo_url" :alt="fields.name" />
          </div>
          <div class="text-medium">
            {{ fields.description }}
          </div>
        </div>

        <div
          id="new_process"
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
          <div class="float-right" id="new_process_btns">
            <button
              class="
                hover:bg-blue-200
                hover:text-blue-800
                group
                flex
                items-center
                rounded-md
                bg-blue-100
                text-blue-600 text-sm
                font-medium
                px-4
                py-2
              "
              v-if="!new_process"
              @click="new_process = !new_process"
            >
              <svg
                class="group-hover:text-blue-600 text-blue-500 mr-2"
                width="12"
                height="20"
                fill="currentColor"
              >
                <path
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M6 5a1 1 0 011 1v3h3a1 1 0 110 2H7v3a1 1 0 11-2 0v-3H2a1 1 0 110-2h3V6a1 1 0 011-1z"
                />
              </svg>
              {{ __("New") }}
            </button>

            <button
              v-else
              @click="new_process = !new_process"
              class="
                hover:bg-gray-200
                hover:text-gray-800
                group
                flex
                items-center
                rounded-md
                bg-gray-100
                text-gray-600 text-sm
                font-medium
                px-4
                py-2
              "
            >
              {{ __("Cancel") }}
            </button>
          </div>

          <process-new v-if="new_process" />
        </div>

        <div id="relationships-entities" v-if="!new_process">
          <div>
            <process-list>
              <process-item
                v-for="process in fields.relationships.processes"
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
      return this.fields.filter((item) => {
        return item.name.toLowerCase().includes(this.search.toLowerCase());
      });
    },
  },
};
</script>

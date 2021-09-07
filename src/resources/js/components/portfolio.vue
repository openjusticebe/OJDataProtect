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
            Organisations <small>{{ filteredList.length }}</small>
          </h2>

          <btn-new v-if="!new_org" @click.native="new_org = !new_org">{{
            __("organisation")
          }}</btn-new>
          <btn-cancel v-else @click.native="new_org = !new_org"></btn-cancel>
        </header>
        <form class="relative" v-if="!new_org">
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
            aria-label="Filter organisations"
            placeholder="Filter organisations"
          />
        </form>
        <div class="text-right text-sm" v-if="search">
          {{ __("Filter_for") }}
          <em>{{ search }}</em>
        </div>

        <div class="">
          <organisation-new v-if="new_org" :fields="fields" />
        </div>
        <ul
          class="
            grid grid-cols-1
            sm:grid-cols-2
            lg:grid-cols-1
            xl:grid-cols-2
            gap-4
          "
          v-if="!new_org"
        >
          <li v-for="item in filteredList">
            <a
              :href="item.links.self"
              class="
                hover:bg-gray-200
                hover:border-transparent
                hover:shadow-lg
                group
                block
                rounded-lg
                p-4
                border border-gray-200
              "
            >
              <dl
                class="
                  grid
                  sm:block
                  lg:grid
                  xl:block
                  grid-cols-2 grid-rows-2
                  items-center
                "
              >
                <div>
                  <dt class="sr-only">Title</dt>
                  <dd
                    class="
                      leading-2
                      text-2xl text-black text-bold
                      subpixel-antialiased
                    "
                  >
                    {{ item.name }}
                  </dd>
                </div>
                <div>
                  <dt class="">Description</dt>
                  <dd
                    class="
                      group-hover:text-gray-600
                      text-sm
                      font-medium
                      text-gray-600
                      sm:mb-4
                      lg:mb-0
                      xl:mb-4
                    "
                  >
                    {{ item.description }}
                  </dd>
                </div>

                <div v-if="item.relationships.processes.length">
                  <dt class="">Processes</dt>
                  <dd>
                    <ul>
                      <li
                        v-for="(process, n) in item.relationships.processes"
                        :key="process.id"
                        class="
                          bg-grey-100
                          text-blue-900
                          hover:bg-blue-300
                          px-4
                          py-0
                        "
                      >
                        <a :href="process.links.self">{{
                          process.short_name
                        }}</a>
                      </li>
                    </ul>
                  </dd>
                </div>

                <div v-if="item.relationships.units.length">
                  <h2 class="text-md leading-5 font-medium text-black">
                    Units
                  </h2>

                  <div v-for="unit in item.relationships.units" v-if="">
                    {{ unit }}
                  </div>
                </div>

                <div class="col-start-2 row-start-2 row-end-3">
                  <dt class="">Data Protection Officers</dt>
                  <dd
                    class="
                      flex
                      justify-end
                      sm:justify-start
                      lg:justify-end
                      xl:justify-start
                      -space-x-2
                    "
                  >
                    <img
                      v-for="user in item.relationships.dpos"
                      :src="
                        'https://www.gravatar.com/avatar/' +
                        user.email_hash +
                        '?d=mp'
                      "
                      :alt="user.name"
                      width="48"
                      height="48"
                      class="
                        w-7
                        h-7
                        rounded-full
                        bg-red-100
                        border-2 border-white
                      "
                    />
                  </dd>
                </div>

                <div class="col-start-2 row-start-1 row-end-3">
                  <dt class="">Members</dt>
                  <dd
                    class="
                      flex
                      justify-end
                      sm:justify-start
                      lg:justify-end
                      xl:justify-start
                      -space-x-2
                    "
                  >
                    <img
                      v-for="user in item.relationships.members"
                      :src="
                        'https://www.gravatar.com/avatar/' +
                        user.email_hash +
                        '?d=mp'
                      "
                      :alt="user.name"
                      width="48"
                      height="48"
                      class="
                        w-7
                        h-7
                        rounded-full
                        bg-gray-100
                        border-2 border-white
                      "
                    />
                  </dd>
                </div>
              </dl>
            </a>
          </li>
        </ul>
      </section>
    </div>
  </div>
</template>

 
 <script>
import GetDataMixin from "../mixins/GetDataMixin";

export default {
  mixins: [GetDataMixin],
  props: ["page_url"],
  data() {
    return {
      search: "",
      new_org: false,
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

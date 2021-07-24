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
            v-if="!new_org"
            @click="new_org = !new_org"
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
            New
          </button>
          <button
            v-else
            @click="new_org = !new_org"
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
            Cancel
          </button>
        </header>
        <form class="relative">
          <svg
            width="20"
            height="20"
            fill="currentColor"
            class="
              absolute
              left-3
              top-1/2
              transform
              -translate-y-1/2
              text-gray-400
            "
          >
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
            />
          </svg>
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
          Filter for <em>{{ search }}</em>
        </div>

        <new-org v-if="new_org"></new-org>

        <ul
          class="
            grid grid-cols-1
            sm:grid-cols-2
            lg:grid-cols-1
            xl:grid-cols-2
            gap-4
          "
        >
          <li x-for="item in items" v-for="item in filteredList">
            <a
              :href="item.links.self"
              class="
                hover:bg-blue-500
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
                      group-hover:text-white
                      leading-6
                      font-medium
                      text-black
                    "
                  >
                    {{ item.name }}
                  </dd>
                </div>
                <div>
                  <dt class="sr-only">Category</dt>
                  <dd
                    class="
                      group-hover:text-blue-200
                      text-sm
                      font-medium
                      sm:mb-4
                      lg:mb-0
                      xl:mb-4
                    "
                  >
                    Description: {{ item.description }}

                    <div
                      v-for="process in item.relationships.processes"
                      class="
                        bg-blue-100
                        border-t border-b border-blue-500
                        text-blue-700
                        px-4
                        py-3
                      "
                    >
                      <p>
                        <a :href="process.links.self">{{ process.name }}</a>
                      </p>
                    </div>
                  </dd>
                </div>

                <h2 class="text-md leading-5 font-medium text-black sr-only">
                  Units
                </h2>

                <div v-for="unit in item.relationships.units">
                  {{ unit.name }}
                </div>

                <div class="col-start-2 row-start-1 row-end-3">
                  <dt class="sr-only">Dpos</dt>
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
                      x-for="user in item.relationships.dpos"
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
                  <dt class="sr-only">Members</dt>
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
                      x-for="user in item.relationships.members"
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
          <li class="hover:shadow-lg flex rounded-lg">
            <a
              @click="new_org = !new_org"
              class="
                hover:border-transparent
                hover:shadow-xs
                hover:bg-green-dark
                w-full
                flex
                items-center
                justify-center
                rounded-lg
                border-2 border-dashed border-gray-200
                text-sm
                font-medium
                py-4
              "
            >
              New organisation
            </a>
          </li>
        </ul>
      </section>
    </div>
  </div>
</template>

 
 <script>
import md5 from "md5";
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

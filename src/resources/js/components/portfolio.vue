<template>
  <div class="row">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">
            {{ __("app.name") }}
          </th>
          <th class="text-right">{{ __("app.labels") }}</th>
          <th class="text-right">{{ __("app.tags") }}</th>
          <th scope="col">
            {{ __("app.role") }}
          </th>
        </tr>
      </thead>

      <tbody>
        <tr v-if="!data_fetched">
          <td colspan="6" class="text-center">
            <loading-animation></loading-animation>
          </td>
        </tr>
        <tr v-for="item in fields">
          <td scope="row">
            <a :href="item.links.self">
              {{ item.name }}
            </a>
          </td>
          <td class="text-right">
            {{ item.description }}
          </td>
          <td>
            <em>{{ item.processes }}</em>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

 
 <script>
import GetDataMixin from "../mixins/GetDataMixin";

export default {
  mixins: [GetDataMixin],
  props: ["page_url"],
  data() {
    return {};
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
};
</script>

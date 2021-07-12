<template>
  <div class="row">
    <div class="table-responsive">
      <table class="table table-hover table-sm">
        <thead>
          <tr>
            <th scope="col">
              {{ __("app.name") }}
            </th>
            <th class="text-right">{{ __("app.labels") }}</th>
            <th class="text-right">{{ __("app.tags") }}</th>
            <th class="text-right">{{ __("app.texts") }}</th>
            <th class="text-right">{{ __("app.users") }}</th>
            <th scope="col">
              {{ __("app.role") }}
            </th>
            <!-- <th scope="col">
              {{ __("app.action") }}
            </th> -->
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
              {{ item.count_labels }}
              <fa icon="layer-group" class="text-secondary" />
            </td>
            <td class="text-right">
              {{ item.count_tags }}
              <fa icon="tags" class="text-secondary" />
            </td>
            <td class="text-right">
              {{ item.count_texts }}
              <fa icon="file" class="text-secondary" />
            </td>
            <td class="text-right">
              {{ item.count_users }}
              <fa icon="users" class="text-secondary" />
            </td>
            <td>
              <em>{{ item.role }}</em>
            </td>
            <!-- 
              <td>
               <a
                href="#"
                v-tooltip:top="__('app.edit')"
                class="btn btn-sm btn-link"
              >
                <fa icon="cogs" />
              </a> 
            </td>-->
          </tr>
        </tbody>
      </table>
    </div>
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

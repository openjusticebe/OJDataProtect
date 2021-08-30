<template>
  <div>
    <table class="table-auto">
      <tbody class="divide-y divide-gray-200">
        <tr class="border">
          <th class="text-right">Subject-matter of the processing</th>
          <td>{{ process.description }}</td>
        </tr>
        <tr class="border">
          <th class="text-right">
            Nature and purpose of the processing
            <a href="#" class="btn-xs">Edit</a>
          </th>
          <td>
            <tag-list>
              <tag-item
                v-for="tag in process.tagsGrouped.purpose"
                :key="tag.id"
                :tag="tag"
              />
            </tag-list>

            <tag-list>
              <tag-item
                v-for="tag in process.tagsGrouped.data_recipient"
                :key="tag.id"
                :tag="tag"
              />
            </tag-list>
          </td>
        </tr>
        <tr class="border">
          <th class="text-right">Type(s) of personal data</th>
          <td>
            <tag-list>
              <tag-item
                v-for="tag in process.tagsGrouped.data_object"
                :key="tag.id"
                :tag="tag"
              />
            </tag-list>
          </td>
        </tr>
        <tr class="border">
          <th class="text-right">Categorie(s) of data subjects</th>
          <td>
            <tag-list>
              <tag-item
                v-for="tag in process.tagsGrouped.data_subject"
                :key="tag.id"
                :tag="tag"
              />
            </tag-list>
          </td>
        </tr>
        <tr class="border">
          <th class="text-right">Expected duration of the processing</th>
          <td></td>
        </tr>
        <tr class="border">
          <th class="text-right">Approved sub-processors</th>
          <td>
            <tag-list>
              <tag-item
                v-for="tag in process.tagsGrouped.data_controller"
                :key="tag.id"
                :tag="tag"
              />
            </tag-list>
          </td>
        </tr>
        <tr class="border">
          <th class="text-right">Ex-EEA Data Transfers</th>
          <td></td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<style scoped>
dt {
  font-weight: bold;
  font-size: 1.2rem;
}
</style>

<script>
export default {
  props: ["process"],
  data() {
    return {};
  },
};
</script>

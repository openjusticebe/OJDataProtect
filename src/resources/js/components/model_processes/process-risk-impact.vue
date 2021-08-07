<template>
  <div id="risk">
    <table class="table-auto">
      <thead>
        <tr>
          <th class="w-1/4">#</th>
          <th class="w-1/4">Low Impact</th>
          <th class="w-1/4">Medium Impact</th>
          <th class="w-1/4">High Impact</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th class="text-right">High likelihood</th>
          <td class="bg-yellow-400"></td>
          <td class="bg-red-600"></td>
          <td class="bg-red-800"></td>
        </tr>
        <tr>
          <th class="text-right">Medium likelihood</th>
          <td class="bg-yellow-100" @click="showAlert"></td>
          <td class="bg-yellow-400"></td>
          <td class="bg-red-600"></td>
        </tr>
        <tr>
          <th class="text-right">Low likelihood</th>
          <td class="bg-yellow-100"></td>
          <td class="bg-yellow-100"></td>
          <td class="bg-yellow-400"></td>
        </tr>
      </tbody>
    </table>
  </div>
</template>


<script>
export default {
  data() {
    return {};
  },

  methods: {
    showAlert() {
      alert("test");
    },
  },
};
</script>

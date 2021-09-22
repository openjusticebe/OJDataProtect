<template>
  <table class="table">
    <thead>
      <tr class="bg-gray-100">
        <th>{{ __("start_date") }}</th>
        <th>{{ __("reminder") }}</th>
        <th>{{ __("safe_keeping_duration") }}<duration-icon /></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
          <span class="span-date">{{ process.start_date }}</span>
        </td>
        <td>
          <span class="span-date">{{ process.next_reminder_at }}</span>
          <br />
          <span class="span-diff">{{ process.next_reminder_diff }}</span>
        </td>
        <td>
          <span class="span-date">{{ process.safe_keeping_to }} </span>
          <br />
          <span class="span-diff">{{ process.safe_keeping_to_diff }}</span>
        </td>
      </tr>
    </tbody>
  </table>
</template>

<script>
export default {
  props: ["process"],
  data() {
    return {};
  },
};
</script>
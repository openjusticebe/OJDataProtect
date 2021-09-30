<template>
  <ul class="process-timetable">
    <li>
      <span class="time-info">{{ $t("start_date") }}</span
      >:
      <span class="span-date">{{ process.start_date }}</span>
      <span class="span-diff">{{ process.start_date_diff }}</span>
    </li>

    <li>
      <span class="time-info">{{ $t("reminder") }}</span
      >:
      <span class="span-date">{{ process.next_reminder_at }}</span>
      <span class="span-diff">{{ process.next_reminder_diff }}</span>
    </li>

    <li>
      <span class="time-info">{{ $t("safe_keeping_duration") }}</span
      >:
      <span class="span-date">{{ process.safe_keeping_to }} </span>
      <span class="span-diff">{{ process.safe_keeping_to_diff }}</span>
    </li>
  </ul>
</template>

<script>
export default {
  props: ["process"],
  data() {
    return {};
  },
};
</script>
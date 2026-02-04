<template>
  <div class="date-range-picker">
    <label class="date-range-label" for="date-range">Date Range</label>
    <select
      id="date-range"
      class="date-range-select"
      :value="value"
      @change="$emit('update:value', $event.target.value)"
    >
      <option value="today">Today</option>
      <option value="last_7_days">Last 7 Days</option>
      <option value="last_30_days">Last 30 Days</option>
      <option value="last_90_days">Last 90 Days</option>
      <option value="custom" disabled>Custom (demo)</option>
    </select>
  </div>
</template>

<script setup>
const props = defineProps({
  value: {
    type: String,
    default: 'last_7_days',
  },
});
</script>

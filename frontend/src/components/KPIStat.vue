<template>
  <article class="kpi-card">
    <h3 class="kpi-label">{{ label }}</h3>
    <p class="kpi-value">{{ value }}</p>
    <p class="kpi-trend" :class="{ 'kpi-trend--positive': positive, 'kpi-trend--negative': !positive }">
      {{ trend }}
    </p>
  </article>
</template>

<script setup>
const props = defineProps({
  label: String,
  value: String,
  trend: String,
  positive: Boolean,
});
</script>

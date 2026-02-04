<template>
  <section class="card">
    <header class="card-header">
      <h3>Sales Overview</h3>
      <span v-if="!loading" class="card-subtitle">Today vs. last period</span>
      <span v-else class="card-subtitle">Loading…</span>
    </header>
    <div class="card-body">
      <ul v-if="!loading && metrics" class="metric-list">
        <li class="metric-row"><span>Total Revenue</span><span>${{ metrics.totals.revenue.toLocaleString() }}</span></li>
        <li class="metric-row"><span>Orders</span><span>{{ metrics.totals.orders.toLocaleString() }}</span></li>
        <li class="metric-row"><span>Average Order Value</span><span>${{ metrics.totals.averageOrderValue.toFixed(2) }}</span></li>
      </ul>
      <p v-else-if="!loading" class="empty-state">No metrics available.</p>
    </div>
  </section>
</template>

<script setup>
const props = defineProps({
  metrics: Object,
  loading: Boolean,
});
</script>

<template>
  <section class="card">
    <header class="card-header">
      <h3>Traffic Funnel</h3>
      <span v-if="!loading" class="card-subtitle">Sessions → Carts → Orders</span>
      <span v-else class="card-subtitle">Loading…</span>
    </header>
    <div class="card-body" v-if="!loading && metrics">
      <div class="funnel">
        <div class="funnel-step">
          <span class="funnel-label">Sessions</span>
          <span class="funnel-value">{{ metrics.funnel.sessions.toLocaleString() }}</span>
        </div>
        <div class="funnel-step">
          <span class="funnel-label">Add to Cart</span>
          <span class="funnel-value">{{ metrics.funnel.addToCart.toLocaleString() }}</span>
        </div>
        <div class="funnel-step">
          <span class="funnel-label">Orders</span>
          <span class="funnel-value">{{ metrics.funnel.orders.toLocaleString() }}</span>
        </div>
      </div>
    </div>
    <p v-else-if="!loading" class="empty-state">No funnel data available.</p>
  </section>
</template>

<script setup>
const props = defineProps({
  metrics: Object,
  loading: Boolean,
});
</script>

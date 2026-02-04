<template>
  <section class="card">
    <header class="card-header">
      <h3>Top Products</h3>
      <span v-if="!loading" class="card-subtitle">By revenue for selected range</span>
      <span v-else class="card-subtitle">Loading…</span>
    </header>
    <div class="card-body" v-if="!loading && metrics && metrics.topProducts">
      <table class="products-table">
        <thead>
          <tr>
            <th>Product</th>
            <th>Orders</th>
            <th>Revenue</th>
            <th>Conv. Rate</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="product in metrics.topProducts" :key="product.sku">
            <td class="product-name">
              <span class="product-title">{{ product.name }}</span>
              <span class="product-sku">SKU: {{ product.sku }}</span>
            </td>
            <td>{{ product.orders.toLocaleString() }}</td>
            <td>${{ product.revenue.toLocaleString() }}</td>
            <td>{{ product.conversionRate.toFixed(1) }}%</td>
          </tr>
        </tbody>
      </table>
    </div>
    <p v-else-if="!loading" class="empty-state">No product data available.</p>
  </section>
</template>

<script setup>
const props = defineProps({
  metrics: Object,
  loading: Boolean,
});
</script>

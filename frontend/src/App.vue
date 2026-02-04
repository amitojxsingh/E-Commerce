<template>
  <div class="app-shell">
    <aside class="sidebar">
      <h1 class="logo">GoodMorning Commerce</h1>
      <nav class="nav">
        <button class="nav-item nav-item--active">Dashboard</button>
        <button class="nav-item">Orders</button>
        <button class="nav-item">Customers</button>
      </nav>
    </aside>
    <main class="main">
      <header class="topbar">
        <div>
          <h2 class="page-title">E-Commerce Performance Dashboard</h2>
          <p class="page-subtitle">Real-time overview of sales, traffic, and conversion.</p>
        </div>
        <DateRangePicker :value="dateRange" @update:value="dateRange = $event" />
      </header>

      <section class="kpi-grid">
        <KPIStat
          v-for="kpi in kpis"
          :key="kpi.label"
          :label="kpi.label"
          :value="kpi.value"
          :trend="kpi.trend"
          :positive="kpi.positive"
        />
      </section>

      <section class="content-grid">
        <SalesOverviewCard :metrics="metrics" :loading="loading" />
        <div class="secondary-column">
          <TrafficFunnelCard :metrics="metrics" :loading="loading" />
          <TopProductsCard :metrics="metrics" :loading="loading" />
        </div>
      </section>
    </main>
  </div>
</template>

<script setup>
import { onMounted, ref } from 'vue';
import { fetchDashboardMetrics } from './services/apiClient';
import KPIStat from './components/KPIStat.vue';
import SalesOverviewCard from './components/SalesOverviewCard.vue';
import TrafficFunnelCard from './components/TrafficFunnelCard.vue';
import DateRangePicker from './components/DateRangePicker.vue';
import TopProductsCard from './components/TopProductsCard.vue';

const dateRange = ref('last_7_days');
const metrics = ref(null);
const loading = ref(true);

const kpis = ref([
  { label: 'Revenue', value: '$0', trend: '0% vs. last period', positive: true },
  { label: 'Orders', value: '0', trend: '0% vs. last period', positive: true },
  { label: 'Conversion Rate', value: '0%', trend: '0% vs. last period', positive: true },
  { label: 'Average Order Value', value: '$0', trend: '0% vs. last period', positive: true },
]);

async function loadMetrics() {
  loading.value = true;
  try {
    const data = await fetchDashboardMetrics(dateRange.value);
    metrics.value = data;

    kpis.value = [
      {
        label: 'Revenue',
        value: `$${data.totals.revenue.toLocaleString()}`,
        trend: `${data.trends.revenue}% vs. last period`,
        positive: data.trends.revenue >= 0,
      },
      {
        label: 'Orders',
        value: data.totals.orders.toLocaleString(),
        trend: `${data.trends.orders}% vs. last period`,
        positive: data.trends.orders >= 0,
      },
      {
        label: 'Conversion Rate',
        value: `${data.totals.conversionRate.toFixed(2)}%`,
        trend: `${data.trends.conversionRate}% vs. last period`,
        positive: data.trends.conversionRate >= 0,
      },
      {
        label: 'Average Order Value',
        value: `$${data.totals.averageOrderValue.toFixed(2)}`,
        trend: `${data.trends.averageOrderValue}% vs. last period`,
        positive: data.trends.averageOrderValue >= 0,
      },
    ];
  } catch (error) {
    console.error('Failed to load metrics', error);
  } finally {
    loading.value = false;
  }
}

onMounted(loadMetrics);
</script>

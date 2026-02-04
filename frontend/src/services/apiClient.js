const mockMetrics = {
  totals: {
    revenue: 84250,
    orders: 1340,
    conversionRate: 2.43,
    averageOrderValue: 62.89,
  },
  trends: {
    revenue: 12.4,
    orders: 8.1,
    conversionRate: 0.3,
    averageOrderValue: 3.2,
  },
  funnel: {
    sessions: 54000,
    addToCart: 7400,
    orders: 1340,
  },
  topProducts: [
    {
      name: 'Hybrid Foam Mattress - Queen',
      sku: 'GM-MAT-HYB-Q',
      revenue: 28500,
      orders: 320,
      conversionRate: 3.2,
    },
    {
      name: 'Cooling Pillow - Standard',
      sku: 'GM-PIL-COOL-S',
      revenue: 14280,
      orders: 410,
      conversionRate: 4.1,
    },
    {
      name: 'Weighted Blanket - 15lb',
      sku: 'GM-BLN-WGT-15',
      revenue: 11640,
      orders: 180,
      conversionRate: 2.7,
    },
  ],
};

export async function fetchDashboardMetrics(dateRange) {
  const params = new URLSearchParams({ range: dateRange });

  try {
    const response = await fetch(`/api/metrics.php?${params.toString()}`);

    if (!response.ok) {
      throw new Error(`Failed to load metrics: ${response.status}`);
    }

    return response.json();
  } catch (error) {
    console.warn('Falling back to mock metrics data:', error.message || error);
    // In a real app you might only do this in development.
    return Promise.resolve(mockMetrics);
  }
}

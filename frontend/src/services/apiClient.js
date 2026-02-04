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
    {
      name: 'Bamboo Sheet Set - Queen',
      sku: 'GM-SHT-BMB-Q',
      revenue: 9840,
      orders: 205,
      conversionRate: 3.6,
    },
    {
      name: 'Mattress Protector - Queen',
      sku: 'GM-PRT-MAT-Q',
      revenue: 8120,
      orders: 260,
      conversionRate: 4.4,
    },
    {
      name: 'Adjustable Base - Queen',
      sku: 'GM-BAS-ADJ-Q',
      revenue: 17600,
      orders: 64,
      conversionRate: 1.4,
    },
    {
      name: 'Travel Pillow',
      sku: 'GM-PIL-TRV',
      revenue: 3560,
      orders: 220,
      conversionRate: 2.9,
    },
    {
      name: 'Sleep Bundle (Sheets + Pillows)',
      sku: 'GM-BND-SLP',
      revenue: 10450,
      orders: 95,
      conversionRate: 2.1,
    },
  ],
  trafficSources: [
    { source: 'Organic Search', sessions: 21400, conversionRate: 2.6 },
    { source: 'Paid Search', sessions: 13250, conversionRate: 2.9 },
    { source: 'Email', sessions: 5200, conversionRate: 3.8 },
    { source: 'Social', sessions: 4100, conversionRate: 1.9 },
    { source: 'Referral', sessions: 6050, conversionRate: 2.2 },
  ],
  regions: [
    { region: 'US', revenue: 52340, orders: 860 },
    { region: 'CA', revenue: 11280, orders: 170 },
    { region: 'UK', revenue: 9850, orders: 155 },
    { region: 'AU', revenue: 6200, orders: 92 },
    { region: 'EU (Other)', revenue: 4580, orders: 63 },
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

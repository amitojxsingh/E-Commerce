import { describe, it, expect, vi, afterEach } from 'vitest';
import { fetchDashboardMetrics } from './apiClient';

afterEach(() => {
  vi.unstubAllGlobals();
});

describe('fetchDashboardMetrics', () => {
  it('calls the backend with the selected range', async () => {
    const apiResponse = {
      totals: { revenue: 1, orders: 2, conversionRate: 3, averageOrderValue: 4 },
      trends: { revenue: 0, orders: 0, conversionRate: 0, averageOrderValue: 0 },
      funnel: { sessions: 10, addToCart: 5, orders: 2 },
      topProducts: [],
    };

    vi.stubGlobal(
      'fetch',
      vi.fn().mockResolvedValue({
        ok: true,
        json: vi.fn().mockResolvedValue(apiResponse),
      })
    );

    const result = await fetchDashboardMetrics('last_7_days');

    expect(fetch).toHaveBeenCalledWith('/api/metrics.php?range=last_7_days');
    expect(result).toEqual(apiResponse);
  });

  it('falls back to mock data if the request fails', async () => {
    vi.stubGlobal('fetch', vi.fn().mockRejectedValue(new Error('Network down')));

    const result = await fetchDashboardMetrics('today');

    expect(result).toBeTruthy();
    expect(result.totals.revenue).toBe(84250);
    expect(result.topProducts.length).toBeGreaterThanOrEqual(3);
    expect(result.topProducts[0].sku).toBe('GM-MAT-HYB-Q');
  });
});

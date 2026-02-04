<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$range = $_GET['range'] ?? 'last_7_days';
// Optional dimension to simulate different performance profiles.
$variant = $_GET['variant'] ?? 'baseline';

// In a real app this would come from a database or analytics provider.
// Here we return deterministic sample data suitable for a portfolio demo.

$base = [
    'range' => $range,
    'variant' => $variant,
    'generatedAt' => gmdate('c'),
    'totals' => [
        'revenue' => 84250,
        'orders' => 1340,
        'conversionRate' => 2.43,
        'averageOrderValue' => 62.89,
    ],
    'trends' => [
        'revenue' => 12.4,
        'orders' => 8.1,
        'conversionRate' => 0.3,
        'averageOrderValue' => 3.2,
    ],
    'funnel' => [
        'sessions' => 54000,
        'addToCart' => 7400,
        'orders' => 1340,
    ],
    'topProducts' => [
        [
            'name' => 'Hybrid Foam Mattress - Queen',
            'sku' => 'GM-MAT-HYB-Q',
            'revenue' => 28500,
            'orders' => 320,
            'conversionRate' => 3.2,
        ],
        [
            'name' => 'Cooling Pillow - Standard',
            'sku' => 'GM-PIL-COOL-S',
            'revenue' => 14280,
            'orders' => 410,
            'conversionRate' => 4.1,
        ],
        [
            'name' => 'Weighted Blanket - 15lb',
            'sku' => 'GM-BLN-WGT-15',
            'revenue' => 11640,
            'orders' => 180,
            'conversionRate' => 2.7,
        ],
        [
            'name' => 'Bamboo Sheet Set - Queen',
            'sku' => 'GM-SHT-BMB-Q',
            'revenue' => 9840,
            'orders' => 205,
            'conversionRate' => 3.6,
        ],
        [
            'name' => 'Mattress Protector - Queen',
            'sku' => 'GM-PRT-MAT-Q',
            'revenue' => 8120,
            'orders' => 260,
            'conversionRate' => 4.4,
        ],
        [
            'name' => 'Adjustable Base - Queen',
            'sku' => 'GM-BAS-ADJ-Q',
            'revenue' => 17600,
            'orders' => 64,
            'conversionRate' => 1.4,
        ],
        [
            'name' => 'Travel Pillow',
            'sku' => 'GM-PIL-TRV',
            'revenue' => 3560,
            'orders' => 220,
            'conversionRate' => 2.9,
        ],
        [
            'name' => 'Sleep Bundle (Sheets + Pillows)',
            'sku' => 'GM-BND-SLP',
            'revenue' => 10450,
            'orders' => 95,
            'conversionRate' => 2.1,
        ],
    ],
    // Extra mock dimensions for future dashboard cards (safe to ignore on front end).
    'trafficSources' => [
        ['source' => 'Organic Search', 'sessions' => 21400, 'conversionRate' => 2.6],
        ['source' => 'Paid Search', 'sessions' => 13250, 'conversionRate' => 2.9],
        ['source' => 'Email', 'sessions' => 5200, 'conversionRate' => 3.8],
        ['source' => 'Social', 'sessions' => 4100, 'conversionRate' => 1.9],
        ['source' => 'Referral', 'sessions' => 6050, 'conversionRate' => 2.2],
    ],
    'regions' => [
        ['region' => 'US', 'revenue' => 52340, 'orders' => 860],
        ['region' => 'CA', 'revenue' => 11280, 'orders' => 170],
        ['region' => 'UK', 'revenue' => 9850, 'orders' => 155],
        ['region' => 'AU', 'revenue' => 6200, 'orders' => 92],
        ['region' => 'EU (Other)', 'revenue' => 4580, 'orders' => 63],
    ],
];

// Slightly tweak numbers based on the requested range to simulate dynamics.

switch ($range) {
    case 'today':
        $base['totals']['revenue'] = 11250;
        $base['totals']['orders'] = 190;
        $base['funnel']['sessions'] = 8100;
        $base['funnel']['addToCart'] = 1120;
        break;
    case 'last_30_days':
        $base['totals']['revenue'] = 325000;
        $base['totals']['orders'] = 5120;
        $base['totals']['conversionRate'] = 2.67;
        $base['funnel']['sessions'] = 210000;
        $base['funnel']['addToCart'] = 27450;
        break;
    case 'last_90_days':
        $base['totals']['revenue'] = 910000;
        $base['totals']['orders'] = 14850;
        $base['totals']['conversionRate'] = 2.58;
        $base['totals']['averageOrderValue'] = 61.28;
        $base['funnel']['sessions'] = 640000;
        $base['funnel']['addToCart'] = 83500;
        // Trend deltas over the previous period.
        $base['trends']['revenue'] = 6.9;
        $base['trends']['orders'] = 5.2;
        $base['trends']['conversionRate'] = -0.1;
        $base['trends']['averageOrderValue'] = 1.4;
        break;
    case 'last_7_days':
    default:
        // keep default sample
        break;
}

// Variant tweaks (optional) to help demo different scenarios without changing UI.
switch ($variant) {
    case 'promo':
        $base['trends']['revenue'] += 7.5;
        $base['trends']['orders'] += 6.2;
        $base['totals']['conversionRate'] = round($base['totals']['conversionRate'] + 0.18, 2);
        break;
    case 'slow_week':
        $base['trends']['revenue'] -= 9.1;
        $base['trends']['orders'] -= 7.4;
        $base['totals']['conversionRate'] = max(0.5, round($base['totals']['conversionRate'] - 0.22, 2));
        break;
    case 'baseline':
    default:
        break;
}

echo json_encode($base);

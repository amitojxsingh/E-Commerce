<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$range = $_GET['range'] ?? 'last_7_days';

// In a real app this would come from a database or analytics provider.
// Here we return deterministic sample data suitable for a portfolio demo.

$base = [
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
    case 'last_7_days':
    default:
        // keep default sample
        break;
}

echo json_encode($base);

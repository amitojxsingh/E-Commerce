# Backend (PHP)

This folder contains a lightweight PHP backend that exposes JSON metrics for the **E-Commerce Performance Dashboard**. It simulates data that would normally come from an analytics store or database.

## Endpoints

- `GET /api/metrics.php?range=last_7_days`  
  Returns overall totals, trend percentages, and a simple traffic funnel.

Supported `range` values:

- `today`
- `last_7_days` (default)
- `last_30_days`

## Running the backend locally

From this `backend` folder run:

```bash
php -S localhost:8000 -t public
```

Then the dashboard (front end) can call `http://localhost:8000/api/metrics.php` through the Vite dev server proxy.

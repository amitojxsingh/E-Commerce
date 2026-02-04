# E-Commerce Performance Dashboard

A responsive, conversion-focused **E-Commerce Performance Dashboard** built with **Vue 3, JavaScript, HTML/CSS, and PHP**, closely matching the project described on your resume.

It showcases:

- Responsive design with mobile-friendly layouts.
- Component-based architecture using Vue 3.
- Decoupled front end and back end (Vue + PHP JSON API).
- Realistic e-commerce metrics and traffic funnel visualization.

## Tech Stack

- Front end: Vue 3, Vite, JavaScript, HTML/CSS
- Back end: PHP (simple JSON API)

## Project Structure

- `frontend/` – Vue 3 app (dashboard UI, components, layouts)
- `backend/` – PHP API returning JSON metrics

## Getting Started

### 1. Backend (PHP API)

From the `backend` folder:

```bash
php -S localhost:8000 -t public
```

This serves:

- `http://localhost:8000/api/metrics.php` – dashboard metrics JSON

### 2. Frontend (Vue Dashboard)

From the `frontend` folder:

```bash
npm install
npm run dev
```

Then open the Vite dev server URL (usually `http://localhost:5173`). The dev server proxies `/api` to `http://localhost:8000` so data loads from PHP.

If PHP is not installed or the backend is not running, the dashboard will automatically fall back to **mock metrics data** on the front end so you can still demo the UI and interactions.

## How This Aligns With the Job Description

- **Responsive Design & UX**: High-fidelity, mobile-friendly dashboard layout with KPIs and funnel visualization.
- **Component Architecture**: Reusable Vue components (`KPIStat`, `SalesOverviewCard`, `TrafficFunnelCard`, `DateRangePicker`).
- **Decoupled Content & Design**: Vue front end consumes a PHP JSON API (`/api/metrics.php`).
- **Testing Across Media**: Layout is optimized for desktop and mobile breakpoints.

This project is structured like a real-world e-commerce analytics dashboard and is ready to be showcased in your portfolio or discussed in interviews.

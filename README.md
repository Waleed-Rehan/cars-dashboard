# 🚗 Cars Dashboard

Welcome to **Cars Dashboard** — a futuristic Laravel-powered platform designed to manage, search, and explore car listings with speed, style, and precision.

---

## 🌟 Features

- 🔍 **Advanced Search & Filtering**  
  Search by brand, model, year, price, mileage, fuel type, and transmission.

- 🧩 **Modular UI Components**  
  Built with Blade templating and clean UI/UX principles.

- 🛠️ **CRUD Operations**  
  Add, edit, and delete car listings with ease.

- 🔐 **Protected Routes with Middleware**  
  Secure access to dashboard features using Laravel’s `auth` middleware.

- 📊 **Responsive Dashboard**  
  Optimized for desktop and mobile experiences.

---

## 🚀 Tech Stack

| Layer         | Technology         |
|---------------|--------------------|
| Backend       | Laravel 10.x        |
| Frontend      | Blade + TailwindCSS |
| Database      | MySQL / SQLite      |
| Auth          | Laravel Breeze      |
| Icons         | FontAwesome         |

---

## 📦 Installation

```bash
git clone https://github.com/YOUR_USERNAME/cars-dashboard.git
cd cars-dashboard
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm install && npm run dev
php artisan serve

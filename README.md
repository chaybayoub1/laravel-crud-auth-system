# 🛒 Laravel CRUD Products Management System

> **Module :** Développement Web Back End  
> **Étudiant :** Ayoub CHAYB ANNOU  
> **Filière :** IRISI1  
> **Professeur :** Sara Qassimi  
> **Institution :** Faculté des Sciences et Techniques — Université Cadi Ayyad, Marrakech

---

## 📋 Table of Contents

1. [Introduction](#introduction)
2. [Project Objectives](#project-objectives)
3. [Technologies Used](#technologies-used)
4. [Project Architecture — MVC](#project-architecture--mvc)
5. [Features Implemented](#features-implemented)
6. [Installation Steps](#installation-steps)
7. [Database Configuration](#database-configuration)
8. [Running the Project](#running-the-project)
9. [Authentication System](#authentication-system)
10. [CRUD Functionality](#crud-functionality)
11. [Screenshots](#screenshots)
12. [Conclusion](#conclusion)

---

## Introduction

This project is a **full-stack web application** built with the Laravel framework as part of the *Back-End Web Development* practical work (TP5).

Laravel is a modern PHP framework built around the **Model-View-Controller (MVC)** design pattern. It provides an elegant syntax, a rich set of built-in tools (routing, Eloquent ORM, Blade templating, migrations, Artisan CLI), and a thriving ecosystem that allows developers to build robust, maintainable applications rapidly.

> **Project Summary:** The system allows authenticated users to **create, read, update, and delete (CRUD)** product records stored in a MySQL database. Route-level authentication is enforced through the `auth` middleware provided by **Laravel Breeze**.

---

## Project Objectives

- ✅ Set up a complete Laravel development environment (PHP, Composer, Node.js, XAMPP)
- ✅ Understand and apply the **MVC architectural pattern** within Laravel
- ✅ Define and manage application routes using `routes/web.php`
- ✅ Build controllers that handle business logic and mediate between models and views
- ✅ Design a relational database schema and manage it through **Laravel migrations**
- ✅ Interact with the database using **Eloquent ORM** models
- ✅ Implement full **CRUD functionality** for a `Product` resource
- ✅ Render dynamic content with the **Blade templating engine**
- ✅ Integrate **user authentication** (registration, login, logout) via Laravel Breeze
- ✅ Protect routes using the `auth` middleware
- ✅ Display context-sensitive navigation based on authentication state

---

## Technologies Used

| Technology | Purpose | Version |
|---|---|---|
| **PHP** | Server-side scripting language | 8.2.12 |
| **Laravel** | PHP MVC web framework | 12.x |
| **Laravel Breeze** | Lightweight authentication scaffolding | 2.4.1 |
| **Composer** | PHP dependency manager | 2.9.7 |
| **Node.js / NPM** | Frontend asset tooling | 24.15.0 / 11.12.1 |
| **Vite** | Frontend build tool (CSS/JS bundler) | 7.3.2 |
| **Tailwind CSS** | Utility-first CSS framework (Breeze UI) | 3.x |
| **Alpine.js** | Lightweight JavaScript framework | 3.x |
| **MySQL** | Relational database management system | 8.x |
| **XAMPP** | Local server environment (Apache + MySQL) | 3.3.0 |
| **phpMyAdmin** | Database administration GUI | — |
| **Visual Studio Code** | Code editor with Laravel extensions | — |

---

## Project Architecture — MVC

Laravel enforces the **Model-View-Controller (MVC)** separation of concerns. Each layer has a clearly defined responsibility:

| Layer | Responsibility | Location |
|---|---|---|
| **Model** | Represents data; wraps Eloquent ORM; defines fillable fields | `app/Models/` |
| **View** | Blade templates; renders dynamic HTML; inherits shared layouts | `resources/views/` |
| **Controller** | Handles HTTP requests; validates input; calls model; returns view | `app/Http/Controllers/` |

### Directory Structure

```
irisi_laravel/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       └── ProductController.php   # CRUD logic
│   └── Models/
│       └── Product.php                 # Eloquent model
├── database/
│   └── migrations/
│       └── xxxx_create_products_table.php
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php           # Shared layout
│       └── products/
│           ├── index.blade.php         # Product list
│           ├── create.blade.php        # Create form
│           └── edit.blade.php          # Edit form
├── routes/
│   └── web.php                         # All web routes
└── .env                                # Environment config
```

---

## Features Implemented

- 🔐 **User Registration** — create a new account with name, email, and password
- 🔑 **User Login / Logout** — session-based authentication
- 🛡️ **Route Protection** — unauthenticated users are redirected to `/login`
- 🧭 **Dynamic Navigation** — `@auth` / `@guest` directives show context-aware links
- ➕ **Create Product** — form with server-side validation
- 📋 **List Products** — tabular display of all products with name, price, and stock
- ✏️ **Edit Product** — pre-populated form using current product data
- 🗑️ **Delete Product** — DELETE request with browser confirmation dialog
- 💬 **Flash Messages** — success notifications after every CRUD operation
- 🔒 **CSRF Protection** — all forms include the `@csrf` Blade directive

---

## Installation Steps

### Prerequisites

Before cloning the project, ensure the following tools are installed:

- PHP ≥ 8.2 — verify with `php -v`
- Composer ≥ 2.x — verify with `composer --version`
- Node.js ≥ 18.x and NPM — verify with `node -v` and `npm -v`
- XAMPP (Apache + MySQL) or an equivalent local server

### 1. Install Laravel Installer (Global)

```bash
composer global require laravel/installer
```

### 2. Create a New Laravel Project

```bash
cd C:\xampp\htdocs
laravel new irisi_laravel

# Choices during scaffolding:
#   Starter kit  -> None
#   Test suite   -> PHPUnit
#   Git init     -> Yes
```

### 3. Clone an Existing Repository (Alternative)

```bash
git clone https://github.com/your-username/irisi_laravel.git
cd irisi_laravel
composer install
npm install
cp .env.example .env
php artisan key:generate
```

---

## Database Configuration

### 1. Create the Database

1. Start **Apache** and **MySQL** from the XAMPP Control Panel
2. Open [http://localhost/phpmyadmin](http://localhost/phpmyadmin) in your browser
3. Create a new database named `irisi_laravel`

### 2. Configure `.env`

Edit the `.env` file at the project root and update the database block:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=irisi_laravel
DB_USERNAME=root
DB_PASSWORD=
```

### 3. Run Migrations

```bash
php artisan migrate
```

The command creates the following `products` table:

| Column | Type | Nullable | Notes |
|---|---|---|---|
| `id` | BIGINT (unsigned) | No | Auto-increment primary key |
| `name` | VARCHAR(255) | No | Product name |
| `description` | TEXT | Yes | Optional description |
| `price` | DECIMAL(8,2) | No | Price in MAD |
| `stock` | INT | No | Default: 0 |
| `created_at` | TIMESTAMP | Yes | Auto-managed by Laravel |
| `updated_at` | TIMESTAMP | Yes | Auto-managed by Laravel |

---

## Running the Project

### Start the Development Server

```bash
cd C:\xampp\htdocs\irisi_laravel
php artisan serve
# INFO  Server running on http://127.0.0.1:8000
```

### Compile Frontend Assets

Open a **second terminal** and run:

```bash
npm run dev
# VITE v7.3.2  ready in 372 ms
# -> Local:  http://localhost:5173/
```

> **Note:** Both `php artisan serve` and `npm run dev` must run simultaneously during development. Open [http://127.0.0.1:8000](http://127.0.0.1:8000) in your browser.

---

## Authentication System

### Installing Laravel Breeze

```bash
composer require laravel/breeze --dev
php artisan breeze:install

# Stack  -> Blade with Alpine
# Dark   -> No
# Tests  -> PHPUnit
```

### Compile and Migrate

```bash
npm install
npm run dev
php artisan migrate
```

### Breeze Routes

| Method | URI | Action |
|---|---|---|
| GET | `/register` | Show registration form |
| POST | `/register` | Store new user |
| GET | `/login` | Show login form |
| POST | `/login` | Authenticate user |
| POST | `/logout` | Logout current user |
| GET | `/dashboard` | Authenticated home page |

### Protecting Routes with the `auth` Middleware

```php
// routes/web.php
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/products',             [ProductController::class, 'index']);
    Route::get('/products/create',      [ProductController::class, 'create']);
    Route::post('/products',            [ProductController::class, 'store']);
    Route::get('/products/{id}/edit',   [ProductController::class, 'edit']);
    Route::put('/products/{id}',        [ProductController::class, 'update']);
    Route::delete('/products/{id}',     [ProductController::class, 'destroy']);
});
```

### Dynamic Navigation with Blade Directives

```blade
@auth
    <a href="/products">Products</a>
    <a href="/products/create">+ New Product</a>
    <span>Hello, {{ auth()->user()->name }}</span>
    <form method="POST" action="/logout">
        @csrf
        <button type="submit">Log out</button>
    </form>
@endauth

@guest
    <a href="/login">Log in</a>
    <a href="/register">Register</a>
@endguest
```

---

## CRUD Functionality

### Eloquent Model

```php
// app/Models/Product.php
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'stock'];
}
```

### Controller Actions

| Method | URI | Controller Action | Purpose |
|---|---|---|---|
| GET | `/products` | `index()` | List all products |
| GET | `/products/create` | `create()` | Show create form |
| POST | `/products` | `store()` | Save new product |
| GET | `/products/{id}/edit` | `edit()` | Show edit form |
| PUT | `/products/{id}` | `update()` | Update product |
| DELETE | `/products/{id}` | `destroy()` | Delete product |

### Validation Rules

```php
$validated = $request->validate([
    'name'        => 'required|string|max:255',
    'description' => 'nullable|string',
    'price'       => 'required|numeric|min:0',
    'stock'       => 'required|integer|min:0',
]);
```

### Flash Messages

```php
// Controller — after store/update/destroy
return redirect('/products')->with('success', 'Product created successfully!');
```

```blade
{{-- In the Blade view --}}
@if(session('success'))
    <div style="color: green">{{ session('success') }}</div>
@endif
```

### CSRF Protection & Method Spoofing

```blade
<form method="POST" action="/products/{{ $product->id }}">
    @csrf
    @method('DELETE')
    <button onclick="return confirm('Delete this product?')">Delete</button>
</form>
```

---

## Screenshots

### 🏠 Home Page
![Home Page](screenshots/home.png)

### 📝 Registration Page
![Register](screenshots/register.png)

### 🔑 Login Page
![Login](screenshots/login.png)

### 📊 Dashboard
![Dashboard](screenshots/dashboard.png)

### 📋 Product List
![Product List](screenshots/product-list.png)

### ➕ Create Product
![Create Product](screenshots/product-create.png)

### ✏️ Edit Product
![Edit Product](screenshots/product-edit.png)

### 🗑️ Delete Confirmation
![Delete Product](screenshots/product-delete.png)

> **Note:** Place your screenshot images in a `screenshots/` folder at the project root, then the links above will render automatically on GitHub.

---

## Conclusion

This project provided a comprehensive, hands-on introduction to the Laravel framework and modern PHP back-end development. Through the implementation of a complete CRUD product management system, the following key competencies were developed:

- ⚙️ Configuring a professional PHP development environment
- 🏗️ Applying the MVC architectural pattern to structure a web application
- 🛣️ Defining and protecting routes, including middleware-based authentication
- 🗄️ Leveraging **Eloquent ORM** for clean, expressive database interactions
- 📦 Managing database schema evolution through versioned migrations
- 🎨 Building reusable, dynamic UI with the **Blade templating engine**
- 🔐 Integrating a complete authentication system using **Laravel Breeze**
- ✅ Implementing server-side input validation and **CSRF protection**

> Laravel's rich ecosystem, convention-over-configuration philosophy, and developer-friendly tooling (Artisan CLI, Eloquent, Blade, Breeze) make it an excellent choice for building secure, scalable, and maintainable back-end applications.

---

<p align="center">
  <sub>Faculté des Sciences et Techniques — Université Cadi Ayyad, Marrakech</sub><br>
  <sub>Module: Back-End Web Development · TP5 · 2025–2026</sub>
</p>
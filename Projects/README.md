# ✅ Built PHP Projects

All completed PHP + MySQL projects, documented and tracked. Each project is fully functional, secured, and built concept-first.

---

## 📊 Progress Overview

| Total Planned | Completed | In Progress | Pending |
|---|---|---|---|
| 4 | 0 | 0 | 4 |

---

## 📋 Projects Table

| # | Project | Phase | Difficulty | Status | Concepts Covered |
|---|---|---|---|---|---|
| 01 | [Login & Registration System](#01---login--registration-system) | 1 | ⭐⭐ | 📋 Planned | Sessions, PDO, Hashing |
| 02 | [Blog System](#02---blog-system) | 2 | ⭐⭐⭐ | 📋 Planned | CRUD, File Upload, Pagination |
| 03 | [E-Commerce Catalog & Cart](#03---e-commerce-catalog--cart) | 3 | ⭐⭐⭐⭐ | 📋 Planned | Cart, Roles, Search, API |
| 04 | [Multi-role Web App](#04---multi-role-web-app) | 4 | ⭐⭐⭐⭐ | 📋 Planned | RBAC, REST API, AJAX |

---

## 🗂️ 01 - Login & Registration System
> **Status:** 📋 Planned | **Phase:** 1

### Overview
A secure user authentication system with registration, login, session management, and password reset functionality. The foundation used in every future project.

### Features
- [ ] User registration with input validation
- [ ] Secure login with session management
- [ ] Remember me (persistent login with cookies)
- [ ] Forgot password (token-based reset)
- [ ] Email verification on registration
- [ ] Profile page with edit functionality
- [ ] Secure logout (full session destroy)

### Concepts Used
| Concept | New? |
|---|---|
| PDO database connection | ✅ Practiced |
| Sessions & Cookies | 🆕 New |
| `password_hash()` & `password_verify()` | 🆕 New |
| Token-based password reset | 🆕 New |
| PHPMailer (email sending) | 🆕 New |
| Form validation (server-side) | ✅ Practiced |

### Pages
```
/register.php       ← Registration form
/login.php          ← Login form
/logout.php         ← Destroy session
/forgot-password.php ← Request reset
/reset-password.php  ← Reset with token
/profile.php        ← View & edit profile
```

### Database Tables
```sql
users (id, name, email, password, remember_token,
       reset_token, reset_expires, created_at)
```

### Usage
```bash
# Setup
1. Import database SQL file
2. Configure config/database.php
3. Run on XAMPP localhost
```

---

## 📝 02 - Blog System
> **Status:** 📋 Planned | **Phase:** 2

### Overview
A full-featured blogging platform with post management, categories, comments, image uploads, and an admin panel. Built on top of the auth system from Project 01.

### Features
- [ ] Create, edit, delete blog posts
- [ ] Categories and tags
- [ ] Image upload for posts
- [ ] Comment system (with moderation)
- [ ] Pagination for post listing
- [ ] Search posts by keyword
- [ ] Admin panel for content moderation
- [ ] Rich text editor (TinyMCE/Quill)

### Concepts Used
| Concept | New? |
|---|---|
| Full CRUD operations | ✅ Practiced |
| File upload & validation | 🆕 New |
| Pagination (LIMIT/OFFSET) | 🆕 New |
| Search (SQL LIKE queries) | 🆕 New |
| MVC folder structure | 🆕 New |
| User roles (Admin/User) | 🆕 New |

### Pages
```
/                   ← Home (latest posts)
/post/{id}          ← Single post view
/create-post.php    ← Create new post
/edit-post.php      ← Edit existing post
/admin/             ← Admin dashboard
/admin/posts.php    ← Manage all posts
/admin/comments.php ← Moderate comments
```

### Database Tables
```sql
posts (id, user_id, title, content, image, category_id, created_at)
categories (id, name, slug)
comments (id, post_id, user_id, content, status, created_at)
tags (id, name)
post_tags (post_id, tag_id)
```

---

## 🛒 03 - E-Commerce Catalog & Cart
> **Status:** 📋 Planned | **Phase:** 3

### Overview
A fully functional e-commerce platform with product listings, categories, shopping cart, checkout flow, order management, and an admin panel for product/order management.

### Features
- [ ] Product listing with categories & filters
- [ ] Product detail page with images
- [ ] Session-based shopping cart
- [ ] Add/remove/update cart quantities
- [ ] User checkout with order summary
- [ ] Order history for users
- [ ] Admin product management (CRUD)
- [ ] Admin order management
- [ ] Basic payment integration (Razorpay/PayPal)
- [ ] Search & filter products

### Concepts Used
| Concept | New? |
|---|---|
| Session-based cart logic | 🆕 New |
| Complex MySQL joins | 🆕 New |
| Payment API integration | 🆕 New |
| Advanced search & filtering | 🆕 New |
| Order management system | 🆕 New |
| Multiple image uploads | 🆕 New |

### Pages
```
/                   ← Home / Featured products
/products.php       ← All products with filters
/product/{id}       ← Product detail
/cart.php           ← Shopping cart
/checkout.php       ← Checkout form
/orders.php         ← User order history
/admin/products.php ← Manage products
/admin/orders.php   ← Manage orders
```

### Database Tables
```sql
products (id, name, description, price, stock, category_id, image)
categories (id, name, slug)
cart (id, user_id, product_id, quantity)
orders (id, user_id, total, status, created_at)
order_items (id, order_id, product_id, quantity, price)
```

---

## 👥 04 - Multi-role Web App
> **Status:** 📋 Planned | **Phase:** 4

### Overview
A fully secured multi-role web application with three user roles (Admin, Manager, User), role-based access control, REST API endpoints, AJAX-powered UI, and a complete admin dashboard with statistics.

### Features
- [ ] Three roles: Admin, Manager, User
- [ ] Role-based access control (RBAC)
- [ ] Admin dashboard with charts & stats
- [ ] User management (Admin only)
- [ ] Activity/audit logs
- [ ] REST API endpoints (JSON)
- [ ] AJAX dynamic content loading
- [ ] Full security implementation
- [ ] Export reports to CSV/PDF
- [ ] Real-time notifications (basic)

### Concepts Used
| Concept | New? |
|---|---|
| RBAC (Role-based access control) | 🆕 New |
| REST API with PHP | 🆕 New |
| AJAX + fetch() | 🆕 New |
| Chart.js integration | 🆕 New |
| Activity logging | 🆕 New |
| CSV/PDF export | 🆕 New |
| Full security hardening | 🆕 New |

### Pages
```
/admin/             ← Admin dashboard
/admin/users.php    ← User management
/admin/logs.php     ← Activity logs
/manager/           ← Manager dashboard
/user/              ← User dashboard
/api/users.php      ← REST API endpoint
/api/stats.php      ← Stats API endpoint
```

### Database Tables
```sql
users (id, name, email, password, role, status, created_at)
roles (id, name, permissions)
activity_logs (id, user_id, action, details, created_at)
notifications (id, user_id, message, read_at, created_at)
```

---

## 📈 Concepts Progress Tracker

| Concept | Learned In | Status |
|---|---|---|
| PDO + MySQL | Project 01 | 📋 Pending |
| Sessions & Cookies | Project 01 | 📋 Pending |
| Password hashing | Project 01 | 📋 Pending |
| Token-based auth | Project 01 | 📋 Pending |
| File uploads | Project 02 | 📋 Pending |
| Pagination | Project 02 | 📋 Pending |
| MVC structure | Project 02 | 📋 Pending |
| User roles | Project 02 | 📋 Pending |
| Session cart | Project 03 | 📋 Pending |
| Payment API | Project 03 | 📋 Pending |
| REST API | Project 04 | 📋 Pending |
| AJAX | Project 04 | 📋 Pending |
| RBAC | Project 04 | 📋 Pending |
| Security hardening | Project 04 | 📋 Pending |

---

[← Back to Master README](../README.md)

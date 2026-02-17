# 📚 PHP Full-Stack Roadmap

A structured, concept-first learning roadmap for mastering Pure PHP + MySQL full-stack development in 5-6 months.

---

## 🎯 Learning Philosophy
- **Concept first** - understand before building
- **No framework magic** - pure PHP teaches real fundamentals
- **Project-driven** - every phase ends with a real project
- **Security always** - never learn without security in mind

---

## ⚡ Quick Tech Stack Overview

```
Frontend       HTML, CSS, JavaScript, Bootstrap
Backend        PHP 8+ (Pure, no framework)
Database       MySQL + PDO
Server         Apache (XAMPP / WAMP locally)
Tools          VS Code, phpMyAdmin, Composer
Version Ctrl   Git + GitHub
```

---

## 📅 Phase 1 - Core Foundations (Month 1)

### Week 1: PHP Core Refresh
| Topic | Description | Priority |
|---|---|---|
| PHP syntax & data types | Variables, strings, arrays, loops | ✅ Must |
| Functions | Parameters, return, built-in functions | ✅ Must |
| Include / Require | Splitting code into files | ✅ Must |
| Superglobals | `$_GET`, `$_POST`, `$_SESSION`, `$_FILES` | ✅ Must |
| Error handling | try/catch, error reporting | ✅ Must |
| `~~register_globals~~` | Old, dangerous, deprecated | ❌ Skip |
| `~~mysql_connect()~~` | Outdated, removed in PHP 7 | ❌ Skip |

### Week 2: OOP in PHP
| Topic | Description | Priority |
|---|---|---|
| Classes & objects | Properties, methods, constructors | ✅ Must |
| Encapsulation | Public, private, protected | ✅ Must |
| Inheritance | Extends, parent:: | ✅ Must |
| Interfaces & abstract classes | Contracts for classes | ✅ Must |
| Static methods & properties | `static::`, `self::` | ✅ Must |
| Traits | Code reuse without inheritance | ✅ Must |
| Magic methods | `__construct`, `__toString`, `__get` | ✅ Must |
| `~~Procedural PHP only~~` | Don't build big apps without OOP | ❌ Avoid |

### Week 3: MySQL + PDO
| Topic | Description | Priority |
|---|---|---|
| PDO connection | Connect PHP to MySQL securely | ✅ Must |
| CRUD operations | Create, Read, Update, Delete | ✅ Must |
| Prepared statements | Prevent SQL injection | ✅ Must |
| Fetch modes | `fetchAll()`, `fetch()`, `FETCH_ASSOC` | ✅ Must |
| Transactions | Commit & rollback | ✅ Must |
| Database design | Tables, data types, normalization | ✅ Must |
| Joins | INNER, LEFT, RIGHT joins | ✅ Must |
| `~~mysqli_query()~~` | Old style, use PDO instead | ❌ Skip |

### Week 4: Sessions & Authentication
| Topic | Description | Priority |
|---|---|---|
| Sessions | `session_start()`, `$_SESSION` | ✅ Must |
| Cookies | `setcookie()`, `$_COOKIE` | ✅ Must |
| Password hashing | `password_hash()`, `password_verify()` | ✅ Must |
| Login system | Auth flow, redirect logic | ✅ Must |
| Remember me | Persistent login with secure token | ✅ Must |
| Logout | Destroy session properly | ✅ Must |
| `~~MD5/SHA1 for passwords~~` | Insecure, never use for passwords | ❌ Never |

**✅ Phase 1 Project:** Login & Registration System

---

## 📅 Phase 2 - Full-Stack Skills (Month 2)

### Week 5: File Handling & Uploads
| Topic | Description | Priority |
|---|---|---|
| File upload (`$_FILES`) | Handle uploaded files securely | ✅ Must |
| File type validation | Check MIME type, not just extension | ✅ Must |
| Image resizing | GD library basics | ✅ Must |
| File download | Force download headers | ✅ Must |
| Directory operations | `mkdir()`, `scandir()`, `unlink()` | ✅ Must |

### Week 6: Forms & Validation
| Topic | Description | Priority |
|---|---|---|
| Server-side validation | Validate all input on backend | ✅ Must |
| Client-side validation | HTML5 + JS (UX only, not security) | ✅ Must |
| Sanitization | `htmlspecialchars()`, `filter_var()` | ✅ Must |
| Flash messages | Show success/error after redirect | ✅ Must |
| CSRF protection | Token-based form protection | ✅ Must |

### Week 7: MVC Structure (Without Framework)
| Topic | Description | Priority |
|---|---|---|
| MVC concept | Model, View, Controller pattern | ✅ Must |
| Folder structure | Organize files professionally | ✅ Must |
| Routing (basic) | URL routing without framework | ✅ Must |
| Reusable components | Header, footer, navbar includes | ✅ Must |
| Config file | DB credentials, constants | ✅ Must |

### Week 8: Pagination & Search
| Topic | Description | Priority |
|---|---|---|
| Pagination | LIMIT & OFFSET in SQL | ✅ Must |
| Search functionality | SQL LIKE queries | ✅ Must |
| Sorting & filtering | Dynamic ORDER BY | ✅ Must |
| URL parameters | Clean URLs with `$_GET` | ✅ Must |

**✅ Phase 2 Project:** Blog System (Posts, Comments, Categories)

---

## 📅 Phase 3 - Intermediate Build (Month 3)

| Topic | Description | Priority |
|---|---|---|
| User roles & permissions | Admin, User, Moderator logic | ✅ Must |
| Middleware concept | Auth checks before page loads | ✅ Must |
| Email sending (PHPMailer) | Registration confirm, reset password | ✅ Must |
| Password reset flow | Token-based secure reset | ✅ Must |
| REST API basics | JSON responses, API endpoints | ✅ Must |
| `fetch()` / AJAX | Dynamic requests without reload | ✅ Must |
| Shopping cart logic | Session-based cart | ✅ Must |
| Composer basics | Autoloading, installing packages | ✅ Must |

**✅ Phase 3 Project:** E-Commerce Product Catalog with Cart

---

## 📅 Phase 4 - Advanced Concepts (Month 4)

| Topic | Description | Priority |
|---|---|---|
| Security hardening | Full security audit of your code | ✅ Must |
| Database indexing | Optimize slow queries | ✅ Must |
| Admin dashboard | Charts, user management, reports | ✅ Must |
| Payment integration | Razorpay / PayPal basics | ✅ Nice |
| Maps API | Google Maps integration | ✅ Nice |
| Caching basics | Reduce DB load | ✅ Must |
| `.htaccess` | URL rewriting, security rules | ✅ Must |
| Deployment | Upload to cPanel/shared hosting | ✅ Must |
| `~~Raw SQL without PDO~~` | Always use PDO + prepared statements | ❌ Never |

**✅ Phase 4 Project:** Full Multi-role Web Application

---

## 📅 Phase 5 - Final Year Project (Month 5-6)

- Plan and design database (ER diagram)
- Build with all concepts learned
- Full security implementation
- Clean documentation
- Presentation & demo ready

---

## ❌ What to SKIP (Time Savers)

| Topic | Reason |
|---|---|
| `mysql_*` functions | Removed in PHP 7, use PDO |
| `mysqli` procedural style | Use PDO instead |
| MD5/SHA1 for passwords | Insecure, use `password_hash()` |
| `register_globals` | Deprecated & dangerous |
| Inline CSS in PHP files | Separate concerns properly |
| Mixing HTML & PHP heavily | Use MVC/templates |
| Learning a framework now | Master pure PHP first |

---

## 🛠️ Tools Setup

```
1. XAMPP          - Local server (Apache + MySQL + PHP)
2. VS Code        - Editor with PHP IntelliSense extension
3. phpMyAdmin     - Database GUI (comes with XAMPP)
4. Postman        - API testing
5. Git + GitHub   - Version control
6. Composer       - PHP package manager
```

---

[← Back to Master README](https://github.com/Coddiction-101/php-fullstack/tree/main)

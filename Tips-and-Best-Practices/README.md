# 💡 PHP Tips & Best Practices

Clean code habits, common mistakes to avoid, and professional patterns for Pure PHP development.

## 🏗️ Project Structure (MVC Without Framework)

```plaintext
project/
│
├── app/
│   ├── controllers/      ← Business logic
│   ├── models/           ← Database queries
│   └── views/            ← HTML templates
│
├── config/
│   ├── database.php      ← DB connection
│   └── config.php        ← App constants
│
├── public/               ← Only public folder exposed
│   ├── index.php         ← Entry point
│   ├── assets/
│   │   ├── css/
│   │   ├── js/
│   │   └── images/
│   └── uploads/          ← User uploaded files
│
├── includes/
│   ├── header.php
│   ├── footer.php
│   └── navbar.php
│
├── .htaccess             ← URL rewriting + security
├── .env                  ← Environment variables (never commit!)
└── .gitignore            ← Ignore .env, uploads, vendor
```

---

## ✅ DO's

```php
// ✅ Use PDO always
$pdo = new PDO("mysql:host=localhost;dbname=mydb", $user, $pass);

// ✅ Use config constants
define('DB_HOST', 'localhost');
define('BASE_URL', 'http://localhost/project/');

// ✅ Separate concerns - keep HTML out of PHP logic
$users = $userModel->getAllUsers();
include 'views/users.php';

// ✅ Use meaningful variable names
$userEmail = $_POST['email'];          // Good
$e = $_POST['email'];                  // Bad

// ✅ Always validate before processing
if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email";
}

// ✅ Use require_once for critical files
require_once '../config/database.php';
```

---

## ❌ DON'Ts

```php
// ❌ Never mix heavy PHP logic in HTML files
// ❌ Never use mysql_* functions
// ❌ Never concatenate SQL queries with user input
// ❌ Never store passwords as plain text or MD5
// ❌ Never echo $_GET/$_POST directly
// ❌ Never use error suppression operator @ in production
// ❌ Never commit .env or config files with credentials
// ❌ Never put sensitive files in public folder
```

---

## 🔁 Common PHP Patterns

### Database Connection (Singleton)

```php
class Database {
    private static $instance = null;

    public static function connect() {
        if(self::$instance === null) {
            self::$instance = new PDO(
                "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME,
                DB_USER, DB_PASS,
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );
        }
        return self::$instance;
    }
}

// Usage
$pdo = Database::connect();
```

### Flash Messages

```php
// Set flash message
$_SESSION['flash'] = ['type' => 'success', 'message' => 'Saved!'];

// Display and clear
if(isset($_SESSION['flash'])) {
    echo "<div class='alert alert-{$_SESSION['flash']['type']}'>";
    echo $_SESSION['flash']['message'];
    echo "</div>";
    unset($_SESSION['flash']);
}
```

### Auth Check Middleware

```php
// auth.php - Include at top of protected pages
if(!isset($_SESSION['user_id'])) {
    header('Location: /login.php');
    exit();
}
```

### Pagination

```php
$perPage = 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $perPage;

$stmt = $pdo->prepare("SELECT * FROM posts LIMIT ? OFFSET ?");
$stmt->execute([$perPage, $offset]);
```

---

## 🧹 Code Quality Habits

- Always use `require_once` instead of `include` for critical files  
- Keep functions small and single-purpose  
- Comment complex logic, not obvious code  
- Use consistent naming conventions: `camelCase` for variables, `PascalCase` for classes  
- Always close database connections (or let PDO handle it)  
- Validate input length, type, format — not just empty check  
- Use `exit()` or `die()` after every `header()` redirect  

---

## 🚀 Performance Tips

- Use `SELECT specific_columns` instead of `SELECT *`  
- Index frequently searched columns in MySQL  
- Cache repeated database queries  
- Minimize database calls per page  
- Use pagination — never load all records at once  
- Compress images before storing  
- Minify CSS/JS in production  

---

[← Back to Master README](../README.md)

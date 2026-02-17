# 🔐 PHP Security Checklist

Never ship a PHP project without checking every item here. Security is NOT optional.

## ✅ Authentication & Sessions

- [ ] Use `password_hash()` with `PASSWORD_BCRYPT` - never MD5/SHA1  
- [ ] Use `password_verify()` for login checks  
- [ ] Regenerate session ID after login: `session_regenerate_id(true)`  
- [ ] Destroy session completely on logout  
- [ ] Set session timeout for inactive users  
- [ ] Use secure, httpOnly cookies: `session.cookie_httponly = 1`  
- [ ] Implement account lockout after failed login attempts  
- [ ] Use token-based password reset (not security questions)  

---

## ✅ SQL Injection Prevention

- [ ] Always use PDO with prepared statements  
- [ ] Never concatenate user input into SQL queries  
- [ ] Use parameterized queries for ALL database operations  
- [ ] Validate and sanitize ALL input before using in queries  
- [ ] Limit database user permissions (no root in production)  

```php
// ✅ CORRECT - Prepared statement
$stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
$stmt->execute([$email]);

// ❌ WRONG - Direct concatenation
$result = $pdo->query("SELECT * FROM users WHERE email = '$email'");
```

---

## ✅ XSS Prevention (Cross-Site Scripting)

- [ ] Always escape output: `htmlspecialchars($var, ENT_QUOTES, 'UTF-8')`  
- [ ] Never echo raw user input directly to page  
- [ ] Use Content Security Policy (CSP) headers  
- [ ] Validate input on server side always  

```php
// ✅ CORRECT
echo htmlspecialchars($userInput, ENT_QUOTES, 'UTF-8');

// ❌ WRONG
echo $userInput;
```

---

## ✅ CSRF Protection

- [ ] Generate CSRF token on every form load  
- [ ] Validate token on every POST request  
- [ ] Store token in session, compare on submit  

```php
// Generate token
$_SESSION['csrf_token'] = bin2hex(random_bytes(32));

// In form
<input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">

// Validate on submit
if($_POST['csrf_token'] !== $_SESSION['csrf_token']) die('CSRF attack detected');
```

---

## ✅ File Upload Security

- [ ] Validate file type using MIME type (not just extension)  
- [ ] Rename uploaded files (never keep original name)  
- [ ] Store uploads OUTSIDE webroot if possible  
- [ ] Limit file size on server side  
- [ ] Never execute uploaded files  
- [ ] Scan for malicious content  

```php
// ✅ Check MIME type
$finfo = finfo_open(FILEINFO_MIME_TYPE);
$mimeType = finfo_file($finfo, $_FILES['file']['tmp_name']);
$allowed = ['image/jpeg', 'image/png', 'image/gif'];
if (!in_array($mimeType, $allowed)) die('Invalid file type');
```

---

## ✅ General Security

- [ ] Never show detailed errors in production (`display_errors = Off`)  
- [ ] Log errors to file, not browser  
- [ ] Use HTTPS always in production  
- [ ] Keep PHP and dependencies updated  
- [ ] Remove `phpinfo()` from production  
- [ ] Protect sensitive files with `.htaccess`  
- [ ] Never store plain text passwords - ever  
- [ ] Use `random_bytes()` for tokens (not `rand()`)  
- [ ] Validate ALL input - never trust user data  
- [ ] Use `.env` file for credentials (not hardcoded)  

---

## ✅ Database Security

- [ ] Use separate DB user with minimum permissions  
- [ ] Never use root database user in app  
- [ ] Store DB credentials in config file (outside webroot)  
- [ ] Use transactions for critical operations  
- [ ] Backup database regularly  

---

## ✅ `.htaccess` Security Rules

```apache
# Prevent directory listing
Options -Indexes

# Prevent access to sensitive files
<FilesMatch "\.(env|log|sql|json|md|git)$">
    Order allow,deny
    Deny from all
</FilesMatch>

# Force HTTPS
RewriteEngine On
RewriteCond %{HTTPS} off
RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
```

---

[← Back to Master README](https://github.com/Coddiction-101/php-fullstack/tree/main)

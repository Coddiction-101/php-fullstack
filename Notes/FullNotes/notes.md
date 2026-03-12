---

## 1. Introduction to PHP

### What is PHP?
PHP stands for **"PHP: Hypertext Preprocessor"** (yes, it's a recursive acronym!).

- PHP is a **server-side scripting language** — meaning the code runs on the **web server**, not in the user's browser.
- It was created by **Rasmus Lerdorf** in **1994**.
- PHP is **open-source** and **free** to use.
- PHP powers **~79% of all websites** whose server-side language is known (including WordPress, Facebook originally, Wikipedia).

### How PHP Works — The Simple Flow

```
User Browser  →  Sends Request  →  Web Server (Apache/Nginx)
                                         ↓
                                    PHP Engine runs .php file
                                         ↓
                                    Generates HTML output
                                         ↓
User Browser  ←  Receives HTML  ←  Web Server sends response
```

Think of it this way: PHP is like a **chef in a kitchen** 🍳. The user orders food (sends a request), the chef prepares the meal (PHP processes), and then the finished dish (HTML) is served to the user.

### PHP vs Other Languages

| Feature        | PHP        | Python      | JavaScript (Node) |
|---------------|------------|-------------|-------------------|
| Primary Use   | Web Server | General     | Web (Both sides)  |
| Syntax        | C-like     | Indentation | C-like            |
| Learning Curve| Easy       | Easy        | Moderate          |
| Database      | Excellent  | Good        | Good              |
| Speed         | Fast       | Moderate    | Very Fast         |

### File Extension
PHP files have the `.php` extension. Example: `index.php`, `login.php`

---

## 2. PHP Setup & Environment

### Option 1: XAMPP (Recommended for Beginners)
**XAMPP** = Cross-platform + Apache + MySQL + PHP + Perl

1. Download from [apachefriends.org](https://www.apachefriends.org)
2. Install and start **Apache** and **MySQL** from XAMPP Control Panel
3. Place PHP files in `C:/xampp/htdocs/` (Windows) or `/opt/lampp/htdocs/` (Linux)
4. Access via browser: `http://localhost/yourfile.php`

### Option 2: WAMP (Windows only)
Similar to XAMPP but Windows-only. Download from wampserver.com.

### Option 3: PHP Built-in Server (Quick Testing)
```bash
# Navigate to your project folder and run:
php -S localhost:8000

# Now visit: http://localhost:8000
```

### Checking PHP Version
```bash
php --version
# or in a PHP file:
```
```php
<?php
echo phpversion(); // Outputs something like: 8.2.0
phpinfo();         // Shows ALL PHP configuration details
?>
```

---

## 3. PHP Syntax Basics

### The PHP Tags — Opening and Closing

```php
<?php
  // Your PHP code goes here
?>
```

> 💡 **Key Rule:** PHP code MUST be inside `<?php ... ?>` tags. Everything outside these tags is treated as plain HTML.

### Mixing PHP with HTML

```php
<!DOCTYPE html>
<html>
<body>

<h1>Welcome to my website</h1>

<?php
  $name = "Rahul";
  echo "<p>Hello, " . $name . "!</p>";
?>

<p>This is plain HTML</p>

<?php
  echo "<p>Back to PHP again</p>";
?>

</body>
</html>
```

### The `echo` and `print` Statements

Both display output, but there's a difference:

```php
<?php
// echo - most commonly used, slightly faster
echo "Hello World";
echo "Hello", " ", "World";  // Can take multiple values
echo "<h1>Big Heading</h1>"; // Can output HTML

// print - returns 1, so can be used in expressions
print "Hello World";
// print "a", "b";  // ERROR! print takes only one argument

$result = print "Hello"; // $result will be 1
?>
```

> 📝 **Interview Tip:** `echo` is slightly faster than `print` because `print` has a return value. Use `echo` in practice.

### Comments in PHP

```php
<?php
// This is a single-line comment

# This is also a single-line comment (shell-style)

/*
  This is a
  multi-line comment
*/

/**
 * This is a PHPDoc comment
 * Used for documentation
 * @param string $name The name parameter
 * @return string Returns greeting
 */
function greet($name) {
    return "Hello, " . $name;
}
?>
```

### PHP is Case-Sensitive (Partially!)

```php
<?php
// Variables ARE case-sensitive
$name = "Alice";
$Name = "Bob";
echo $name; // Alice
echo $Name; // Bob — different variable!

// Keywords/Functions are NOT case-sensitive
ECHO "hello";   // Works
Echo "hello";   // Works
echo "hello";   // Works

IF (true) { echo "yes"; }    // Works
if (true) { echo "yes"; }    // Works
?>
```

### Semicolons
Every PHP statement ends with a **semicolon** `;`

```php
<?php
echo "Line 1";   // ✅ Correct
echo "Line 2"    // ❌ Missing semicolon — causes error!
echo "Line 3";
?>
```

---

## 4. Variables & Data Types

### Variables — The Basics

In PHP, variables start with a **dollar sign `$`**

```php
<?php
$age = 25;           // Integer
$name = "Rahul";     // String
$price = 99.99;      // Float
$isStudent = true;   // Boolean
$nothing = null;     // Null
?>
```

### Variable Naming Rules
```php
<?php
$myName = "valid";      // ✅ camelCase — valid
$my_name = "valid";     // ✅ snake_case — valid
$_name = "valid";       // ✅ starts with underscore — valid
$MyName = "valid";      // ✅ PascalCase — valid

// $2name = "invalid";  // ❌ Cannot start with number
// $my-name = "invalid";// ❌ Hyphens not allowed
// $my name = "invalid";// ❌ Spaces not allowed
?>
```

### PHP Data Types — All 8 Types

#### 1. Integer
```php
<?php
$age = 25;
$negative = -10;
$hex = 0x1A;      // Hexadecimal (26 in decimal)
$octal = 0755;    // Octal (493 in decimal)
$binary = 0b1010; // Binary (10 in decimal)

echo gettype($age); // Outputs: integer
var_dump($age);     // Outputs: int(25)
?>
```

#### 2. Float (Double)
```php
<?php
$price = 19.99;
$scientific = 1.5e3;  // 1500
$small = 1.5e-3;      // 0.0015

echo gettype($price); // Outputs: double
var_dump($price);     // Outputs: float(19.99)
?>
```

#### 3. String
```php
<?php
// Single quotes — literal, no variable parsing
$name = 'Rahul';
$text1 = 'Hello $name';     // Outputs: Hello $name

// Double quotes — variables are parsed
$text2 = "Hello $name";     // Outputs: Hello Rahul
$text3 = "Hello {$name}!";  // Outputs: Hello Rahul! (use {} for clarity)

// Heredoc — like double quotes but multiline
$text4 = <<<EOT
Hello $name,
This is a multiline
string!
EOT;

// Nowdoc — like single quotes but multiline
$text5 = <<<'EOT'
Hello $name,
No variable parsing here.
EOT;

echo strlen("Hello"); // String length: 5
?>
```

#### 4. Boolean
```php
<?php
$isLoggedIn = true;
$hasError = false;

// These values are considered FALSE in PHP:
// false, 0, 0.0, "", "0", [], null

// These are considered TRUE:
// true, any non-zero number, non-empty string

var_dump((bool) "");   // bool(false)
var_dump((bool) "0");  // bool(false)
var_dump((bool) "00"); // bool(true) — "00" is NOT "0"
var_dump((bool) []);   // bool(false)
?>
```

#### 5. Array
```php
<?php
$fruits = ["apple", "banana", "mango"];
$person = ["name" => "Rahul", "age" => 25];
?>
```
*(Arrays are covered in detail in Section 9)*

#### 6. Object
```php
<?php
class Car {
    public $brand = "Toyota";
}
$myCar = new Car();
echo $myCar->brand; // Toyota
?>
```
*(OOP covered in detail in Section 14)*

#### 7. NULL
```php
<?php
$var = null;              // Explicitly set to null
$undefined;               // Also null (undefined variable)
$cleared = "hello";
unset($cleared);          // Now $cleared is null/undefined

var_dump(is_null($var));  // bool(true)
?>
```

#### 8. Resource
```php
<?php
// Resource is a special type for external resources
$file = fopen("test.txt", "r"); // $file is a resource
$conn = mysqli_connect(...);     // Database connection is a resource
?>
```

### Type Checking Functions

```php
<?php
$val = 42;

is_int($val);      // true
is_float($val);    // false
is_string($val);   // false
is_bool($val);     // false
is_null($val);     // false
is_array($val);    // false
is_object($val);   // false

gettype($val);     // Returns "integer" as string
var_dump($val);    // int(42) — most detailed, shows type + value
print_r($val);     // 42 — good for arrays/objects
?>
```

### Type Casting (Forcing a Type)

```php
<?php
$str = "42abc";
$num = "3.14";

$int  = (int) $str;    // 42  — takes leading numbers
$flt  = (float) $num;  // 3.14
$str2 = (string) 100;  // "100"
$bool = (bool) 0;      // false
$arr  = (array) "hi";  // ["hi"]

// Using functions
intval("42abc");   // 42
floatval("3.14x"); // 3.14
strval(100);       // "100"

// settype() — changes the type of a variable directly
$var = "42";
settype($var, "integer"); // Now $var is int 42
?>
```

### Variable Variables

```php
<?php
// A variable whose name is stored in another variable!
$varName = "city";
$$varName = "Mumbai";  // Creates $city = "Mumbai"

echo $city;    // Mumbai
echo $$varName; // Mumbai — same thing!
?>
```

### Constants — Variables That Don't Change

```php
<?php
// define() — old way, works anywhere
define("PI", 3.14159);
define("SITE_NAME", "MyWebsite");
define("DB_HOST", "localhost");

echo PI;        // 3.14159
echo SITE_NAME; // MyWebsite

// const — new way, used inside classes or at top level
const VERSION = "1.0.0";
echo VERSION;   // 1.0.0

// PHP predefined constants
echo PHP_VERSION;   // Current PHP version
echo PHP_EOL;       // Line ending (\n on Linux, \r\n on Windows)
echo PHP_INT_MAX;   // Maximum integer value
echo __FILE__;      // Current file path
echo __LINE__;      // Current line number
echo __DIR__;       // Directory of current file
echo __FUNCTION__;  // Current function name
echo __CLASS__;     // Current class name
?>
```

---

## 5. Operators

### Arithmetic Operators

```php
<?php
$a = 10;
$b = 3;

echo $a + $b;  // 13  — Addition
echo $a - $b;  // 7   — Subtraction
echo $a * $b;  // 30  — Multiplication
echo $a / $b;  // 3.333... — Division
echo $a % $b;  // 1   — Modulus (remainder)
echo $a ** $b; // 1000 — Exponentiation (10^3)

// Integer division
echo intdiv(10, 3); // 3 — PHP 7+
?>
```

### Assignment Operators

```php
<?php
$x = 10;

$x += 5;   // $x = $x + 5  → 15
$x -= 3;   // $x = $x - 3  → 12
$x *= 2;   // $x = $x * 2  → 24
$x /= 4;   // $x = $x / 4  → 6
$x %= 4;   // $x = $x % 4  → 2
$x **= 3;  // $x = $x ** 3 → 8

// String concatenation assignment
$str = "Hello";
$str .= " World"; // $str = "Hello World"
?>
```

### Comparison Operators

```php
<?php
$a = 5;
$b = "5";

// == Loose equality (checks value only, ignores type)
var_dump($a == $b);   // true  (5 equals "5" after type juggling)

// === Strict equality (checks value AND type)
var_dump($a === $b);  // false (int 5 !== string "5")

// != Not equal (loose)
var_dump($a != 6);    // true

// !== Not identical (strict)
var_dump($a !== $b);  // true

// < > <= >=
var_dump(5 > 3);      // true
var_dump(5 <= 5);     // true

// Spaceship operator <=> (PHP 7+)
// Returns -1, 0, or 1
echo 1 <=> 2;   // -1 (left is less)
echo 2 <=> 2;   // 0  (equal)
echo 3 <=> 2;   // 1  (left is greater)
?>
```

> 🚨 **Common Interview Trap:**
> ```php
> var_dump(0 == "hello"); // TRUE in older PHP (both convert to 0)
> // In PHP 8, this is FALSE — string doesn't convert to 0 unless it's numeric
> ```

### Logical Operators

```php
<?php
$a = true;
$b = false;

// AND — both must be true
var_dump($a && $b);  // false
var_dump($a and $b); // false (same but lower precedence)

// OR — at least one must be true
var_dump($a || $b);  // true
var_dump($a or $b);  // true (same but lower precedence)

// NOT — reverses the boolean
var_dump(!$a);       // false

// XOR — true if ONLY ONE is true (not both)
var_dump($a xor $b); // true
var_dump($a xor $a); // false (both true = false for xor)
?>
```

> 📝 **`&&` vs `and`:** They do the same thing but have different **operator precedence**. `&&` has higher precedence than `=`, but `and` has lower precedence. This matters in complex expressions.

### String Operators

```php
<?php
$first = "Hello";
$last = "World";

// Concatenation
$full = $first . " " . $last; // "Hello World"

// Concatenation assignment
$full .= "!"; // "Hello World!"

echo $full;
?>
```

### Increment/Decrement Operators

```php
<?php
$a = 5;

echo $a++;  // 5 — Post-increment: use THEN increment
echo $a;    // 6 — Now it's 6

echo ++$a;  // 7 — Pre-increment: increment THEN use
echo $a;    // 7

echo $a--;  // 7 — Post-decrement: use THEN decrement
echo $a;    // 6 — Now it's 6

echo --$a;  // 5 — Pre-decrement: decrement THEN use
?>
```

### Null Coalescing Operator (`??`) — PHP 7+

```php
<?php
// The ?? operator returns left side if it exists and is NOT null
// Otherwise returns right side

$username = $_GET['user'] ?? "Guest";
// If $_GET['user'] exists → use it. Otherwise → "Guest"

$config = null;
$value = $config ?? "default"; // "default"

// Chaining
$val = null ?? null ?? "found!"; // "found!"

// Null coalescing assignment ??= (PHP 7.4+)
$data = null;
$data ??= "fallback"; // Same as: $data = $data ?? "fallback"
echo $data; // "fallback"
?>
```

### Ternary Operator

```php
<?php
// condition ? value_if_true : value_if_false
$age = 20;
$status = ($age >= 18) ? "Adult" : "Minor";
echo $status; // Adult

// Shorthand ternary ?: (Elvis operator)
$name = "" ?: "Anonymous"; // If $name is falsy, use "Anonymous"
echo $name; // Anonymous
?>
```

---

## 6. Control Structures

### if / elseif / else

```php
<?php
$score = 75;

if ($score >= 90) {
    echo "Grade: A";
} elseif ($score >= 80) {
    echo "Grade: B";
} elseif ($score >= 70) {
    echo "Grade: C";
} elseif ($score >= 60) {
    echo "Grade: D";
} else {
    echo "Grade: F";
}
// Output: Grade: C

// One-liner (no curly braces for single statements)
if ($score > 50) echo "Passed";
?>
```

### switch Statement

```php
<?php
$day = "Monday";

switch ($day) {
    case "Monday":
    case "Tuesday":
    case "Wednesday":
    case "Thursday":
    case "Friday":
        echo "Weekday";
        break;  // IMPORTANT! Without break, it falls through to next case

    case "Saturday":
    case "Sunday":
        echo "Weekend";
        break;

    default:
        echo "Invalid day";
        break;
}

// ⚠️ switch uses loose comparison (==)
switch ("0") {
    case false:  // "0" == false → true! This matches!
        echo "matches false";
        break;
}
?>
```

### match Expression — PHP 8.0+

```php
<?php
// match is like switch but:
// 1. Uses strict comparison (===)
// 2. Returns a value
// 3. No fall-through
// 4. Must be exhaustive (or have default)

$status = 2;
$message = match($status) {
    1       => "Active",
    2, 3    => "Pending",  // Multiple conditions
    4       => "Inactive",
    default => "Unknown"
};
echo $message; // Pending

// match throws UnhandledMatchError if no case matches (unlike switch)
?>
```

---

## 7. Loops

### for Loop

```php
<?php
// for (initialization; condition; increment)
for ($i = 0; $i < 5; $i++) {
    echo $i . " "; // 0 1 2 3 4
}

// Countdown
for ($i = 10; $i >= 0; $i -= 2) {
    echo $i . " "; // 10 8 6 4 2 0
}

// Nested loops — multiplication table
for ($i = 1; $i <= 3; $i++) {
    for ($j = 1; $j <= 3; $j++) {
        echo $i * $j . "\t";
    }
    echo "\n";
}
?>
```

### while Loop

```php
<?php
// Runs while condition is TRUE
$count = 1;
while ($count <= 5) {
    echo $count . " "; // 1 2 3 4 5
    $count++;
}

// Classic use: reading database rows
// while ($row = $result->fetch_assoc()) {
//     echo $row['name'];
// }
?>
```

### do-while Loop

```php
<?php
// Executes AT LEAST ONCE, then checks condition
$count = 10;
do {
    echo $count . " "; // Prints 10 even though condition is false
    $count++;
} while ($count < 5);

// Common use: menu systems, login retry
$attempts = 0;
do {
    // Show login form
    $attempts++;
} while ($attempts < 3 && !$loggedIn);
?>
```

### foreach Loop

```php
<?php
// Designed specifically for arrays
$fruits = ["apple", "banana", "mango", "orange"];

// Value only
foreach ($fruits as $fruit) {
    echo $fruit . "\n";
}

// Key => Value
foreach ($fruits as $index => $fruit) {
    echo "$index: $fruit\n";
    // 0: apple
    // 1: banana
    // etc.
}

// Associative arrays
$person = ["name" => "Rahul", "age" => 25, "city" => "Delhi"];
foreach ($person as $key => $value) {
    echo "$key: $value\n";
    // name: Rahul
    // age: 25
    // city: Delhi
}

// Modifying array elements with reference &
$numbers = [1, 2, 3, 4, 5];
foreach ($numbers as &$num) {  // & means "reference"
    $num *= 2;
}
unset($num); // IMPORTANT: unset reference after loop!
print_r($numbers); // [2, 4, 6, 8, 10]
?>
```

### Loop Control: break & continue

```php
<?php
// break — exits the loop entirely
for ($i = 0; $i < 10; $i++) {
    if ($i === 5) break;
    echo $i . " "; // 0 1 2 3 4
}

// continue — skips current iteration, continues loop
for ($i = 0; $i < 10; $i++) {
    if ($i % 2 === 0) continue; // Skip even numbers
    echo $i . " "; // 1 3 5 7 9
}

// break with level (nested loops)
for ($i = 0; $i < 3; $i++) {
    for ($j = 0; $j < 3; $j++) {
        if ($j === 1) break 2; // Break out of BOTH loops
        echo "$i,$j ";
    }
}
// Only prints: 0,0
?>
```

---

## 8. Functions

### Defining and Calling Functions

```php
<?php
// Define a function
function greet() {
    echo "Hello, World!";
}

// Call the function
greet(); // Hello, World!

// Functions can be defined AFTER they're called (unlike variables)
sayHi();
function sayHi() {
    echo "Hi there!"; // This works fine!
}
?>
```

### Functions with Parameters

```php
<?php
// Parameters (what function expects) vs Arguments (what you pass)
function greetUser($name, $greeting) {
    echo "$greeting, $name!";
}

greetUser("Rahul", "Hello");    // Hello, Rahul!
greetUser("Priya", "Namaste");  // Namaste, Priya!

// Default parameter values
function greetUser2($name, $greeting = "Hello") {
    echo "$greeting, $name!";
}
greetUser2("Rahul");           // Hello, Rahul!
greetUser2("Rahul", "Hi");     // Hi, Rahul!

// ⚠️ Default parameters must come AFTER required parameters
// function wrong($a = 1, $b) {} // ERROR!
// function right($a, $b = 1) {} // OK
?>
```

### Return Values

```php
<?php
function add($a, $b) {
    return $a + $b;  // Returns a value to the caller
}

$result = add(5, 3);
echo $result; // 8

// Return stops function execution immediately
function checkAge($age) {
    if ($age < 0) {
        return "Invalid age";
    }
    if ($age < 18) {
        return "Minor";
    }
    return "Adult"; // Only reached if age >= 18
}

echo checkAge(25); // Adult
echo checkAge(-1); // Invalid age

// Functions without return → return null
function noReturn() {
    echo "Just printing";
}
$val = noReturn(); // $val is null
?>
```

### Type Declarations (PHP 7+)

```php
<?php
// Parameter type hints
function add(int $a, int $b): int {
    return $a + $b;
}

function greet(string $name): string {
    return "Hello, $name!";
}

function divide(float $a, float $b): float {
    return $a / $b;
}

function isAdult(int $age): bool {
    return $age >= 18;
}

// Nullable types (PHP 7.1+) — can be the type OR null
function findUser(?int $id): ?string {
    if ($id === null) return null;
    return "User #$id";
}

// Union types (PHP 8.0+)
function processInput(int|string $input): string {
    return (string) $input;
}

// Return void (PHP 7.1+) — function returns nothing
function logMessage(string $msg): void {
    echo $msg;
    // return; // Allowed but no value
    // return 5; // ERROR!
}

// Strict mode — enforce types strictly
declare(strict_types=1); // Must be FIRST line of file
?>
```

### Variable-Length Arguments (Variadic Functions)

```php
<?php
// The ... (spread operator) collects all remaining arguments into an array
function sum(...$numbers) {
    return array_sum($numbers);
}

echo sum(1, 2, 3);          // 6
echo sum(1, 2, 3, 4, 5);    // 15

// Mix normal and variadic
function logMessage(string $level, ...$messages) {
    foreach ($messages as $msg) {
        echo "[$level] $msg\n";
    }
}
logMessage("ERROR", "File not found", "Permission denied");

// Spreading an array into arguments
function add($a, $b, $c) {
    return $a + $b + $c;
}
$nums = [1, 2, 3];
echo add(...$nums); // 6 — spread array as arguments
?>
```

### Pass by Reference

```php
<?php
// By default, PHP passes values (a COPY is made)
function doubleValue($num) {
    $num *= 2; // Only changes the local copy
}
$x = 5;
doubleValue($x);
echo $x; // Still 5!

// Pass by reference with & — works on the ORIGINAL variable
function doubleReference(&$num) {
    $num *= 2; // Changes the original
}
$y = 5;
doubleReference($y);
echo $y; // 10! — original changed

// Real-world use: PHP's built-in sort() works by reference
$arr = [3, 1, 2];
sort($arr); // Sorts the original array
?>
```

### Variable Functions & Callbacks

```php
<?php
// Variable functions — store function name in variable
function sayHello() { echo "Hello!"; }

$func = "sayHello";
$func(); // Calls sayHello() — Hello!

// Anonymous functions (closures)
$greet = function($name) {
    return "Hello, $name!";
};
echo $greet("Rahul"); // Hello, Rahul!

// Arrow functions (PHP 7.4+) — short syntax, auto-captures outer scope
$multiplier = 3;
$multiply = fn($n) => $n * $multiplier; // No need for 'use'
echo $multiply(5); // 15

// Traditional closure — must use 'use' to capture outer variable
$multiplier = 3;
$multiply = function($n) use ($multiplier) {
    return $n * $multiplier;
};
echo $multiply(5); // 15

// Callbacks with built-in functions
$numbers = [3, 1, 4, 1, 5, 9, 2];
$evens = array_filter($numbers, fn($n) => $n % 2 === 0);
$doubled = array_map(fn($n) => $n * 2, $numbers);
?>
```

### Recursive Functions

```php
<?php
// A function that calls itself
function factorial($n) {
    // Base case — MUST have this to prevent infinite recursion
    if ($n <= 1) return 1;

    // Recursive case
    return $n * factorial($n - 1);
}

echo factorial(5); // 5*4*3*2*1 = 120

// Fibonacci sequence
function fibonacci($n) {
    if ($n <= 1) return $n;
    return fibonacci($n - 1) + fibonacci($n - 2);
}
echo fibonacci(10); // 55

// ⚠️ PHP default recursion limit is 100-200 levels
// Use iteration for deeply recursive problems
?>
```

### Variable Scope

```php
<?php
$globalVar = "I'm global";

function testScope() {
    // echo $globalVar; // ❌ ERROR! — not accessible inside function

    // To access global variable inside function:
    global $globalVar;
    echo $globalVar; // ✅ Works now

    // Or use $GLOBALS superglobal
    echo $GLOBALS['globalVar']; // Also works
}

// Static variables — retain value between function calls
function counter() {
    static $count = 0; // Initialized only ONCE
    $count++;
    echo $count . " ";
}
counter(); // 1
counter(); // 2
counter(); // 3
// Without static, would print 1 1 1
?>
```

---

## 9. Arrays

Arrays are one of the most important data structures in PHP!

### Types of Arrays

#### Indexed Arrays (Numeric Keys)
```php
<?php
// Creating indexed arrays
$fruits = ["apple", "banana", "mango"]; // Short syntax (PHP 5.4+)
$colors = array("red", "green", "blue"); // Old syntax

// Accessing elements (0-indexed)
echo $fruits[0]; // apple
echo $fruits[2]; // mango

// Adding elements
$fruits[] = "orange";        // Appends to end
$fruits[10] = "grape";       // Creates index 10 (not 4!)
array_push($fruits, "kiwi"); // Appends using function

// Counting
echo count($fruits); // Total elements
?>
```

#### Associative Arrays (Named Keys)
```php
<?php
// Key-value pairs — like dictionaries/hashmaps
$person = [
    "name"  => "Rahul Sharma",
    "age"   => 25,
    "city"  => "Mumbai",
    "email" => "rahul@example.com"
];

// Accessing
echo $person["name"]; // Rahul Sharma
echo $person["age"];  // 25

// Adding/updating
$person["phone"] = "9876543210"; // Add new key
$person["age"] = 26;             // Update existing key

// Removing
unset($person["email"]);

// Check if key exists
if (isset($person["name"])) {
    echo "Name is set";
}
if (array_key_exists("city", $person)) {
    echo "City exists";
}
?>
```

#### Multidimensional Arrays (Arrays of Arrays)
```php
<?php
// 2D Array — array of arrays
$students = [
    ["name" => "Alice", "grade" => "A", "score" => 95],
    ["name" => "Bob",   "grade" => "B", "score" => 82],
    ["name" => "Carol", "grade" => "A", "score" => 91],
];

// Accessing 2D array
echo $students[0]["name"];  // Alice
echo $students[1]["score"]; // 82

// 3D Array
$school = [
    "ClassA" => [
        "students" => ["Alice", "Bob"],
        "teacher"  => "Mr. Smith"
    ],
    "ClassB" => [
        "students" => ["Carol", "Dave"],
        "teacher"  => "Ms. Jones"
    ]
];
echo $school["ClassA"]["teacher"];       // Mr. Smith
echo $school["ClassB"]["students"][0];   // Carol

// Loop through multidimensional
foreach ($students as $student) {
    echo "{$student['name']}: {$student['score']}\n";
}
?>
```

### Essential Array Functions

```php
<?php
$arr = [3, 1, 4, 1, 5, 9, 2, 6, 5, 3];

// Sorting
sort($arr);          // Sort ascending (reindexes)
rsort($arr);         // Sort descending (reindexes)
asort($arr);         // Sort ascending (keeps keys)
arsort($arr);        // Sort descending (keeps keys)
ksort($arr);         // Sort by keys ascending
krsort($arr);        // Sort by keys descending

// Assoc sort
$person = ["banana" => 2, "apple" => 5, "mango" => 1];
asort($person);  // Sort by value: mango(1), banana(2), apple(5)
ksort($person);  // Sort by key: apple, banana, mango

// Searching
$fruits = ["apple", "banana", "mango"];
echo in_array("banana", $fruits);       // true
echo array_search("banana", $fruits);   // 1 (index)

// Slicing & Splicing
$slice = array_slice($fruits, 1, 2);    // ["banana", "mango"]
array_splice($fruits, 1, 1, ["kiwi"]); // Replace banana with kiwi

// Merging
$a = [1, 2, 3];
$b = [4, 5, 6];
$merged = array_merge($a, $b);   // [1,2,3,4,5,6]
$merged = [...$a, ...$b];        // Same using spread (PHP 7.4+)

// Unique values
$dupes = [1, 2, 2, 3, 3, 3, 4];
$unique = array_unique($dupes);  // [1, 2, 3, 4]

// Keys and Values
$keys   = array_keys($person);   // ["banana", "apple", "mango"]
$values = array_values($person); // [2, 5, 1]

// Flip keys and values
$flipped = array_flip(["a" => 1, "b" => 2]); // [1 => "a", 2 => "b"]

// Functional operations
$numbers = [1, 2, 3, 4, 5];

$doubled  = array_map(fn($n) => $n * 2, $numbers);     // [2,4,6,8,10]
$evens    = array_filter($numbers, fn($n) => $n % 2 === 0); // [2,4]
$sum      = array_reduce($numbers, fn($carry, $n) => $carry + $n, 0); // 15

// Splitting
$chunks = array_chunk([1,2,3,4,5], 2); // [[1,2],[3,4],[5]]

// Filling
$filled = array_fill(0, 5, "X"); // ["X","X","X","X","X"]

// Combining arrays
$keys = ["a", "b", "c"];
$vals = [1, 2, 3];
$combined = array_combine($keys, $vals); // ["a"=>1, "b"=>2, "c"=>3]

// Counting values
$letters = ["a", "b", "a", "c", "b", "a"];
$counts = array_count_values($letters); // ["a"=>3, "b"=>2, "c"=>1]

// Stack operations (LIFO)
array_push($arr, "item");   // Add to end
$last = array_pop($arr);    // Remove from end

// Queue operations (FIFO)
array_unshift($arr, "item"); // Add to beginning (reindexes)
$first = array_shift($arr);  // Remove from beginning (reindexes)

// Reversing
$reversed = array_reverse([1, 2, 3]); // [3, 2, 1]

// Custom sort
usort($students, fn($a, $b) => $a['score'] <=> $b['score']); // Sort by score
?>
```

---

## 10. Strings

### String Creation & Basics

```php
<?php
$str = "Hello, World!";

// Length
echo strlen($str); // 13

// Accessing characters (like arrays!)
echo $str[0];  // H
echo $str[-1]; // ! (negative index from end, PHP 7.1+)

// Case manipulation
echo strtolower("HELLO");      // hello
echo strtoupper("hello");      // HELLO
echo ucfirst("hello world");   // Hello world (first char)
echo ucwords("hello world");   // Hello World (each word)
echo lcfirst("Hello");         // hEllo

// Trimming whitespace
echo trim("  hello  ");        // "hello"
echo ltrim("  hello  ");       // "hello  " (left trim)
echo rtrim("  hello  ");       // "  hello" (right trim)
echo trim("***hello***", "*"); // "hello" (trim specific chars)
?>
```

### String Searching

```php
<?php
$str = "The quick brown fox jumps over the lazy dog";

// Find position of substring
echo strpos($str, "fox");   // 16 (first occurrence, case-sensitive)
echo strrpos($str, "the");  // 31 (last occurrence)
echo stripos($str, "THE");  // 0  (case-insensitive search)

// strpos returns false if not found — use === for comparison!
if (strpos($str, "cat") === false) {
    echo "cat not found";
}

// str_contains (PHP 8.0+) — much cleaner!
if (str_contains($str, "fox")) {
    echo "fox found!";
}

// str_starts_with, str_ends_with (PHP 8.0+)
echo str_starts_with($str, "The");  // true
echo str_ends_with($str, "dog");    // true

// Extract substring
echo substr($str, 4, 5);    // "quick" (start, length)
echo substr($str, -3);      // "dog" (from end)

// Count occurrences
echo substr_count($str, "the"); // 2 (case-sensitive: finds "the", "the")
?>
```

### String Replacement

```php
<?php
$str = "Hello World";

// str_replace (case-sensitive)
echo str_replace("World", "PHP", $str);  // Hello PHP

// str_ireplace (case-insensitive)
echo str_ireplace("WORLD", "PHP", $str); // Hello PHP

// Replace multiple things at once
echo str_replace(
    ["Hello", "World"],
    ["Hi",    "Earth"],
    "Hello World"
); // Hi Earth

// substr_replace — replace part of string by position
echo substr_replace("Hello World", "PHP", 6, 5); // Hello PHP
// Starts at position 6, replaces 5 chars

// preg_replace — replace using regex
echo preg_replace("/\d+/", "#", "Call 123 or 456"); // Call # or #
?>
```

### String Splitting & Joining

```php
<?php
// Split string into array
$csv = "apple,banana,mango,orange";
$fruits = explode(",", $csv);     // ["apple","banana","mango","orange"]
$first2 = explode(",", $csv, 2);  // ["apple","banana,mango,orange"] (limit)

// Join array into string
$arr = ["apple", "banana", "mango"];
echo implode(", ", $arr);   // "apple, banana, mango"
echo join(" | ", $arr);     // "apple | banana | mango" (alias of implode)

// Split into characters
$chars = str_split("Hello");     // ["H","e","l","l","o"]
$pairs = str_split("Hello", 2);  // ["He","ll","o"] (chunk by 2)

// Split by regex
$parts = preg_split("/[\s,]+/", "one two,  three"); // ["one","two","three"]
?>
```

### String Formatting

```php
<?php
// printf — format and print
printf("Hello, %s! You are %d years old.", "Rahul", 25);
// Hello, Rahul! You are 25 years old.

// sprintf — format and RETURN (don't print)
$formatted = sprintf("Price: $%.2f", 19.9); // "Price: $19.90"
$padded = sprintf("%05d", 42);              // "00042" (pad with zeros)

// Format specifiers:
// %s — string
// %d — integer
// %f — float
// %b — binary
// %o — octal
// %x — hexadecimal
// %.2f — float with 2 decimal places
// %05d — integer padded to 5 digits with zeros

// number_format
echo number_format(1234567.891, 2, ".", ","); // 1,234,567.89

// Padding
echo str_pad("42", 5);          // "42   " (right-pad with spaces)
echo str_pad("42", 5, "0", STR_PAD_LEFT);  // "00042"
echo str_pad("hi", 10, "-+", STR_PAD_BOTH); // "----hi----"

// Repeat
echo str_repeat("abc", 3); // abcabcabc
?>
```

### Regular Expressions

```php
<?php
// preg_match — test if pattern exists
if (preg_match("/^\d{10}$/", "9876543210")) {
    echo "Valid 10-digit number";
}

// Common regex patterns
$patterns = [
    "email"  => "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/",
    "phone"  => "/^\+?[0-9]{10,13}$/",
    "url"    => "/^https?:\/\/.+\..+/",
    "date"   => "/^\d{4}-\d{2}-\d{2}$/",   // YYYY-MM-DD
];

// preg_match with capture groups
$date = "2024-01-15";
if (preg_match("/(\d{4})-(\d{2})-(\d{2})/", $date, $matches)) {
    // $matches[0] = "2024-01-15" (full match)
    // $matches[1] = "2024" (group 1)
    // $matches[2] = "01"   (group 2)
    // $matches[3] = "15"   (group 3)
    echo "Year: {$matches[1]}, Month: {$matches[2]}, Day: {$matches[3]}";
}

// preg_match_all — find all matches
$html = '<a href="url1">Link1</a> <a href="url2">Link2</a>';
preg_match_all('/href="([^"]+)"/', $html, $matches);
print_r($matches[1]); // ["url1", "url2"]

// preg_replace — replace using regex
$cleaned = preg_replace("/\s+/", " ", "Hello    World"); // "Hello World"
?>
```

---

## 11. Superglobals

Superglobals are built-in variables always accessible, regardless of scope!

### `$_GET` — URL Parameters

```php
<?php
// URL: http://example.com/page.php?name=Rahul&age=25

$name = $_GET['name'] ?? 'Guest'; // Rahul
$age  = $_GET['age']  ?? 0;       // 25

// ALWAYS sanitize GET data!
$safeName = htmlspecialchars($_GET['name'] ?? '');

echo "Hello, $safeName!";
?>
```

### `$_POST` — Form Data

```php
<?php
// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Always sanitize!
    $username = trim(htmlspecialchars($username));

    echo "Username: $username";
}
?>

<!-- HTML Form -->
<form method="POST" action="">
    <input type="text" name="username" placeholder="Username">
    <input type="password" name="password" placeholder="Password">
    <button type="submit">Login</button>
</form>
```

### `$_REQUEST` — GET + POST + COOKIE

```php
<?php
// Contains data from $_GET, $_POST, and $_COOKIE
// Avoid using — use specific superglobals for clarity and security
$name = $_REQUEST['name'] ?? '';
?>
```

### `$_SERVER` — Server Information

```php
<?php
echo $_SERVER['PHP_SELF'];       // Current script path: /page.php
echo $_SERVER['SERVER_NAME'];    // Server name: localhost
echo $_SERVER['HTTP_HOST'];      // HTTP host: example.com
echo $_SERVER['REQUEST_METHOD']; // GET or POST
echo $_SERVER['REMOTE_ADDR'];    // Visitor's IP address
echo $_SERVER['HTTP_USER_AGENT']; // Browser info
echo $_SERVER['QUERY_STRING'];   // URL query string
echo $_SERVER['REQUEST_URI'];    // Full URI: /page.php?id=1
echo $_SERVER['DOCUMENT_ROOT'];  // Server's root directory
echo $_SERVER['HTTPS'];          // "on" if HTTPS
?>
```

### `$_FILES` — File Uploads

```php
<?php
if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $tmpFile  = $_FILES['image']['tmp_name'];
    $fileName = basename($_FILES['image']['name']);
    $fileSize = $_FILES['image']['size'];
    $fileType = $_FILES['image']['type'];

    // Validate and move
    $uploadDir = "uploads/";
    move_uploaded_file($tmpFile, $uploadDir . $fileName);
}
?>

<form method="POST" enctype="multipart/form-data">
    <input type="file" name="image">
    <button>Upload</button>
</form>
```

### `$_ENV` — Environment Variables

```php
<?php
// Access environment variables (set in server config or .env)
$dbHost = $_ENV['DB_HOST'] ?? 'localhost';
$dbPass = getenv('DB_PASSWORD'); // Alternative method
?>
```

---

## 12. Forms & User Input

### Form Handling Best Practices

```php
<?php
// ===== SANITIZATION =====
// Clean input to remove unwanted content
$name  = trim($_POST['name'] ?? '');          // Remove whitespace
$name  = stripslashes($name);                  // Remove backslashes
$name  = htmlspecialchars($name);             // Convert HTML to entities
// < becomes &lt;   > becomes &gt;   " becomes &quot;

// Shorthand with filter_var
$email  = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$int    = filter_var($_POST['age'], FILTER_SANITIZE_NUMBER_INT);
$url    = filter_var($_POST['url'], FILTER_SANITIZE_URL);

// ===== VALIDATION =====
// Check if data is in expected format
$errors = [];

if (empty($name)) {
    $errors[] = "Name is required";
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email address";
}

if (!filter_var($age, FILTER_VALIDATE_INT, ["options" => ["min_range" => 1, "max_range" => 150]])) {
    $errors[] = "Age must be between 1 and 150";
}

if (!filter_var($url, FILTER_VALIDATE_URL)) {
    $errors[] = "Invalid URL";
}

// Display errors or process
if (!empty($errors)) {
    foreach ($errors as $error) {
        echo "<p style='color:red'>$error</p>";
    }
} else {
    echo "Form is valid! Processing...";
}
?>
```

### Complete Registration Form Example

```php
<?php
$errors = [];
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get and sanitize inputs
    $name     = htmlspecialchars(trim($_POST['name'] ?? ''));
    $email    = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'] ?? '';
    $confirm  = $_POST['confirm_password'] ?? '';
    $age      = (int)($_POST['age'] ?? 0);

    // Validate
    if (strlen($name) < 2) {
        $errors[] = "Name must be at least 2 characters";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email";
    }

    if (strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters";
    }

    if ($password !== $confirm) {
        $errors[] = "Passwords do not match";
    }

    if ($age < 18) {
        $errors[] = "You must be 18 or older";
    }

    // If no errors, process registration
    if (empty($errors)) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        // Save to database...
        $success = true;
    }
}
?>

<!DOCTYPE html>
<html>
<body>

<?php if ($success): ?>
    <div style="color:green">Registration successful!</div>
<?php else: ?>
    <?php foreach ($errors as $error): ?>
        <div style="color:red"><?= $error ?></div>
    <?php endforeach; ?>

    <form method="POST">
        <input type="text" name="name" value="<?= htmlspecialchars($_POST['name'] ?? '') ?>">
        <input type="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
        <input type="password" name="password">
        <input type="password" name="confirm_password">
        <input type="number" name="age">
        <button type="submit">Register</button>
    </form>
<?php endif; ?>

</body>
</html>
```

---

## 13. File Handling

### Reading Files

```php
<?php
// Read entire file into string
$content = file_get_contents("data.txt");
echo $content;

// Read file into array (each line = one element)
$lines = file("data.txt");
foreach ($lines as $lineNum => $line) {
    echo "Line $lineNum: $line";
}

// Open file manually for more control
$handle = fopen("data.txt", "r"); // r = read only
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        echo $line;
    }
    fclose($handle); // ALWAYS close file!
}

// Read fixed-length chunk
$handle = fopen("data.txt", "r");
$chunk = fread($handle, 1024); // Read 1024 bytes
fclose($handle);

// Read single character
$char = fgetc($handle);
?>
```

### Writing Files

```php
<?php
// Simple write (overwrites existing content)
file_put_contents("output.txt", "Hello, World!\n");

// Append to file
file_put_contents("output.txt", "New line\n", FILE_APPEND);

// Write with fopen for more control
$handle = fopen("output.txt", "w"); // w = write (overwrite)
fwrite($handle, "Line 1\n");
fwrite($handle, "Line 2\n");
fclose($handle);

// File modes:
// "r"  — Read only, file must exist
// "w"  — Write only, creates file, OVERWRITES existing
// "a"  — Append, creates file, adds to end
// "r+" — Read and write, file must exist
// "w+" — Read and write, creates file, OVERWRITES
// "a+" — Read and append, creates file
// "x"  — Write only, creates file, FAILS if exists

// Write CSV
$data = [
    ["Name", "Age", "City"],
    ["Rahul", 25, "Mumbai"],
    ["Priya", 23, "Delhi"],
];
$handle = fopen("data.csv", "w");
foreach ($data as $row) {
    fputcsv($handle, $row);
}
fclose($handle);
?>
```

### File Operations

```php
<?php
// Check if file exists
if (file_exists("test.txt")) {
    echo "File exists!";
}

// File information
echo filesize("test.txt");          // Size in bytes
echo filemtime("test.txt");         // Last modified time (Unix timestamp)
echo date("Y-m-d", filemtime("test.txt")); // Human-readable date

// File type checks
is_file("test.txt");      // Is it a regular file?
is_dir("uploads");        // Is it a directory?
is_readable("test.txt");  // Can we read it?
is_writable("test.txt"); // Can we write to it?

// Copy, rename, delete
copy("source.txt", "destination.txt");
rename("old.txt", "new.txt");  // Also works as move!
unlink("delete_me.txt");       // Delete file

// Directory operations
mkdir("new_folder");              // Create directory
mkdir("deep/nested/dir", 0755, true); // Create nested dirs (recursive=true)
rmdir("empty_folder");            // Remove empty directory

// List directory contents
$files = scandir("uploads/");     // Returns array of filenames
foreach ($files as $file) {
    if ($file !== "." && $file !== "..") {
        echo $file . "\n";
    }
}

// More powerful: glob()
$phpFiles = glob("*.php");       // All .php files in current dir
$allFiles = glob("uploads/*");   // All files in uploads/
?>
```

---

## 14. Object-Oriented PHP (OOP)

OOP is about organizing code into **classes** (blueprints) and **objects** (instances).

Think of a **class** like a blueprint for a house 🏠, and an **object** like an actual house built from that blueprint.

### Classes and Objects

```php
<?php
// Defining a class
class Car {
    // Properties (attributes/fields)
    public string $brand;
    public string $color;
    public int $speed = 0; // Default value

    // Constructor — called when object is created
    public function __construct(string $brand, string $color) {
        $this->brand = $brand; // $this refers to the current object
        $this->color = $color;
    }

    // Methods (functions inside a class)
    public function accelerate(int $amount): void {
        $this->speed += $amount;
        echo "{$this->brand} accelerates to {$this->speed} km/h\n";
    }

    public function brake(): void {
        $this->speed = max(0, $this->speed - 10);
    }

    public function describe(): string {
        return "I am a {$this->color} {$this->brand}";
    }
}

// Creating objects (instances)
$car1 = new Car("Toyota", "Red");
$car2 = new Car("Honda", "Blue");

// Accessing properties and methods
echo $car1->brand;         // Toyota
echo $car1->describe();    // I am a Red Toyota
$car1->accelerate(60);     // Toyota accelerates to 60 km/h
$car2->accelerate(80);     // Honda accelerates to 80 km/h

// Objects are independent!
echo $car1->speed; // 60
echo $car2->speed; // 80
?>
```

### Access Modifiers

```php
<?php
class BankAccount {
    public string $owner;       // Accessible anywhere
    protected float $balance;   // Accessible in class + subclasses
    private string $pin;        // Accessible ONLY in this class

    public function __construct(string $owner, float $balance, string $pin) {
        $this->owner   = $owner;
        $this->balance = $balance;
        $this->pin     = $pin;
    }

    // Getter — controlled access to private property
    public function getBalance(): float {
        return $this->balance;
    }

    // Setter — controlled modification with validation
    public function deposit(float $amount): void {
        if ($amount <= 0) {
            throw new InvalidArgumentException("Amount must be positive");
        }
        $this->balance += $amount;
    }

    private function validatePin(string $pin): bool {
        return $this->pin === $pin;
    }

    public function withdraw(float $amount, string $pin): bool {
        if (!$this->validatePin($pin)) {
            echo "Invalid PIN!";
            return false;
        }
        if ($amount > $this->balance) {
            echo "Insufficient funds!";
            return false;
        }
        $this->balance -= $amount;
        return true;
    }
}

$account = new BankAccount("Rahul", 10000, "1234");
echo $account->owner;            // ✅ public
echo $account->getBalance();     // ✅ via public method
// echo $account->balance;       // ❌ Error — protected
// echo $account->pin;           // ❌ Error — private
$account->withdraw(500, "1234"); // ✅ public method
?>
```

### Inheritance

```php
<?php
// Parent (Base) class
class Animal {
    protected string $name;
    protected string $sound;

    public function __construct(string $name, string $sound) {
        $this->name  = $name;
        $this->sound = $sound;
    }

    public function speak(): string {
        return "{$this->name} says {$this->sound}!";
    }

    public function eat(): string {
        return "{$this->name} is eating.";
    }
}

// Child (Derived) class — inherits Animal
class Dog extends Animal {
    private string $breed;

    public function __construct(string $name, string $breed) {
        parent::__construct($name, "Woof"); // Call parent constructor
        $this->breed = $breed;
    }

    // Override parent method
    public function speak(): string {
        return "{$this->name} ({$this->breed}) barks: {$this->sound}!";
    }

    // New method specific to Dog
    public function fetch(): string {
        return "{$this->name} fetches the ball!";
    }
}

class Cat extends Animal {
    public function __construct(string $name) {
        parent::__construct($name, "Meow");
    }

    // Override parent method
    public function speak(): string {
        return parent::speak() . " (cat version)"; // Call parent method
    }
}

$dog = new Dog("Buddy", "Labrador");
$cat = new Cat("Whiskers");

echo $dog->speak();  // Buddy (Labrador) barks: Woof!
echo $dog->eat();    // Buddy is eating. (inherited)
echo $dog->fetch();  // Buddy fetches the ball!

echo $cat->speak();  // Whiskers says Meow! (cat version)

// instanceof checks class/inheritance
echo ($dog instanceof Dog);    // true
echo ($dog instanceof Animal); // true — Dog inherits from Animal
echo ($cat instanceof Dog);    // false
?>
```

### Abstract Classes

```php
<?php
// Abstract class — cannot be instantiated, must be extended
abstract class Shape {
    abstract public function area(): float;    // Must be implemented by children
    abstract public function perimeter(): float;

    // Concrete method (shared by all shapes)
    public function describe(): string {
        return "I am a " . get_class($this) .
               " with area " . round($this->area(), 2);
    }
}

class Circle extends Shape {
    public function __construct(private float $radius) {}

    public function area(): float {
        return M_PI * $this->radius ** 2;
    }

    public function perimeter(): float {
        return 2 * M_PI * $this->radius;
    }
}

class Rectangle extends Shape {
    public function __construct(
        private float $width,
        private float $height
    ) {}

    public function area(): float {
        return $this->width * $this->height;
    }

    public function perimeter(): float {
        return 2 * ($this->width + $this->height);
    }
}

// $shape = new Shape(); // ❌ ERROR — cannot instantiate abstract class

$circle = new Circle(5);
$rect   = new Rectangle(4, 6);

echo $circle->area();       // ~78.54
echo $circle->describe();   // I am a Circle with area 78.54
echo $rect->perimeter();    // 20
?>
```

### Interfaces

```php
<?php
// Interface — a CONTRACT that classes must follow
// All methods are abstract and public by default

interface Printable {
    public function print(): void;
}

interface Saveable {
    public function save(): bool;
    public function load(int $id): static;
}

// A class can implement MULTIPLE interfaces (unlike inheritance)
class Document implements Printable, Saveable {
    public function __construct(
        private string $content,
        private int $id = 0
    ) {}

    public function print(): void {
        echo $this->content;
    }

    public function save(): bool {
        // Save to database
        echo "Saving document...";
        return true;
    }

    public function load(int $id): static {
        // Load from database
        return new static("Loaded content", $id);
    }
}

// Interface can extend other interfaces
interface AdvancedPrintable extends Printable {
    public function printFormatted(string $format): void;
}
?>
```

### Traits — Reusable Code Blocks

```php
<?php
// Traits solve the problem of multiple inheritance
// A class can only extend ONE class but can USE multiple traits

trait Timestamps {
    private DateTime $createdAt;
    private DateTime $updatedAt;

    public function setCreatedAt(): void {
        $this->createdAt = new DateTime();
    }

    public function getCreatedAt(): string {
        return $this->createdAt->format("Y-m-d H:i:s");
    }
}

trait SoftDelete {
    private ?DateTime $deletedAt = null;

    public function delete(): void {
        $this->deletedAt = new DateTime();
    }

    public function isDeleted(): bool {
        return $this->deletedAt !== null;
    }

    public function restore(): void {
        $this->deletedAt = null;
    }
}

class Post {
    use Timestamps, SoftDelete; // Use multiple traits

    public function __construct(public string $title) {
        $this->setCreatedAt();
    }
}

$post = new Post("Hello World");
echo $post->getCreatedAt();  // Current datetime
$post->delete();
echo $post->isDeleted() ? "Deleted" : "Active"; // Deleted
$post->restore();
echo $post->isDeleted() ? "Deleted" : "Active"; // Active
?>
```

### Static Properties and Methods

```php
<?php
class Counter {
    private static int $count = 0; // Shared across ALL instances

    public function __construct() {
        self::$count++; // self:: for same class, parent:: for parent
    }

    public static function getCount(): int {
        return self::$count;
    }

    public static function reset(): void {
        self::$count = 0;
    }
}

$a = new Counter();
$b = new Counter();
$c = new Counter();

echo Counter::getCount(); // 3 — accessed via class name, not object
Counter::reset();
echo Counter::getCount(); // 0
?>
```

### Magic Methods

```php
<?php
class MagicExample {
    private array $data = [];

    // Called when creating object
    public function __construct(array $data = []) {
        $this->data = $data;
    }

    // Called when object is destroyed
    public function __destruct() {
        echo "Object destroyed\n";
    }

    // Called when converting object to string
    public function __toString(): string {
        return json_encode($this->data);
    }

    // Called when accessing undefined/private property
    public function __get(string $name): mixed {
        return $this->data[$name] ?? null;
    }

    // Called when setting undefined/private property
    public function __set(string $name, mixed $value): void {
        $this->data[$name] = $value;
    }

    // Called when using isset() on undefined property
    public function __isset(string $name): bool {
        return isset($this->data[$name]);
    }

    // Called when using unset() on undefined property
    public function __unset(string $name): void {
        unset($this->data[$name]);
    }

    // Called when invoking object like a function
    public function __invoke(string $input): string {
        return "Invoked with: $input";
    }

    // Called when using undefined method — method overloading
    public function __call(string $name, array $args): mixed {
        echo "Called undefined method: $name\n";
        return null;
    }

    // Called for static undefined method
    public static function __callStatic(string $name, array $args): mixed {
        echo "Called static undefined method: $name\n";
        return null;
    }
}

$obj = new MagicExample();
$obj->name = "Rahul";       // __set
echo $obj->name;            // __get → Rahul
echo isset($obj->name);     // __isset → true
echo $obj;                  // __toString → {"name":"Rahul"}
echo $obj("hello");         // __invoke → Invoked with: hello
$obj->nonExistentMethod();  // __call
MagicExample::staticMethod(); // __callStatic
// Object destroyed → __destruct called automatically at end
?>
```

### Constructor Promotion (PHP 8.0+)

```php
<?php
// Old way — lots of repetition
class OldStyle {
    public string $name;
    public int $age;
    private string $email;

    public function __construct(string $name, int $age, string $email) {
        $this->name  = $name;
        $this->age   = $age;
        $this->email = $email;
    }
}

// New way — constructor promotion!
class NewStyle {
    public function __construct(
        public string $name,
        public int $age,
        private string $email
    ) {} // That's it! PHP creates and assigns properties automatically
}

$person = new NewStyle("Rahul", 25, "rahul@example.com");
echo $person->name; // Rahul
echo $person->age;  // 25
?>
```

### Enums (PHP 8.1+)

```php
<?php
// Basic enum
enum Status {
    case Active;
    case Inactive;
    case Pending;
}

$status = Status::Active;
echo $status->name; // "Active"

// Backed enum — with values
enum Color: string {
    case Red   = 'red';
    case Green = 'green';
    case Blue  = 'blue';
}

echo Color::Red->value; // "red"
$color = Color::from('green'); // Color::Green
$color = Color::tryFrom('purple'); // null (doesn't exist)

// Int-backed enum
enum Priority: int {
    case Low    = 1;
    case Medium = 2;
    case High   = 3;
}

// Enum with methods
enum Suit: string {
    case Hearts   = 'H';
    case Diamonds = 'D';
    case Clubs    = 'C';
    case Spades   = 'S';

    public function color(): string {
        return match($this) {
            Suit::Hearts, Suit::Diamonds => 'Red',
            Suit::Clubs, Suit::Spades   => 'Black',
        };
    }
}

echo Suit::Hearts->color(); // Red
?>
```

---

## 15. Error Handling & Exceptions

### Error Types in PHP

```
Parse Error    — Syntax error (unclosed bracket, typo)
Fatal Error    — Cannot continue (undefined function, class)
Warning        — Continues but something is wrong
Notice         — Minor issue (undefined variable)
Deprecated     — Feature will be removed in future version
```

### Error Reporting

```php
<?php
// Show ALL errors (development only!)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Production — log errors but don't display
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', '/path/to/error.log');

// Suppress a specific error with @ (not recommended)
$value = @file_get_contents("missing.txt"); // Suppresses warning
?>
```

### Try / Catch / Finally

```php
<?php
// Try-Catch is how PHP handles exceptions
function divide(int $a, int $b): float {
    if ($b === 0) {
        throw new InvalidArgumentException("Cannot divide by zero!");
    }
    return $a / $b;
}

try {
    echo divide(10, 2);  // 5
    echo divide(10, 0);  // Throws exception!
    echo "This won't run";
} catch (InvalidArgumentException $e) {
    echo "Math error: " . $e->getMessage();
    echo " on line " . $e->getLine();
} catch (Exception $e) {
    // Catches any other Exception
    echo "General error: " . $e->getMessage();
} finally {
    // ALWAYS runs, whether exception occurred or not
    echo "Cleanup code here";
}
?>
```

### Multiple Catch Types (PHP 8+)

```php
<?php
try {
    // Some risky code
} catch (InvalidArgumentException | RangeException $e) {
    // Catch multiple exception types in one block
    echo "Input error: " . $e->getMessage();
} catch (RuntimeException $e) {
    echo "Runtime error: " . $e->getMessage();
}
?>
```

### Creating Custom Exceptions

```php
<?php
// Create your own exception classes
class ValidationException extends RuntimeException {
    private array $errors;

    public function __construct(array $errors) {
        $this->errors = $errors;
        parent::__construct("Validation failed: " . implode(", ", $errors));
    }

    public function getErrors(): array {
        return $this->errors;
    }
}

class DatabaseException extends RuntimeException {
    public function __construct(string $query, int $code = 0) {
        parent::__construct("Database query failed: $query", $code);
    }
}

class NotFoundException extends RuntimeException {
    public function __construct(string $resource, int $id) {
        parent::__construct("$resource with ID $id not found", 404);
    }
}

// Usage
function validateUser(array $data): void {
    $errors = [];
    if (empty($data['name'])) $errors[] = "Name required";
    if (empty($data['email'])) $errors[] = "Email required";
    if (!empty($errors)) throw new ValidationException($errors);
}

try {
    validateUser([]);
} catch (ValidationException $e) {
    echo $e->getMessage();
    print_r($e->getErrors());
}
?>
```

### Exception Hierarchy

```
Throwable (interface)
├── Error
│   ├── TypeError
│   ├── ParseError
│   ├── ArithmeticError
│   │   └── DivisionByZeroError
│   └── ...
└── Exception
    ├── RuntimeException
    │   ├── OutOfRangeException
    │   ├── OverflowException
    │   └── ...
    ├── LogicException
    │   ├── InvalidArgumentException
    │   ├── BadMethodCallException
    │   └── ...
    └── (your custom exceptions)
```

---

## 16. PHP & MySQL (Database)

### Connecting with MySQLi (Procedural)

```php
<?php
// Connect to MySQL
$conn = mysqli_connect("localhost", "root", "password", "mydb");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully!";

// Close connection
mysqli_close($conn);
?>
```

### Connecting with MySQLi (Object-Oriented) — Recommended

```php
<?php
$conn = new mysqli("localhost", "root", "password", "mydb");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SELECT query
$sql = "SELECT id, name, email FROM users WHERE active = 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: {$row['id']}, Name: {$row['name']}, Email: {$row['email']}\n";
    }
} else {
    echo "No results found";
}

$conn->close();
?>
```

### Prepared Statements — ESSENTIAL for Security!

```php
<?php
// ⚠️ NEVER do this — SQL Injection vulnerability!
// $sql = "SELECT * FROM users WHERE email = '$email'";
// Someone could input: ' OR '1'='1 and access everything!

// ✅ ALWAYS use prepared statements
$conn = new mysqli("localhost", "root", "password", "mydb");

// INSERT with prepared statement
$stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
// ? are placeholders

// Bind parameters: s=string, i=integer, d=double, b=blob
$stmt->bind_param("sss", $name, $email, $hashedPassword);

$name           = "Rahul";
$email          = "rahul@example.com";
$hashedPassword = password_hash("mypassword", PASSWORD_BCRYPT);

$stmt->execute();
echo "New user ID: " . $conn->insert_id;
$stmt->close();

// SELECT with prepared statement
$stmt = $conn->prepare("SELECT id, name FROM users WHERE email = ?");
$stmt->bind_param("s", $email);

$email = "rahul@example.com";
$stmt->execute();

// Bind result variables
$stmt->bind_result($id, $name);
while ($stmt->fetch()) {
    echo "ID: $id, Name: $name\n";
}

// OR use get_result() (requires mysqlnd)
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    echo $row['name'];
}

$stmt->close();
$conn->close();
?>
```

### PDO — PHP Data Objects (Best Practice)

```php
<?php
// PDO works with multiple databases (MySQL, PostgreSQL, SQLite, etc.)
try {
    $pdo = new PDO(
        "mysql:host=localhost;dbname=mydb;charset=utf8",
        "root",       // username
        "password",   // password
        [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Throw exceptions on error
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Return associative arrays
            PDO::ATTR_EMULATE_PREPARES   => false,                   // Use native prepares
        ]
    );

    // INSERT
    $stmt = $pdo->prepare("INSERT INTO users (name, email) VALUES (:name, :email)");
    $stmt->execute([':name' => 'Rahul', ':email' => 'rahul@example.com']);
    echo "Inserted ID: " . $pdo->lastInsertId();

    // SELECT one row
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
    $stmt->execute([':id' => 1]);
    $user = $stmt->fetch(); // Returns one row
    echo $user['name'];

    // SELECT multiple rows
    $stmt = $pdo->prepare("SELECT * FROM users WHERE active = :active");
    $stmt->execute([':active' => 1]);
    $users = $stmt->fetchAll(); // Returns all rows
    foreach ($users as $user) {
        echo $user['name'] . "\n";
    }

    // UPDATE
    $stmt = $pdo->prepare("UPDATE users SET name = :name WHERE id = :id");
    $stmt->execute([':name' => 'New Name', ':id' => 1]);
    echo "Rows affected: " . $stmt->rowCount();

    // DELETE
    $stmt = $pdo->prepare("DELETE FROM users WHERE id = :id");
    $stmt->execute([':id' => 5]);

    // Transactions — all-or-nothing operations
    $pdo->beginTransaction();
    try {
        $pdo->exec("UPDATE accounts SET balance = balance - 500 WHERE id = 1");
        $pdo->exec("UPDATE accounts SET balance = balance + 500 WHERE id = 2");
        $pdo->commit(); // Success! Apply changes
    } catch (Exception $e) {
        $pdo->rollBack(); // Something failed! Undo everything
        throw $e;
    }

} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
?>
```

### CRUD Operations — Complete Example

```php
<?php
class UserRepository {
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    // CREATE
    public function create(string $name, string $email, string $password): int {
        $stmt = $this->pdo->prepare(
            "INSERT INTO users (name, email, password, created_at)
             VALUES (:name, :email, :password, NOW())"
        );
        $stmt->execute([
            ':name'     => $name,
            ':email'    => $email,
            ':password' => password_hash($password, PASSWORD_BCRYPT),
        ]);
        return (int) $this->pdo->lastInsertId();
    }

    // READ
    public function findById(int $id): ?array {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch() ?: null;
    }

    public function findAll(): array {
        return $this->pdo->query("SELECT * FROM users")->fetchAll();
    }

    // UPDATE
    public function update(int $id, array $data): bool {
        $stmt = $this->pdo->prepare(
            "UPDATE users SET name = :name, email = :email WHERE id = :id"
        );
        return $stmt->execute([
            ':name'  => $data['name'],
            ':email' => $data['email'],
            ':id'    => $id,
        ]);
    }

    // DELETE
    public function delete(int $id): bool {
        $stmt = $this->pdo->prepare("DELETE FROM users WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }
}
?>
```

---

## 17. Sessions & Cookies

### Sessions — Server-Side Storage

```php
<?php
// Sessions store data on the SERVER, linked to user via session ID cookie

// MUST call session_start() at the beginning of every page that uses sessions
session_start();

// Storing session data
$_SESSION['user_id']   = 42;
$_SESSION['username']  = "Rahul";
$_SESSION['is_logged_in'] = true;

// Reading session data
echo $_SESSION['username']; // Rahul

// Check if session variable exists
if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']) {
    echo "Welcome back, " . $_SESSION['username'];
} else {
    echo "Please log in";
}

// Remove specific session variable
unset($_SESSION['username']);

// Destroy entire session (for logout)
session_start();
$_SESSION = [];                 // Clear all session data
session_destroy();              // Destroy the session
setcookie(session_name(), '', time() - 42000, '/'); // Delete session cookie
?>
```

### Login System with Sessions

```php
<?php
session_start();

// login.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email    = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    // Fetch user from database
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->execute([':email' => $email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        // Login successful!
        $_SESSION['user_id']  = $user['id'];
        $_SESSION['username'] = $user['name'];
        $_SESSION['role']     = $user['role'];

        // Regenerate session ID to prevent session fixation
        session_regenerate_id(true);

        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Invalid email or password";
    }
}
?>

<?php
// dashboard.php — Protected page
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

echo "Welcome, " . htmlspecialchars($_SESSION['username']);
?>
```

### Cookies — Browser-Side Storage

```php
<?php
// setcookie(name, value, expiry, path, domain, secure, httponly)

// Set a cookie that expires in 30 days
setcookie(
    "remember_me",              // Cookie name
    "user_token_here",          // Value
    time() + (30 * 24 * 3600), // Expiry (30 days from now)
    "/",                        // Path (/ = entire site)
    "",                         // Domain (empty = current domain)
    true,                       // Secure (HTTPS only)
    true                        // HttpOnly (no JS access)
);

// IMPORTANT: setcookie() must be called BEFORE any output!

// Read cookie
if (isset($_COOKIE['remember_me'])) {
    $token = $_COOKIE['remember_me'];
    // Validate token against database
}

// Delete cookie — set expiry in the past
setcookie("remember_me", "", time() - 3600, "/");

// Session vs Cookie
/*
  SESSIONS:
  + More secure (data on server)
  + Can store complex data
  - Expires when browser closes (unless configured otherwise)
  - Uses server memory

  COOKIES:
  + Persists across browser sessions
  + No server storage needed
  - Less secure (stored on client)
  - Limited to ~4KB
  - User can delete/modify them
*/
?>
```

---

## 18. PHP Security

Security is **CRITICAL** in PHP development! These are must-know topics for interviews and projects.

### 1. SQL Injection Prevention

```php
<?php
// ❌ DANGEROUS — SQL Injection vulnerable
$user_input = "' OR '1'='1";
$sql = "SELECT * FROM users WHERE name = '$user_input'";
// This becomes: SELECT * FROM users WHERE name = '' OR '1'='1'
// Returns ALL users!

// ✅ SAFE — Use prepared statements (covered in Section 16)
$stmt = $pdo->prepare("SELECT * FROM users WHERE name = :name");
$stmt->execute([':name' => $user_input]); // Input is safely escaped
?>
```

### 2. XSS (Cross-Site Scripting) Prevention

```php
<?php
// ❌ DANGEROUS — XSS vulnerable
$name = $_GET['name']; // User types: <script>alert('hacked!')</script>
echo "Hello, $name!"; // Script executes in victim's browser!

// ✅ SAFE — Escape output
$name = htmlspecialchars($_GET['name'], ENT_QUOTES, 'UTF-8');
// Converts < > " ' & to HTML entities
// <script> becomes &lt;script&gt; — harmless text

echo "Hello, $name!"; // Displays: Hello, <script>alert('hacked!')</script>!

// For URLs specifically
echo urlencode($url); // Encode for URL context

// Content Security Policy (CSP) header — extra layer
header("Content-Security-Policy: default-src 'self'");
?>
```

### 3. CSRF (Cross-Site Request Forgery) Prevention

```php
<?php
session_start();

// Generate CSRF token and store in session
function generateCsrfToken(): string {
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

// Validate CSRF token
function validateCsrfToken(string $token): bool {
    return isset($_SESSION['csrf_token']) &&
           hash_equals($_SESSION['csrf_token'], $token);
    // hash_equals prevents timing attacks
}

// In form:
// <input type="hidden" name="csrf_token" value="<?= generateCsrfToken() ?>">

// When processing form:
if (!validateCsrfToken($_POST['csrf_token'] ?? '')) {
    die("CSRF token mismatch! Request denied.");
}
?>
```

### 4. Password Hashing

```php
<?php
// ❌ NEVER store plain text or MD5/SHA1 passwords!
$plain = "mypassword";
$md5 = md5($plain);       // NOT secure for passwords
$sha1 = sha1($plain);     // NOT secure for passwords

// ✅ Use password_hash() with bcrypt
$hash = password_hash($plain, PASSWORD_BCRYPT);
// Example hash: $2y$10$YourHashHere...

// Verify password (handles all the salt/hash comparison)
if (password_verify($plain, $hash)) {
    echo "Password is correct!";
}

// Check if hash needs rehashing (if you change cost factor)
if (password_needs_rehash($hash, PASSWORD_BCRYPT, ['cost' => 12])) {
    $newHash = password_hash($plain, PASSWORD_BCRYPT, ['cost' => 12]);
    // Update hash in database
}

// PHP 8.0+ — use PASSWORD_ARGON2ID for even better security
$hash = password_hash($plain, PASSWORD_ARGON2ID);
?>
```

### 5. Input Validation & Sanitization

```php
<?php
// Validate — check if input is acceptable
$email = $_POST['email'];
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email!");
}

// Sanitize — clean the input
$email   = filter_var($email, FILTER_SANITIZE_EMAIL);
$int     = filter_var($_POST['age'], FILTER_SANITIZE_NUMBER_INT);
$float   = filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_FLOAT);
$string  = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
$url     = filter_var($_POST['url'], FILTER_SANITIZE_URL);

// Use whitelists not blacklists
$allowed_colors = ['red', 'green', 'blue'];
$color = $_POST['color'];
if (!in_array($color, $allowed_colors)) {
    die("Invalid color selection!");
}
?>
```

### 6. File Upload Security

```php
<?php
function secureFileUpload(array $file, string $uploadDir): string {
    // Check for upload errors
    if ($file['error'] !== UPLOAD_ERR_OK) {
        throw new RuntimeException("Upload error: " . $file['error']);
    }

    // Validate file size (max 5MB)
    if ($file['size'] > 5 * 1024 * 1024) {
        throw new RuntimeException("File too large");
    }

    // Validate file type using finfo (NOT $_FILES['type'] — it can be faked!)
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mimeType = $finfo->file($file['tmp_name']);

    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    if (!in_array($mimeType, $allowedTypes)) {
        throw new RuntimeException("Invalid file type");
    }

    // Generate safe filename (don't use user-provided name directly!)
    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $safeFilename = bin2hex(random_bytes(16)) . '.' . $extension;
    $destination = $uploadDir . $safeFilename;

    // Ensure upload directory is outside webroot or protected
    if (!move_uploaded_file($file['tmp_name'], $destination)) {
        throw new RuntimeException("Failed to move file");
    }

    return $safeFilename;
}
?>
```

### 7. Security Headers

```php
<?php
// Add security headers to every response
header("X-Content-Type-Options: nosniff");
header("X-Frame-Options: SAMEORIGIN");
header("X-XSS-Protection: 1; mode=block");
header("Strict-Transport-Security: max-age=31536000; includeSubDomains");
header("Content-Security-Policy: default-src 'self'");
header("Referrer-Policy: strict-origin-when-cross-origin");
?>
```

---

## 19. PHP Built-in Functions Cheatsheet

### Math Functions

```php
<?php
abs(-5);          // 5    — Absolute value
ceil(4.1);        // 5    — Round up
floor(4.9);       // 4    — Round down
round(4.5);       // 5    — Round to nearest
round(4.567, 2);  // 4.57 — Round to 2 decimal places
max(1, 5, 3);     // 5    — Maximum
min(1, 5, 3);     // 1    — Minimum
pow(2, 8);        // 256  — Power (same as 2**8)
sqrt(16);         // 4    — Square root
log(M_E);         // 1    — Natural logarithm
log10(100);       // 2    — Base-10 logarithm
pi();             // 3.14159... (same as M_PI constant)
rand(1, 100);     // Random integer between 1 and 100
mt_rand(1, 100);  // Better random number generator
fmod(10, 3);      // 1    — Float modulus
intdiv(7, 2);     // 3    — Integer division
number_format(1234567.89, 2, '.', ','); // "1,234,567.89"
?>
```

### Date & Time Functions

```php
<?php
// Current timestamps
time();                    // Unix timestamp (seconds since Jan 1 1970)
microtime(true);           // Unix timestamp with microseconds

// Formatting dates
date("Y-m-d");             // "2024-01-15"
date("d/m/Y");             // "15/01/2024"
date("D, d M Y");          // "Mon, 15 Jan 2024"
date("H:i:s");             // "14:30:45"
date("Y-m-d H:i:s");       // "2024-01-15 14:30:45"
date("U");                 // Unix timestamp as string

// Format from timestamp
date("Y-m-d", 1705305600); // Format specific timestamp

// Parsing dates
strtotime("next Monday");           // Timestamp for next Monday
strtotime("+1 week");               // Timestamp for 1 week from now
strtotime("2024-12-31");            // Timestamp for specific date

// DateTime class (OOP approach — better!)
$now = new DateTime();
$now->format("Y-m-d H:i:s");       // Current datetime formatted

$future = new DateTime("+1 month");
$diff = $now->diff($future);
echo $diff->days . " days away";

// Date arithmetic
$date = new DateTime("2024-01-01");
$date->modify("+3 months");
$date->modify("-1 day");
echo $date->format("Y-m-d");  // "2024-03-31"

// DateTimeImmutable (returns new object instead of modifying)
$date = new DateTimeImmutable("2024-01-01");
$newDate = $date->modify("+1 year"); // $date unchanged, $newDate is new

// Timezones
date_default_timezone_set("Asia/Kolkata"); // Set for script
$tz = new DateTimeZone("America/New_York");
$date = new DateTime("now", $tz);
?>
```

### Array Functions Quick Reference

```php
<?php
// Already covered in Section 9, quick reference:
count($arr);           // Array length
array_sum($arr);       // Sum of all values
array_product($arr);   // Product of all values
array_reverse($arr);   // Reverse order
array_unique($arr);    // Remove duplicates
array_keys($arr);      // Get all keys
array_values($arr);    // Get all values (reindexed)
array_flip($arr);      // Swap keys and values
array_merge($a, $b);   // Merge arrays
in_array($val, $arr);  // Check if value exists
array_key_exists($k, $arr); // Check if key exists
array_search($val, $arr);   // Find key of a value
sort($arr);            // Sort ascending
array_slice($arr, 1, 3);    // Extract portion
array_splice($arr, 1, 2);   // Remove and replace
array_push($arr, $val);     // Add to end
array_pop($arr);       // Remove from end
array_shift($arr);     // Remove from beginning (reindexes)
array_unshift($arr, $val);  // Add to beginning
array_map($fn, $arr);  // Apply function to each
array_filter($arr, $fn);    // Filter by function
array_reduce($arr, $fn, $init); // Reduce to single value
array_combine($keys, $vals); // Create from separate key/value arrays
array_chunk($arr, 2);  // Split into chunks of n
array_fill(0, 5, 0);   // Create array of repeated values
?>
```

### String Functions Quick Reference

```php
<?php
// Already covered in Section 10, quick reference:
strlen($str);           // Length
strtolower($str);       // Lowercase
strtoupper($str);       // Uppercase
ucfirst($str);          // Capitalize first char
ucwords($str);          // Capitalize each word
trim($str);             // Remove whitespace
ltrim($str);            // Left trim
rtrim($str);            // Right trim
str_replace($s, $r, $str); // Replace string
str_ireplace($s, $r, $str);// Case-insensitive replace
str_contains($str, $needle);// PHP 8: contains?
str_starts_with($str, $prefix); // PHP 8: starts with?
str_ends_with($str, $suffix);   // PHP 8: ends with?
strpos($str, $needle);  // Position of first occurrence
strrpos($str, $needle); // Position of last occurrence
stripos($str, $needle); // Case-insensitive strpos
substr($str, $start, $len); // Extract substring
substr_count($str, $needle);// Count occurrences
substr_replace($str, $rep, $start, $len); // Replace portion
explode($delim, $str);  // Split to array
implode($glue, $arr);   // Join array to string
str_split($str, $len);  // Split into chars/chunks
sprintf($format, ...);  // Format string
printf($format, ...);   // Format and print
str_pad($str, $len);    // Pad string
str_repeat($str, $n);   // Repeat string
strrev($str);           // Reverse string
wordwrap($str, 80);     // Wrap long lines
htmlspecialchars($str); // Escape HTML
htmlspecialchars_decode($str); // Unescape HTML
strip_tags($str);       // Remove HTML tags
nl2br($str);            // Convert \n to <br>
md5($str);              // MD5 hash (not for passwords!)
sha1($str);             // SHA1 hash (not for passwords!)
hash("sha256", $str);   // Flexible hashing
crc32($str);            // CRC32 checksum
base64_encode($str);    // Base64 encode
base64_decode($str);    // Base64 decode
urlencode($str);        // URL encode
urldecode($str);        // URL decode
json_encode($data);     // Convert to JSON
json_decode($json, true);// Parse JSON to array
?>
```

---

## 20. Interview Questions & Answers

### ⭐ Basic Level

**Q1: What is the difference between `==` and `===` in PHP?**
> `==` is loose comparison — compares values after type juggling (e.g., `0 == "hello"` is true in PHP 7). `===` is strict comparison — checks both value and type (`0 === "hello"` is false). Always prefer `===` to avoid unexpected behavior.

**Q2: What is the difference between `echo` and `print`?**
> Both output text. `echo` is slightly faster, can output multiple values with commas, and has no return value. `print` outputs one value and always returns `1`, making it usable in expressions.

**Q3: What are PHP sessions and cookies?**
> **Sessions** store data on the server linked by a session ID. They're more secure and expire when the browser closes. **Cookies** store data in the user's browser and can persist across sessions. Sessions are preferable for sensitive data (user authentication). Cookies are good for "remember me" features.

**Q4: What is the difference between `include` and `require`?**
```php
include "file.php";  // Warning if file not found, script continues
require "file.php";  // Fatal error if file not found, script STOPS
include_once "file.php"; // Include only once even if called multiple times
require_once "file.php"; // Require only once
```

**Q5: What is `$_SESSION`, `$_POST`, `$_GET`?**
> These are **superglobals** — special PHP arrays available everywhere. `$_SESSION` holds session data, `$_POST` holds POST form data, `$_GET` holds URL query parameters.

---

### ⭐⭐ Intermediate Level

**Q6: What is a PHP trait?**
> A trait is a mechanism for code reuse. PHP doesn't support multiple inheritance, but a class can `use` multiple traits. A trait can have properties and methods that are copied into the class that uses them.

**Q7: What is the difference between abstract class and interface?**

| Feature | Abstract Class | Interface |
|---------|---------------|-----------|
| Can have concrete methods | ✅ Yes | ❌ No (PHP 8: can have constants) |
| Can have properties | ✅ Yes | ❌ No |
| Multiple inheritance | ❌ One parent only | ✅ Can implement multiple |
| Access modifiers | ✅ Any | ❌ Public only |
| Constructor | ✅ Yes | ❌ No |
| Keyword | `extends` | `implements` |

**Q8: Explain SQL Injection and how to prevent it.**
> SQL injection is when malicious SQL code is inserted into a query through user input. Prevention: Always use prepared statements with `PDO` or `MySQLi`, never concatenate user input directly into SQL strings.

**Q9: What is the difference between `isset()` and `empty()`?**
```php
$a = "";
$b = null;
$c = 0;

isset($a); // true  — variable exists and is not null
isset($b); // false — variable is null
empty($a); // true  — "" is empty
empty($b); // true  — null is empty
empty($c); // true  — 0 is empty (falsy)
empty($d); // true  — undefined variable is empty (no warning)
```

**Q10: What are PHP magic methods? Name 5.**
> Magic methods are special methods starting with `__` that PHP calls automatically in specific situations:
> - `__construct()` — object creation
> - `__destruct()` — object destruction
> - `__toString()` — when object used as string
> - `__get()` / `__set()` — accessing undefined properties
> - `__call()` — calling undefined method
> - `__invoke()` — calling object like function

---

### ⭐⭐⭐ Advanced Level

**Q11: What is the difference between `self::`, `static::`, and `parent::`?**
```php
class Base {
    public static function create(): static {
        return new static(); // Late static binding — creates the actual called class
    }
    public function test(): void {
        self::method();   // Always calls Base::method, even in subclass
        static::method(); // Calls the actual class's method (late static binding)
        parent::method(); // Calls parent class's method
    }
}
```

**Q12: What is late static binding?**
> Late static binding (`static::`) resolves to the class that was actually called at runtime, not the class where the method was defined. This is essential for factory patterns and inheritance.

**Q13: Explain PHP closures and the `use` keyword.**
> A closure is an anonymous function. The `use` keyword imports variables from the outer scope into the closure. Without `use`, the closure cannot access outer variables. Arrow functions (`fn`) automatically capture outer scope without `use`.

**Q14: What is Composer?**
> Composer is PHP's **dependency manager**. It manages packages (libraries) from [packagist.org](https://packagist.org). Key commands:
> ```bash
> composer init              # Create composer.json
> composer require vendor/package  # Install package
> composer install           # Install all dependencies
> composer update            # Update packages
> ```
> `autoload` in `composer.json` handles PSR-4 autoloading so you don't need manual `require` statements.

**Q15: What are PSR standards?**
> PSR = PHP Standards Recommendations, defined by PHP-FIG:
> - **PSR-1**: Basic coding standards
> - **PSR-2**: Coding style guide (use PSR-12 now)
> - **PSR-4**: Autoloading standard (namespace → directory structure)
> - **PSR-7**: HTTP message interfaces
> - **PSR-12**: Extended coding style

---

### 🎯 Common Placement/Interview Coding Questions

```php
<?php
// 1. Fibonacci Series
function fibonacci(int $n): array {
    $series = [0, 1];
    for ($i = 2; $i < $n; $i++) {
        $series[] = $series[$i-1] + $series[$i-2];
    }
    return array_slice($series, 0, $n);
}
print_r(fibonacci(8)); // [0, 1, 1, 2, 3, 5, 8, 13]

// 2. Check if string is palindrome
function isPalindrome(string $str): bool {
    $str = strtolower(preg_replace("/[^a-zA-Z0-9]/", "", $str));
    return $str === strrev($str);
}
echo isPalindrome("racecar") ? "Yes" : "No"; // Yes
echo isPalindrome("hello")   ? "Yes" : "No"; // No

// 3. Count words in a string
function countWords(string $str): array {
    $words = str_word_count(strtolower($str), 1);
    return array_count_values($words);
}
print_r(countWords("Hello World Hello PHP")); // ['hello'=>2, 'world'=>1, 'php'=>1]

// 4. Find duplicates in array
function findDuplicates(array $arr): array {
    $counts = array_count_values($arr);
    return array_keys(array_filter($counts, fn($c) => $c > 1));
}
print_r(findDuplicates([1, 2, 3, 2, 4, 3, 5])); // [2, 3]

// 5. Flatten nested array
function flatten(array $arr): array {
    $result = [];
    array_walk_recursive($arr, function($item) use (&$result) {
        $result[] = $item;
    });
    return $result;
}
print_r(flatten([1, [2, 3], [4, [5, 6]]])); // [1, 2, 3, 4, 5, 6]

// 6. Array second largest number
function secondLargest(array $arr): int|null {
    $unique = array_unique($arr);
    if (count($unique) < 2) return null;
    rsort($unique);
    return $unique[1];
}
echo secondLargest([3, 1, 4, 1, 5, 9, 2, 6]); // 6

// 7. Group anagrams
function groupAnagrams(array $words): array {
    $groups = [];
    foreach ($words as $word) {
        $key = implode(array: str_split(strtolower($word)));
        sort($key = str_split(strtolower($word)));
        $keyStr = implode("", $key);
        $groups[$keyStr][] = $word;
    }
    return array_values($groups);
}
print_r(groupAnagrams(["eat", "tea", "tan", "ate", "nat", "bat"]));
// [["eat","tea","ate"], ["tan","nat"], ["bat"]]
?>
```

---

## 🏆 Quick Revision Summary

```
PHP Basics:
├── Tags: <?php ... ?>
├── Output: echo, print
├── Variables: $name (case-sensitive)
├── Types: int, float, string, bool, array, object, null, resource
├── Constants: define(), const
└── Null Coalescing: $var ?? "default"

Control Flow:
├── if/elseif/else
├── switch/case (loose ==)
├── match (strict ===, PHP 8+)
└── Loops: for, while, do-while, foreach

Functions:
├── Type hints (PHP 7+)
├── Default params
├── Pass by reference &
├── Variadic ...$args
├── Closures (anonymous functions)
└── Arrow functions fn() => (PHP 7.4+)

OOP:
├── Classes, Objects, Properties, Methods
├── Access: public, protected, private
├── Inheritance: extends, parent::
├── Abstract classes (blueprint)
├── Interfaces (contract)
├── Traits (code reuse)
└── Magic methods __construct, __toString, etc.

Database:
├── PDO (recommended — multiple DB support)
├── MySQLi (MySQL-specific)
├── ALWAYS use prepared statements
└── Transactions for multiple operations

Security:
├── SQL Injection → Prepared statements
├── XSS → htmlspecialchars()
├── CSRF → Token validation
├── Passwords → password_hash() / password_verify()
└── Input → filter_var() + validation

Superglobals:
├── $_GET, $_POST, $_REQUEST
├── $_SERVER, $_SESSION, $_COOKIE
├── $_FILES, $_ENV
└── $GLOBALS
```

---

> 📌 **Pro Tips for Interviews:**
> 1. Always mention security concerns (SQL injection, XSS, CSRF)
> 2. Talk about performance (caching, query optimization, lazy loading)
> 3. Mention modern PHP features (match, named args, fibers, enums)
> 4. Discuss design patterns (Singleton, Factory, Repository, MVC)
> 5. Know the difference between `==` and `===` — it comes up often!

---

*Notes maintained by: Your Name*
*Last Updated: 2024*
*PHP Version Reference: PHP 8.x*

---

**⭐ Star this repo if these notes helped you!**

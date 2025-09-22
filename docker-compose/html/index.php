<?php
// DB connection settings from docker-compose
$host = getenv("DB_HOST") ?: "db";
$user = getenv("DB_USER") ?: "user";
$pass = getenv("DB_PASSWORD") ?: "password";
$db   = getenv("DB_NAME") ?: "mydb";

// Connect to MySQL server
$conn = new mysqli($host, $user, $pass);

// Check connection
if ($conn->connect_error) {
    die("DB Connection failed: " . $conn->connect_error);
}

// Create database if not exists
$conn->query("CREATE DATABASE IF NOT EXISTS $db");
$conn->select_db($db);

// Create table if not exists
$conn->query("
  CREATE TABLE IF NOT EXISTS fun_form (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    mood VARCHAR(50),
    message TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
  )
");

// If form submitted, insert into DB
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'] ?? '';
    $mood = $_POST['mood'] ?? '';
    $message = $_POST['message'] ?? '';

    $stmt = $conn->prepare("INSERT INTO fun_form (name, mood, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $mood, $message);
    $stmt->execute();
    $stmt->close();

    echo "<h1 style='font-family:Segoe UI; text-align:center; color:#db2777;'>💖 Thanks, $name! Your mood '$mood' has been saved. 💖</h1>";
    echo "<p style='text-align:center;'><a href='index.php'>Go Back</a></p>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Fun Form 🌸</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(135deg, #fce7f3, #fbcfe8, #f9a8d4);
      color: #4a044e;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      padding: 2rem;
      text-align: center;
    }
    h1 {
      font-size: 2.5rem;
      margin-bottom: 1rem;
      color: #831843;
    }
    form {
      background: #fff0f6;
      padding: 2rem;
      border-radius: 16px;
      box-shadow: 0 6px 20px rgba(236, 72, 153, 0.25);
      max-width: 400px;
      width: 100%;
    }
    label {
      display: block;
      text-align: left;
      margin: 1rem 0 0.3rem;
      font-weight: bold;
    }
    input, select, textarea {
      width: 100%;
      padding: 0.7rem;
      border: 1px solid #f9a8d4;
      border-radius: 8px;
      font-size: 1rem;
      margin-bottom: 1rem;
    }
    button {
      padding: 0.8rem 1.5rem;
      background: #ec4899;
      color: white;
      border: none;
      border-radius: 12px;
      font-size: 1rem;
      cursor: pointer;
      transition: background 0.3s, transform 0.2s;
    }
    button:hover {
      background: #db2777;
      transform: translateY(-2px);
    }
    footer {
      margin-top: 1.5rem;
      color: #9d174d;
      font-size: 0.9rem;
    }
  </style>
</head>
<body>
  <h1>Fun Vibes Form ✨</h1>
  <form method="POST">
    <label for="name">Your Name</label>
    <input type="text" id="name" name="name" required />

    <label for="mood">Your Mood</label>
    <select id="mood" name="mood">
      <option value="Bad 😕">Bad 😕</option>
      <option value="Good 🙂">Good 🙂</option>
      <option value="Excellent 😄">Excellent 😄</option>
    </select>

    <label for="message">Something you want to share</label>
    <textarea id="message" name="message" rows="4"></textarea>

    <button type="submit">Send 🌸</button>
  </form>

  <footer>&copy; 2025 Alfida. All rights reserved.</footer>
</body>
</html>

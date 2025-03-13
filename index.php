<?php
include 'config.php';

// Create table if it doesn't exist
$tableSQL = "CREATE TABLE IF NOT EXISTS projects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    image VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
$conn->exec($tableSQL);

// Fetch projects from database
$stmt = $conn->query("SELECT * FROM projects");
$projects = $stmt->fetchAll();

foreach ($projects as $project) {
    echo "<div><h2>{$project['title']}</h2>
          <p>{$project['description']}</p>
          <img src='uploads/{$project['image']}' width='200'></div>";
}
?>


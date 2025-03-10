/* index.php - Display Projects */
<?php
include 'config.php';
$stmt = $conn->query("SELECT * FROM projects");
$projects = $stmt->fetchAll();
foreach ($projects as $project) {
    echo "<div><h2>{$project['title']}</h2><p>{$project['description']}</p><img src='uploads/{$project['image']}' width='200'></div>";
}
?>

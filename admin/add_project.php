/* admin/add_project.php - Add Project */
<?php
include '../config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], "../uploads/" . $image);
    $stmt = $conn->prepare("INSERT INTO projects (title, description, image) VALUES (?, ?, ?)");
    $stmt->execute([$title, $description, $image]);
    echo "Project added!";
}
?>
<form method="POST" enctype="multipart/form-data">
    <input type="text" name="title" placeholder="Project Title" required>
    <textarea name="description" placeholder="Project Description" required></textarea>
    <input type="file" name="image" required>
    <button type="submit">Add Project</button>
</form>
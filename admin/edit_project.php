/* admin/edit_project.php - Edit Project */
<?php
include '../config.php';
if (!isset($_SESSION['admin'])) {
    header('Location: index.php');
    exit;
}
$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM projects WHERE id = ?");
$stmt->execute([$id]);
$project = $stmt->fetch();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $stmt = $conn->prepare("UPDATE projects SET title = ?, description = ? WHERE id = ?");
    $stmt->execute([$title, $description, $id]);
    echo "Project updated!";
}
?>
<form method="POST">
    <input type="text" name="title" value="<?= $project['title']; ?>" required>
    <textarea name="description" required><?= $project['description']; ?></textarea>
    <button type="submit">Update Project</button>
</form>

/* admin/delete_project.php - Delete Project */
<?php
include '../config.php';
if (!isset($_SESSION['admin'])) {
    header('Location: index.php');
    exit;
}
$id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM projects WHERE id = ?");
$stmt->execute([$id]);
header('Location: dashboard.php');
?>

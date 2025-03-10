/* admin/dashboard.php - Admin Panel */
<?php
include '../config.php';
if (!isset($_SESSION['admin'])) {
    header('Location: index.php');
    exit;
}
$stmt = $conn->query("SELECT * FROM projects");
$projects = $stmt->fetchAll();
?>
<h2>Admin Dashboard</h2>
<a href="add_project.php">Add Project</a>
<a href="logout.php">Logout</a>

<table border="1">
    <tr><th>Title</th><th>Description</th><th>Image</th><th>Actions</th></tr>
    <?php foreach ($projects as $project): ?>
    <tr>
        <td><?= $project['title']; ?></td>
        <td><?= $project['description']; ?></td>
        <td><img src="../uploads/<?= $project['image']; ?>" width="100"></td>
        <td>
            <a href="edit_project.php?id=<?= $project['id']; ?>">Edit</a>
            <a href="delete_project.php?id=<?= $project['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>



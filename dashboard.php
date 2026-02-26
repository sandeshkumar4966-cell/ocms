<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}

$user_id = $_SESSION['user_id'];

$result = $conn->query("SELECT * FROM complaints WHERE user_id=$user_id");
?>

<h2>My Complaints</h2>
<a href="submit_complaint.php">Submit Complaint</a> |
<a href="logout.php">Logout</a>

<table border="1">
<tr>
    <th>Title</th>
    <th>Description</th>
    <th>Status</th>
</tr>

<?php while($row = $result->fetch_assoc()): ?>
<tr>
    <td><?= $row['title'] ?></td>
    <td><?= $row['description'] ?></td>
    <td><?= $row['status'] ?></td>
</tr>
<?php endwhile; ?>
</table>
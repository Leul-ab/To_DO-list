<?php
include 'db_connect.php';
session_start();
$user_id = $_SESSION['user_id'];

$fetchingtasks = $conn->prepare("SELECT * FROM tasks WHERE user_id = ? ORDER BY id ASC");
$fetchingtasks->bind_param("i", $user_id);
$fetchingtasks->execute();
$result = $fetchingtasks->get_result();
$count = 1;

while ($fetch = $result->fetch_array()) {
    // Status conversion: 1 => "Done", 0 => "Not Done Yet"
    $statusText = $fetch['status'] == 1 ? "Done" : "Not Done Yet";
?>
    <tr class="border-bottom">
        <td><?php echo $count++ ?></td>
        <td><?php echo $fetch['task'] ?></td>
        <td><?php echo $statusText ?></td>
        <td><?php echo $fetch['created_at'] ?></td>
        <td colspan="2" class="action">
            <?php if ($fetch['status'] != 1) { ?>
                <a href="update_task.php?id=<?php echo $fetch['id'] ?>" class="btn-completed">✅</a>
            <?php } ?>
            <a href="delete_task.php?id=<?php echo $fetch['id'] ?>" class="btn-remove">❌</a>
        </td>
    </tr>
<?php
}
?>

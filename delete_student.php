<?php
require_once 'StudentManager.php';
$manager = new StudentManager($mysqli);

$id = $_GET['id'] ?? null;
if ($id) {
    $manager->deleteStudent($id);
}
header('Location: view_students.php');
exit;
?>

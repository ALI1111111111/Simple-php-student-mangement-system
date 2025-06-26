<?php
require_once 'StudentManager.php';
$manager = new StudentManager($mysqli);
$students = $manager->getAllStudents();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Students</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="d-flex justify-content-between mb-3">
            <h1 class="h3">Students</h1>
            <a class="btn btn-primary" href="student_form.php">Add Student</a>
        </div>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Course</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $student): ?>
                <tr>
                    <td><?php echo $student['id']; ?></td>
                    <td><?php echo htmlspecialchars($student['name']); ?></td>
                    <td><?php echo htmlspecialchars($student['email']); ?></td>
                    <td><?php echo $student['gender']; ?></td>
                    <td><?php echo htmlspecialchars($student['course']); ?></td>
                    <td>
                        <a class="btn btn-sm btn-warning" href="edit_student.php?id=<?php echo $student['id']; ?>">Edit</a>
                        <a class="btn btn-sm btn-danger" href="delete_student.php?id=<?php echo $student['id']; ?>" onclick="return confirm('Are you sure?');">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a class="btn btn-secondary" href="index.php">Home</a>
    </div>
</body>
</html>

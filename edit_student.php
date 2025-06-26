<?php
require_once 'StudentManager.php';
$manager = new StudentManager($mysqli);

$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: view_students.php');
    exit;
}

$student = $manager->getStudentById($id);
if (!$student) {
    header('Location: view_students.php');
    exit;
}

$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $gender = $_POST['gender'] ?? '';
    $course = trim($_POST['course'] ?? '');

    if ($name === '' || $email === '' || $gender === '' || $course === '') {
        $errors[] = 'All fields are required.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Invalid email format.';
    }

    if (!$errors) {
        if ($manager->updateStudent($id, $name, $email, $gender, $course)) {
            header('Location: view_students.php');
            exit;
        } else {
            $errors[] = 'Failed to update student.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <h1 class="mb-4">Edit Student</h1>
        <?php if ($errors): ?>
            <div class="alert alert-danger">
                <ul class="mb-0">
                    <?php foreach ($errors as $error): ?>
                        <li><?php echo htmlspecialchars($error); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        <form method="post" action="" class="card p-4">
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo htmlspecialchars($_POST['name'] ?? $student['name']); ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="text" name="email" class="form-control" value="<?php echo htmlspecialchars($_POST['email'] ?? $student['email']); ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Gender</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" value="Male" id="genderMale" <?php if(($_POST['gender'] ?? $student['gender'])==='Male') echo 'checked'; ?>>
                    <label class="form-check-label" for="genderMale">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" value="Female" id="genderFemale" <?php if(($_POST['gender'] ?? $student['gender'])==='Female') echo 'checked'; ?>>
                    <label class="form-check-label" for="genderFemale">Female</label>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Course</label>
                <select name="course" class="form-select">
                    <option value="">Select course</option>
                    <option value="PHP" <?php if(($_POST['course'] ?? $student['course'])==='PHP') echo 'selected'; ?>>PHP</option>
                    <option value="MySQL" <?php if(($_POST['course'] ?? $student['course'])==='MySQL') echo 'selected'; ?>>MySQL</option>
                    <option value="JavaScript" <?php if(($_POST['course'] ?? $student['course'])==='JavaScript') echo 'selected'; ?>>JavaScript</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        <a href="view_students.php" class="btn btn-secondary mt-3">Back</a>
    </div>
</body>
</html>

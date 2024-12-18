<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usn = $_POST['usn'];
    $studentName = $_POST['studentName'];
    $branch = $_POST['branch'];
    $semester = $_POST['semester'];
    $college = $_POST['college'];
    $date = $_POST['date'];
    $subjectCodes = $_POST['subjectCode'];
    $subjectNames = $_POST['subjectName'];
    $statuses = $_POST['status'];
    $fees = $_POST['feeAmount'];
    $photoPath = '';

    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $photoPath = 'uploads/' . $_FILES['photo']['name'];
        move_uploaded_file($_FILES['photo']['tmp_name'], $photoPath);
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Details</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <header>
            <div class="header-center">
                <h1>VISVESVARAYA TECHNOLOGICAL UNIVERSITY, BELAGAVI</h1>
                <h2>UG Student Application Form - Details</h2>
            </div>
        </header>
        <section class="form-section">
            <h3>Application Details</h3>
            <table>
                <thead>
                    <tr>
                        <th>Field</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>USN</td>
                        <td><?= htmlspecialchars($usn) ?></td>
                    </tr>
                    <tr>
                        <td>Student Name</td>
                        <td><?= htmlspecialchars($studentName) ?></td>
                    </tr>
                    <tr>
                        <td>Branch Code</td>
                        <td><?= htmlspecialchars($branch) ?></td>
                    </tr>
                    <tr>
                        <td>Semester</td>
                        <td><?= htmlspecialchars($semester) ?></td>
                    </tr>
                    <tr>
                        <td>College</td>
                        <td><?= htmlspecialchars($college) ?></td>
                    </tr>
                    <tr>
                        <td>Photo</td>
                        <td>
    <?php if ($photoPath): ?>
        <img src="<?= $photoPath ?>" alt="Student Photo" style="width: 100px; height: auto; display: block; margin: 10px auto;">
    <?php endif; ?>
</td>

                    </tr>
                    <tr>
                        <td>Date</td>
                        <td><?= htmlspecialchars($date) ?></td>
                    </tr>
                </tbody>
            </table>
        </section>
        <section class="form-section">
            <h3>Subjects and Fee Details</h3>
            <table>
                <thead>
                    <tr>
                        <th>Subject Code</th>
                        <th>Subject Name</th>
                        <th>Status</th>
                        <th>SL No</th>
                        <th>Description</th>
                        <th>Fees</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $rowCount = max(count($subjectCodes), count($fees));
                    for ($i = 0; $i < $rowCount; $i++): ?>
                        <tr>
                            <td><?= htmlspecialchars($subjectCodes[$i] ?? '') ?></td>
                            <td><?= htmlspecialchars($subjectNames[$i] ?? '') ?></td>
                            <td><?= htmlspecialchars($statuses[$i] ?? '') ?></td>
                            <td><?= $i + 1 ?></td>
                            <td>Fee Item <?= $i + 1 ?></td>
                            <td><?= htmlspecialchars($fees[$i] ?? '') ?></td>
                        </tr>
                    <?php endfor; ?>
                </tbody>
            </table>
        </section>
    </div>
</body>
</html>
<?php
}
?>

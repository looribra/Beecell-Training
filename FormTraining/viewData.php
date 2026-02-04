<?php
    $jsonFile = 'submissions.json';
    $submissions = [];

    if(file_exists($jsonFile)){
        $jsonContent = file_get_contents($jsonFile);
        $submissions = json_decode($jsonContent, true);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Submissions</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #4CAF50; color: white; }
    </style>
</head>
<body>
    <h2>Form Submissions</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Age</th>
            <th>Submission Time</th>
            <th>Gender</th>
            <th>Image</th>
        </tr>
        <?php foreach($submissions as $submission): ?>
        <tr>
            <td><?php echo htmlspecialchars($submission['name']); ?></td>
            <td><?php echo htmlspecialchars($submission['email']); ?></td>
            <td><?php echo htmlspecialchars($submission['age']); ?></td>
            <td><?php echo htmlspecialchars($submission['submissionTime']); ?></td>
            <td><?php echo isset($submission['gender']) ? htmlspecialchars($submission['gender']) : 'Not Specified'; ?></td>
            <td><?php echo $submission['imageFile'] ? '<a href="' . htmlspecialchars($submission['imageFile']) . '">View</a>' : 'No image'; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
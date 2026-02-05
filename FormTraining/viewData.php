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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
         body { font-family: Arial; padding: 20px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #4CAF50; color: white; }
        .table-wrap {
            width: 100%;
            padding: 0 16px;
            box-sizing: border-box;
            overflow-x: auto;
        }
        @media only screen and (max-width: 600px){
            body {
                width: 100%;
                font: 16px sans-serif;
                box-sizing: border-box;
                padding: 10px;
            }   
            .table-wrap { padding: 0 8px;}
            table { width: 100%;}
            th, td { border: 1px solid #ddd; text-align: left; padding: 6px 8px; white-space: nowrap; font-size: 14px; }
       
        }
        @media only screen and (min-width: 601px) and (max-width: 768px){
            body {
                width: 100%;   
                font: 16px sans-serif;
            }   
        }
    </style>
</head>
<body>
    <h2>Form Submissions</h2>
    <div class="table-wrap">
    <table>
        <tr>
            <th >Name</th>
            <th >Email</th>
            <th >Age</th>
            <th >Gender</th>
            <th >Image</th>
        </tr>
        <?php foreach($submissions as $submission): ?>
        <tr>
            <td><?php echo htmlspecialchars($submission['name']); ?></td>
            <td><?php echo htmlspecialchars($submission['email']); ?></td>
            <td><?php echo htmlspecialchars($submission['age']); ?></td>
            <td><?php echo isset($submission['gender']) ? htmlspecialchars($submission['gender']) : 'Not Specified'; ?></td>
            <td><?php echo $submission['imageFile'] ? '<a href="' . htmlspecialchars($submission['imageFile']) . '">View</a>' : 'No image'; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    </div>
</body>
</html>
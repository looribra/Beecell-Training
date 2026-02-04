<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $name= isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
        $email=isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
        $age= isset($_POST['age']) ? htmlspecialchars($_POST['age']) : '';
        $submissionTime= date('Y-m-d H:i:s');

        $gender = isset($_POST['gender']) ? htmlspecialchars($_POST['gender']) : '';
        


        $imageFile='';
        if(isset($_FILES['imageUpload']) && $_FILES['imageUpload']['error'] == 0){

            $uploadDir = 'uploads/';
            $fileName = basename($_FILES['imageUpload']['name']);
            $filePath= $uploadDir . $fileName;

            if(move_uploaded_file($_FILES['imageUpload']['tmp_name'], $filePath)){
                $imageFile=$filePath;
            }
        }
    $formData= array(
        'name'=> $name,
        'email' => $email,
        'age'=> $age,
        'submissionTime' => $submissionTime,
        'imageFile' => $imageFile,
        'gender' => $gender
    );


    $jsonFile='submissions.json';
    $submissions= array();

    if(file_exists($jsonFile)){
        $jsonContent = file_get_contents($jsonFile);
        $submissions = json_decode($jsonContent, true);

    }
    $submissions[] =$formData;
    file_put_contents($jsonFile, json_encode($submissions, JSON_PRETTY_PRINT));
    
    echo json_encode(['success' => true, 'message' => 'Form submitted successfully!', 'name' => $name]);
    exit;
    }

    




?>

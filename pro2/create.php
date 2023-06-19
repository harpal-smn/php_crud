<?php 
session_start();
    error_reporting(0);
        include 'conn.php';

        if(isset($_POST['submit'])){
            $firstname = $_POST['FirstName'];
            $lastname  = $_POST['LastName'];
            $birthdate = $_POST['BirthDate']; 
            $notes     = $_POST['Notes'];
            
            $filename = $_FILES['Photo']['name'];
            $tempname = $_FILES['Photo']['tmp_name'];
            $photo = "image/.$filename";
            move_uploaded_file($tempname,$photo);

            $insert = "INSERT INTO `employees` (`FirstName`,`LastName`,`BirthDate`,`Photo`,`Notes`) VALUES('$firstname','$lastname','$birthdate', ' $photo', '$notes')";
             
            echo "<pre>";
            print_r($insert);
            echo "</pre>";
           
            $result = mysqli_query($conn, $insert);
            if($result){
                header('location:index.php');
                exit;
            }
            else{
                die('Record not Inserted'.mysqli_connect_error());
            }
            mysqli_close($conn);
        }

        ?>

<!doctype html>
<html lang="ar">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css">

    <title>Empolyee List</title>
</head>

<body>
    <div class="container my-5">
        <h1>Employee List </h1>
        <form method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="" class="form-label">First Name</label>
                <input type="text" class="form-control" name="FirstName" Required>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Last Name</label>
                <input type="text" class="form-control" name="LastName" Required>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">BirthDate</label>
                <input type="date" class="form-control" name="BirthDate" Required>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Photo</label>
                <input type="file" name="Photo" Required>
            </div>
            <div>
                <label for="" class="form-label">Notes</label>
                <input type="text" class="form-control" name="Notes" Required>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                <button type="cancel" class="btn btn-danger"><a href="index.php" class="text-light">Cancel</a< /button>
            </div>
        </form>
    </div>
</body>

</html>
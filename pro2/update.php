<?php 
session_start();
    error_reporting(0);
        include 'conn.php';
        $id = $_GET['empupdate'];

        $sql = "SELECT * FROM `employees` WHERE EmployeeID=$id";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        $firstname  = $row['FirstName'];
        $lastname   = $row['LastName'];
        $birthdate = $row['BirthDate'];
        $photo      = $row['Photo'];
        $notes     = $row['Notes'];


        if(isset($_POST['submit'])){
            $firstname = $_POST['FirstName'];
            $lastname  = $_POST['LastName'];
            $birthdate = $_POST['BirthDate']; 
            $photo     = $_POST['Photo'];
            $notes     = $_POST['Notes'];

            $filename = $_FILES['Photo']['name'];
            $tempname = $_FILES['Photo']['tmp_name'];
            $photo = "image/.$filename";
            move_uploaded_file($tempname,$photo);

            $update = "UPDATE `employees` SET LastName='$lastname', FirstName='$firstname', BirthDate='$birthdate',Photo='$photo', Notes='$notes' WHERE  EmployeeID=$id"; 
             
            $result = mysqli_query($conn, $update);
            if($result){
                header('location:index.php');
            }
            else{
                die('Record not Update'.mysqli_connect_error());
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
    <div class="container my-5" >
        <h1>UPDATE Employee  </h1>
        <form method="post">
            <div class="mb-3">
                <label for="" class="form-label">First Name</label>
                <input type="text" class="form-control" name="FirstName" value="<?php  echo $firstname; ?>">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Last Name</label>
                <input type="text" class="form-control" name="LastName" value="<?php echo $lastname; ?>">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">BirthDate</label>
                <input type="date" class="form-control" name="BirthDate" value="<?php echo $birthdate; ?>">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Photo</label>
                <img src="<?php echo $photo; ?>" width="100" height="100" alt="Image Found"><br>
                <input type="file" name="Photo">
            </div>
            <div>
                <label for="" class="form-label">Notes</label>
                <input type="text" class="form-control" name="Notes" value="<?php echo $notes;?>">
            </div>
            <div class="mt-3">
            <button type="submit" class="btn btn-primary" name="submit">Update</button>
            <button type="cancel" class="btn btn-danger"><a href="index.php" class="text-light">Cancel</a></button>
            </div>
        </form>
    </div>
</body>

</html>
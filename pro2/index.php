<?php 
    include  'conn.php';
?>
<!doctype html>
<html lang="ar">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css">

    <title>Employee List</title>
    <style>
        a{
            text-decoration:none;
        }
    </style>
</head>

<body>
    <div class="container my-5">
        <h1>Show Employee List</h1>
        <button class="btn btn-success float-right"><a href="create.php" class="text-light">Add EMP</a></button>
        <table class="table">
            <thead>
                <tr>
                    <th>Emp ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>BirthDate</th>
                    <th>Photo</th>
                    <th>Notes</th>
                    <th>Edit</th>
                    <th>Delete</th>

                </tr>
            </thead>
            <tbody>
                <?php 

                    $sql  = "SELECT * FROM `employees`";
                    $result = mysqli_query($conn,$sql);
                    if($result){

                        while($row = mysqli_fetch_assoc($result)){
                            $id  = $row['EmployeeID'];
                            $firstname  = $row['FirstName'];
                            $lastname   = $row['LastName'];
                            $birthdate = $row['BirthDate'];
                            $Photo      = $row['Photo'];
                            $notes     = $row['Notes'];
                            echo '<tr>
                            <td>'.$id.'</td>
                            <td>'.$firstname.'</td>
                            <td>'.$lastname.'</td>
                            <td>'.$birthdate.'</td>
                            <td><a href="'.$Photo.'" target="_blank"><img src="'.$Photo.'" height="100" width="100"/><a/></td>
                            <td>'.$notes.'</td>  
                            <td><button class="btn btn-primary"><a href="update.php?empupdate='.$id.'" class="text-light">EDIT</a></button></td>
                            <td><button class="btn btn-danger"><a href="delete.php?empdelete='.$id.'" class="text-light">DELETE</a></button></td>
                        </tr>';
                    } 
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
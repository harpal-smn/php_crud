<?php 

    include 'conn.php';

    if(isset($_GET['empdelete'])){
        $id = $_GET['empdelete'];

        $sql = "DELETE FROM `employees` WHERE EmployeeID=$id";

        $result = mysqli_query($conn,$sql);
        if($result){
           header('location:index.php');
        }
        else{
            die("Employee Not DELETE". mysqli__error($conn));
        }
    }
?>

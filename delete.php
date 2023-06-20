<?php 
    include 'config.php';
    if(isset($_GET['CustomerId'])){
        $id = $_GET['CustomerId'];

        $sql = " DELETE  FROM `Customers` WHERE CustomerID=$id";

        $result = mysqli_query($conn,$sql);
        if($result){
            header('location:index.php');
        }
        else{
            die( mysqli_error($conn));
        }
    }
?>
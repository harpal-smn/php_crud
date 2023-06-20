<?php 
session_start();

     include "config.php";
     
     $Customerid = $_GET['CustomerId'];
     $sql= "SELECT * FROM `Customers` where CustomerID=$Customerid";
     $result = mysqli_query($conn,$sql);
     $row = mysqli_fetch_assoc($result);
     $customerid = $row['CustomerID'];
     $customername = $row['CustomerName'];
     $contactname  = $row['ContactName'];
     $address = $row['Address'];
     $city = $row['City'];
     $postalcode = $row['PostalCode'];
     $country = $row['Country'];

     if (isset($_POST['submit'])) {
        $customer_name= $_POST['CustomerName'];
        $contact_name= $_POST['ContactName'];
        $address= $_POST['Address'];
        $city= $_POST['City'];
        $postal_code= $_POST['PostalCode'];
        $country= $_POST['Country'];

        $sql ="UPDATE `Customers` SET  CustomerID=$Customerid , CustomerName='$customer_name' , ContactName='$contact_name' ,Address='$address' ,  City='$city' , PostalCode='$postal_code' , Country='$country' where CustomerID=$Customerid"; 
        $result = mysqli_query($conn,$sql);
        if($result == TRUE){
           header("Location:index.php");
           exit;
        }
        else{
            echo"Record not submitted";
        }
        $conn->close();

    } 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Crud</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
</head>
<body>
    <div class="card">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-2">
                    <img src="image/img3.png" class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                    <div class="title">
                        <marquee>
                            <p class="text-center h1 fw-bold">Update CUSTOMER </p>
                        </marquee>
                    </div>
                    <form action="" method="POST">
                    <div class="form-group">
                            <label>Customer ID</label>
                            <input type="text" class="form-control" name="CustomerID" value="<?php echo $Customerid ?>">
                        </div>
                        <div class="form-group">
                            <label>Customer Name </label>
                            <input type="text" class="form-control" name="CustomerName" value="<?php echo $customername ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Contact Name</label>
                            <input type="text" class="form-control" name="ContactName" value="<?php echo $contactname ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" class="form-control" name="Address" value="<?php echo $address ?>">
                        </div>
                        <div class="form-group">
                            <label for="">City</label>
                            <input type="text" class="form-control" name="City" value="<?php echo $city ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Postal Code</label>
                            <input type="text" class="form-control" name="PostalCode" value="<?php echo $postalcode ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Country</label>
                            <input type="text" class="form-control" name="Country" value="<?php echo $country ?>">
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check In</label>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Update</button>
                        <button type="submit" class="btn btn-danger" name="submit"><a href="index.php" class="text-light">Cancel</a></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
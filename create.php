<?php 
session_start();

     include "config.php";

     if (isset($_POST['submit'])) {
        $customer_name= $_POST['CustomerName'];
        $contact_name= $_POST['ContactName'];
        $address= $_POST['Address'];
        $city= $_POST['City'];
        $postal_code= $_POST['PostalCode'];
        $country= $_POST['Country'];

        $sql = "INSERT INTO `customers`(`CustomerName`, `ContactName`, `Address`, `City`, `PostalCode`, `Country`) VALUES ('$customer_name','$contact_name','$address','$city','$postal_code','$country')";
    
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js">
    </script>
    <script>
    function validateform() {
        const fields = ['CustomerName', 'ContactName', 'Address', 'City', 'PostalCode', 'Country'];

        for (let field of fields) {
            const input = document.getElementById(field);
            if (input.value === '') {
                alert(`${field} is required.`);
                input.focus();
                return false;
            }
        }
        return true;
    }
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
                            <p class="text-center h1 fw-bold">ADD NEW CUSTOMER </p>
                        </marquee>
                    </div>
                    <form method="POST" onsubmit="return validateform()">
                        <div class="form-group">
                            <label>Customer Name </label>
                            <input type="text" class="form-control" name="CustomerName" id="CustomerName">
                        </div>
                        <div class="form-group">
                            <label for="">Contact Name</label>
                            <input type="text" class="form-control" name="ContactName" id="ContactName">
                        </div>
                        <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" class="form-control" name="Address" id="Address">
                        </div>
                        <div class="form-group">
                            <label for="">City</label>
                            <input type="text" class="form-control" name="City" id="City">
                        </div>
                        <div class="form-group">
                            <label for="">Postal Code</label>
                            <input type="text" class="form-control" name="PostalCode" id="PostalCode">
                        </div>
                        <div class="form-group">
                            <label for="">Country</label>
                            <input type="text" class="form-control" name="Country" id="Country">
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        <button type="submit" class="btn btn-danger" name="submit"><a href="index.php"
                                class="text-light">Cancel</a></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
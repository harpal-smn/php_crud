<?php 
include_once("config.php");
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
    <div class="container">
        <button class="btn btn-primary my-5"><a href="create.php" class="text-light">Add User</a></button>
        <table class="table">
            <thead>
                <tr>
                    <th>CustomerID</th>
                    <th>CustomerName</th>
                    <th>ContactName</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>PostalCode</th>
                    <th>Country</th>
                    <th colspan="2" style="text-align:center;">Opration</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                
                $sql="SELECT * FROM `Customers`";
                $result= mysqli_query($conn,$sql);
                if($result){
                    while ($row=mysqli_fetch_assoc($result)) {
                        $customerid = $row['CustomerID'];
                        $customername = $row['CustomerName'];
                        $contactname  = $row['ContactName'];
                        $address = $row['Address'];
                        $city = $row['City'];
                        $postalcode = $row['PostalCode'];
                        $country = $row['Country'];
                        echo '<tr>
                        <td>'.$customerid.'</td>
                        <td>'.$customername.'</td>
                        <td>'.$contactname.'</td>
                        <td>'.$address.'</td>
                        <td>'.$city.'</td>
                        <td>'.$postalcode.'</td>
                        <td>'.$country.'</td>
                        <td><button class="btn btn-primary "><a  class="text-light "href="update.php?CustomerId='.$customerid.'">UPDATE</a></button></td>
                        <td><button class="btn btn-danger "><a class="text-light"href="delete.php?CustomerId='.$customerid.'">DELETE</a></button></td>
                    </tr>';
                    }
                }
                ?>
                
            </tbody>
        </table>
    </div>
</body>

</html>
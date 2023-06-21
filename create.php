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
        if(mysqli_query($conn,$sql) == TRUE){
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
    // function validateform() {
    //     const fields = ['CustomerName', 'ContactName', 'Address', 'City', 'PostalCode', 'Country'];
    //     const validation = { CustomerName: 'Please Enter Customer Name',
    //         ContactName: 'Please Must Be Character min 3' }
    //     for (let field of fields) {
    //         const input = document.getElementById(field);
    //         if (input.value === '') {
    //             // alert(`${field} is required.`);
    //             document.getElementById('errCustomerName').innerHTML = validation[field];
    //             input.focus();
    //             return false;
    //         }
    //     }
    //     return true;
    // }

    ///////// New Script///////////
    // function validateform() {
    //     //Customer Name
    //     let cname = document.cform.CustomerName;
    //     let cuName = cname.value;
    //     if (cuName == '') {
    //         cname.focus();
    //         document.getElementById('errCustomerName').innerHTML = 'Please Enter Customer Name';
    //         document.getElementById('errCustomerName').style.color = 'red';
    //         return false;
    //     }

    //     if (cuName.length < 3) {
    //         cname.focus();
    //         document.getElementById('errCustomerName').innerHTML = 'Please Must Be Character min 3';
    //         document.getElementById('errCustomerName').style.color = 'red';
    //         return false;
    //     }

    //     let cnameSRegEx = /^[A-Za-z]+$/;
    //     let cNameSRegEx = cnameSRegEx.test(cuName);
    //     if (cNameSRegEx == false) {
    //         cname.focus();
    //         document.getElementById('errCustomerName').innerHTML = "Please enter only alphabets Character";
    //         document.getElementById('errCustomerName').style.color = "red";
    //         return false;
    //     }

    //     //Contact Name
    //     let coname = document.cform.ContactName;
    //     let coName = coname.value;
    //     if (coName == '') {
    //         coname.focus();
    //         document.getElementById('errContactName').innerHTML = 'Plase Enter Contact Name';
    //         document.getElementById('errContactName').style.color = 'red';
    //         return false;
    //     }
    //     if (coName.length < 3) {
    //         coname.focus();
    //         document.getElementById('errContactName').innerHTML = 'Please Must Be Character min 3';
    //         document.getElementById('errContactName').style.color = 'red';
    //         return false;
    //     }

    //     let conameSRegEx = /^[A-Za-z]+$/;
    //     let coNameSRegEx = conameSRegEx.test(coName);
    //     if (coNameSRegEx == false) {
    //         coname.focus();
    //         document.getElementById('errContactName').innerHTML = "Please enter only alphabets Character";
    //         document.getElementById('errContactName').style.color = "red";
    //         return false;
    //     }

    //     //Address
    //     let add = document.cform.Address;
    //     let address = add.value;
    //     if (address == '') {
    //         add.focus();
    //         document.getElementById('errAddress').innerHTML = "Please Enter Address";
    //         document.getElementById('errAddress').style.color = 'red';
    //         return false;
    //     }
    //     if (address.length < 3) {
    //         add.focus();
    //         document.getElementById('errAddress').innerHTML = 'Please Must Be Character min 3';
    //         document.getElementById('errAddress').style.color = 'red';
    //         return false;
    //     }

    //     //City
    //     let city = document.cform.City;
    //     let City = city.value;
    //     if (City == '') {
    //         city.focus();
    //         document.getElementById('errCity').innerHTML = 'Please Enter City';
    //         document.getElementById('errCity').style.color = 'red';
    //         return false;
    //     }
    //     if (City.length < 3) {
    //         city.focus();
    //         document.getElementById('errCity').innerHTML = 'Please Must Be Character min 3';
    //         document.getElementById('errCity').style.color = 'red';
    //         return false;
    //     }

    //     let citySRegEx = /^[A-Za-z]+$/;
    //     let CitySRegEx = citySRegEx.test(City);
    //     if (CitySRegEx == false) {
    //         city.focus();
    //         document.getElementById('errCity').innerHTML = "Please enter only alphabets Character";
    //         document.getElementById('errCity').style.color = "red";
    //         return false;
    //     }
    //     //Country
    //     let country = document.cform.Country;
    //     let Country = country.value;
    //     if (Country == '') {
    //         country.focus();
    //         document.getElementById('errCountry').innerHTML = 'Please Enter Country Name';
    //         document.getElementById('errCountry').style.color = 'red';
    //         return false;
    //     }

    //     //PostalCode
    //     let code = document.cform.PostalCode;
    //     let pocode = code.value;
    //     if (pocode == '') {
    //         code.focus();
    //         document.getElementById('errPostalCode').innerHTML = 'Please Enter Postal Code';
    //         document.getElementById('errPostalCode').style.color = 'red';
    //         return false;
    //     }
    //     let pocodeSRegEx = /^[\d!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+$/;
    //     let pocodeCheck = pocodeSRegEx.test(pocode);
    //     if (pocodeCheck == false) {
    //         code.focus();
    //         document.getElementById('errPostalCode').innerHTML = "Enter Only Number";
    //         document.getElementById('errPostalCode').style.color = "red";
    //         return false;
    //     }
    //     if(pocode  > 5){
    //         code.focus();
    //         document.getElementById('errPostalCode').innerHTML = "Only type 6 Character Valid";
    //         document.getElementById('errPostalCode').style.color = "red";
    //     }
    // }

    function validateform() {
    const fields = [
        { name: 'CustomerName', label: 'Customer Name', minLength: 3, regex: /^[A-Za-z]+$/ },
        { name: 'ContactName', label: 'Contact Name', minLength: 3, regex: /^[A-Za-z]+$/ },
        { name: 'Address', label: 'Address', minLength: 3, regex: null },
        { name: 'City', label: 'City', minLength: 3, regex: /^[A-Za-z]+$/ },
        { name: 'Country', label: 'Country', minLength: 1, regex: null },
        { name: 'PostalCode', label: 'Postal Code', minLength: 6, regex: /^[\d!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+$/ }
    ];

    let isValid = true;

    fields.forEach(field => {
        const element = document.cform[field.name];
        const value = element.value;
        const errorElement = document.getElementById('err' + field.name);

        if (value.trim() === '') {
            element.focus();
            errorElement.innerHTML = 'Please enter ' + field.label;
            errorElement.style.color = 'red';
            isValid = false;
            return;
            
        }

        if (field.minLength && value.length < field.minLength) {
            element.focus();
            errorElement.innerHTML = 'Please enter at least ' + field.minLength + ' characters for ' + field.label;
            errorElement.style.color = 'red';
            isValid = false;
            return;
        }

        if (field.regex && !field.regex.test(value)) {
            element.focus();
            errorElement.innerHTML = 'Please enter only alphabets for ' + field.label;
            errorElement.style.color = 'red';
            isValid = false;
            return;
        }
    });

    if (isValid) {
        const postalCode = document.cform.PostalCode.value;
        if (postalCode.length !== 6) {
            code.focus();
            document.getElementById('errPostalCode').innerHTML = "Only 6 characters are valid for Postal Code";
            document.getElementById('errPostalCode').style.color = "red";
            isValid = false;
        }
    }

    return isValid;
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
                    <form method="POST" onsubmit="return validateform()" name="cform">
                        <div class="form-group">
                            <label>Customer Name </label>
                            <input type="text" class="form-control" name="CustomerName" id="CustomerName">
                            <p id="errCustomerName" name="errCustomerName"></p>

                        </div>
                        <div class="form-group">
                            <label for="">Contact Name</label>
                            <input type="text" class="form-control" name="ContactName" id="ContactName">
                            <p id="errContactName" name="errContactName"></p>
                        </div>
                        <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" class="form-control" name="Address" id="Address">
                            <p id="errAddress" name="errAddress"></p>
                        </div>
                        <div class="form-group">
                            <label for="">City</label>
                            <input type="text" class="form-control" name="City" id="City">
                            <p id="errCity" name="errCity"></p>
                        </div>
                        <div class="form-group">
                            <label for="">Country</label>
                            <input type="text" class="form-control" name="Country" id="Country">
                            <p id="errCountry" name="errCountry"></p>
                        </div>
                        <div class="form-group">
                            <label for="">Postal Code</label>
                            <input type="text" class="form-control" name="PostalCode" id="PostalCode">
                            <p id="errPostalCode" name="errPostalCode"></p>
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
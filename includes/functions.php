<?php
function emptyInputSignup($username, $email, $password, $cpassword, $company_name, $company_address1,$company_address2, $city, $country, $phone ,$vat_accounting , $eori_number , $currency , $first_name , $last_name, $position_in_company , $email_company,$consent){
    if(empty($username) || empty($email) || empty($password) || empty($cpassword) || empty($company_name) || empty($company_address1) || empty($company_address2) || empty($city) || empty($country) || empty($phone) || empty($vat_accounting) || empty($eori_number)  || empty($currency) || empty($first_name) ||  empty($last_name) || empty($position_in_company) || empty($email_company) || empty($consent)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
} 

function emptyInputSignupEmployee($username, $email, $password, $cpassword){
    if(empty($username) || empty($email) || empty($password) || empty($cpassword)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function emptyInputContact($subject, $company_name, $eori, $contact_email ,$message){
    if(empty($subject) || empty($company_name) || empty($eori) || empty($contact_email) || empty($message)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function emptyInputLogin($username, $password){
    if(empty($username) || empty($password)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
} 

function invalidUsername($username){
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function invalidEmail($email){
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function passwordMatch($password, $cpassword){
    if($password !== $cpassword){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function passowrdLength($password){
    if(strlen($password) <= 6){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function usernameExists($conn, $username, $email){
    $sql = "SELECT * FROM users WHERE username = ? OR email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../register.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultsData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultsData)){
        return $row;
    }else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createContact($conn, $date, $subject, $company_name, $eori, $contact_email,$contact_number ,$message){
    $sql = "INSERT INTO contact (Date, Subject, Company_Name, Eori, Contact_Email, Contact_Number, Message) VALUES (?,?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../contact.php?error=stmtfailed");
        exit();
    }


    mysqli_stmt_bind_param($stmt, "sssssss", $date, $subject, $company_name, $eori, $contact_email,$contact_number ,$message);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../contact.php?error=none");
    exit();
}


function createUser($conn, $username, $email, $password, $role, $company_name, $company_address1,$company_address2, $city, $country, $email_company, $phone ,$vat_accounting , $eori_number , $company_reg_no, $duty_deferment_account_no, $currency , $first_name , $last_name, $position_in_company ,$consent){
    $sql = "INSERT INTO users (username, email, password, role, CompanyName, CompanyAddress1, CompanyAddress2, City, Country, EmailCompany, Phone, VatAccounting, EoriNumber, CompanyRegNo, DutyDefermentAccount, Currency, FirstName, LastName, PositionInCompany, Consent) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../register.php?error=stmtfailed");
        exit();
    }

    $hashedpassword = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssssssssssssssssssss", $username, $email, $hashedpassword, $role, $company_name, $company_address1,$company_address2, $city, $country, $email_company, $phone ,$vat_accounting , $eori_number , $company_reg_no, $duty_deferment_account_no, $currency , $first_name , $last_name, $position_in_company ,$consent);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../register.php?error=none");
    exit();
}

function createEmployee($conn, $username, $email, $password, $role){
    $sql = "INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../register.php?error=stmtfailed");
        exit();
    }

    $hashedpassword = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $hashedpassword, $role);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../add_employee.php?error=none");
    exit();
}
function loginUser($conn, $username, $password){
    $userExists = usernameExists($conn, $username, $username);

    if($userExists === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $passwordHashed = $userExists["password"];
    $checkPassword = password_verify($password, $passwordHashed);

    if($checkPassword === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }else if($checkPassword === true){
        session_start();
        $_SESSION["username"] = $userExists["username"];
        $_SESSION["password"] = $userExists["password"];
        header("location: ../index.php");
        exit();
    }

}



/*function createTicket($conn, $type, $ticket_date, $status, $export_eori, $export_phone_number, $export_addres , $export_email, $export_city, $export_vehicle_nationality, $export_postal_code, $export_street, $export_number, $export_country, 
    $export_registration_number, $export_departure_name, $export_transport_name, $export_departure_number, $export_transport_number, $export_date_arrival, $export_import_also, $export_destination_name, 
    $export_destination_number, $export_date_driver_arrival, $export_T1, $export_country_of_origin, $export_commodity_code, $export_description_of_good, $export_packages_type, $export_net_weight, 
    $export_gross_weight, $export_item_value, $export_currency, $export_quantity, $export_total_packages, $export_total_net_weight, $export_total_gross_weight, $export_invoice_number, $export_total_value, 
    $export_freight_charges, $export_additional_notes, $export_name, $export_surname){


    (Type, TicketDate, Status, Eori, PhoneNumber, Address, Email, City, VehicleNationality, PostalCode, Street, Number, Country, RegistrationNumber, DepartureName, TransportName, DepartureNumber, TransportNumber, 
    DateArrival, T1, CountryOfOrigin, CommodityCode, DescriptionOfGoods, PackagesType, NetWeight, GrossWeight, ItemValue, Currency, Quantity, TotalPackages, TotalNetWeigth, TotalGrossWeight, InvoiceNumber, TotalValue, FreightCharges, 
    AdditionalNotes, Name, Surname, InvoicePDF, AwbCmrPDF, AdditionalFile)
    echo"Komunikat z functions przed dodatniem<br>";
    
    $sql1 = "INSERT INTO tickets VALUES ($type, $ticket_date, $status, $export_eori, $export_phone_number, $export_addres , $export_email, $export_city, $export_vehicle_nationality, $export_postal_code, $export_street, $export_number, $export_country, 
    $export_registration_number, $export_departure_name, $export_transport_name, $export_departure_number, $export_transport_number, $export_date_arrival, $export_import_also, $export_destination_name, 
    $export_destination_number, $export_date_driver_arrival, $export_T1, $export_country_of_origin, $export_commodity_code, $export_description_of_good, $export_packages_type, $export_net_weight, 
    $export_gross_weight, $export_item_value, $export_currency, $export_quantity, $export_total_packages, $export_total_net_weight, $export_total_gross_weight, $export_invoice_number, $export_total_value, 
    $export_freight_charges, $export_additional_notes, $export_name, $export_surname);";

    //$result = mysqli_query($conn, $sql);

    $sql = "INSERT INTO `tickets`(`id`, `Type`, `TicketDate`, `Status`, `Eori`, `PhoneNumber`, `Address`, `Email`, `City`, `VehicleNationality`, `PostalCode`, `Street`, `Number`, `Country`, `RegistrationNumber`, `DepartureName`, `TransportName`, `DepartureNumber`, `TransportNumber`, `DateArrival`, `ImportAlso`, `DestiantionName`, `DestinationNumber`, `DateDriverArrival`, `T1`, `CountryOfOrigin`, `CommodityCode`, `DescriptionOfGoods`, `PackagesType`, `NetWeight`, `GrossWeight`, `ItemValue`, `Currency`, `Quantity`, `TotalPackages`, `TotalNetWeight`, `TotalGrossWeight`, `InvoiceNumber`, `TotalValue`, `FreightCharges`, `AdditionalNotes`, `Name`, `Surname`) VALUES ('$type', '$ticket_date', '$status', '$export_eori', '$export_phone_number', '$export_addres' , '$export_email', '$export_city', '$export_vehicle_nationality', '$export_postal_code', '$export_street', '$export_number', '$export_country', 
    '$export_registration_number', '$export_departure_name', '$export_transport_name', '$export_departure_number', '$export_transport_number',' $export_date_arrival', '$export_import_also', '$export_destination_name', 
    '$export_destination_number', '$export_date_driver_arrival', '$export_T1', '$export_country_of_origin', '$export_commodity_code', '$export_description_of_good', '$export_packages_type', '$export_net_weight', 
    '$export_gross_weight', '$export_item_value', '$export_currency, '$export_quantity', '$export_total_packages', '$export_total_net_weight', '$export_total_gross_weight', '$export_invoice_number', '$export_total_value', 
    '$export_freight_charges', '$export_additional_notes','$export_name', '$export_surname')";

    //$query = mysqli_query($conn, $sql);
    if ($conn->query($sql)) {
        echo "New record created successfully";
        echo "<script>alert('Wow! File uploaded successfully.')</script>";
        header("location: ../user.php");
        exit();
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
      
}*/


?>
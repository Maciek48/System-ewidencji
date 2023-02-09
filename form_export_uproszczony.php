<?php 

session_start();
error_reporting(0);

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}

if(isset($_POST['export_submit'])){

    include_once 'includes/config.php';

    //Typ zgłoszenia
    $username = $_SESSION['username'];
    $type = "export";

    //dodanie daty
    date_default_timezone_set('Europe/Warsaw');
    $ticket_date = date("Y-m-d H:i:s");

    //status zgłoszenia
    $status = "sent";

    $export_eori = $_POST['eori_number'];
    $export_phone_number = $_POST['phone_number'];
    $export_addres = $_POST['addres'];
    $export_email = $_POST['email'];
    $export_city = $_POST['city'];
    $export_vehicle_nationality = $_POST['countrys1'];
    $export_postal_code = $_POST['postal_code'];
    $export_street = $_POST['street'];
    $export_number = $_POST['number'];
    $export_country = $_POST['countrys'];

    $export_registration_number = $_POST['registration_number'];

    $export_departure_name = $_POST['dep_office_usual_name'];
    $export_transport_name = $_POST['tras_office_usual_name'];
    $export_departure_number = $_POST['dep_office_number'];
    $export_transport_number = $_POST['trans_office_number'];
    $export_date_arrival = $_POST['dep_arrival_date'];
    $export_import_also = $_POST['import_declaration_destiantion'];

    $export_destination_name = $_POST['dest_office_usual_name'];
    $export_destination_number = $_POST['dest_office_number'];
    $export_date_driver_arrival = $_POST['arrival_date_at_customs_import'];

    $export_T1 = $_POST['T1'];

    $export_country_of_origin = $_POST['country_of_origin'];
    $export_commodity_code = $_POST['commodity_code'];
    $export_description_of_good = $_POST['description_of_good'];

    $export_packages_type = $_POST['packages_type'];
    $export_net_weight = $_POST['net_weight'];
    $export_gross_weight = $_POST['gross_weight'];
    $export_item_value = $_POST['item_value'];
    $export_currency = $_POST['currency'];
    $export_quantity = $_POST['quantity'];
    $export_total_packages = $_POST['total_packages'];
    $export_total_net_weight = $_POST['total_net_weight'];
    $export_total_gross_weight = $_POST['total_gross_weight'];
    $export_invoice_number = $_POST['invoice_number'];

    $export_total_value = $_POST['total_value'];
    $export_freight_charges = $_POST['freight_charges'];
    $export_incoterms = $_POST['incoterms'];
    $export_additional_notes = $_POST['additional_notes'];
    $export_name = $_POST['name'];
    $export_surname = $_POST['surname'];
    //var_dump($_POST);
    
    //Pliki
    
    //$invoice = $_FILES['invoice']['name'];
    $invoice = $_SESSION['username'] . date("dmy") .$_FILES['invoice']['name'];
    $invoice_type = $_FILES['invoice']['type'];
    $invoice_size = $_FILES['invoice']['size'];
    $invoice_tem_loc = $_FILES['invoice']['tmp_name'];

    //$awb_cmr = $_FILES['awb_cmr']['name'];
    $awb_cmr = $_SESSION['username'] . date("dmy") .$_FILES['awb_cmr']['name'];
    $awb_cmr_type = $_FILES['awb_cmr']['type'];
    $awb_cmr_size = $_FILES['awb_cmr']['size'];
    $awb_cmr_tem_loc = $_FILES['awb_cmr']['tmp_name'];

    //$add_doc = $_FILES['add_doc']['name'];
    $add_doc = $_SESSION['username'] . date("dmy") .$_FILES['add_doc']['name'];
    $add_doc_type = $_FILES['add_doc']['type'];
    $add_doc_size = $_FILES['add_doc']['size'];
    $add_doc_tem_loc = $_FILES['add_doc']['tmp_name'];

    //Sciezka do plików
    $folder_name = $_SESSION['username'] . date("dmy");
    mkdir("upload/export/$folder_name", 0777, true);

    $location1 = "./upload/export/$folder_name/".$invoice;
    $location2 = "./upload/export/$folder_name/".$awb_cmr;
    $location3 = "./upload/export/$folder_name/".$add_doc;
    //var_dump($_FILES);
    
    

    if ($invoice_size > 5242880 || $awb_cmr_size > 5242880 || $add_doc_size > 5242880) { // Check file size 5mb or not
		echo "<script>alert('Woops! Files are too big. Maximum each file size allowed for upload 5 MB.')</script>";
	} else {

        move_uploaded_file($invoice_tem_loc, $location1);
        move_uploaded_file($awb_cmr_tem_loc, $location2);
        move_uploaded_file($add_doc_tem_loc, $location3);

        $sql = "INSERT INTO `tickets`(`id`, `Username`, `Type`, `TicketDate`, `Status`, `Eori`, `PhoneNumber`, `Address`, `Email`, `City`, `VehicleNationality`, `PostalCode`, `Street`, `Number`, `Country`, `RegistrationNumber`, `DepartureName`, `TransportName`, `DepartureNumber`, `TransportNumber`, `DateArrival`, `ImportAlso`, `DestiantionName`, `DestinationNumber`, `DateDriverArrival`, `T1`, `CountryOfOrigin`, `CommodityCode`, `DescriptionOfGoods`, `PackagesType`, `NetWeight`, `GrossWeight`, `ItemValue`, `Currency`, `Quantity`, `TotalPackages`, `TotalNetWeight`, `TotalGrossWeight`, `InvoiceNumber`, `TotalValue`, `FreightCharges`, `Incoterms`, `AdditionalNotes`, `Name`, `Surname`, `FileInvoiceName`, `FileAwbCmrName`, `FileAddDocName`, `FolderName`) VALUES ('[value-1]', '$username','$type','$ticket_date','$status','$export_eori','$export_phone_number','$export_addres','$export_email','$export_city','$export_vehicle_nationality','$export_postal_code','$export_street','$export_number','$export_country','$export_registration_number','$export_departure_name','$export_transport_name','$export_departure_number','$export_transport_number','$export_date_arrival','$export_import_also','$export_destination_name','$export_destination_number','$export_date_driver_arrival','$export_T1','$export_country_of_origin','$export_commodity_code','$export_description_of_good','$export_packages_type','$export_net_weight','$export_gross_weight', '$export_item_value','$export_currency','$export_quantity','$export_total_packages','$export_total_net_weight','$export_total_gross_weight','$export_invoice_number','$export_total_value','$export_freight_charges', '$export_incoterms', '$export_additional_notes','$export_name','$export_surname', '$invoice', '$awb_cmr', '$add_doc', '$folder_name')";

        $result = mysqli_query($conn, $sql);

        if($result && isset($_POST['export_submit'])){
            header("Location: user.php");
            echo '<script>alert("Udalo sie dodac zgłoszenie do bazy danych")</script>';
            exit();
        }else{
            echo '<script>alert("Nie udalo sie dodac zgłoszenie do bazy danych")</script>';
            header("Location: user.php");
            exit();
        }
        
	}


    

    
    

}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <!-- Name of the page -->
    <title>Agencja Celna Wega</title>

    <!-- Icon in the browser-->
    <link rel="icon" type="image/x-icon" href="assets/icon-truck.png" />

    <!-- Font from fonts.google.com-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

    <!-- inculde CSS file-->
    <style>
    <?php include 'css/styles.css';
    ?>
    </style>
</head>

<body>
    <header>
        <!-- Navigation Bar -->
        <nav class="navbar">
            <div class="brand-title">
                <a href="index.php"><img src="assets/logo_wega_final.png" alt="logo"></a>
            </div>
                <a href="#" class="toggle-button">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </a>
            <div class="navbar-links">
                <ul>
                    <li><a href="user.php">User page</a></li>
                    <li><a href="form.php">Custom clearence</a></li>
                    <li><a href="includes/logout.php">Logout</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Language images -->
    <!--
        <div class="languages">
            <a href="index.php"><img src="assets/icon-pl.png" alt="Ikona PL"></a>
            <a href="index_eng.php"><img src="assets/icon-eng.png" alt="Ikona ENG"></a>
        </div>-->
    <!-- Separating line -->
    <div class="line"></div>
    <!-- Main text -->
    <div class="form_export">
        <div class="display_form">

            <!-- Form to make a export -->
            <form action="form_export.php" method="POST" enctype="multipart/form-data">
                <h1>Export Form</h1>
                <table class="export_form">
                    <thead>
                        <tr>
                            <th></th>
                            <th></th>
                            <th>
                                <h2>Contact data of forwarding agent or driver</h2>
                            </th>
                        </tr>
                    </thead>
                    <tr>
                        <td>
                            <h2>Exporter's EORI*</h2>
                        </td>
                        <td><input type="text" name="eori_number" placeholder="EORI" required
                                value="<?php echo $export_eori; ?>"></td>
                        <td>Phone number*</td>
                        <td><input type="text" name="phone_number" required
                                value="<?php echo $export_phone_number; ?>"></br></td>
                    </tr>
                    
                    <tr>
                        <td>Vehicle's nationality*</td>
                        <td><select name="countrys1" id="countrys" size="3">
                                <option value="Poland" selected required>Poland</option>
                                <option value="England">England</option>
                                <option value="Slovakia">Slovakia</option>
                                <option value="Germany">Germany</option>
                                <option value="Ukraine">Ukraine</option>
                                <option value="Sweden">Sweden</option>
                                <option value="Norway">Norway</option>
                                <option value="Estonia">Estonia</option>
                                <option value="Finland">Finland</option>
                                <option value="Belarus">Belarus</option>
                                <option value="Russia">Russia</option>
                                <option value="Netherlands">Netherlands</option>
                                <option value="Czech_Republic">Czech Republic</option>
                                <option value="Hungary">Hungary</option>
                                <option value="Austria">Austria</option>
                                <option value="Belgium">Belgium</option>
                                <option value="France">France</option>
                            </select>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>Vehicle/Trailer registration number </td>
                        <td><input type="text" name="registration_number"
                                placeholder="This will be id of this transport"  size="40"
                                value="<?php echo $export_registration_number; ?>"></td>
                    </tr>
                </table></br>


                </br>

                <table class="export_form">
                    <thead>
                        <tr>
                            <th>
                                <h2>Departure custums office number</h2>
                            </th>
                            
                        </tr>
                    </thead>
                    <tr>
                        <td>Departure customs office usual name</td>
                        <td><input type="text" name="dep_office_usual_name" 
                                value="<?php echo $export_departure_name; ?>"></td>
                        
                    </tr>
                    <tr>
                        <td>Departure customs office number</td>
                        <td><input type="text" name="dep_office_number" 
                                value="<?php echo $export_departure_number; ?>"></td>
                        
                    </tr>
                    <tr>
                        <td>Date and time of driver's arrival at customs*</td>
                        <td><input type="datetime-local" name="dep_arrival_date" required
                                value="<?php echo $export_date_arrival; ?>"></td>
                    </tr>
                </table>

                <br>
                <table class="export_form">
                    <tr>
                        <td>Do you require also import declaration in destiantion customs office*</td>

                    </tr>
                    <tr>
                        <td><input type="radio" name="import_declaration_destiantion" value="yes" checked>Yes <input
                                type="radio" name="import_declaration_destiantion" value="no">No</td>
                    </tr>
                </table>

                <br>

                <table class="export_form">
                    <thead>
                        <tr>
                            <th>
                                <h2>Destiantion customs office number</h2>
                            </th>
                        </tr>
                    </thead>
                    <tr>
                        <td>Destiantion customs office usual name*</td>
                    </tr>
                    <tr>
                        <td><input type="text" name="dest_office_usual_name" required
                                value="<?php echo $export_destination_name; ?>"></td>
                    </tr>
                    <tr>
                        <td>Destiantion customs office number*</td>
                    </tr>
                    <tr>
                        <td><input type="text" name="dest_office_number" required
                                value="<?php echo $export_destination_number; ?>"></br></td>
                    </tr>
                    <tr>
                        <td>Date and time of driver's arrival at customs for import*</td>
                    </tr>
                    <tr>
                        <td><input type="datetime-local" name="arrival_date_at_customs_import"
                                value="<?php echo $export_date_driver_arrival; ?>" required></td>
                    </tr>
                </table>

                </br>
                <h3>Do you require T1 to be issued for this export*</h3><br>
                <input type="radio" name="T1" value="yes" >Yes
                <input type="radio" name="T1" value="no" checked>No<br>


                

                <br>
                <table class="export_form">
                    <thead>
                        <tr>
                            <th>
                                <h2>Attachments</h2>
                            </th>
                            <th> </th>
                            <th>
                                <h2>Your details</h2>
                            </th>
                        </tr>
                    </thead>
                    <tr>
                        <td>Invoice*</td>
                        <td><input type="file" name="invoice"></td>
                       <td>Name*</td>
                        <td><input type="text" name="name" required value="<?php echo $export_name; ?>"></td>
                    </tr>
                    <tr>
                        <td>AWB/CMR*</td>
                        <td><input type="file" name="awb_cmr"></td>
                        <td>Surname*</td>
                        <td><input type="text" name="surname" required value="<?php echo $export_surname; ?>"></td>
                    </tr>
                    <tr>
                        <td>Additional documentation</td>
                        <td><input type="file" name="add_doc"></td>
                    </tr>
                </table>

                <br>
                <table class="export_form">
                    <tr>
                        <td><br>Consetn and confirmation<br>
                            I, the undersigned declare that the above information is true and complete.<br>
                            I will forward copy documents if required and will keep original documents safe for the
                            statutory period.
                            <input type="radio" name="consent_and_conf" value="yes" required>Accept*
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <br> We will process the stamp duty of PLN 17 for you and reinvoice it
                            the authorization can be signed only by a person authorized according to the national court
                            register
                            <input type="radio" name="17PLN" value="accept" required>Accept*<br><br>
                        </td>
                    </tr>
                </table>
                <br><br>

                <label>
                    <button type="submit" class="transport_submit" name="export_submit">Submit</button>
                </label>
            </form>

        </div>
    </div>
    <!-- Separating line -->
    <div class="line"></div>
</body>
<footer>
    <!-- Footer contact -->
    <div class="stopka">
        <h5>Copyright &copy; ACWEGA 2022</h5>
    </div>

</footer>

</html>
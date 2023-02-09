<?php 

session_start();
error_reporting(0);

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}

if(isset($_POST['import_submit'])){

    include_once 'includes/config.php';

    //Typ zgłoszenia
    $username = $_SESSION['username'];
    $type = "import";

    //dodanie daty
    date_default_timezone_set('Europe/Warsaw');
    $ticket_date = date("Y-m-d H:i:s");

    //status zgłoszenia
    $status = "sent";

    $import_eori = $_POST['eori_number'];
    $import_phone_number = $_POST['phone_number'];
    $import_addres = $_POST['addres'];
    $import_email = $_POST['email'];
    $import_city = $_POST['city'];
    $import_vehicle_nationality = $_POST['countrys1'];
    $import_postal_code = $_POST['postal_code'];
    $import_street = $_POST['street'];
    $import_number = $_POST['number'];
    $import_country = $_POST['countrys'];

    $import_registration_number = $_POST['registration_number'];
    

    $import_destination_name = $_POST['dest_office_usual_name'];
    $import_destination_number = $_POST['dest_office_number'];
    $import_date_driver_arrival = $_POST['arrival_date_at_customs_import'];

    $import_country_of_origin = $_POST['country_of_origin'];
    $import_commodity_code = $_POST['commodity_code'];
    $import_description_of_good = $_POST['description_of_good'];

    $import_packages_type = $_POST['packages_type'];
    $import_net_weight = $_POST['net_weight'];
    $import_gross_weight = $_POST['gross_weight'];
    $import_item_value = $_POST['item_value'];
    $import_currency = $_POST['currency'];
    $import_quantity = $_POST['quantity'];
    $import_total_packages = $_POST['total_packages'];
    $import_total_net_weight = $_POST['total_net_weight'];
    $import_total_gross_weight = $_POST['total_gross_weight'];
    $import_invoice_number = $_POST['invoice_number'];

    $import_total_value = $_POST['total_value'];
    $import_freight_charges = $_POST['freight_charges'];
    $import_incoterms = $_POST['incoterms'];
    $import_additional_notes = $_POST['additional_notes'];
    $import_name = $_POST['name'];
    $import_surname = $_POST['surname'];
    
    //Pliki
    $invoice = $_SESSION['username'] . date("dmy") .$_FILES['invoice']['name'];
    $invoice_type = $_FILES['invoice']['type'];
    $invoice_size = $_FILES['invoice']['size'];
    $invoice_tem_loc = $_FILES['invoice']['tmp_name'];

    $awb_cmr = $_SESSION['username'] . date("dmy") .$_FILES['awb_cmr']['name'];
    $awb_cmr_type = $_FILES['awb_cmr']['type'];
    $awb_cmr_size = $_FILES['awb_cmr']['size'];
    $awb_cmr_tem_loc = $_FILES['awb_cmr']['tmp_name'];

    $add_doc = $_SESSION['username'] . date("dmy") .$_FILES['add_doc']['name'];
    $add_doc_type = $_FILES['add_doc']['type'];
    $add_doc_size = $_FILES['add_doc']['size'];
    $add_doc_tem_loc = $_FILES['add_doc']['tmp_name'];

    $folder_name = $_SESSION['username'] . date("dmy");
    mkdir("upload/import/$folder_name", 0777, true);
    var_dump($_POST);
    $location1 = "./upload/import/$folder_name/".$invoice;
    $location2 = "./upload/import/$folder_name/".$awb_cmr;
    $location3 = "./upload/import/$folder_name/".$add_doc;
    var_dump($_FILES);

    if ($invoice_size > 5242880 || $awb_cmr_size > 5242880 || $add_doc_size > 5242880) { // Check file size 5mb or not
		echo "<script>alert('Woops! Files are too big. Maximum each file size allowed for upload 5 MB.')</script>";
	} else {

        move_uploaded_file($invoice_tem_loc, $location1);
        move_uploaded_file($awb_cmr_tem_loc, $location2);
        move_uploaded_file($add_doc_tem_loc, $location3);

       $sql = "INSERT INTO `tickets`(`id`, `Username`, `Type`, `TicketDate`, `Status`, `Eori`, `PhoneNumber`, `Address`, `Email`, `City`, `VehicleNationality`, `PostalCode`, `Street`, `Number`, `Country`, `RegistrationNumber`, `DepartureName`, `TransportName`, `DepartureNumber`, `TransportNumber`, `DateArrival`, `ImportAlso`, `DestiantionName`, `DestinationNumber`, `DateDriverArrival`, `T1`, `CountryOfOrigin`, `CommodityCode`, `DescriptionOfGoods`, `PackagesType`, `NetWeight`, `GrossWeight`, `ItemValue`, `Currency`, `Quantity`, `TotalPackages`, `TotalNetWeight`, `TotalGrossWeight`, `InvoiceNumber`, `TotalValue`, `FreightCharges`, `Incoterms`, `AdditionalNotes`, `Name`, `Surname`, `FileInvoiceName`, `FileAwbCmrName`, `FileAddDocName`, `FolderName`) VALUES ('[value-1]', '$username','$type','$ticket_date','$status','$import_eori','$import_phone_number','$import_addres','$import_email','$import_city','$import_vehicle_nationality','$import_postal_code','$import_street','$import_number','$import_country','$import_registration_number','null','null','null','null','null','null', '$import_destination_name','$import_destination_number','$import_date_driver_arrival','null','$import_country_of_origin','$import_commodity_code','$import_description_of_good','$import_packages_type','$import_net_weight','$import_gross_weight','$import_item_value','$import_currency','$import_quantity','$import_total_packages','$import_total_net_weight','$import_total_gross_weight','$import_invoice_number','$import_total_value','$import_freight_charges', '$import_incoterms','$import_additional_notes','$import_name','$import_surname', '$invoice', '$awb_cmr', '$add_doc', '$folder_name')";

        $result = mysqli_query($conn, $sql);

        if($result && isset($_POST['import_submit'])){
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
            <?php include 'css/styles.css'; ?>
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
                <form action="form_import.php" method="POST" enctype="multipart/form-data">
                    <h1>Import Form</h1>
                    <table class="export_form">
                        <thead>
                        <tr>
                                <th></th>
                                <th></th>
                                <th><h2>Contact data of forwarding agent or driver</h2></th>
                            </tr> 
                        </thead>
                        <tr>
                            <td><h2>Exporter's EORI*</h2></td>
                            <td><input type="text" name="eori_number" placeholder="EORI" required value="<?php echo $import_eori; ?>"></td>
                            <td>Phone number*</td>
                            <td><input type="text" name="phone_number" required value="<?php echo $import_phone_number; ?>"></br></td>
                        </tr>
                        <tr>
                            <td>Address*</td>
                            <td><input type="text" name="addres" placeholder="Addres" required value="<?php echo $import_addres; ?>"></td>
                            <td>E-mail address* </td>
                            <td><input type="email" name="email" required value="<?php echo $import_email; ?>"></br></td>
                        </tr>
                        <tr>
                            <td>City*</td>
                            <td><input type="text" name="city" placeholder="City" required value="<?php echo $import_city; ?>"></td>
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
                            <td>Postal code* </td>
                            <td> <input type="text" name="postal_code" placeholder="Postal code" required value="<?php echo $import_postal_code; ?>"></td>
                        </tr>
                        <tr>
                            <td>Street*</td>
                            <td><input type="text" name="street" placeholder="Street" required value="<?php echo $import_street; ?>"></td>
                        </tr>
                        <tr>
                            <td>Number*</td>
                            <td> <input type="text" name="number" placeholder="Number" required value="<?php echo $import_number; ?>"></td>
                        </tr>
                        <tr>
                            <td>Country*</td>
                            <td><select name="countrys" id="countrys" size="3">
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
                            <td>Vehicle/Trailer registration number* </td>
                            <td><input type="text" name="registration_number" placeholder="This will be id of this transport" required size="40" value="<?php echo $import_registration_number; ?>"></td>
                        </tr>
                    </table></br>
                    <br>

                    <table class="export_form">
                        <thead>
                            <tr>
                                <th><h2>Destiantion customs office number</h2></th>
                            </tr>
                        </thead>
                        <tr>
                            <td>Destiantion customs office usual name*</td>
                        </tr>
                        <tr>
                            <td><input type="text" name="dest_office_usual_name" required value="<?php echo $import_destination_name; ?>"></td>
                        </tr>
                        <tr>
                            <td>Destiantion customs office number*</td>
                        </tr>
                        <tr>
                            <td><input type="text" name="dest_office_number" required value="<?php echo $import_destination_number; ?>"></br></td>
                        </tr>
                        <tr>
                            <td>Date and time of driver's arrival at customs for import*</td>
                        </tr>
                        <tr>
                            <td><input type="datetime-local" name="arrival_date_at_customs_import"required value="<?php echo $import_date_driver_arrival; ?>"></td>
                        </tr>
                    </table>
                    
                    </br>
                   
                    <table class="export_form">
                        <tr>
                            <td>Country of origin*</td>
                            <td><input type="text" name="country_of_origin" required value="<?php echo $import_country_of_origin; ?>"></td>
                            <td>Commodity code*</td>
                            <td><input type="text" name="commodity_code" required value="<?php echo $import_commodity_code; ?>"></td>
                        </tr>
                        <tr>
                            <td>Description of goods*</td>
                            <td> <textarea name="description_of_good"  cols="50" rows="4" style="resize:none;" value="<?php echo $import_description_of_good; ?>"></textarea></td>
                            <td>Packages type*</td>
                            <td>
                                <input type="radio" name="packages_type" value="cartons" required checked>Cartons
                                <input type="radio" name="packages_type" value="pallets">Pallets
                                <input type="radio" name="packages_type" value="in_bulk">In bulk 
                            </td>
                        </tr>
                        <tr>
                            <td>Net weight(kg)*</td>
                            <td><input type="text" name="net_weight"required value="<?php echo $import_net_weight; ?>"></td>
                            <td>Gross weight(kg)*</td>
                            <td><input type="text" name="gross_weight"required value="<?php echo $import_gross_weight; ?>"></td>
                        </tr>
                        <tr>
                            <td>Item value*</td>
                            <td><input type="text" name="item_value" value="<?php echo $import_item_value; ?>"></td>
                            <td>Currency*</td>
                            <td>
                                <input type="radio" name="currency" value="zl" checked>Złoty
                                <input type="radio" name="currency" value="euro">Euro
                                <input type="radio" name="currency" value="dolar">Dolar
                            </td>
                        </tr>
                        <tr>
                            <td>Quantity*</td>
                            <td><input type="text" name="quantity" required value="<?php echo $import_quantity; ?>"></td>
                        </tr>
                    </table>

                    <br>
                    <table class="export_form">
                        <thead>
                            <tr>
                                <th><h2>Summary</h2></th>
                            </tr>
                        </thead>
                        <tr>
                            <td>Total packages*</td>
                            <td><input type="text" name="total_packages" required value="<?php echo $import_total_packages; ?>"></td>
                            <td>Total net weight*</td>
                            <td> <input type="text" name="total_net_weight" required value="<?php echo $import_total_net_weight; ?>"></td>
                        </tr>
                        <tr>
                            <td>Total gross weight*</td>
                            <td><input type="text" name="total_gross_weight" required value="<?php echo $import_total_gross_weight; ?>"></td>
                            <td>Invoice number*</td>
                            <td><input type="text" name="invoice_number" required value="<?php echo $import_invoice_number; ?>"></td>
                        </tr>
                        <tr>
                            <td>Total value*</td>
                            <td><input type="text" name="total_value" required value="<?php echo $import_total_value; ?>"></td>
                            <td>Freight charges*</td>
                            <td>
                                <input type="radio" name="freight_charges" value="to the european union border" checked>To the european union border<br>
                                <input type="radio" name="freight_charges" value="in the european union">In the european union
                            </td>
                        </tr>
                        <tr>
                            <td>Additional notes</td>
                            <td><textarea name="additional_notes"   cols="50" rows="4" style="resize:none;" value="<?php echo $import_additional_notes; ?>"></textarea></td>
                            <td>Incotemrs*</td>
                        <td><input type="text" name="incoterms" required value="<?php echo $import_incoterms; ?>"></td>
                    
                        </tr>
                    </table>

                    <br>
                    <table class="export_form">
                        <thead>
                            <tr>
                                <th><h2>Attachments</h2></th>
                                <th> </th>
                                <th><h2>Your details</h2></th>
                            </tr>
                        </thead>
                        <tr>
                            <td>Invoice*</td>
                            <td><input type="file" name="invoice" required></td>
                            <td>Name*</td>
                            <td><input type="text" name="name" required value="<?php echo $import_name; ?>"></td>
                        </tr>
                        <tr>
                            <td>AWB/CMR*</td>
                            <td><input type="file" name="awb_cmr" required></td>
                            <td>Surname*</td>
                            <td><input type="text" name="surname" required value="<?php echo $import_surname; ?>"></td>
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
                                I will forward copy  documents if required and will keep original documents safe for the statutory period.
                                <input type="radio" name="consent_and_conf" value="yes" required>Accept*
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <br> We will process the stamp duty of PLN 17 for you and reinvoice it
                                the authorization can be signed only by a person authorized according to the national court register
                                <input type="radio" name="17PLN" value="accept" required>Accept*<br><br>
                            </td>
                        </tr>
                    </table>
                    <br><br>

                    

                    <label>
                        <button type="submit" class="transport_submit" name="import_submit">Submit</button>
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


<?php

$server = "localhost";
$user = "root";
$pass = "";
$database = "transport";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

function checkRole($username, $conn){
    $query = "SELECT role FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);
    //var_dump($result);
    $role = mysqli_fetch_row($result);

    mysqli_free_result($result);
    //mysqli_close($conn);
    
    //var_dump($role[0]);
    return $role[0];
}

function showUserTickets($username, $conn)
{
    $query = "SELECT * FROM `tickets` WHERE username = '$username' ORDER BY `TicketDate` DESC ";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Invalid query: " . $conn->error);
    }

    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tbody>
                <tr>
                    <td><?php echo $row["id"] ?></td>
                    <td><?php echo $row["Username"] ?></td>
                    <td><?php echo $row["Type"] ?></td>
                    <td><?php echo $row["Status"] ?></td>
                    <td><?php echo $row["TicketDate"] ?></td>
                    <td>
                        <a href="details_ticket.php?id=<?php echo $row["id"] ?>">Show details</a>
                    </td>
                </tr>
            </tbody>
            <?php
        }
    } else {
        echo "0 results";
    }
    //mysqli_close($conn);
}

function showAdminTickets($username, $conn)
{
    $query = "SELECT * FROM `tickets` ORDER BY `TicketDate` DESC";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Invalid query: " . $conn->error);
    }


    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <tbody>
                <tr>
                    <td><?php echo $row["id"] ?></td>
                    <td><?php echo $row["Username"] ?></td>
                    <td><?php echo $row["Type"] ?></td>
                    <td><?php echo $row["Status"] ?></td>
                    <td><?php echo $row["TicketDate"] ?></td>
                    <td>
                        <a href="details_ticket.php?id=<?php echo $row["id"] ?>">Show details</a>
                        <!-- <a href="update.php?id=<?php echo $row["id"] ?>">Update</a> -->
                    </td>
                </tr>
            </tbody>
        <?php
        }
    } else {
        echo "0 results";
    }
    //mysqli_close($conn);
}



function showAdminContacts($username, $conn)
{
    $query = "SELECT * FROM `contact` ORDER BY `Date` DESC";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Invalid query: " . $conn->error);
    }


    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <tbody>
                <tr>
                    <td><?php echo $row["id"] ?></td>
                    <td><?php echo $row["Date"] ?></td>
                    <td><?php echo $row["Subject"] ?></td>
                    <td>
                        <a href="details_contact.php?id=<?php echo $row["id"] ?>">Show details</a>
                        <!-- <a href="update.php?id=<?/*php echo $row["id"] */ ?>">Update</a> -->
                    </td>
                </tr>
            </tbody>
        <?php
        }
    } else {
        echo "0 results";
    }
    //mysqli_close($conn);
}

function showUserContacts($username, $conn)
{
    $query = "SELECT * FROM `contact` WHERE username = '$username' ORDER BY `Date` DESC";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Invalid query: " . $conn->error);
    }


    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <tbody>
                <tr>
                    <td><?php echo $row["id"] ?></td>
                    <td><?php echo $row["Date"] ?></td>
                    <td><?php echo $row["Subject"] ?></td>
                    <td>
                        <a href="details_contact.php?id=<?php echo $row["id"] ?>">Show details</a>
                        <!-- <a href="update.php?id=<?/*php echo $row["id"] */ ?>">Update</a> -->
                    </td>
                </tr>
            </tbody>
        <?php
        }
    } else {
        echo "0 results";
    }
    //mysqli_close($conn);
}


function getID($username, $conn)
{
    $query = "SELECT TicketDate FROM tickets WHERE username = '$username'";
    $result = mysqli_query($conn, $query);
    //var_dump($result);
    $id = mysqli_fetch_row($result);

    mysqli_free_result($result);
    //mysqli_close($conn);

    //var_dump($role[0]);
    return $id[0];
}

function getComments($conn){
    $id = $_GET['id'];
    $sql = "SELECT * FROM `comments` WHERE idZgloszenia = '$id'";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Invalid query: " . $conn->error);
    }

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)){
            echo"<div class='comment-box'><p>";
                ?>
                <label class="form_content"><?php
                echo $row['nazwaUzytkownika']."<br>";
                echo $row['data']."<br>";
                //echo $row['idZgloszenia']."<br>";
                echo nl2br($row['tresc']);?>
                </label><?php
            echo "</p></div>";
            //echo $row['id'];
            
            ?><br><br><?php
        }
    }
}

function showTicket($username, $conn)
{
    include 'comments.php';
    $id = $_GET['id'];
    $query1 = "SELECT * FROM `tickets` WHERE id = '$id'";
    $result = mysqli_query($conn, $query1);
    //date_default_timezone_set('Europe/Warsaw');


    if (!$result) {
        die("Invalid query: " . $conn->error);
    }

    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <section class="comments">
                <?php
                /* id to id zgloszenia i na tej podstawie beda wyswietlane kolejne komentarze
                w zapisie do bazy każde komentarz bedzie miec pole do id zgloszenia do jakiego jest komentarz oraz id normanie kazdego komentarza */
                echo"
                    <form action='./includes/comments.php' method='POST'>
                        <input type='hidden' name='id_zgloszenia' value='$id'>
                        <input type='hidden' name='author' value='$_SESSION[username]'>
                        <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
                        <textarea name='message' class='message'></textarea><br>
                        <button type='submit' name='submit_comment' class='submit_comment'>Comment</button>
                    </form>";
                ?>
            </section><br>
            <section class="comments_1">
                <?php getComments($conn); ?>
            </section>
            <br>

            <label class="form_headers" style="font-size: 1.6rem;">
                Data from the form
            </label><br>

            <label class="form_headers">
                Ticket ID:
                <label class="form_content">
                    <?php echo $row["id"] ?>
                </label>
            </label>

            <label class="form_headers">
                Username:
                <label class="form_content">
                    <?php echo $row["Username"] ?>
                </label>
            </label>

            <label class="form_headers">
                Date of ticket submission:
                <label class="form_content">
                    <?php echo $row["TicketDate"] ?>
                </label>
            </label>


            <?php
            if ($row["Type"] == "export") {
            ?>

                <label class="form_headers">
                    Type:
                    <label class="form_content">
                        <?php echo $row["Type"] ?>
                    </label>
                </label>

                <label class="form_headers">
                    Status:
                    <label class="form_content">
                        <?php echo $row["Status"] ?>
                    </label>
                </label>

                <label class="form_headers">
                    Eori number:
                    <label class="form_content">
                        <?php echo $row["Eori"] ?>
                    </label>
                </label><br>

                <label class="form_headers">
                    Adress
                </label>

                <label class="form_headers">
                    City:
                    <label class="form_content">
                        <?php echo $row["City"] ?>
                    </label>
                </label>

                <label class="form_headers">
                    Postal code:
                    <label class="form_content">
                        <?php echo $row["PostalCode"] ?>
                    </label>
                </label>

                <label class="form_headers">
                    Street:
                    <label class="form_content">
                        <?php echo $row["Street"] ?>
                    </label>
                </label>

                <label class="form_headers">
                    Number:
                    <label class="form_content">
                        <?php echo $row["Number"] ?>
                    </label>
                </label>

                <label class="form_headers">
                    Country:
                    <label class="form_content">
                        <?php echo $row["Country"] ?>
                    </label>
                </label><br>

                <label class="form_headers">
                    Vehicle Nationality:
                    <label class="form_content">
                        <?php echo $row["VehicleNationality"] ?>
                    </label>
                </label>

                <label class="form_headers">
                    Vehicle/Trailer registration number::
                    <label class="form_content">
                        <?php echo $row["RegistrationNumber"] ?>
                    </label>
                </label><br>

                <label class="form_headers">
                    Contact data of forwarding agent or driver:
                </label>

                <label class="form_headers">
                    Email:
                    <label class="form_content">
                        <?php echo $row["Email"] ?>
                    </label>
                </label>

                <label class="form_headers">
                    Phone number:
                    <label class="form_content">
                        <?php echo $row["PhoneNumber"] ?>
                    </label>
                </label>

                <label class="form_headers">
                    Vehicle nationality:
                    <label class="form_content">
                        <?php echo $row["VehicleNationality"] ?>
                    </label>
                </label><br>

                <label class="form_headers">
                    Departure customs office:
                </label>

                <label class="form_headers">
                    Departure customs office usual name:
                    <label class="form_content">
                        <?php echo $row["DepartureName"] ?>
                    </label>
                </label>

                <label class="form_headers">
                    Departure customs office number:
                    <label class="form_content">
                        <?php echo $row["DepartureNumber"] ?>
                    </label>
                </label>

                <label class="form_headers">
                    Date and time of driver's arrival at customs:
                    <label class="form_content">
                        <?php echo $row["DateArrival"] ?>
                    </label>
                </label><br>

                <label class="form_headers">
                    Transit customs office:
                </label>

                <label class="form_headers">
                    Transit customs office usual name:
                    <label class="form_content">
                        <?php echo $row["TransportName"] ?>
                    </label>
                </label>

                <label class="form_headers">
                    Transit customs office number:
                    <label class="form_content">
                        <?php echo $row["TransportNumber"] ?>
                    </label>
                </label><br>

                <label class="form_headers">
                    Do you require also import declaration in destination customs office:
                    <label class="form_content">
                        <?php echo $row["ImportAlso"] ?>
                    </label>
                </label>

                <label class="form_headers">
                    Destiantion customs office:
                </label>

                <label class="form_headers">
                    Destiantion customs office usual name:
                    <label class="form_content">
                        <?php echo $row["DestiantionName"] ?>
                    </label>
                </label>

                <label class="form_headers">
                    Destination customs office number:
                    <label class="form_content">
                        <?php echo $row["DestinationNumber"] ?>
                    </label>
                </label><br>

                <label class="form_headers">
                    Date and time of driver's arrival at customs for import:
                    <label class="form_content">
                        <?php echo $row["DateDriverArrival"] ?>
                    </label>
                </label>

                <label class="form_headers">
                    Do you require T1 to be issued for this export:
                    <label class="form_content">
                        <?php echo $row["T1"] ?>
                    </label>
                </label><br>

                <label class="form_headers">
                    Country of origin:
                    <label class="form_content">
                        <?php echo $row["CountryOfOrigin"] ?>
                    </label>
                </label>

                <label class="form_headers">
                    Commodity code:
                    <label class="form_content">
                        <?php echo $row["CommodityCode"] ?>
                    </label>
                </label>

                <label class="form_headers">
                    Description of goods:
                    <label class="form_content">
                        <?php echo $row["DescriptionOfGoods"] ?>
                    </label>
                </label>

                <label class="form_headers">
                    Packages type:
                    <label class="form_content">
                        <?php echo $row["PackagesType"] ?>
                    </label>
                </label><br>

                <label class="form_headers">
                    Net weight(kg):
                    <label class="form_content">
                        <?php echo $row["NetWeight"] ?>
                    </label>
                </label>

                <label class="form_headers">
                    Gross weight(kg):
                    <label class="form_content">
                        <?php echo $row["GrossWeight"] ?>
                    </label>
                </label>

                <label class="form_headers">
                    Item value:
                    <label class="form_content">
                        <?php echo $row["ItemValue"] ?>
                    </label>
                </label>

                <label class="form_headers">
                    Currency:
                    <label class="form_content">
                        <?php echo $row["Currency"] ?>
                    </label>
                </label>

                <label class="form_headers">
                    Quantity:
                    <label class="form_content">
                        <?php echo $row["Quantity"] ?>
                    </label>
                </label><br>

                <label class="form_headers">
                    Summary:
                </label>

                <label class="form_headers">
                    Total packages:
                    <label class="form_content">
                        <?php echo $row["TotalPackages"] ?>
                    </label>
                </label>

                <label class="form_headers">
                    Total net weight:
                    <label class="form_content">
                        <?php echo $row["TotalNetWeight"] ?>
                    </label>
                </label>

                <label class="form_headers">
                    Total gross weight:
                    <label class="form_content">
                        <?php echo $row["TotalGrossWeight"] ?>
                    </label>
                </label>

                <label class="form_headers">
                    Invoice number:
                    <label class="form_content">
                        <?php echo $row["InvoiceNumber"] ?>
                    </label>
                </label>

                <label class="form_headers">
                    Total value:
                    <label class="form_content">
                        <?php echo $row["TotalValue"] ?>
                    </label>
                </label>

                <label class="form_headers">
                    Incoterms:
                    <label class="form_content">
                        <?php echo $row["Incoterms"] ?>
                    </label>
                </label>

                <label class="form_headers">
                    Freight charges:
                    <label class="form_content">
                        <?php echo $row["FreightCharges"] ?>
                    </label>
                </label>

                <label class="form_headers">
                    Additional notes:
                    <label class="form_content">
                        <?php echo $row["AdditionalNotes"] ?>
                    </label>
                </label><br>

                <label class="form_headers">
                    Attachments:

                </label>

                <?php $folder = $row['FolderName'];
                $invoice = $row['FileInvoiceName'];
                $awb_cmr = $row['FileAwbCmrName'];
                $add_doc = $row['FileAddDocName']; ?>

                <label class="form_headers">
                    Invoice:
                    <label class="form_content">
                        <?php echo "<a href='./upload/export/$folder/$invoice' download>Donwload file</a>" ?>
                    </label>
                </label>

                <label class="form_headers">
                    Awb/Cmr:
                    <label class="form_content">
                        <?php echo "<a href='./upload/export/$folder/$awb_cmr' download>Donwload file</a>" ?>
                    </label>
                </label>
                <label class="form_headers">
                    Additional document:
                    <label class="form_content">
                        <?php echo "<a href='./upload/export/$folder/$add_doc' download>Donwload file</a>" ?>
                    </label>
                </label>

                <br>
                <label class="form_headers">
                    Name:
                    <label class="form_content">
                        <?php echo $row['Name'] ?>
                    </label>
                </label>

                <label class="form_headers">
                    Surname:
                    <label class="form_content">
                        <?php echo $row['Surname'] ?>
                    </label>
                </label>

            <?php
            } else {
            ?>

                <label class="form_headers">
                    Type:
                    <label class="form_content">
                        <?php echo $row['Type'] ?>
                    </label>
                </label>

                <label class="form_headers">
                    Status:
                    <label class="form_content">
                        <?php echo $row['Status'] ?>
                    </label>
                </label>

                <label class="form_headers">
                    Eori number:
                    <label class="form_content">
                        <?php echo $row['Eori'] ?>
                    </label>
                </label><br>


                <label class="form_headers">
                    Adress:
                </label>

                <label class="form_headers">
                    City:
                    <label class="form_content">
                        <?php echo $row['City'] ?>
                    </label>
                </label>

                <label class="form_headers">
                    Postal code:
                    <label class="form_content">
                        <?php echo $row['PostalCode'] ?>
                    </label>
                </label>

                <label class="form_headers">
                    Street:
                    <label class="form_content">
                        <?php echo $row['Street'] ?>
                    </label>
                </label>

                <label class="form_headers">
                    Number:
                    <label class="form_content">
                        <?php echo $row['Number'] ?>
                    </label>
                </label>

                <label class="form_headers">
                    Country:
                    <label class="form_content">
                        <?php echo $row['Country'] ?>
                    </label>
                </label><br>

                <label class="form_headers">
                    Vehicle Nationality:
                    <label class="form_content">
                        <?php echo $row['VehicleNationality'] ?>
                    </label>
                </label>

                <label class="form_headers">
                    Vehicle/Trailer registration number:
                    <label class="form_content">
                        <?php echo $row['RegistrationNumber'] ?>
                    </label>
                </label><br>

                <label class="form_headers">
                    Contact data of forwarding agent or driver:
                </label>

                <label class="form_headers">
                    Email:
                    <label class="form_content">
                        <?php echo $row["Email"] ?>
                    </label>
                </label>

                <label class="form_headers">
                    Phone number:
                    <label class="form_content">
                        <?php echo $row["PhoneNumber"] ?>
                    </label>
                </label>


                <label class="form_headers">
                    Vehicle nationality:
                    <label class="form_content">
                        <?php echo $row["VehicleNationality"] ?>
                    </label>
                </label><br>


                <label class="form_headers">
                    Destiantion customs office:
                </label>

                <label class="form_headers">
                    Destiantion customs office usual name:
                    <label class="form_content">
                        <?php echo $row["DestiantionName"] ?>
                    </label>
                </label>

                <label class="form_headers">
                    Destination customs office number:
                    <label class="form_content">
                        <?php echo $row["DestinationNumber"] ?>
                    </label>
                </label><br>

                <label class="form_headers">
                    Date and time of driver's arrival at customs for import:
                    <label class="form_content">
                        <?php echo $row["DateDriverArrival"] ?>
                    </label>
                </label>

                <label class="form_headers">
                    Country of origin:
                    <label class="form_content">
                        <?php echo $row["CountryOfOrigin"] ?>
                    </label>
                </label>

                <label class="form_headers">
                    Commodity code:
                    <label class="form_content">
                        <?php echo $row["CommodityCode"] ?>
                    </label>
                </label>

                <label class="form_headers">
                    Description of goods:
                    <label class="form_content">
                        <?php echo $row["DescriptionOfGoods"] ?>
                    </label>
                </label>

                <label class="form_headers">
                    Packages type:
                    <label class="form_content">
                        <?php echo $row["PackagesType"] ?>
                    </label>
                </label><br>

                <label class="form_headers">
                    Net weight(kg):
                    <label class="form_content">
                        <?php echo $row["NetWeight"] ?>
                    </label>
                </label>

                <label class="form_headers">
                    Gross weight(kg):
                    <label class="form_content">
                        <?php echo $row["GrossWeight"] ?>
                    </label>
                </label>

                <label class="form_headers">
                    Item value:
                    <label class="form_content">
                        <?php echo $row["ItemValue"] ?>
                    </label>
                </label>

                <label class="form_headers">
                    Currency:
                    <label class="form_content">
                        <?php echo $row["Currency"] ?>
                    </label>
                </label>

                <label class="form_headers">
                    Quantity:
                    <label class="form_content">
                        <?php echo $row["Quantity"] ?>
                    </label>
                </label><br>

                <label class="form_headers">
                    Summary:
                </label>

                <label class="form_headers">
                    Total packages:
                    <label class="form_content">
                        <?php echo $row["TotalPackages"] ?>
                    </label>
                </label>

                <label class="form_headers">
                    Total net weight:
                    <label class="form_content">
                        <?php echo $row["TotalNetWeight"] ?>
                    </label>
                </label>

                <label class="form_headers">
                    Total gross weight:
                    <label class="form_content">
                        <?php echo $row["TotalGrossWeight"] ?>
                    </label>
                </label>

                <label class="form_headers">
                    Invoice number:
                    <label class="form_content">
                        <?php echo $row["InvoiceNumber"] ?>
                    </label>
                </label>

                <label class="form_headers">
                    Total value:
                    <label class="form_content">
                        <?php echo $row["TotalValue"] ?>
                    </label>
                </label>

                <label class="form_headers">
                    Incoterms:
                    <label class="form_content">
                        <?php echo $row["Incoterms"] ?>
                    </label>
                </label>

                <label class="form_headers">
                    Freight charges:
                    <label class="form_content">
                        <?php echo $row["FreightCharges"] ?>
                    </label>
                </label>

                <label class="form_headers">
                    Additional notes:
                    <label class="form_content">
                        <?php echo $row["AdditionalNotes"] ?>
                    </label>
                </label><br>

                <label class="form_headers">
                    Attachments:

                </label>

                <?php $folder = $row['FolderName'];
                $invoice = $row['FileInvoiceName'];
                $awb_cmr = $row['FileAwbCmrName'];
                $add_doc = $row['FileAddDocName']; ?>

                <label class="form_headers">
                    Invoice:
                    <label class="form_content">
                        <?php echo "<a href='./upload/export/$folder/$invoice' download>Donwload file</a>" ?>
                    </label>
                </label>

                <label class="form_headers">
                    Awb/Cmr:
                    <label class="form_content">
                        <?php echo "<a href='./upload/export/$folder/$awb_cmr' download>Donwload file</a>" ?>
                    </label>
                </label>
                <label class="form_headers">
                    Additional document:
                    <label class="form_content">
                        <?php echo "<a href='./upload/export/$folder/$add_doc' download>Donwload file</a>" ?>
                    </label>
                </label>

                <br>
                <label class="form_headers">
                    Name:
                    <label class="form_content">
                        <?php echo $row['Name'] ?>
                    </label>
                </label>

                <label class="form_headers">
                    Surname:
                    <label class="form_content">
                        <?php echo $row['Surname'] ?>
                    </label>
                </label>

                <?php
            }
            $query = "SELECT * FROM `users` WHERE username = '$username'";
            $result = mysqli_query($conn, $query);

            if (!$result) {
                die("Invalid query: " . $conn->error);
            }


            if (mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <br><label class="form_headers" style="font-size: 1.6rem;">
                        Data from the account:
                    </label>

                    <label class="form_headers">
                        Email:
                        <label class="form_content">
                            <?php echo $row['email'] ?>
                        </label>
                    </label>
                    <label class="form_headers">
                        Company Name:
                        <label class="form_content">
                            <?php echo $row['CompanyName'] ?>
                        </label>
                    </label>
                    <label class="form_headers">
                        Company address 1:
                        <label class="form_content">
                            <?php echo $row['CompanyAddress1'] ?>
                        </label>
                    </label>
                    <label class="form_headers">
                        Company address 2:
                        <label class="form_content">
                            <?php echo $row['CompanyAddress2'] ?>
                        </label>
                    </label>
                    <label class="form_headers">
                        City:
                        <label class="form_content">
                            <?php echo $row['City'] ?>
                        </label>
                    </label>
                    <label class="form_headers">
                        Country:
                        <label class="form_content">
                            <?php echo $row['Country'] ?>
                        </label>
                    </label>
                    <label class="form_headers">
                        Company email:
                        <label class="form_content">
                            <?php echo $row['EmailCompany'] ?>
                        </label>
                    </label><label class="form_headers">
                        Contact phone number:
                        <label class="form_content">
                            <?php echo $row['Phone'] ?>
                        </label>
                    </label>
                    <label class="form_headers">
                        Vat accounting:
                        <label class="form_content">
                            <?php echo $row['VatAccounting'] ?>
                        </label>
                    </label>
                    <label class="form_headers">
                        Eori number:
                        <label class="form_content">
                            <?php echo $row['EoriNumber'] ?>
                        </label>
                    </label>
                    <label class="form_headers">
                        Company registration number:
                        <label class="form_content">
                            <?php echo $row['CompanyRegNo'] ?>
                        </label>
                    </label>
                    <label class="form_headers">
                        Duty deferment account number:
                        <label class="form_content">
                            <?php echo $row['DutyDefermentAccount'] ?>
                        </label>
                    </label>
                    <label class="form_headers">
                        Currency:
                        <label class="form_content">
                            <?php echo $row['Currency'] ?>
                        </label>
                    </label>
                    <label class="form_headers">
                        First name:
                        <label class="form_content">
                            <?php echo $row['FirstName'] ?>
                        </label>
                    </label>
                    <label class="form_headers">
                        Last name:
                        <label class="form_content">
                            <?php echo $row['LastName'] ?>
                        </label>
                    </label>
                    <label class="form_headers">
                        Position in company:
                        <label class="form_content">
                            <?php echo $row['PositionInCompany'] ?>
                        </label>
                    </label><?php
                        }
                    } else {
                            ?>
                <label class="form_headers">
                    You don't have tickets

                </label>
            <?php

                    }
                }
            } else {
                echo "0 results";
            }
        }

function showUserTicketsAuth($username, $conn)
{
    $query = "SELECT * FROM `authorization` WHERE username = '$username' ORDER BY `TicketDate` DESC ";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Invalid query: " . $conn->error);
    }
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
    ?>
    <tbody>
        <tr>
            <td><?php echo $row["id"] ?></td>
            <td><?php echo $row["Username"] ?></td>
            <td><?php echo $row["TicketDate"] ?></td>
            <td>
                <a href="details_ticket_auth.php?id=<?php echo $row["id"] ?>">Show details</a>
            </td>
        </tr>
    </tbody>
<?php
        }
    } else {
        echo "0 results";
    }
    //mysqli_close($conn);
}

function showContact($username, $conn)
{
    $id = $_GET['id'];
    $query = "SELECT * FROM `contact` WHERE id = '$id'";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Invalid query: " . $conn->error);
    }
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
?>
    <label class="form_headers">
        Contact form Id:
        <label class="form_content">
            <?php echo $row["id"] ?>
        </label>
    </label>
    <label class="form_headers">
        Date of submission:
        <label class="form_content">
            <?php echo $row["Date"] ?>
        </label>
    </label>
    <label class="form_headers">
        Subject:
        <label class="form_content">
            <?php echo $row["Subject"] ?>
        </label>
    </label>
    <label class="form_headers">
        Company name:
        <label class="form_content">
            <?php echo $row["Company_Name"] ?>
        </label>
    </label>
    <label class="form_headers">
        Eori number:
        <label class="form_content">
            <?php echo $row["Eori"] ?>
        </label>
    </label>
    <label class="form_headers">
        Contact email:
        <label class="form_content">
            <?php echo $row["Contact_Email"] ?>
        </label>
    </label>
    <?php
            if ($row["Subject"] == null) {
    ?>
        <label class="form_headers">
            <?php echo "Użytkownik nie podał numeru kontanktowego"; ?>
        </label>
    <?php
            } else {
    ?>
        <label class="form_headers">
            Contact number:
            <label class="form_content">
                <?php echo $row["Subject"]; ?>
            </label>
        </label>
    <?php
            }
    ?>
    <label class="form_headers">
        Message:
        <label class="form_content">
            <?php echo $row["Message"] ?>
        </label>
    </label>
<?php
        }
    } else {
        echo "0 results";
    }
}

function showTicketAuth($username, $conn)
{
    $id = $_GET['id'];
    $query = "SELECT * FROM `authorization` WHERE id = '$id'";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Invalid query: " . $conn->error);
    }
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
?>
    <h2>Ticket ID: <?php echo $row["id"] ?></h2>
    <h2>Username: <?php echo $row["Username"] ?></h2>
    <h2>Date of ticket submission: <?php echo $row["TicketDate"] ?></h2><br>
    <h2>Attachments</h2>
    <?php $folder = $row['FolderName'];
            $translation = $row['FileTranslationName'];
            $transfer = $row['FileTransferName'];
            $authorization = $row['Authorization'];
            echo "<h3>Invoice: <a href='./upload/export/$folder/$translation' download>Donwload file</a></h3>";
            echo "<h3>Awb/Cmr: <a href='./upload/export/$folder/$transfer' download>Donwload file</a></h3>";
            echo "<h3>Additional document: <a href='./upload/export/$folder/$authorization' download>Donwload file</a></h3>";
    ?><?php
        }
    }
}

function showAdminTicketsAuth($username, $conn)
{
    $query = "SELECT * FROM `authorization` ORDER BY `TicketDate` DESC";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Invalid query: " . $conn->error);
    }
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tbody>
                <tr>
                    <td><?php echo $row["id"] ?></td>
                    <td><?php echo $row["Username"] ?></td>
                    <td><?php echo $row["TicketDate"] ?></td>
                    <td>
                        <a href="details_ticket_auth.php?id=<?php echo $row["id"] ?>">Show details</a>
                    </td>
                </tr>
            </tbody>
            <?php
        }
    } else {
        echo "0 results";
    }
    //mysqli_close($conn);
}


?>
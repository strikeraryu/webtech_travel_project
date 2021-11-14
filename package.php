<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/css/package.css">
    <title>Document</title>
</head>

<body>
    <h1>Packages</h1>
    <table>

        <thead>
            <th>Package Name</th>
            <th>Location</th>
            <th>Days</th>
            <th>Night</th>
            <th>Holiday Discount</th>
            <th>refundable</th>
            <th>Price</th>
            <th>Book</th>
        </thead>

        <tbody>
            <?php

            include "utils/error.php";
            include "utils/debug.php";
            include "utils/constants.php";

            $servername = "localhost";
            $db_username = "root";
            $db_password = "";
            $db_name = "lab7";

            // Create connection
            $conn = new mysqli($servername, $db_username, $db_password, $db_name);

            // Check connection
            if ($conn->connect_error) {
                page_error();
            }
            $sql = "SELECT * FROM `packages`";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($package_details = $result->fetch_assoc()) {
                    echo "<tr>
                    <td data-label='name'>" . $package_details["name"]. "</td>
                    <td data-label='war'>" . $package_details["location"]. "</td>
                    <td data-label='ba'>" . $package_details["day"]. "</td>
                    <td data-label='obp'>" . $package_details["night"]. "</td>
                    <td data-label='slg'>" . $package_details["holiday"]. "</td>
                    <td data-label='ops'>" . $package_details["refund"]. "</td>
                    <td data-label='rbi'>" . $package_details["price"]. "</td>
                    <td data-label='hr'><button class='book-now'>Book Now</button></td>
                </tr>";
                }
            } else {
                page_error();
            }
            $conn->close();



            for ($x = 0; $x <= 10; $x++) {
                echo "<tr>
                <td data-label='name'>City - trip</td>
                <td data-label='war'>City</td>
                <td data-label='ba'>3</td>
                <td data-label='obp'>4</td>
                <td data-label='slg'>Yes</td>
                <td data-label='ops'>No</td>
                <td data-label='rbi'>1000</td>
                <td data-label='hr'><button class='book-now'>Book Now</button></td>
            </tr>";
            }
            ?>
        </tbody>

    </table>

</body>

</html>
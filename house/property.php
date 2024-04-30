<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>House Management System</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h2 style="text-align: center; font-family: century; font-weight: bold;">HOUSE MANAGEMENT SYSTEM</h2>
    <h4 style="text-align: center; font-family: century; font-weight: bold;">LIST OF PROPERTIES</h4>
    <a href="Property.html" class="btn btn-primary" style="margin-top: 0px;">Add Property</a>
    <a href="./home.html" class="btn btn-secondary" style="margin-left: 20px;">Back Home</a>
    <table class="table table-bordered">
        <thead class="bg-warning">
        <tr>
            <th>Property ID</th>
            <th>Address</th>
            <th>Rent</th>
            <th>Bedrooms</th>
            <th>Bathrooms</th>
            <th>Description</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // Database connection details
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "house_rental";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // SQL query to fetch data from the properties table
        $sql = "SELECT * FROM properties";
        $result = $conn->query($sql);

        // Check if there are any properties
        if ($result && $result->num_rows > 0) {
            // Output data for each row
            while ($row = $result->fetch_assoc()) {
                $property_id = isset($row['property_id']) ? $row['property_id'] : 'N/A';
                $address = isset($row['address']) ? $row['address'] : 'N/A';
                $rent = isset($row['rent']) ? $row['rent'] : 'N/A';
                $bedrooms = isset($row['bedrooms']) ? $row['bedrooms'] : 'N/A';
                $bathrooms = isset($row['bathrooms']) ? $row['bathrooms'] : 'N/A';
                $description = isset($row['description']) ? $row['description'] : 'N/A';
                echo "<tr>
                    <td>" . $property_id . "</td>
                    <td>" . $address . "</td>
                    <td>" . $rent . "</td>
                    <td>" . $bedrooms . "</td>
                    <td>" . $bathrooms . "</td>
                    <td>" . $description . "</td>
                    <td><a style='padding:4px' href='propertydelete.php?property_id={$property_id}'>Delete</a></td>
                    <td><a style='padding:4px' href='propertyview.php?property_id={$property_id}'>Edit</a></td> 
                </tr>";
            }
        } else {
            echo "<tr><td colspan='8'>No data found</td></tr>";
        }
        // Close the database connection
        $conn->close();
        ?>
        </tbody>
    </table>
</div>

<footer><!-- Footer section -->
    <p>&copy; &reg; 2024 UR CBE BIT YEAR 2 @ Group A</p><!-- Copyright and trademark notice -->
</footer><!-- Footer section -->

</body>
</html>

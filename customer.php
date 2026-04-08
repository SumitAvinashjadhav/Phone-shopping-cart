<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phone.com";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize default values for start and end dates
$startDate = isset($_GET['start_date']) ? $_GET['start_date'] : '';
$endDate = isset($_GET['end_date']) ? $_GET['end_date'] : '';

// Prepare SQL query
$sql = "SELECT id, fname, lname, email, password, confirmpassword, phonenumber, date FROM signup";
if (!empty($startDate) && !empty($endDate)) {
    $sql .= " WHERE date BETWEEN '$startDate' AND '$endDate'";
}

// Execute the query
$result = $conn->query($sql);

// Handle query errors
if (!$result) {
    die("Query failed: " . $conn->error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Date-wise Reports</title>
    <style>
        /* Your CSS code */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 0;
            color: #333;
        }

        /* Container Styling */
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 50px auto;
            background: #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 20px;
        }

        /* Form Styling */
        form {
            margin-bottom: 30px;
            display: flex;
            gap: 15px;
            align-items: center;
            justify-content: center;
        }

        input[type="date"] {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        button {
            padding: 10px 25px;
            font-size: 16px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        /* Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 16px;
            text-align: left;
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 15px 20px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #e9ecef;
        }

        /* Links Styling */
        a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
            color: #0056b3;
        }

        /* Button Styling in Table */
        button {
            padding: 5px 15px;
            font-size: 14px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background-color: #28a745;
            color: white;
        }

        button:hover {
            background-color: #218838;
        }

        /* Print Button Specific Styling */
        td button {
            background-color: #17a2b8;
        }

        td button:hover {
            background-color: #138496;
        }

        /* Header Styling */
        h2 {
            text-align: center;
            color: #333;
            font-size: 28px;
            margin-bottom: 20px;
        }

        /* Print Button at the Top */
        .print-btn {
            display: block;
            width: 200px;
            margin: 20px auto;
            background-color: #17a2b8;
            color: white;
            font-size: 16px;
            padding: 10px;
            text-align: center;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .print-btn:hover {
            background-color: #138496;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Date-wise Signup Reports</h2>

        <!-- Print Button at the Top -->
        <button class="print-btn" onclick="printTable()">Print All</button>

        <form method="get" action="">
            <label for="start_date">Start Date:</label>
            <input type="date" id="start_date" name="start_date" value="<?= htmlspecialchars($startDate) ?>">
            <label for="end_date">End Date:</label>
            <input type="date" id="end_date" name="end_date" value="<?= htmlspecialchars($endDate) ?>">
            <button type="submit">Filter</button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Confirm Password</th>
                    <th>Phone Number</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['fname']}</td>
                                <td>{$row['lname']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['password']}</td>
                                <td>{$row['confirmpassword']}</td>
                                <td>{$row['phonenumber']}</td>
                                <td>{$row['date']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>No records found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script>
        // Print Table Function
        function printTable() {
            var content = document.querySelector('table').outerHTML;

            var printWindow = window.open('', '', 'width=600,height=400');
            printWindow.document.write(`
                <html>
                    <head>
                        <title>Print Report</title>
                        <style>
                            body { font-family: Arial, sans-serif; }
                            table { width: 100%; border-collapse: collapse; }
                            th, td { padding: 10px; border: 1px solid #ddd; }
                            th { background-color: #007bff; color: white; }
                            tr:nth-child(even) { background-color: #f9f9f9; }
                        </style>
                    </head>
                    <body>
                        <h2>User Signup Reports</h2>
                        ${content}
                    </body>
                </html>
            `);
            printWindow.document.close();
            printWindow.print();
        }
    </script>

</body>
</html>

<?php
// Close the database connection
$conn->close();
?>

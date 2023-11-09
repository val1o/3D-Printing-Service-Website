<!DOCTYPE html>
<html lang="en">

<head>
    <title>View All Users</title>
    <style>

        .table-container {
            margin: 50px 50px 0 50px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            font-family: Arial, sans-serif;
            color: #444;
        }

        th, td {
            border: 1px solid #f2f2f2;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #344966;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        h2 {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="table-container">
    <h2>List of All Users</h2>

    <table>
        <tr>
            <th>User ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Telephone Number</th>
            <th>Address</th>
            <th>Postal Code</th>
            <th>Username</th>
            <th>Password</th>
            <th>Is an Admin</th>
        </tr>
        <?php
            //Populating the table with data
            $allUsers = $data;
            foreach($allUsers as $user){
                echo "<tr>";
                echo "<td>" . $user['uID'] . "</td>";
                echo "<td>" . $user['firstName'] . "</td>";
                echo "<td>" . $user['lastName'] . "</td>";
                echo "<td>" . $user['telephoneNumber'] . "</td>";
                echo "<td>" . $user['address'] . "</td>";
                echo "<td>" . $user['postalCode'] . "</td>";
                echo "<td>" . $user['username'] . "</td>";
                echo "<td>" . $user['password'] . "</td>";
                echo "<td>" . $user['isAdmin'] . "</td>";
                echo "</tr>";
            }
        ?>
    </table>
    </div>


</body>

</html>
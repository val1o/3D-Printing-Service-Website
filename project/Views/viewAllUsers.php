<!DOCTYPE html>
<html lang="en">

<head>
    <title>View All Users</title>
    <style>
         table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
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
            foreach($users as $user){
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


</body>

</html>
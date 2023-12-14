<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>


<body>

    <label for="tableSelector">Select Table:</label>
    <select id="tableSelector" onchange="changeTable()">
        <option value="users">All Users</option>
        <option value="reports">All Reports</option>
    </select>



    <div class="table-container" id="usersTable">
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
            <th>Delete</th>
            <th>Promote</th>
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
                $isAdmin = ($user['isAdmin']) ? "true" : "false";
                echo "<td>" . $isAdmin . "</td>";
                echo "<td><form action='index.php?c=User&a=deleteUserAsAdmin&uID='" . $user['uID'] . "method='post'>
                            <button type='submit'>Delete</button>
                          </form></td>"; // Added form and button
                    echo "</tr>";


                echo "<td><form action='delete_user.php' method='post'>
                            <button type='submit'>Promote</button>
                          </form></td>"; // Added form and button
                    echo "</tr>";
            }
        ?>
    </table>
    </div>

    <div class="reports" id="reportsTable" style="display:none;">
        <h2>List of All Reports</h2>

        <table>
            <tr>
                <th>Report ID</th>
                <th>Header</th>
                <th>Body</th>
                <th>Comment ID</th>
                <th>User ID</th>
                <th>Status</th>
            </tr>

        </table>
    </div>


    <script>
        function changeTable(){
            var tableSelector = document.getElementById("tableSelector");
            var usersTable = document.getElementById("usersTable");
            var reportsTable = document.getElementById("reportsTable");

            if (tableSelector.value === "users"){
                usersTable.style.display = "block";
                reportsTable.style.display = "none";
            } else if (tableSelector.value === "reports"){
                usersTable.style.display = "none";
                reportsTable.style.display = "block";
            }
        }

        function deleteUser(userID) {
            
            alert("Deleting user with ID: " + userID);
        }

        function promoteUser(userID) {
            alert("Promoting user with ID:" + userID);
        }





    </script>







</body>
</html>
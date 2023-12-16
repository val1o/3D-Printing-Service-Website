<?php $this->render("Shared", "header", ["title" => "System Manager"]); ?>

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
        foreach ($allUsers as $user) {
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

            echo "<td>";
            echo "<form onsubmit='return confirmDelete()' action='index.php?c=User&a=deleteUserAsAdmin&uID=" . $user['uID'] . "' method='post'>";
            echo "<button type='submit'>Delete</button>";
            echo "</form>";
            echo "</td>";

            echo "<td>";
            if ($user['isAdmin'] != 1) {
                echo "<form onsubmit='return confirmPromote()'  action='index.php?c=User&a=promoteUser&uID=" . $user['uID'] . "' method='post'>";
                echo "<input type='hidden' name='userID' value='" . $user['uID'] . "'>";
                echo "<button type='submit'>Promote</button>";
                echo "</form>";
            } else {
                // User is already promoted, so don't show the "Promote" button
                echo "";
            }
            echo "</td>";

            echo "</tr>";
        }
        ?>

    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this user?");
        }

        function confirmPromote(){
            return confirm("Are you sure you want to promote this user to admin?");
        }

    </script>

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

<?php $this->render("Shared", "footer"); ?>
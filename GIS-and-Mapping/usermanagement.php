

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <script>
        function toggleFormVisibility() {
            var form = document.getElementById("registrationForm");
            if (form.style.display === "none" || form.style.display === "") {
                form.style.display = "block";
            } else {
                form.style.display = "none";
            }
        }
    </script>
    <style>
        h2 {
            text-align: center;
        }

        .login-form-container {
            position: relative;
            max-width: 400px;
            margin: 0 auto;

        }

        .login-form {
            position: absolute;
            top: 0;
            left: 0;
            display: none; /* Initially hidden */
            padding: 50px;
            background-color: #f5f5f5;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"],
        input[type="date"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #016A70;
            color: #FFFFDD;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #053B50;
            color:#EEEEEE;
        }

        .toggle-button {
            text-align: left; /* Align button content to the left */
            margin: 10px;
            padding:10px;   
            margin-left:1100px;
            color:#FFFFDD;
            background-color:#016A70;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .toggle-button:hover {
            background-color: #176B87;
        }


        table {
            width: 50%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #435334;
            background-color:#CEDEBD;
        }

        th {
            background-color: #FAF1E4;
        }


        /* Add responsive styles for smaller screens */
        @media (max-width: 768px) {
            table {
                font-size: 14px;
            }

            th, td {
                padding: 8px;
            }

            /* Hide the table header on small screens */
            th {
                display: none;
            }

            /* Display table data as block elements for better responsiveness */
            td {
                display: block;
            }

            /* Add some spacing between table rows on small screens */
            tr {
                margin-bottom: 10px;
                border: 1px solid #ddd;
            }

            /* Center-align delete button on small screens */
            .delete-btn {
                text-align: center;
            }
        }
    </style>
<body>

<button onclick="toggleFormVisibility()" class="toggle-button"><span class="material-symbols-outlined adding-users">
person_add</span>Add users</button>
<div class="login-form-container">
    

    <form class="login-form" id="registrationForm" action="adminRegistration.php" method="post">
    <h2>Register Form</h2><br><br>
        <label for="Firstname">Firstname</label><input type="text" placeholder="Firstname" name="Firstname" required>
        <label for="MiddleName">Middlename</label><input type="text" placeholder="Middlename" name="MiddleName">
        <label for="Lastname">Lastname</label><input type="text" placeholder="Lastname" name="Lastname" required>
        <label for="Birthday">Birthday</label><input type="date" id="birthday" name="Birthday" required>
        <label for="Username">Username</label><input type="text" placeholder="Username" name="Username" required>
        <label for="Password">Password</label><input type="password" placeholder="Password" id="password" name="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" onkeyup='check();' required>
        <label for="Confirm_Password">Verify Password</label><input type="password" placeholder="Password" name="Confirm_Password" id="confirm_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" onkeyup='check();' required>
        <label for="Role">Role:</label>
        <select name="Role" id="role" required>
            <option value="user">User</option>
            <option value="admin">Admin</option>
            <option value="lgu">Lgu</option>
        </select>

        <button type="submit">Register</button>

    </form>
</div>


    <?php
    include 'config/dbcon.php';

    if (isset($_POST['delete'])) {
        $idToDelete = $_POST['delete'];

        // Sanitize and validate $idToDelete to prevent SQL injection
        $idToDelete = mysqli_real_escape_string($conn, $idToDelete);

        // Create and execute a DELETE query
        $deleteQuery = "DELETE FROM users WHERE id = $idToDelete";
        if (mysqli_query($conn, $deleteQuery)) {
            echo "<script>alert('Record deleted successfully.');window.location.href = 'admindashboard.php';</script>";
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    }

    $sql = 'SELECT * FROM users';
    $result = mysqli_query($conn, $sql);

    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    if (!empty($data)) {
        echo "<table>";
        echo "<tr><th>Id</th><th>First Name</th><th>Middle Name</th><th>Last Name</th><th>Username</th><th>Password</th><th>Birthday</th><th>Roles</th><th>Created at</th><th>Action</th></tr>";
        foreach ($data as $row) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['firstname'] . "</td>";
            echo "<td>" . $row['middlename'] . "</td>";
            echo "<td>" . $row['lastname'] . "</td>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['password'] . "</td>";
            echo "<td>" . $row['birthday'] . "</td>";
            echo "<td>" . $row['role'] . "</td>";
            echo "<td>" . $row['created_at'] . "</td>";
            echo '<td class="delete-btn">
                    <form method="POST">
                        <input type="hidden" name="delete" value="' . $row['id'] . '">
                        <button type="submit">Delete<span class="material-symbols-outlined">
                        delete
                        </span></button>
                    </form>
                  </td>';
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No data found";
    }

    mysqli_close($conn);
    ?>
</body>


<?php

    require_once "../reusable.php";

    $formStudent = [];

    function establishDatabaseConnection() {

        $server = "localhost";
        $username = "root";
        $password = getenv('DB_ROOT_PASSWORD');
        $database = getenv('DB_NAME');
    
        $conn = mysqli_connect($server, $username, $password, $database);
    
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    
        return $conn;

    }

    function searchStudent($conn, $number) {

        $student = [
            "found" => false,
            "number" => $number,
            "first_name" => "",
            "last_name" => "",
            "email" => "",
            "program" => "",
        ];

        $firstRow = [];

        $sql = "SELECT first_name, last_name, email, program FROM user WHERE user_id = $number";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {

            $firstRow = mysqli_fetch_assoc($result);

            $student["found"] = true;
            $student["first_name"] = $firstRow["first_name"];
            $student["last_name"] = $firstRow["last_name"];
            $student["email"] = $firstRow["email"];
            $student["program"] = $firstRow["program"];

        } else {

            echo "<strong>Student not found</strong>";

        }

        return $student;

    }

    function insertStudent($conn, $student) {

        $sql = "INSERT INTO user (first_name, last_name, email, program) VALUES ('" . $student["first_name"] . "', '" . $student["last_name"] . "', '" . $student["email"] . "', '" . $student["program"] . "')";

        if (mysqli_query($conn, $sql))
        {

            echo "Student n. $conn->insert_id inserted successfully!";
        
        }
        
        else 
        {

            echo "Error: " . $sql . "<br>" . mysqli_error($conn);

        }

    }

    function updateStudent($conn, $student) {

        $sql = "UPDATE user SET first_name = '" . $student["first_name"] . "', last_name = '" . $student["last_name"] . "', email = '" . $student["email"] . "', program = '" . $student["program"] . "' WHERE user_id = " . $student["number"];

        if (mysqli_query($conn, $sql))
        {

            echo "Student n. " . $student["number"] . " updated successfully!";
        
        }
        
        else 
        {

            echo "Error: " . $sql . "<br>" . mysqli_error($conn);

        }

    }

    function deleteStudent($conn, $student) {

        $sql = "DELETE FROM user WHERE user_id = " . $student["number"];

        if (mysqli_query($conn, $sql))
        {

            echo "Student n. " . $student["number"] . " deleted successfully!";
        
        }
        
        else 
        {

            echo "Error: " . $sql . "<br>" . mysqli_error($conn);

        }

    }

    if (isset($_POST["btnSearch"])) {

        $conn = establishDatabaseConnection();
        $student = searchStudent($conn, $_POST["number"]);

        $formStudent = $student;

    } else if (isset($_POST["btnInsert"])) {

        $conn = establishDatabaseConnection();

        $student = [
            "first_name" => $_POST["first_name"],
            "last_name" => $_POST["last_name"],
            "email" => $_POST["email"],
            "program" => $_POST["program"],
        ];

        insertStudent($conn, $student);

    } else if (isset($_POST["btnUpdate"])) {

        $conn = establishDatabaseConnection();

        $student = [
            "number" => $_POST["number"],
            "first_name" => $_POST["first_name"],
            "last_name" => $_POST["last_name"],
            "email" => $_POST["email"],
            "program" => $_POST["program"],
        ];

        updateStudent($conn, $student);

    } else if (isset($_POST["btnDelete"])) {

        $conn = establishDatabaseConnection();

        $student = [
            "number" => $_POST["number"],
        ];

        deleteStudent($conn, $student);

    }

?>

<!DOCTYPE html>
<html>
    
    <head>
            <title>Lab 6 Form</title>
    </head>
    
    <body>

        <form action="lab-6.php" method="post">

            <p>Student Number: <input value="<?php if(isset($formStudent["number"])) echo $formStudent["number"]; ?>" type="text" name="number" /> <input type="submit" name="btnSearch" value="Search" /></p>
            <p>First Name: <input value="<?php if(isset($formStudent["first_name"])) echo $formStudent["first_name"]; ?>" type="text" name="first_name" /></p>
            <p>Last Name: <input value="<?php if(isset($formStudent["last_name"])) echo $formStudent["last_name"]; ?>" type="text" name="last_name" /></p>
            <p>Email: <input value="<?php if(isset($formStudent["email"])) echo $formStudent["email"]; ?>" type="text" name="email" /></p>
            <p>Program: <input value="<?php if(isset($formStudent["program"])) echo $formStudent["program"]; ?>" type="text" name="program" /></p>
            <p>
                <input type="submit" name="btnInsert" value="Insert" /> <input type="submit" name="btnUpdate" value="Update" /> <input type="submit" name="btnDelete" value="Delete" />
            </p>

        </form>

    </body>

</html>
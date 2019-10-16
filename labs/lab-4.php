<?php

    // 1
    require "../reusable.php";

    // 2
    // compute(42);

    // 3
    function my_function() {
        echo "function";
    }

    // 4
    function table($data) {
        $table = $data;

        echo $table;
    }

    // 5
    function test_return() {
        echo "This statement will be executed";
        return;
        echo "This statement will never be executed";
    }

    // 6
    $products = array("gum", "spam", "eggs");

    // 7
    $numbers = range(1,10);

    // 8
    $products[0] = "Fuses";

    // 9
    sort($products);

    // 10
    array_reverse($numbers);

?>

<!-- 11 -->
<!DOCTYPE html>
<html>
    <head>
            <title>Form</title>
    </head>
    <body>
        <form action="handle_form.php" method="post">
            <p>Name: <input type="text" name="name" /></p>
            <p>Email: <input type="text" name="email" /></p>
            <p>Gender: <br>
                <input type="radio" name="gender" value="male" checked> Male <br>
                <input type="radio" name="gender" value="female"> Female <br>
                <input type="radio" name="gender" value="other"> Other
            </p>
            <p>Age: <br>
                <select name="age">
                    <option value="20">More than 19 years old</option>
                    <option value="19">19 years old</option>
                    <option value="18">Less than 19 years old</option>
                </select> 
            </p>
            <p>Comments: <br>
                <textarea name="comments" rows="4" cols="50">
                    Comment area
                </textarea> 
            </p>
            <p>
                <input type="submit" name="submit" value="Submit" />
            </p>
        </form>
    </body>
</html>
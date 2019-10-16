<?php

// 1
// Answer: GET

// 2
setcookie("logged", 1, time() + 3600);

// 3
// Answer: POST

// 4
// Answer: login

// 5
// Answer: No

// 6
// Answer: An array

// 7
// Answer: form

// 8
// Answer: Action

// 9
// Answer: session_start() function

// 10
session_start();
$name = "something";
$_SESSION["name"] = $name;
echo $_SESSION["name"];

// 11
// Answer: On the user's computer

?>
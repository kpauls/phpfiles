<?php
echo '<pre>';
var_dump ( $_POST );
echo '<pre>';

// define variables and set to empty values
         $usernameErr = $emailErr = $genderErr = $websiteErr = "";
         $username = $email = $gender = $website = "";
         
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["username"])) {
               $usernameErr = "UserName is required";
            }else {
               $username = test_input($_POST["username"]);
            }
            
            if (empty($_POST["email"])) {
               $emailErr = "Email is required";
            }else {
               $email = test_input($_POST["email"]);
               
               // check if e-mail address is well-formed
               if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                  $emailErr = "Invalid email format"; 
               }
            }
?>

<form method="POST">
Username <input type="username"  name="username"/><br>
Password <input type="password"  name="password"/><br>
Email <input type="email"  name="email"/><br>
<input type="submit" value="Submit"/>

</form>
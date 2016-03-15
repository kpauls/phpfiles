<html>
   
   <head>
      <style>
         .error {color: #FF0000;}
      </style>
   </head>
   
   <body>
      <?php
      var_dump ($_POST );
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
            
            if (empty($_POST["password"])) {
               $passwordErr = "Password is required";
            }else {
               $password = test_input($_POST["password"]);
               
             
               if (!filter_var($password, FILTER_VALIDATE_EMAIL)) {
                  $passwordErr = "Please enter a password less than 12 characters"; 
               }
            }
            
            if (empty($_POST["email"])) {
              $emailErr = "Email is required";
            }
            else {
               $email = test_input($_POST["email"]);
            }
            
            if (empty($_POST["gender"])) {
               $genderErr = "Gender is required";
            }else {
               $gender = test_input($_POST["gender"]);
            }
         }
         
         function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         } 
      ?>
     
      <h2>Form</h2>
      
      <form method = "POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">>
         <table>
            <tr>
               <td>UserName:</td>
               <td><input type = "text" name = "username">
                  <span class = "error">* <?php echo $usernameErr;?></span>
               </td>
            </tr>
           
            <tr>
               <td>E-mail: </td>
               <td><input type = "text" name = "email">
                  <span class = "error">* <?php echo $emailErr;?></span>
               </td>
            </tr>
           
            <tr>
               <td>Time:</td>
               <td> <input type = "text" name = "website">
                  <span class = "error"><?php echo $websiteErr;?></span>
               </td>
            </tr>
            
            <tr>
               <td>Gender:</td>
               <td>
                  <input type = "radio" name = "gender" value = "female">Female
                  <input type = "radio" name = "gender" value = "male">Male
                  <span class = "error">* <?php echo $genderErr;?></span>
               </td>
            </tr>
            
            <td>
               <input type = "submit" name = "submit" value = "Submit"> 
            </td>
            
         </table>
         
      </form>
      
      <?php
         echo "<h2>Input</h2>";
         echo $username;
         echo "<br>";
         
         echo $email;
         echo "<br>";
         
         echo $website;
         echo "<br>";
         
         echo $gender;

          if( !filled( $_POST) )
{    echo "Thank you for submitting the form";
    header("Location: http://localhost/phpwork/redirect.php");
}
      ?>
   
   </body>
</html>







<!DOCTYPE HTML>  
<html>
<head>
</head>
<body>  

    <?php
    $name = $email = $gender = $comment = $website = "";
    $nameErr = $emailErr = $genderErr = $commentErr = $websiteErr = "";
    if($_SERVER["REQUEST_METHOD"]=="POST"){
     if(empty($_POST["name"])) {
         $nameErr="Name is required";
      }
      else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
            $nameErr = "Only letters and white space allowed";
          }
      }

     if(empty($_POST["email"])){
        $emailErr = "Email is required";
     }
     else{
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
          }
     }

     if(empty($_POST["gender"])){
        $genderErr = "Gender is required";
     }
     else{
        $gender = test_input($_POST["gender"]);
     }

     if(empty($_POST["website"])){
        $websiteErr = "Website is required";
     }
     else{
        $website = test_input($_POST["website"]);
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
            $websiteErr = "Invalid URL";
          }
     }
     
     if(empty($_POST["comment"])){
        $commentErr = "";
     }
     else{
        $comment = test_input($_POST["comment"]);
     }
      
    }


      function test_input($data){
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        return $data;
      }
    ?>
    
    <h2>PHP Form Validation Examples :</h2>
    
    <p><span class="error">* required field</span></p>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
     Name : <input type="text" name="name">
     <span style="color: red;" class="error">* <?php echo $nameErr;?></span>
     <br><br>
     Email : <input type="text" name="email">
     <span style="color: red;" class="error">* <?php echo $emailErr;?></span>
     <br><br>
     Website : <input type="text" name="website">
     <span style="color: red;" class="error"><?php echo $websiteErr;?></span>
     <br><br>
     Comment : <textarea name="comment" rows="5" cols="50"></textarea><br><br>

     Gender:
     <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="Female">Female
     <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="Male">Male
     <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="Other">Others

     <span style="color: red;" class="error">* <?php echo $genderErr;?></span>
     <br><br>
    
     <input type="submit" name="submit" value="submit">

    </form>

    <?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
?>
</body>
</html>

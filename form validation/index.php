<?php if(isset($_POST['springbreak']))
{
header ('Location:http://lmckee.campbellits.net/ITS470/Project3/index.php');
}
?>
<!DOCTYPE HTML>
<html>
<head>
<style> 
input[type=text] {
    width: 30%;
    padding: 10px 15px;
    margin: 7px 0;
    box-sizing: border-box;

}
input[type=text]:focus {
    background-color: lightblue;
}



.error {color: #FF0000;}
</style>
</head>
<body> 

<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = $telephoneErr ="";
$name = $email = $gender = $comment = $website = $telephone="";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["name"])) {
     $nameErr = "Name is required";
   } else {
     $name = test_input($_POST["name"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
       $nameErr = "Only letters and white space allowed"; 
     }
   }
   
   if (empty($_POST["email"])) {
     $emailErr = "Email is required";
   } else {
     $email = test_input($_POST["email"]);
     // check if e-mail address is well-formed
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $emailErr = "Invalid email format"; 
     }
   }
     
   if (empty($_POST["website"])) {
     $website = "";
   } else {
     $website = test_input($_POST["website"]);
     // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
     if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
       $websiteErr = "Invalid URL"; 
     }
   }

   if (empty($_POST["comment"])) {
     $comment = "";
   } else {
     $comment = test_input($_POST["comment"]);
   }

   if (empty($_POST["gender"])) {
     $genderErr = "Gender is required";
   } else {
     $gender = test_input($_POST["gender"]);
   }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["telephone"])) {
     $telephoneErr = "Phone is required";
   } else {
     $telephone = test_input($_POST["telephone"]);
     }
   }

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
function append()
{

$myFile = "testFile.txt";
$fh = fopen($myFile, 'a') or die("can't open file");
fwrite($fh,test_input($_POST["name"]).",".test_input($_POST["email"]).",".test_input($_POST["website"]).",".test_input($_POST["comment"]).","   .test_input($_POST["gender"]).",".test_input($_POST["telephone"])."\n" );
echo date("l jS \of F Y h:i:s A") . "<br>";
fclose($fh);
}
?>


<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
   Name: <input type="text" name="name" value="<?php echo $name;?>">
   <span class="error">* <?php echo $nameErr;?></span>
   <br><br>
   Email: <input type="text" name="email" value="<?php echo $email;?>">
   <span class="error">* <?php echo $emailErr;?></span>
   <br><br>
   Website: <input type="text" name="website" value="<?php echo $website;?>">
   <span class="error"><?php echo $websiteErr;?></span>
   <br><br>
   Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
   <br><br>
   Gender:
   <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?>  value="female">Female
   <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?>  value="male">Male
   <span class="error">* <?php echo $genderErr;?></span>
   <br><br>
   Telephone: <input type="text" name="telephone" value="<?php echo $telephone;?>">
   <span class="error">* <?php echo $telephoneErr;?></span>
   <br><br>
   <button type="reset" value="Reset">Reset</button>
   <input type="submit" name="submit" value="Submit"> 
     
    <a href="http://lmckee.campbellits.net/ITS470/Project3/screen.php"><button type="button">See Data</button></a>
</form>
<form method="link" action="clearcsv.php"><input type="submit" value="Clear CSV"></form>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{

if (($nameErr == '') && ($emailErr == '') && ($websiteErr == '') && ($genderErr == '')&& ($telephoneErr=='') )
	append();
}
?>
</body>
</html>
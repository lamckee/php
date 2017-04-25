<?php
$action=$_REQUEST['action'];

    {
    $name=$_REQUEST['name'];
    $email=$_REQUEST['email'];
    if ($name=="")
        {
        echo "All fields are required, please fill out again.";
        }
    else{        
        $from="Donald Trump";
        $subject="Message sent using your contact form";
        mail("$email", $subject, $message, $from);
        echo "Email sent!";
        }
    }  
?>

<!DOCTYPE html>
<head>
<title>Form submission</title>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" /> 
<body>

<form action = "" method="post">
<p><label>Name:</label><input type='text' name='name' value='' class='auto'></p>
<p><label>Email:</label><input type='text' name='email' value=''class='auto'></p>
<input type="submit" name="submit" value="Submit"/>
</form>


<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>	
<script type="text/javascript">
$(function() {
	
	//autocomplete
	$(".auto").autocomplete({
		source: "search.php",
		minLength: 1
	});				
});
</script>
</body>
</html>
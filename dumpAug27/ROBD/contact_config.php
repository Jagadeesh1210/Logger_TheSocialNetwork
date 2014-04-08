<?php
$mailto = "companyname.com";
$charset = "windows-1251";
$subject = "Site visitor: ".$_POST['posName'];
$content = "text/html";
$message = "Site visitor information:
<br><br> Name: ".$_POST['posName']
."<br>E-mail: ".$_POST['posEmail']
."<br>Country: ".$_POST['posCountry']
."<br>Phone: ".$_POST['posRegard']
."<br>Comments: ".$_POST['posText'];
 
$statusError = "";
$statusSuccess = "";

$errors_name = 'Please enter the Name';
$errors_mailfrom = 'Please enter the Email';
$errors_incorrect = 'The e-mail address you entered does not eppear to be valid. <br>Your e-mail address should look like yourname@domain.com';
$errors_message = 'Please enter the Message';
$errors_subject = 'Please enter the Phone';
$captcha_error = 'Wrong security code!';
$send = 'Thank you for your message';
?>
<?php
$mailto = "cbm@cbmcard.com";
$charset = "windows-1251";
$subject = "Site visitor: ".$_POST['posName'];
$content = "text/html";
$message = "Site visitor information:
<br><br> First Name: ".$_POST['posName']
."<br>Last Name: ".$_POST['posName2']
."<br>E-mail: ".$_POST['posEmail']
."<br>Telephone: ".$_POST['posRegard']
."<br>City where jobsite is located: ".$_POST['posText']
."<br>want us to e-mail you the free Homeowners Guide To Remodeling: ".$_POST['posBox'];
 
$statusError = "";
$statusSuccess = "";

$errors_name = 'Please enter the First Name';
$errors_name2 = 'Please enter the Last Name';
$errors_telephone = 'Please enter the Telephone';
$errors_city = 'Please enter the City where jobsite is located';
$errors_mailfrom = 'Please enter the Email';
$errors_incorrect = 'The e-mail address you entered does not eppear to be valid. <br>Your e-mail address should look like yourname@domain.com';
$captcha_error = 'Wrong security code!';
$send = 'Thank you for your message';
?>
<?php // All PHP script files begin with this line
      // Note: PHP is a server-side script; it will not run on a local computer without special setup.
      // Note: The server must have PHP installed on it in order for this script to work.       
      // Note: This PHP file works with FormDemo.htm, which is found in the same folder.
      //       Download both files, enter your real email address below. Upload both files and test.
      // Note: A single error, such as a missing { or mispelled field means Nothing Will Display!      
      //       Notice the matching braces {} and how lines end with ; which is similar to CSS.
      //       All field names on the form must match exactly the field names shown below.
      // Note: If you add a field to the form, it must be added to Section A and Section B below and match exactly!
      //       I strongly suggest you only add one field a time. Test, then add another field if desired.
      // Thanks to freecontactform.com/html_form.php for much of this code.       
    
if(isset($_POST['Email'])) {
    // CHANGE THE TWO LINES BELOW
    $email_to = "Theoscarcarrillo@gmail.com";
    $email_subject = "Online form submission";
       
    function died($error) {
        // your error code can go here. Echo is the Php command to display to screen
        echo "We are very sorry, but there were error(s) found with the form you submitted.";
        echo "These errors appear below.<br><br>";
        echo $error."<br><br>";
        echo "Please go back and fix these errors.<br><br>";
        die();
    }

    // NOTE - This PHP code worked on GoDaddy's server but did NOT work on the SCF ASP server!!!! 
    // Strings need to be enclosed in quotes, so do not use an apostrophe in a field name.
	
    // SECTION A - assign variables to fields Posted from form      
    $FirstName = $_POST['FirstName']; // required. (Note in Php - variables start with a $)
    $LastName = $_POST['LastName']; // required
    $Gender = $_POST['Gender']; // NOT required	
    $email = $_POST['Email']; // required
    $Telephone = $_POST['PhoneNumber']; // required
    $Comments = $_POST['Comments']; // NOT required
    $State = $_POST['State']; // NOT required
    $City = $_POST['City']; // NOT required
    $ZipCode = $_POST['ZipCode']; // NOT required
    $Yes = $_POST['Yes']; // NOT required
    $No = $_POST['No']; // NOT required

    $email_message = "Form details for yourName@yourDomainName.com below:\n\n"; // the /n simply means New line
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }

    // SECTION B - prepare email based on variables assigned to fields Posted from form       
    $email_message .= "First Name: ".clean_string($FirstName)."\n";
    $email_message .= "Last Name: ".clean_string($LastName)."\n";
    $email_message .= "Gender: ".clean_string($Gender)."\n";
    $email_message .= "Email: ".clean_string($email)."\n";
    $email_message .= "Phone Number: ".clean_string($PhoneNumber)."\n";
    $email_message .= "Comments: ".clean_string($Comments)."\n";
    $email_message .= "State: ".clean_string($State)."\n";
    $email_message .= "City: ".clean_string($City)."\n";
    $email_message .= "Zip Code: ".clean_string($ZipCode)."\n";
    $email_message .= "Yes: ".clean_string($Yes)."\n";
    $email_message .= "No: ".clean_string($No)."\n";

    // *** Tap [Ctrl] + [F5] to Force Hard Reload/Refresh if you modify the PHP code.
     
// create email header for recipient showing senders email address as the email from
$headers = 'From: '.$email_from."\r\n". // carriage Return and New line
'Reply-To: '.$email."\r\n" .       // . is for Concatenation
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);
// @mail($email_copy, $email_subject, $email_message, $headers); 
?>
 
<!-- place your own Contact Sent message or link to a Contact Sent.htm file below -->
<html>
<head>
<meta http-equiv="REFRESH" content="1;url=contactsent.html">
</head>
<body>
</body>
</html>

<?php
}
die();
?>
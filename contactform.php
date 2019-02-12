<?php 
if(isset($_POST['submit'])){
    $to = "charlesunn@gmail.com"; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $first_name = $_POST['firstname'];
    $subject = "Form submission";
    $message = $firstname . " "  . " wrote the following:" . "\n\n" . $_POST['comments'];
    

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    // If the user tries to access this script directly, redirect them to the feedback form,
if (!isset($_REQUEST['email'])) {
header( 'Location: www.charlesnjoku.com' );
}

// If the form fields are empty, redirect to the error page.
elseif (empty($firstname) || empty($email)) {
header( 'Location: www.charlesnjoku.com' );
}

/* 
If email injection is detected, redirect to the error page.
If you add a form field, you should add it here.
*/
elseif ( isInjected($email) || isInjected($firstname)  || isInjected($comments) ) {
header( 'Location: www.charlesnjoku.com' );
}

// If we passed all previous tests, send the email then redirect to the thank you page.
else {

    mail( "$webmaster_email", "Feedback Form Results", $msg );

    header( 'Location: www.charlesnjoku.com' );
}
?>

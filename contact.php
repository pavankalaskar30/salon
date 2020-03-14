<?php
$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$message = $_REQUEST['msg'];


$pno=$_REQUEST['phone'];
$date = $_REQUEST['predate'];
$thk = "Your appointment at D'vine is confirmed. We'll call you regarding further details of your appointment soon.\n Have a D'vine day!";

$txt = "Name : $name \n Email-Id : $email \n Phone no : $pno  \n Preffered Date of Appointment : $date \n Message : $message ";

$t = "Name : $name \n Email-Id : $email \n Phone no : $pno  \n Preffered Date of Appointment : $date \n Message : $message \n\n\n$thk";

function email_validation($str) { 
    return (!preg_match( "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $str)) 
        ? FALSE : TRUE; 
} 

function phonevalidate($phone) {
    return (!preg_match('/^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[789]\d{9}$/', $phone))
        ? FALSE : TRUE; 
}




if (empty($name) || empty($email) || empty($message))
{
echo ('Please fill all the fields');
return;
}
else if(!email_validation("$email")) { 
    echo "Invalid email address."; 
    return;
} 
else if(!phonevalidate($pno))
{
    echo "Invalid phone number."; 
    return;
}

else
{
    mail($email,"Appointment", $t);
mail("pavankalaskar30@gmail.com", "Appointment", $txt, "From: $name < $email>");

    echo "<script type='text/javascript'>alert( 'your message sent successfully!'); 
window.history.log(-1); 
</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
</head>
<body>

    <!-- Default form register -->
<form class="text-center border border-light p-5" action="index.php" method="POST">

    <p class="h4 mb-4">Sign up</p>

    <div class="form-row mb-3">
        <div class="col">
            <!-- First name -->
            <input type="text" name="firstName" class="form-control" placeholder="First name">
        </div>
        <div class="col">
            <!-- Last name -->
            <input type="text" name="lastName" class="form-control" placeholder="Last name">
        </div>
    </div>

    <!-- E-mail -->
    <input type="email" name="email" class="form-control mb-4" placeholder="E-mail">

    <!-- Password -->
    <input type="password" id="defaultRegisterFormPassword" class="form-control" placeholder="Password" aria-describedby="defaultRegisterFormPasswordHelpBlock">
    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
        At least 8 characters and 1 digit
    </small>

    <!-- Phone number -->
    <input type="text" name="phoneNumber" class="form-control" placeholder="Phone number" aria-describedby="defaultRegisterFormPhoneHelpBlock">
    <small id="defaultRegisterFormPhoneHelpBlock" class="form-text text-muted mb-4">
        Optional - for two step authentication
    </small>

    <!-- Newsletter -->
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="defaultRegisterFormNewsletter">
        <label class="custom-control-label" for="defaultRegisterFormNewsletter">Subscribe to our newsletter</label>
    </div>

    <!-- Sign up button -->
    <button class="btn btn-info my-4 btn-block" type="submit" name="submit">Sign in</button>

    <!-- Social register -->
    <p>or sign up with:</p>

    <a href="#" class="mx-2" role="button"><i class="fab fa-facebook-f light-blue-text"></i></a>
    <a href="#" class="mx-2" role="button"><i class="fab fa-twitter light-blue-text"></i></a>
    <a href="#" class="mx-2" role="button"><i class="fab fa-linkedin-in light-blue-text"></i></a>
    <a href="#" class="mx-2" role="button"><i class="fab fa-github light-blue-text"></i></a>

    <hr>

    <!-- Terms of service -->
    <p>By clicking
        <em>Sign up</em> you agree to our
        <a href="" target="_blank">terms of service</a>

</form>
<!-- Default form register -->
    
<?php

if(isset($_POST['submit']))
{
   $name  = $_POST['firstName'];
   $email = $_POST['email'];
   $number = $_POST['phoneNumber'];
   if($name == '' || $email == '' || $number == '')
   {
       echo "All fields are required";
   }
   else{
       $from = "Mortgage Giant UK";
       $webmaster = "sullaimaan@gmail.com";
       $subject = "Contact Us Form from Mortgage website";
       $to = "sulimanhira@gmail.com";

       $headers = "From: ". $from."<".$webmaster.">\r\n";
       $headers .= "X-Mailer: PHP/". phpversion(). "\r\n";
       $headers .= "MIME-Version: 1.0". "\r\n";
       $headers .= "Content-Type: text/html; charset-ISO-8859-l\r\n";

       $message = "<html><body>";
       $message .= "<p>Name: ". $_POST['name']."</p>";
       $message .= "<p>Email: ". $_POST['email']."</p>";
       $message .= "<p>Phone Number: ". $_POST['number']."</p>";

       $sendmail = mail($to,$subject,$subject,$headers);

       echo "You have successfuly sent you email";
   }

}
?>


</body>
</html>
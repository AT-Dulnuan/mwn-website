<?php

// Errors
$emptyError = false;
$emailError = false;
$surveySent = false;

$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$message = htmlspecialchars($_POST['message']);

if(!empty($name) && !empty($email) && !empty($message)){

    if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
        $emailError = true;

    } else {


            $toEmail = 'abigail@tresprojects.com';
                $subject = 'Contact Form Submission From '.$name;
                $body = '<h2>Contact Form</h2>
                        <p><strong>Name: </strong>'.$name.'</p>
                        <p><strong>Email: </strong>'.$email.'</p>
                        <p><strong>Message: </strong>'.$message.'</p>';

                $headers = "MIME-Version: 1.0" ."\r\n";
                $headers .="Content-Type:text/html;charset=UTF-8" . "\r\n";

                
                $headers .= "From: " .$name. "<".$email.">". "\r\n";

                // Send email
                if(mail($toEmail, $subject, $body, $headers)){
					
					$surveySent = true;

				}


    }

} else {
    $emptyError = true;
}


?>

<script>

    var emptyError = "<?php echo $emptyError ;?>" ;
    var emailError = "<?php echo $emailError ;?>" ;
    var surveySent = "<?php echo $surveySent ;?>" ;

    $("input").each(function() {
        $(this).removeClass("is-danger")
    })

    $("#errorMsg").removeClass("notification is-light is-danger");
    $("input.required").each(function() {
        if($(this).val() == ''){
            $(this).removeClass("is-danger");
        }
    })

    if(emptyError == "1"){
        $("#errorMsg").addClass("notification is-light is-danger");
        $("#errorMsg").html("Please fill in all the required fields.");

        $("input.required").each(function() {
            if($(this).val() == ''){
                $(this).addClass("is-danger");
            }
        })
    }

    if(emailError == "1"){
        $("#errorMsg").addClass("notification is-light is-danger");
        $("#errorMsg").html("Please enter a valid email address.");
        $("#emailField").addClass("is-danger");
    }

    if(surveySent == "1"){
        $("#errorMsg").addClass("notification is-light is-success");
        $("#errorMsg").html("Your message has been sent successfully! Our team will get in touch with you soon.");
        $("#fieldset").attr("disabled", "disabled");
        $("#submitBtn").addClass("disabled");
    }

</script>
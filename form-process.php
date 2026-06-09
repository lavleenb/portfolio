<?php
    if(isset($_POST['email'])){
        $email_to = 'lavleenbhachu4@gmail.com';
        $email_subject = 'New website form submission';

        function problem($error)
        {
            echo "looks like there is some problem with your form data: <br><br>";
            echo $error . "<br><br>";
            echo "fix to proceed. <br><br>";
            die();
        }

        // validation expected data exists
        if(
            !isset($_POST['name']) ||
            !isset($_POST['email']) ||
            !isset($_POST['message'])
        ) {
            problem('looks like there is some problem with your form data.');
        }

        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        $error_message = "";
        $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}%/';

        if(!preg_match($email_exp, $email)){
            $error_message .= 'email address does not seem valid.<br>';
        }

        $string_exp = "/^[A-Za-z . '-]+$/";

        if(!preg_match($string_exp, $name)) {
            $error_message .= 'name does not seem valid.<br>';
        }

        if(strlen($message) < 2) {
            $error_message .= 'message should not be less than 2 characters.<br><br>';
        }

        if(strlen($error_message) > 0) {
            problem($error_message);
        }

        $email_message = 'form details following: \n\n';

        function clean_string($string)
        {
            $ret = array("content-type", "bcc:", "to:", "cc", "href");
            return str_replace($ret, "", $string);
        }

        $email_message .= "Name: " . clean_string($name) . "\n";
        $email_message .= "Email: " . clean_string($email) . "\n";
        $email_message .= "Message: " . clean_string($message) . "\n";

        $headers = 'From: ' . $email . "\r\n" . 
            'Reply-To: ' . $email . "\r\n" . 
            'X-Mailer: PHP/' . phpversion();
        @mail($email_to, $email_subject, $email_message, $headers);

        ?>

        Thank you for contacting me, I'll get back to you as soon as possible! <3

        <?php 
    }
?> 
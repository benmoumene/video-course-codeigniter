<?php

require 'PHPMailer/PHPMailerAutoload.php';

class Gmail {

    public function sendMail($config) {
        //Create a new PHPMailer instance
        $mail = new PHPMailer;
        //Tell PHPMailer to use SMTP
        $mail->isSMTP();
        //Enable SMTP debugging
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        $mail->SMTPDebug = 0;
        //Ask for HTML-friendly debug output
        $mail->Debugoutput = 'html';
        //Set the hostname of the mail server
        $mail->Host = 'smtp.gmail.com';
        // use
        // $mail->Host = gethostbyname('smtp.gmail.com');
        // if your network does not support SMTP over IPv6
        //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        $mail->Port = 587;
        //Set the encryption system to use - ssl (deprecated) or tls
        $mail->SMTPSecure = 'tls';
        //Whether to use SMTP authentication
        $mail->SMTPAuth = true;
        //Username to use for SMTP authentication - use full email address for gmail
        $mail->Username = "tuannguyen.tony@gmail.com";
        //Password to use for SMTP authentication
        $mail->Password = "vglnpbiegpvaxksj";
        //Set who the message is to be sent from
        if (isset($config['from_email'])):
            $mail->setFrom($config['from_email'], $config['from_name']);
        else:
            $mail->setFrom('tuan.nguyen@seaguitar.com', 'SEAMI - SEA Music Institute');
        endif;
        //Set an alternative reply-to address
        //$mail->addReplyTo('replyto@example.com', 'First Last');
        //Set who the message is to be sent to
        $mail->addAddress($config['to_email']);
        //set charset encoding
        $mail->CharSet = 'UTF-8';
        //Set the subject line
        $mail->Subject = $config['subject'];
        //Replace the plain text body with one created manually
        //$mail->Body = $config['message'];
        $mail->msgHTML($config['message']);

        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        return $mail->send();
    }

}

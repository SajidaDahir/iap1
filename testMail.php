<?php
require_once 'ClassAutoLoad.php';

$username = trim($_POST['username'] ?? '');
$email = trim($_POST['email'] ?? '');

//validate email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email format");
}

$mailCont = [
    'name_from' => 'Sajida Dahir',
    'email_from' => 'sajida.sheikh@strathmore.edu',
    'name_to' => $username,
    'email_to' => $email,
    'subject' => 'Welcome to ICS 2.2',
    'body' => "Hello <b>" . htmlspecialchars($username) . "</b>, 
            <br>Welcome to our application! This is a new semester"
];

$ObjSendMail->sendMail($conf, $mailCont);
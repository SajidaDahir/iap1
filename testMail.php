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

// connect using PDO
try {
    $dsn = "mysql:host={$conf['db_host']};dbname={$conf['db_name']};charset=utf8";
    $pdo = new PDO($dsn, $conf['db_user'], $conf['db_pass']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // insert user
    $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->execute([
        $username,
        $email,
        password_hash($_POST['password'], PASSWORD_DEFAULT) // always hash passwords
    ]);

} catch (PDOException $e) {
    die("DB error: " . $e->getMessage());
}


$ObjSendMail->sendMail($conf, $mailCont);
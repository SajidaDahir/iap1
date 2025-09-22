<?php
// Site Information
$conf['site_name'] = 'Task Application';
$conf['site_url'] = 'http://localhost';
$conf['admin_email'] = 'admin@icsccommunity.com';

// Database Configuration
$conf['db_type'] = 'pdo';
$conf['db_host'] = 'localhost';
$conf['db_user'] = 'root';
$conf['db_pass'] = 'saju';
$conf['db_name'] = 'trial';

// Site Language
$conf['site_lang'] = 'en';

// Email Configuration
$conf['mail_type'] = 'smtp'; // Options: 'smtp' or 'mail';
$conf['smtp_host'] = 'smtp.gmail.com';
$conf['smtp_port'] = '465';
$conf['smtp_user'] = 'sajida.sheikh@strathmore.edu';
$conf['smtp_pass'] = 'dsvbamcncwwglber';
$conf['smtp_secure'] = 'ssl'; // Options: 'ssl' or 'tls

//Database Connection using PDO
try {
    $dsn = "mysql:host={$conf['db_host']};dbname={$conf['db_name']};charset=utf8";
    $pdo = new PDO($dsn, $conf['db_user'], $conf['db_pass']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("DB Connection Failed: " . $e->getMessage());
}
?> 
<?php

//Load Composer's autoloader (created by composer, not included with PHPMailer)
require 'Plugins/PHPMailer/vendor/autoload.php';
require_once 'conf.php';

$directories = ["Forms", "Layout", "Global"];

spl_autoload_register(function ($className) use ($directories) {
    foreach ($directories as $directory) {
        $filePath = __DIR__ . "/$directory/" . $className . '.php';
        if (file_exists($filePath)) {
            require_once $filePa4th;
            return;
        }
    }
});

// create global instances
$ObjSendMail = new sendMail();
$ObjForm = new forms();
$ObjLayout = new layout();
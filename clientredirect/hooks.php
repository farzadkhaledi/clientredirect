<?php
if (!defined("WHMCS"))
    die("This file cannot be accessed directly");

use Illuminate\Database\Capsule\Manager as Capsule;

add_hook('UserAdd', 1, function ($vars) {
    if (isset($_SESSION['adminid']) || !defined('CLIENTAREA')) {
        return;
    }
    $signup = Capsule::table('tbladdonmodules')->where('module', 'clientredirect')->where('setting', 'signup')->value('value');
    if ($signup && App::getCurrentFilename() == 'register') {
        $_SESSION['newuseradded'] = $signup;
    }
});

add_hook('UserLogin', 1, function ($vars) {
    if (isset($_SESSION['adminid']) || !defined('CLIENTAREA')) {
        return;
    }
    if (isset($_SESSION['newuseradded'])) {
        $url = $_SESSION['newuseradded'];
        unset($_SESSION['newuseradded']);
        header('Location: ' . $url);
        exit;
    }
    $signin = Capsule::table('tbladdonmodules')->where('module', 'clientredirect')->where('setting', 'signin')->value('value');
    if ($signin) {
        header('Location: ' . $signin);
        exit;
    }
});

add_hook('UserLogout', 1, function ($vars) {
    if (isset($_SESSION['adminid'])) {
        return;
    }
    $signout = Capsule::table('tbladdonmodules')->where('module', 'clientredirect')->where('setting', 'signout')->value('value');
    if ($signout) {
        header('Location: ' . $signout);
        exit;
    }
});

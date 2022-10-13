<?php
if (!defined("WHMCS"))
    die("This file cannot be accessed directly");

use Illuminate\Database\Capsule\Manager as Capsule;

function clientredirect_config()
{
    $configarray = array(
        "name" => "Client Redirect",
        "description" => "Client Redirect Module allows you to redirect clients after registration, login and logout to a special URL.",
        "version" => "1.0",
        "author" => "Farzad Khaledi",
        "language" => "english",
        "fields" => array(
            "signup" => array("FriendlyName" => "Redirect After Sign Up", "Type" => "text", "Size" => "35", "Description" => "Full URL to redirect after client successfully signed up to WHMCS (Register Page Only).",),
            "signin" => array("FriendlyName" => "Redirect After Sign In", "Type" => "text", "Size" => "35", "Description" => "Full URL to redirect after client successfully logged to WHMCS.",),
            "signout" => array("FriendlyName" => "Redirect After Sign Out", "Type" => "text", "Size" => "35", "Description" => "Full URL to redirect after client successfully signed out from WHMCS.",),
        )
    );
    return $configarray;
}

function clientredirect_activate()
{

    return array("status" => "success", "description" => "Client Redirect has been activated.");
}

function clientredirect_deactivate()
{
    return array("status" => "success", "description" => "Client Redirect has been deactivated.");
}

function clientredirect_output($vars)
{

}

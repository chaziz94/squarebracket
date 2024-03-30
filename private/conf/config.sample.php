<?php

//SQL DB
$host = '127.0.0.1';
$db = 'opensb';
$user = '';
$pass = '';

$basepath = '/';

$ffmpegPath = '';
$ffprobePath = '';

// these probably don't work
$tplCache = 'templates/cache';
$tplNoCache = false; // **DO NOT SET AS TRUE IN PROD - DEV ONLY**

$domain = 'example.com';
$isDebug = false; // DEV ONLY
$isMaintenance = false;

$paginationLimit = 20; //Pagination limit.

// TEMPLATE OPTIONS
$defaultTemplate = "qobo";

// Branding
$branding = [
    "name" => "OpenSB Development",
	"assets_location" => "/assets/placeholder",
];

$isQoboTV = false; // this makes opensb use bunnycdn for storage. meant for qobo, but it's dead.

// only used if $isQoboTV is true
$bunnySettings = [
	"streamApi" => "stream api key",
	"streamLibrary" => 12345,
	"streamHostname" => "[stream hostname].b-cdn.net",
	"storageApi" => "storage api key",
	"storageZone" => "storage zone name",
	"pullZone" => "[pull zone].b-cdn.net",
];

$disableRegistration = false;
$disableUploading = false;
$disableWritingJournals = false;

$enableFederatedStuff = false; // development, don't enable unless if you know what you are doing.
$debugLogging = false;
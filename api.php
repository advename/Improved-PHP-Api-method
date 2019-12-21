<?php
require_once(__DIR__ . '/ApiResponse.php');
require_once(__DIR__ . 'functions.php');
/**
 * This file demonstrates an effective PHP API setup
 * The setup is demonstrated using a "book a flight" example.
 */


/**
 * 1. Create a blueprint of the needed API value's and their respective descriptive meanings
 */
$api = [
    'first_name' => 'First name',
    'last_name' => 'Last name',
    'email' => 'Email address',
    'departure_id' => 'Departure id',
    'destination_id' => 'Destination id',
    'date' => 'Date',
    'time' => 'Time',
];

/**
 * 2. Loop through the blueprint values, check for their existence and sanitize them 
 * at the same time using the val_exists() and sanit() method from functions.php
 * Send an error response using the ApiResponse class from ApiResponse.php if something fails
 */
foreach ($api as $key => $desc) {
    if (!@val_exists($_POST[$key])) {
        ApiResponse::error("{$desc} value is missing");
    }
    $api[$key] = sanitize($_POST[$key]); //sanitize values and store them inside the API
}

/**
 * 3. DONE!
 * That's it, now you successfully validated and sanitized all values and can use them for your API work.
 * The advantage of this setup is that if you need to add any value in the future, you simply
 * have to add it to the blueprint.
 */

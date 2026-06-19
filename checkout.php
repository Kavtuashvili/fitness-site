<?php
include "includes/auth.php";
require 'vendor/autoload.php';

\Stripe\Stripe::setApiKey("sk_test_51Th2kePG3LPAp1ay4LdpYeB1mHUHI9JsDTnRXOHFG4jEWxABXQRT3DKSvOilP6ZHUAlwiUVU7C8mmQb5QNxkhNhg00NRTfpYP5");

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$session = \Stripe\Checkout\Session::create([
    'payment_method_types' => ['card'],
    'line_items' => [[
        'price_data' => [
            'currency' => 'usd',
            'product_data' => [
                'name' => 'Premium Fitness Plan',
            ],
            'unit_amount' => 999,
        ],
        'quantity' => 1,
    ]],
    'mode' => 'payment',
    'success_url' => 'http://localhost/fitness-site/payment_success.php',
    'cancel_url' => 'http://localhost/fitness-site/upgrade.php',
]);

header("Location: " . $session->url);
exit();
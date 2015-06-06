<?php
include_once('../../config/init.php');
include_once($BASE_DIR.'stripe/init.php');
include_once($BASE_DIR .'database/users.php');

$amount = $_POST['amount'] * 100;

$stripe = array(
    "secret_key"      => "sk_test_caqaKddUr7kf4IENh944dDrv",
    "publishable_key" => "pk_test_yqdo172QRLvBQxrcIrF7xc5v"
);

\Stripe\Stripe::setApiKey($stripe['secret_key']);

$token  = $_POST['stripeToken'];
try{
    $customer = \Stripe\Customer::create(array(
        'email' => $_SESSION['user']['email'],
        'card'  => $token
    ));

    $charge = \Stripe\Charge::create(array(
        'customer' => $customer->id,
        'amount'   => $amount,
        'currency' => 'usd'
    ));

}catch (Exception $e){
    $_SESSION['error_messages'][] = $e->getMessage();
    header("Location: $BASE_URL".'pages/users/edit_profile.php');
    exit;
}

addAmount($_SESSION['user']['id'], $amount);

$_SESSION['user']['cash'] = getUserById($_SESSION['user']['id'])['cash'];
header("Location: $BASE_URL".'pages/users/edit_profile.php');
